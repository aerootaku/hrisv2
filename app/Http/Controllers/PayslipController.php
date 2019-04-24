<?php

namespace App\Http\Controllers;

use App\Employee;
use App\MakePayment;
use App\PayrollCutOff;
use App\Payslip;
use App\Company;
use App\TaxPagibig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PayslipController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->sortByDesc('id');
        $cutoff = PayrollCutOff::all()->sortByDesc('id');
        return view('Payroll.select-payslip', compact('cutoff','employee'));
    }

    public function generatePayslip(Request $request)
    {
        // DB::select('call myStoredProcedure("p1", "p2")');
        //No Computation
        $overtime_hours=0;
        $undertime_hours=0;
        $nightdiff_hours=0;
        $holiday=0;
        $holiday_pay=0;
        $nightdiff_pay=0;
        $allowance=0;
        $absences=0;
        $per_day = 0;
        $undertime_deduc=0;
        $tardiness=0;
        $overtime_pay=0;
        $sss_cont = 0;
        $withholding_tax=0;
        $rate_name=0;
        $per_hour=0;


        $employee_id = $request->get('employee_id');
        $cutoff_id = $request->get('cutoff_id');

        $employee = DB::table('employee')->where('id',$employee_id)->get();
        $employee_rate = DB::table('employee_employment as ee')
            ->select('rate_name', 'per_day', 'hours', 'per_hour')
            ->join('rate_template as rt', 'ee.rate_id', '=', 'rt.id')
            ->where('ee.employee_id',$employee_id)
            ->get();

        foreach ($employee_rate as $row) {
            $rate_name = $row->rate_name;
            $per_day = $row->per_day;
            $hours = $row->hours;
            $per_hour = $row->per_hour;
        }

        $cutoff = DB::table('payroll_cutoff')->where('id',$cutoff_id)->get();
        foreach ($cutoff as $row) {
            $cutoff_from = $row->cutoff_from;
            $cutoff_to = $row->cutoff_to;
        }

        $attendance_time = DB::table('attendance_time')
            ->where('employee_id',$employee_id)
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->get();

        $regular_work_hrs = DB::table('attendance_time')
            ->select(DB::raw('SUM(hour(total_work) * 60) as work_minutes'),
                DB::raw('SUM(hour(total_work)) as work_hours'),
                DB::raw('SUM(hour(total_work)  /8)  as days_work')
            )
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->where('employee_id',$employee_id)
            ->get();
        foreach ($regular_work_hrs as $row){
            $basic_pay=$per_day*$row->days_work;
            $monthly=$basic_pay*2;
        }


        $overtime = DB::table('attendance_time as att')
            ->select(DB::raw('per_hour*(hour(overtime)) as ot'),
                DB::raw('hour(overtime) as overtime_hours'),
                DB::raw('per_hour'),
                DB::raw('overtime_pay')
            )
            ->join('tax_day_template as dt','dt.id','=','att.day_type_id')
            ->join('employee_employment as ee','ee.employee_id','=','att.employee_id')
            ->join('rate_template as rt','rt.id','=','ee.rate_id')
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->where('att.employee_id',$employee_id)
            ->whereNotNull('overtime_approved')
            ->get();

        foreach ($overtime as $row){
            $overtime=+$row->overtime_hours;
            $overtime_pay=+$row->overtime_hours*$row->per_hour;
        }

        $gross_pay=$basic_pay+$overtime_pay+$holiday_pay+$nightdiff_pay+$allowance;//OK

        //Tax SSS/Philhealth/Pagibig/Wtax
        $sss = DB::table('tax_sss')
            ->where('range_from','<=',$monthly)
            ->where('range_to','>=',$monthly)
            ->get();
        foreach ($sss as $row){
            $sss_cont=$row->ee_share/2;
        }
        $pagibig = DB::table('tax_pagibig')
            ->where('range_from','<=',$monthly)
            ->where('range_to','>=',$monthly)
            ->get();
        foreach ($pagibig as $row){
            $pagibig_cont=$row->share;
        }
        $philhealth_cont=($monthly* 0.0275) / 2 ;
//ok

        $taxable=($basic_pay+$overtime_pay+$holiday_pay+$nightdiff_pay)-($tardiness+$absences+$sss_cont+$pagibig_cont+$philhealth_cont);
        $taxable_income= $taxable;
        $tax_withholding = DB::table('tax_withholding')
            ->where('type','=','Monthly')
            ->where('range_from','<=',$taxable)
            ->where('range_to','>=',$taxable)
            ->get();
        foreach ($tax_withholding as $row){
            $withholding_tax=(($taxable - $row->range_from) * $row->percentage) + $row->amount;
        }
        $overall_deduc = $sss_cont + $pagibig_cont + $philhealth_cont;
        $net_pay = $gross_pay - ($overall_deduc + $withholding_tax);
        $loan = DB::table('employee_loan')
            ->select('sc.value as loan_type','total_amount','payable','payment_term','paid_amount','balance')
            ->join('settings_constants as sc', 'employee_loan.loan_type_id', '=', 'sc.id')
            ->where('employee_id',$employee_id)
            ->where('balance','<>','0.00')
            ->get();
//dd($loan);
        return view('Payroll.payslip', compact(
            'data','employee','employee_attendance','attendance_time','loan','regular_work_hrs',
            'rate_name','monthly','basic_pay','per_day','per_hour',
            'overtime_hours','undertime_hours','holiday','nightdiff_hours',
            'absences','basic_pay','overtime_pay','undertime_pay','undertime_deduc', 'holiday_pay','nightdiff_pay','allowance',
            'taxable_income', 'gross_pay','withholding_tax',
            'sss_cont','pagibig_cont','philhealth_cont','overall_deduc','net_pay','cutoff_id','employee_id'));
    }
// total_loan

    public function create()
    {
        //
    }

    public function savePayslip(Request $request)
    {
        $cutoff_id = $request->input('cutoff_id');
        $loan_paid = $request->input('loan_paid');
        $loan_id = $request->input('loan_id');


        $total_loan = 0;
        for ($i = 0; $i < count($loan_id); $i++) {
            $total_loan += $loan_paid[$i];

            $this->minusLoan($loan_paid[$i], $loan_id[$i], $cutoff_id);
        }
        $request->input($total_loan);
        MakePayment::create(
            $request->only('cutoff_id', 'employee_id', 'department_id', 'company_id', 'location_id', 'designation_id', 'payment_method_id',
                'per_day', 'per_hour', 'per_month', 'work_hours', 'work_days', 'overtime_hours', 'undertime_hours', 'nightdiff_hours',
                'absences', 'basic_pay', 'overtime_pay', 'holiday_pay', 'nightdiff_pay', 'allowance', 'gross_pay', 'sss_cont',
                'pagibig_cont', 'philhealth_cont', 'taxable_income', 'withholding_tax', 'undertime_deduc', 'absences_deduc',
                'overall_deduc', 'net_pay', 'comments', 'total_loan')
        );
        $notification = array(
            'message' => 'Employee Payslip Created Successfully',
            'alert-type' => 'success'
        );
        return redirect('payslip')->with($notification); //'selec-cutoff'
    }

    Public function minusLoan($amnt, $loan_id, $cutoff_id)
    {
        $query = DB::select("select * from employee_loan where id=$loan_id");
        foreach ($query as $row) {
            $new_balance = $row->balance - $amnt;
            $paid_amount = $row->paid_amount + $amnt;
            DB::update("update employee_loan set paid_amount='$paid_amount',balance='$new_balance' where  id=$loan_id");

            DB::insert("insert into employee_loan_payment (employee_loan_id,cutoff_id,paid_amount,previews_balance,new_balance)values($loan_id,$cutoff_id,$amnt,'$row->balance','$new_balance')");
        }
    }


    public function show(Payslip $payslip)
    {
        //
    }

    public function edit(Payslip $payslip)
    {
        //
    }

    public function update(Request $request, Payslip $payslip)
    {
        //
    }

    public function destroy(Payslip $payslip)
    {
        //
    }
}

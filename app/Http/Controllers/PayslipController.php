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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class PayslipController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->sortByDesc('id');
        $cutoff = PayrollCutOff::all()->sortByDesc('id');
       return view('Payroll.select-payslip', compact('cutoff','employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generatePayslip(Request $request)
    {
        //DB::select('call myStoredProcedure("p1", "p2")');
        //No Computation
        $overtime_hours=0;
        $overtime_pay=0;
        $absences_no=0;
        $absences_deduc=0;
        $undertime_hours=0;
        $undertime_deduc=0;
        $holiday=0;
        $holiday_pay=0;
        $allowance=0;
        $per_day = 0;
        $tardiness=0;
        $sss_cont = 0;
        $withholding_tax=0;
        $rate_name=0;

        $employee_id = $request->get('employee_id');
        $cutoff_id = $request->get('cutoff_id');

        $employee = DB::table('employee')->where('id',$employee_id)->get();
        $employee_deployment = DB::table('employee_employment as ee')
            ->select('per_day_salary', 'monthly_salary')
            ->where('ee.employee_id',$employee_id)
            ->get();
        foreach ($employee_deployment as $row) {
            $per_day = $row->per_day_salary;
            $per_month= $row->monthly_salary;
            $per_hour = $row->per_day_salary/8;
            $per_semi_month= $row->monthly_salary/2;
        }

        $cutoff = DB::table('payroll_cutoff')->where('id',$cutoff_id)->get();
        foreach ($cutoff as $row) {
            $cutoff_from = $row->cutoff_from;
            $cutoff_to = $row->cutoff_to;
        }



        $dt = Carbon::parse($cutoff_from);
        $dt2 = Carbon::parse($cutoff_to);
        $totalWorkingDays = $dt->diffInDaysFiltered(function(Carbon $date) {
            return !$date->isWeekend();
        }, $dt2)+1;



        $date1 = Carbon::parse($cutoff_from);
        $date2 = Carbon::parse($cutoff_to);

        $sundays= $date1->diffForHumans($date2);


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

        //Overtime
        $ot=$this->compute_overtime($cutoff_from,$cutoff_to,$employee_id,$per_hour);
        $overtime_hours=$ot['overtime'];
        $overtime_pay=$ot['overtime_pay'];

        $gross_pay=$basic_pay+$overtime_pay+$holiday_pay+$allowance;//OK

        //Tax SSS/Philhealth/Pagibig/Wtax
        $dev_tax=$this->compute_sss_philhealth_pagibig($monthly);
        $sss_cont=$dev_tax['sss_cont'];
        $pagibig_cont=$dev_tax['pagibig_cont'];
        $philhealth_cont=$dev_tax['philhealth_cont'];

        $taxable=($basic_pay+$overtime_pay+$holiday_pay)-($tardiness+$absences_deduc+$sss_cont+$pagibig_cont+$philhealth_cont);//ok
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

        return view('Payroll.payslip', compact(
            'data','employee','employee_attendance','attendance_time','loan','regular_work_hrs',
            'rate_name','monthly','basic_pay','per_day','per_hour','per_month',
            'overtime_hours','undertime_hours','holiday','nightdiff_hours','absences_no',
            'absences_deduc','basic_pay','overtime_pay','undertime_pay','undertime_deduc', 'holiday_pay','nightdiff_pay','allowance',
            'taxable_income', 'gross_pay','withholding_tax',
            'sss_cont','pagibig_cont','philhealth_cont','overall_deduc','net_pay','cutoff_id','employee_id',
            'sundays','totalWorkingDays','per_semi_month'
        ));
    }
// total_loan

    public function create()
    {
        //
    }

    public function savePayslip(Request $request)
    {
        $this->validate(request(), [

        ]);

        $cutoff_id = $request->input('cutoff_id');
        $loan_paid = $request->input('loan_paid');
        $loan_id = $request->input('loan_id');

        $total_loan = 0;
        for ($i = 0; $i < count($loan_id); $i++) {
            $total_loan += $loan_paid[$i];
            self::compute_loan($loan_paid[$i], $loan_id[$i], $cutoff_id);
        }
        $request->input($total_loan);
        MakePayment::create(
            $request->only('cutoff_id', 'employee_id', 'department_id', 'company_id', 'location_id', 'designation_id', 'payment_method_id',
                'per_day', 'per_hour', 'per_month', 'work_hours', 'work_days', 'overtime_hours', 'undertime_hours', 'nightdiff_hours', 'absences_deduc', 'basic_pay', 'overtime_pay', 'holiday_pay', 'nightdiff_pay', 'allowance', 'gross_pay', 'sss_cont', 'pagibig_cont', 'philhealth_cont', 'taxable_income', 'withholding_tax', 'undertime_deduc', 'absences_deduc', 'overall_deduc', 'net_pay', 'comments',
                'total_loan')
        );


        $notification = array(
            'message' => 'Employee Payslip Created Successfully',
            'alert-type' => 'success'
        );
        return redirect('payslip')->with($notification); //'selec-cutoff'
    }

    Public function compute_loan($amnt, $loanId, $cutoff)
    {
        $query = DB::select("select * from employee_loan where id=$loanId");
        foreach ($query as $row) {
            $new_balance = $row->balance - $amnt;
            $paid_amount = $row->paid_amount + $amnt;
            DB::update("update employee_loan set paid_amount='$paid_amount',balance='$new_balance' where  id=$loanId");

            DB::insert("insert into employee_loan_payment (employee_loan_id,cutoff_id,paid_amount,previews_balance,new_balance)values($loanId,$cutoff,$amnt,'$row->balance','$new_balance')");
        }
    }

    Public function compute_sss_philhealth_pagibig($monthly_salary){
        $sss = DB::table('tax_sss')
            ->where('range_from','<=',$monthly_salary)
            ->where('range_to','>=',$monthly_salary)
            ->get();
        if ($sss->count()>0){
            foreach ($sss as $row){
                $output['sss_cont']=$row->ee_share/2;
            }
        }else{
            $output['sss_cont']=0;
        }

        $pagibig = DB::table('tax_pagibig')
            ->where('range_from','<=',$monthly_salary)
            ->where('range_to','>=',$monthly_salary)
            ->get();
        if ($pagibig->count()>0){
            foreach ($pagibig as $row){
                $output['pagibig_cont']=$row->share;
            }
        }else{
            $output['pagibig_cont']=0;
        }

        //philhealth_cont
        $output['philhealth_cont']=50;
        // $philhealth_cont=($monthly_salary * 0.0275) / 2 ;
        return $output;
    }

    public function compute_overtime($cutoff_from,$cutoff_to,$employee_id,$per_hour){
        $overtime = DB::table('attendance_time as att')
            ->select(
                DB::raw('hour(overtime) as overtime_hours')
            )
             ->join('employee_employment as ee','ee.employee_id','=','att.employee_id')
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->where('att.employee_id',$employee_id)
            ->where('overtime_approved','<>','0')
            ->get();
        if ($overtime->count()>0) {
            foreach ($overtime as $row) {
                $output['overtime'] = +$row->overtime_hours;
                $output['overtime_pay'] = +$row->overtime_hours * $per_hour;
            }
        }else{
            $output['overtime']=0;
            $output['overtime_pay']=0;
        }
        return $output;
    }

    public function compute_undertime($cutoff_from,$cutoff_to,$employee_id){

        $overtime_hours=0;
        $overtime_pay=0;
    }

    public function compute_absences($cutoff_from,$cutoff_to,$employee_id,$per_day){
        $overtime = DB::table('attendance_time')
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->where('att.employee_id',$employee_id)
            ->get();
        if ($overtime->count()>0) {
            foreach ($overtime as $row) {
                $output['absences_no'] = +$row->absences_no;
                $output['absences_deduc'] = +$row->absences_no * $per_day;
            }
        }else{
            $output['overtime']=0;
            $output['overtime_pay']=0;
        }

        return $output;
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

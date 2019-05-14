<?php

namespace App\Http\Controllers;

use App\Employee;
use App\MakePayment;
use App\PayrollCutOff;
use App\Payslip;
use App\Company;
use App\TaxPagibig;
use function Couchbase\defaultDecoder;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class PayslipController extends Controller
{

    protected $employeeUtil;

    public $overtime_hours=0;
    public $overtime_pay=0;
    public $absences_no=0;
    public $absences_deduc=0;
    public $undertime_hours=0;
    public $undertime_deduc=0;
    public $holiday=0;
    public $holiday_pay=0;
    public $allowance=0;
    public $per_day = 0;
    public $tardiness=0;
    public $sss_cont = 0;
    public $withholding_tax=0;
    public $rate_name=0;


    public function __construct(EmployeeUtil $employeeUtil)
    {
        $this->employeeUtil = $employeeUtil;
    }


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


        $overall_deduc = $sss_cont + $pagibig_cont + $philhealth_cont;
        $net_pay = $gross_pay - ($overall_deduc + $withholding_tax);

        $loan = DB::table('employee_loan')
            ->select('sc.value as loan_type','total_amount','payable','payment_term','paid_amount','balance')
            ->join('settings_constants as sc', 'employee_loan.loan_type_id', '=', 'sc.id')
            ->where('employee_id',$employee_id)
            ->where('balance','<>','0.00')
            ->get();



        return view('Payroll.payslip', compact(
            'data','employee','employee_attendance','attendance_time'
            ,'loan','work_hrs',
            'rate_name','monthly','basic_pay','per_day','per_hour','per_month',
            'overtime_hours','undertime_hours','holiday','nightdiff_hours','absences_no',
            'absences_deduc','basic_pay','overtime_pay','undertime_pay','undertime_deduc', 'holiday_pay','nightdiff_pay','allowance',
            'taxable_income', 'gross_pay','withholding_tax',
            'sss_cont','pagibig_cont','philhealth_cont','overall_deduc','net_pay','cutoff_id','employee_id',
            'sundays','totalWorkingDays','per_semi_month'
        ));
    }
// total_loan

    public function generateNewPayslip(Request $request){
        //dummy data
        //end of dummy data
        $id = $request->get('employee_id');
        $cutoff_id = $request->get('cutoff_id');

        $employee = $this->employeeUtil->getEmployee($id);
        $cutoff = $this->employeeUtil->getCutOff($cutoff_id);
        $cutoff_from=$cutoff->cutoff_from;
        $cutoff_to=$cutoff->cutoff_to;
        $employment = $this->employeeUtil->getEmployment($id);
        $totalDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $employeeWorkingHours = $this->employeeUtil->employeeCutoffAttendance($id,$cutoff_from, $cutoff_to);

        $cutoffWorkingHours = $this->employeeUtil->cutoffWorkingHours($cutoff_from, $cutoff_to);
        $cutoffWorkingDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $absentCount = $this->employeeUtil->generateAbsences($employeeWorkingHours->days_work,$cutoff_from, $cutoff_to);

        $overtime=$this->compute_overtime($id,$cutoff_from,$cutoff_to,$employment->per_day_salary);
       // dd($employeeWorkingHours);
        //process salary according to attendance
        $monthly_salary = $employment->monthly_salary;

        //compute deduction
        $deductions_spp = $this->compute_sss_philhealth_pagibig($monthly_salary,$cutoff->deduction_type);
        //$totalDeductions = array_sum($deductions);


        $attendance_time = DB::table('attendance_time')
            ->where('employee_id',$id)
            ->whereBetween('attendance_date', [$cutoff->cutoff_from, $cutoff->cutoff_to])
            ->get();
        $payslip_input = DB::table('employee_salary_adjustment')
            ->where('employee_id',$id)
            ->where('cutoff_id',$cutoff_id)
            ->get();
        $loan = DB::table('employee_loan')
            ->select('sc.value as loan_type','total_amount','payable','payment_term','paid_amount','balance')
            ->join('settings_constants as sc', 'employee_loan.loan_type_id', '=', 'sc.id')
            ->where('employee_id',$id)
            ->where('balance','<>','0.00')
            ->get();
//        $tax_withholding = DB::table('tax_withholding')
//            ->where('type','=','Monthly')
//            ->where('range_from','<=',$taxable)
//            ->where('range_to','>=',$taxable)
//            ->get();
//        foreach ($tax_withholding as $row){
//            $withholding_tax=(($taxable - $row->range_from) * $row->percentage) + $row->amount;
//        }

       // dd($cutoffDailySalary, $grosspay, $deductions, $totalDeductions);
        $data = array(
            "employee_info"=>$employee,
            "employment"=>$employment,
            "totalWorkingHours"=>$cutoffWorkingHours,
            "totalWorkingDays"=>$cutoffWorkingDays,
            "cutoffWorkingHours"=>$employeeWorkingHours,
            "totalAbsent"=>$absentCount,
            "attendance_time"=>$attendance_time,
            "payslip_input"=>$payslip_input,
            "loan"=>$loan,
            "deduction_spp"=>$deductions_spp,
            "overtime"=>$overtime

        );
        return view('Payroll.payslipnew', $data);
    }

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
    //Ok
    Public function compute_sss_philhealth_pagibig($monthly_salary,$cutoff_deduction){
       if ($cutoff_deduction==0){
           $output['sss_cont']=0;
           $output['pagibig_cont']=0;
           $output['philhealth_cont']=0;
       }else{

           //SSS
           $sss = DB::table('tax_sss')
               ->where('range_from','<=',$monthly_salary)
               ->where('range_to','>=',$monthly_salary)
               ->get();
           if ($sss->count()>0){
               foreach ($sss as $row){
                   $output['sss_cont']=$row->ee_share/$cutoff_deduction;
               }
           }else{
               $output['sss_cont']=0;
           }

            //Pagibig
           $pagibig = DB::table('tax_pagibig')
               ->where('range_from','<=',$monthly_salary)
               ->where('range_to','>=',$monthly_salary)
               ->get();
           if ($pagibig->count()>0){
               foreach ($pagibig as $row){
                   $output['pagibig_cont']=$row->share/$cutoff_deduction;
               }
           }else{
               $output['pagibig_cont']=0;
           }

           //philhealth_cont
           $output['philhealth_cont']=100/$cutoff_deduction;
           // $philhealth_cont=($monthly_salary * 0.0275) / 2 ;
       }

        return $output;
    }
    //Ok
    public function compute_overtime($employee_id,$cutoff_from,$cutoff_to,$per_hour){
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
                $output['absences_no'] =+ $row->absences_no;
                $output['absences_deduc'] =+ $row->absences_no * $per_day;
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

<?php



namespace App\Http\Controllers;



use App\Company;

use App\Employee;

use App\MakePayment;

use App\Payroll;

use App\PayrollCutOff;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;



class PayrollController extends Controller

{


    private $employeeUtil;

    /**
     * PayrollController constructor.
     * @param EmployeeUtil $employeeUtil
     */
    public function __construct(EmployeeUtil $employeeUtil)
    {

        $this->employeeUtil = $employeeUtil;

    }


    public function index()

    {

        $company = Company::all()->sortByDesc('id');

        $cutoff = PayrollCutOff::all()->sortByDesc('id');

        return view('Payroll.select-payroll', compact('cutoff','company'));

    }



    public function generatePayroll(Request $request)
    {
        $company_id = $request->get('company_id');
        $cutoff_id = $request->get('cutoff_id');
        $this->selectEmployee($company_id,$cutoff_id);


//        MakePayment::create([
//
//        ]);
//
//
//        DB::table()
//            ->where()
//            ->update([]);
//
//        DB::table()
//            ->where()
//            ->delete();

//
        $data = DB::table('make_payment')
            ->select('make_payment.id as id','firstname','lastname','employee_no','cutoff_name',
                'per_day','per_hour','per_month','work_hours','work_days',
                'overtime_hours','undertime_hours','nightdiff_hours','absences','basic_pay','overtime_pay','holiday_pay','nightdiff_pay','allowance','gross_pay','sss_cont','pagibig_cont','philhealth_cont','taxable_income','withholding_tax','undertime_deduc','absences_deduc','total_loan','overall_deduc','net_pay','comments')
            ->join('payroll_cutoff', 'make_payment.cutoff_id', '=', 'payroll_cutoff.id')
            ->join('employee', 'make_payment.employee_id', '=', 'employee.id')
            ->where('cutoff_id',$cutoff_id)
            ->where('make_payment.company_id',$company_id)
            ->get();
        return view('Payroll.payroll', compact('data','employee','company_id','cutoff_id'));

    }

    public  function selectEmployee($company_id,$cutoff_id){
        $employees = Employee::where('company_id','=', $company_id)->get();

        $payment = DB::table('make_payment')
            ->where('company_id', $company_id)
            ->where('cutoff_id', $cutoff_id)
            ->first();
       // dd($payment);
        if(count($payment)>0){      //update
            foreach ($employees as $employee){
                $employee_id = $employee->id;
                $this->computeUpdatePayroll($company_id, $employee_id, $cutoff_id);
            }
        }
        else {
            foreach ($employees as $employee) {
                $employee_id = $employee->id;
                $this->computePayroll($company_id, $employee_id, $cutoff_id);
            }
        }
    }

    public function computePayroll($company_id,$employee_id,$cutoff_id){
        $employee = $this->employeeUtil->getEmployee($employee_id);
        $cutoff = $this->employeeUtil->getCutOff($cutoff_id);
        $cutoff_from=$cutoff->cutoff_from;
        $cutoff_to=$cutoff->cutoff_to;


        $employment = $this->employeeUtil->getEmployment($employee_id);
        $totalDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $employeeWorkingHours = $this->employeeUtil->employeeCutoffAttendance($employee_id,$cutoff_from, $cutoff_to);

        $cutoffWorkingHours = $this->employeeUtil->cutoffWorkingHours($cutoff_from, $cutoff_to);
        $cutoffWorkingDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $absentCount = $this->employeeUtil->generateAbsences($employeeWorkingHours->days_work,$cutoff_from, $cutoff_to);

        $overtime=$this->compute_overtime($employee_id,$cutoff_from,$cutoff_to,$employment->per_day_salary);
        // dd($employeeWorkingHours);
        //process salary according to attendance
        $monthly_salary = $employment->monthly_salary;

        //compute deduction
        $deductions_spp = $this->compute_sss_philhealth_pagibig($monthly_salary,$cutoff->deduction_type);



        $payslip_input = DB::table('employee_payslip_input')
            ->where('employee_id',$employee_id)
            ->where('cutoff_id',$cutoff_id)
            ->get();
        $loan = DB::table('employee_loan')
            ->select('sc.value as loan_type','total_amount','payable','payment_term','paid_amount','balance')
            ->join('settings_constants as sc', 'employee_loan.loan_type_id', '=', 'sc.id')
            ->where('employee_id',$employee_id)
            ->where('balance','<>','0.00')
            ->get();


        $totalLoan=0;
        $hrs_per_day=8;
        //Work
        $per_day=$employment->per_day_salary;
        $per_hour=$employment->per_day_salary/$hrs_per_day;
        $per_month=$employment->monthly_salary;
        $work_hours=$employeeWorkingHours->work_hours;
        $work_days=$employeeWorkingHours->days_work;

        $allowance=0;$bonus=0; $salary_adjustments=0; $thirteenth_month_pay=0;$other_deduction=0;
        foreach($payslip_input as $row){
            $allowance=$row->allowance;
            $bonus=$row->bonus;
            $salary_adjustments=$row->salary_adjustments;
            $thirteenth_month_pay=$row->thirteenth_month_pay;
            $other_deduction=$row->thirteenth_month_pay;
        }
        foreach($loan as $row){
            if($row->balance > $row->payable){
                $totalLoan= $totalLoan+$row->payable;
            }else{
                $totalLoan= $totalLoan+$row->balance;
            }
        }

        $overtime_hours=$overtime['overtime'];
        $late_hours=$employeeWorkingHours->undertime;
        $absences_days=$absentCount;


        $basic_pay=$employment->monthly_salary/2;

        $overtime_pay=$overtime['overtime']*$per_hour;
        $holiday_pay=0;

        $gross_pay=$basic_pay+$overtime_pay+$holiday_pay+$allowance+$bonus+$salary_adjustments+$thirteenth_month_pay;//OK

        $late_deduction=$late_hours*$per_hour;
        $absences_deduction=$employment->per_day_salary*$absences_days;

        $sss_cont=$deductions_spp['sss_cont'];
        $pagibig_cont=$deductions_spp['pagibig_cont'];
        $philhealth_cont=$deductions_spp['philhealth_cont'];



        $taxable=($basic_pay+$overtime_pay+$holiday_pay)-($late_deduction+$absences_deduction+$sss_cont+$pagibig_cont+$philhealth_cont);//ok
        $taxable_income= $taxable;
        $tax_withholding = DB::table('tax_withholding')
            ->where('type','=','Monthly')
            ->where('range_from','<=',$taxable)
            ->where('range_to','>=',$taxable)
            ->get();
        if (count($tax_withholding)>0){
            foreach ($tax_withholding as $row){
                $withholding_tax=(($taxable - $row->range_from) * $row->percentage) + $row->amount;
            }
        }else{
            $withholding_tax=0;
        }



        $overall_deduction =$totalLoan+$late_deduction + $absences_deduction+ $sss_cont + $pagibig_cont + $philhealth_cont +$other_deduction;
        $net_pay = $gross_pay - ($overall_deduction + $withholding_tax);

        DB::table('make_payment')
            ->insert([
                "company_id"=>$company_id,
                "cutoff_id"=>$cutoff_id,
                "employee_id"=>$employee_id,
                "per_day"=>$per_day,
                "per_hour"=>$per_hour,
                "per_month"=>$per_month,
                "work_hours"=>$work_hours,
                "work_days"=>$work_days,
                "overtime_hours"=>$overtime_hours,
                "undertime_hours"=>$late_hours,
                "absences"=>$absences_days,
                "basic_pay"=>$basic_pay,
                "overtime_pay"=>$overtime_pay,
                "holiday_pay"=>$holiday_pay,
                "allowance"=>$allowance,
                "gross_pay"=>$gross_pay,
                "sss_cont"=>$sss_cont,
                "pagibig_cont"=>$pagibig_cont,
                "philhealth_cont"=>$philhealth_cont,
                "taxable_income"=>$taxable_income,
                "withholding_tax"=>$withholding_tax,
                "undertime_deduc"=>$late_deduction,
                "absences_deduc"=>$absences_deduction,
                "total_loan"=>$totalLoan,
                "overall_deduc"=>$overall_deduction,
                "net_pay"=>$net_pay,
                "salary_adjustments"=>$salary_adjustments,
                "thirteenth_month_pay"=>$thirteenth_month_pay,
                "bonus"=>$bonus
            ]);
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

    public function generatePayrollMemo($company_id, $cutoff_id)
    {
        $total_amount=0;
//        $company_id = $request->get('company_id');
//        $cutoff_id = $request->get('cut_off_id');
        $data = DB::table('make_payment')
            ->select('make_payment.id as id','firstname','lastname','employee_no','net_pay','comments','bank_account','account_number','address_1','name','company.telephone_no')
            ->join('payroll_cutoff', 'make_payment.cutoff_id', '=', 'payroll_cutoff.id')
            ->join('employee', 'make_payment.employee_id', '=', 'employee.id')
            ->join('employee_employment', 'employee_employment.employee_id', '=', 'employee.id')
            ->join('company', 'employee.company_id', '=', 'company.id')
            ->where('cutoff_id',$cutoff_id)
            ->where('make_payment.company_id',$company_id)
            ->get();
        foreach ($data as $row) {
            $account_number = $row->account_number;
            $address_1 = $row->address_1;
            $company_name = $row->name;
            $total_amount+= $row->net_pay;
            $tel = $row->telephone_no;
            $fax = $row->account_number;
            $tin = $row->account_number;
        }

        $company_details = [ $account_number, $address_1,$company_name,$tel,$fax,$tin

        ];
        //dd($company_details);
        return view('Payroll.payroll-memo', compact('data','total_amount','company_details'));
    }

    public function create()

    {

        //

    }

    public function store(Request $request)

    {

        //

    }

    public function show(Payroll $payroll)

    {

        //

    }

    public function edit(Payroll $payroll)

    {

        //

    }

    public function update(Request $request, Payroll $payroll)
    {

        //

    }

    public function destroy(Payroll $payroll)
    {

        //

    }

    private function computeUpdatePayroll($company_id, $employee_id, $cutoff_id)
    {
        $employee = $this->employeeUtil->getEmployee($employee_id);
        $cutoff = $this->employeeUtil->getCutOff($cutoff_id);
        $cutoff_from=$cutoff->cutoff_from;
        $cutoff_to=$cutoff->cutoff_to;


        $employment = $this->employeeUtil->getEmployment($employee_id);
        $totalDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $employeeWorkingHours = $this->employeeUtil->employeeCutoffAttendance($employee_id,$cutoff_from, $cutoff_to);

        $cutoffWorkingHours = $this->employeeUtil->cutoffWorkingHours($cutoff_from, $cutoff_to);
        $cutoffWorkingDays = $this->employeeUtil->cutoffWorkingDays($cutoff_from, $cutoff_to);
        $absentCount = $this->employeeUtil->generateAbsences($employeeWorkingHours->days_work,$cutoff_from, $cutoff_to);

        $overtime=$this->compute_overtime($employee_id,$cutoff_from,$cutoff_to,$employment->per_day_salary);
        // dd($employeeWorkingHours);
        //process salary according to attendance
        $monthly_salary = $employment->monthly_salary;

        //compute deduction
        $deductions_spp = $this->compute_sss_philhealth_pagibig($monthly_salary,$cutoff->deduction_type);



        $payslip_input = DB::table('employee_payslip_input')
            ->where('employee_id',$employee_id)
            ->where('cutoff_id',$cutoff_id)
            ->get();
        $loan = DB::table('employee_loan')
            ->select('sc.value as loan_type','total_amount','payable','payment_term','paid_amount','balance')
            ->join('settings_constants as sc', 'employee_loan.loan_type_id', '=', 'sc.id')
            ->where('employee_id',$employee_id)
            ->where('balance','<>','0.00')
            ->get();


        $totalLoan=0;
        $hrs_per_day=8;
        //Work
        $per_day=$employment->per_day_salary;
        $per_hour=$employment->per_day_salary/$hrs_per_day;
        $per_month=$employment->monthly_salary;
        $work_hours=$employeeWorkingHours->work_hours;
        $work_days=$employeeWorkingHours->days_work;

        $allowance=0;$bonus=0; $salary_adjustments=0; $thirteenth_month_pay=0;$other_deduction=0;
        foreach($payslip_input as $row){
            $allowance=$row->allowance;
            $bonus=$row->bonus;
            $salary_adjustments=$row->salary_adjustments;
            $thirteenth_month_pay=$row->thirteenth_month_pay;
            $other_deduction=$row->thirteenth_month_pay;
        }
        foreach($loan as $row){
            if($row->balance > $row->payable){
                $totalLoan= $totalLoan+$row->payable;
            }else{
                $totalLoan= $totalLoan+$row->balance;
            }
        }

        $overtime_hours=$overtime['overtime'];
        $late_hours=$employeeWorkingHours->undertime;
        $absences_days=$absentCount;


        $basic_pay=$employment->monthly_salary/2;

        $overtime_pay=$overtime['overtime']*$per_hour;
        $holiday_pay=0;

        $gross_pay=$basic_pay+$overtime_pay+$holiday_pay+$allowance+$bonus+$salary_adjustments+$thirteenth_month_pay;//OK

        $late_deduction=$late_hours*$per_hour;
        $absences_deduction=$employment->per_day_salary*$absences_days;

        $sss_cont=$deductions_spp['sss_cont'];
        $pagibig_cont=$deductions_spp['pagibig_cont'];
        $philhealth_cont=$deductions_spp['philhealth_cont'];



        $taxable=($basic_pay+$overtime_pay+$holiday_pay)-($late_deduction+$absences_deduction+$sss_cont+$pagibig_cont+$philhealth_cont);//ok
        $taxable_income= $taxable;
        $tax_withholding = DB::table('tax_withholding')
            ->where('type','=','Monthly')
            ->where('range_from','<=',$taxable)
            ->where('range_to','>=',$taxable)
            ->get();
        if (count($tax_withholding)>0){
            foreach ($tax_withholding as $row){
                $withholding_tax=(($taxable - $row->range_from) * $row->percentage) + $row->amount;
            }
        }else{
            $withholding_tax=0;
        }



        $overall_deduction =$totalLoan+$late_deduction + $absences_deduction+ $sss_cont + $pagibig_cont + $philhealth_cont +$other_deduction;
        $net_pay = $gross_pay - ($overall_deduction + $withholding_tax);

        DB::table('make_payment')
            ->where('company_id', $company_id)
            ->where('cutoff_id', $cutoff_id)
            ->where('employee_id', $employee_id)
            ->update([
                "per_day"=>$per_day,
                "per_hour"=>$per_hour,
                "per_month"=>$per_month,
                "work_hours"=>$work_hours,
                "work_days"=>$work_days,
                "overtime_hours"=>$overtime_hours,
                "undertime_hours"=>$late_hours,
                "absences"=>$absences_days,
                "basic_pay"=>$basic_pay,
                "overtime_pay"=>$overtime_pay,
                "holiday_pay"=>$holiday_pay,
                "allowance"=>$allowance,
                "gross_pay"=>$gross_pay,
                "sss_cont"=>$sss_cont,
                "pagibig_cont"=>$pagibig_cont,
                "philhealth_cont"=>$philhealth_cont,
                "taxable_income"=>$taxable_income,
                "withholding_tax"=>$withholding_tax,
                "undertime_deduc"=>$late_deduction,
                "absences_deduc"=>$absences_deduction,
                "total_loan"=>$totalLoan,
                "overall_deduc"=>$overall_deduction,
                "net_pay"=>$net_pay,
                "salary_adjustments"=>$salary_adjustments,
                "thirteenth_month_pay"=>$thirteenth_month_pay,
                "bonus"=>$bonus
            ]);
    }

}


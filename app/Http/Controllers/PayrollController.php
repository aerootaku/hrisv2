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
    public function index()
    {
        $company = Company::all()->sortByDesc('id');
        $cutoff = PayrollCutOff::all()->sortByDesc('id');
        return view('Payroll.select-payroll', compact('cutoff','company'));
    }

    public function generatePayroll(Request $request){

        $company_id = $request->get('company_id');
        $cutoff_id = $request->get('cut_off_id');

        $data = DB::table('make_payment')
            ->select('make_payment.id as id','firstname','lastname','employee_no','cutoff_name',
                'per_day','per_hour','per_month','work_hours','work_days',
                'overtime_hours','undertime_hours','nightdiff_hours','absences','basic_pay','overtime_pay','holiday_pay','nightdiff_pay','allowance','gross_pay','sss_cont','pagibig_cont','philhealth_cont','taxable_income','withholding_tax','undertime_deduc','absences_deduc','total_loan','overall_deduc','net_pay','comments')
            ->join('payroll_cutoff', 'make_payment.cutoff_id', '=', 'payroll_cutoff.id')
            ->join('employee', 'make_payment.employee_id', '=', 'employee.id')
            ->where('cutoff_id',$cutoff_id)
            ->where('make_payment.company_id',$company_id)

            ->get();
//dd($data);

        return view('Payroll.payroll', compact('data','employee'));
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
}

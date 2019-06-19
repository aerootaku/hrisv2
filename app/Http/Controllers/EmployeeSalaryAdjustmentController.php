<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeSalaryAdjustment;
use App\PayrollCutOff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryAdjustmentController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->sortByDesc('lastname');
        $cutoff = PayrollCutOff::all()->sortByDesc('id');
        //$data = EmployeeSalaryAdjustment::all();
        $data = DB::table('employee_salary_adjustment')
            ->select('employee_salary_adjustment.id as id','firstname','lastname','employee_id','cutoff_id','cutoff_name','bonus','allowance','other_deduc','salary_adjustments')
            ->join('employee', 'employee_salary_adjustment.employee_id', '=', 'employee.id')
            ->join('payroll_cutoff', 'employee_salary_adjustment.cutoff_id', '=', 'payroll_cutoff.id')
            ->whereNull('employee_salary_adjustment.deleted_at')
            ->get();
        return view('Employee.salary-adjustment', compact('data','employee','cutoff'));
    }

    public function store(Request $request)
    {
        EmployeeSalaryAdjustment::create($request->all());
        $notification = array(
            'message' => 'Employee Salary Adjustment Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        EmployeeSalaryAdjustment::find($request->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Salary Adjustment Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        EmployeeSalaryAdjustment::find($id)->delete();
        $notification = array(
            'message' => 'Employee Salary Adjustment Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeeSalaryAdjustment $attendance)
    {
        //
    }

    public function show(EmployeeSalaryAdjustment $attendance)
    {
        //
    }

    public function create()
    {
        //
    }
}

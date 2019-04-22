<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeResignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeResignationController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        $data = DB::table('employee_resignations')
            ->select('employee_resignations.id as id','firstname','lastname','employee_resignations.employee_id','employee.employee_no','notice_date','resignation_date','reason')
            ->join('employee', 'employee_resignations.employee_id', '=', 'employee.id')
            ->whereNull('employee_resignations.deleted_at')
            ->orderByDesc('employee_resignations.id')
            ->get();
        return view('Employee.resignation', compact('data','employee'));
    }

    public function store(Request $request)
    {
        EmployeeResignation::create($request->all());
        $notification = array(
            'message' => 'Employee Resignation Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeResignation $employeeResignation)
    {
        EmployeeResignation::find($employeeResignation->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Resignation Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeResignation $employeeResignation)
    {
        EmployeeResignation::find($employeeResignation->id)->delete();
        $notification = array(
            'message' => 'Employee Resignation Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeeResignation $employeeResignation)
    {
        //
    }

    public function show(EmployeeResignation $employeeResignation)
    {
        //
    }

    public function create()
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeComplaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeComplaintController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_complaints as ec')
            ->select('ec.id as id','cfrom.firstname as cfromFN','cfrom.lastname as cfromLN','cto.firstname as ctoFN','cto.lastname as ctoLN','complaint_from','ec.complaint_against','ec.title','complaint_date','ec.status','description')
            ->join('employee as cfrom', 'ec.complaint_from', '=', 'cfrom.id')
            ->join('employee as cto', 'ec.complaint_against', '=', 'cto.id')
            ->whereNull('ec.deleted_at')
            ->orderByDesc('ec.id')
            ->get();
        //dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        return view('Employee.complaint', compact('data','employee'));
    }

    public function store(Request $request)
    {
        EmployeeComplaint::create($request->all());
        $notification = array(
            'message' => 'Employee Complaint Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeComplaint $employeeComplaint)
    {
        EmployeeComplaint::find($employeeComplaint->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Complaint Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeComplaint $employeeComplaint)
    {
        EmployeeComplaint::find($employeeComplaint->id)->delete();
        $notification = array(
            'message' => 'Employee Complaint Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeeComplaint $employeeComplaint)
    {
        //
    }

    public function show(EmployeeComplaint $employeeComplaint)
    {
        //
    }

    public function create()
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\EmployeeEducation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeEducationController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_educations')
            ->select('employee_educations.id as id','employee_no','employee_id','level','school','attended_from','attended_until')
            ->join('employee', 'employee_educations.employee_id', '=', 'employee.id')
            ->where('employee_id', '1')
            ->get();

        dd($data);

        return view('Employee.education', compact('data'));
    }

    public function store(Request $request)
    {
        EmployeeEducation::create($request->all());
        $notification = array(
            'message' => 'Employee Education Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeEducation $employeeEducation)
    {
        EmployeeEducation::find($employeeEducation->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Education Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeEducation $employeeEducation)
    {
        EmployeeEducation::find($employeeEducation->id)->delete();
        $notification = array(
            'message' => 'Employee Education Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

<?php

namespace App\Http\Controllers;

use App\EmployeeWorkExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeWorkExperienceController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_work_experience')
            ->select('employee_work_experience.id as id','employee_no','employee_id','company_name','from_date','to_date','post','description')
            ->join('employee', 'employee_work_experience.employee_id', '=', 'employee.id')
            ->where('employee_id', '1')
            ->get();

        dd($data);

        return view('Employee.work-experience', compact('data'));
    }

    public function store(Request $request)
    {
        EmployeeWorkExperience::create($request->all());
        $notification = array(
            'message' => 'Employee Work Experience Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeWorkExperience $employeeWorkExperience)
    {
        EmployeeWorkExperience::find($employeeWorkExperience->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Work Experience Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeWorkExperience $employeeWorkExperience)
    {
        EmployeeWorkExperience::find($employeeWorkExperience->id)->delete();
        $notification = array(
            'message' => 'Employee Work Experience Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeTermination;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeTerminationController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_terminations as et')
            ->select('settings_constants.value as termination_type','et.id as id','termination_type_id','firstname','lastname','et.employee_id','employee.employee_no',
                'termination_date','notice_date','et.status')
            ->join('employee', 'et.employee_id', '=', 'employee.id')
            ->join('settings_constants', 'et.termination_type_id', '=', 'settings_constants.id')
            ->whereNull('et.deleted_at')
            ->orderByDesc('et.id')
            ->get();
       // dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        $termination_type=SettingsConstants::all()->where('type', 'Award Type')->sortByDesc('value');

        return view('Employee.termination', compact('data','employee','termination_type'));
    }

    public function store(Request $request)
    {
        EmployeeTermination::create($request->all());
        $notification = array(
            'message' => 'Employee Termination Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeTermination $employeeTermination)
    {
        EmployeeTermination::find($employeeTermination->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Termination Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeTermination $employeeTermination)
    {
        EmployeeTermination::find($employeeTermination->id)->delete();
        $notification = array(
            'message' => 'Employee Termination Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

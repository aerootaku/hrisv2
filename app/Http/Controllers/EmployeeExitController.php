<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeExit;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeExitController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->sortByDesc('lastname');
        $exit_type=SettingsConstants::all()->where('type', 'Employee Exit Type')->sortByDesc('value');
        $yes_no=SettingsConstants::all()->where('type', 'Yes No')->sortByDesc('value');

        $data = DB::table('employee_exit')
            ->select('settings_constants.value as exit_type','employee_exit.id as id','exit_type_id','firstname','lastname','employee_exit.employee_id','employee.employee_no','exit_date','exit_interview','is_inactivate_account','reason')
            ->join('employee', 'employee_exit.employee_id', '=', 'employee.id')
            ->join('settings_constants', 'employee_exit.exit_type_id', '=', 'settings_constants.id')
            ->whereNull('employee_exit.deleted_at')
            ->orderByDesc('employee_exit.id')
            ->get();

       //  dd($data);
        return view('Employee.exit', compact('data','employee','exit_type','yes_no'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'=>'unique:employee_exit',
//            'exit_date'=>'unique:employee_exit',
//            'exit_type_id'=>'unique:employee_exit'
        ]);


        EmployeeExit::create($request->all());
        $notification = array(
            'message' => 'Employee Exit Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeExit $employeeExit)
    {
        EmployeeExit::find($employeeExit->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Exit Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeExit $employeeExit)
    {
        EmployeeExit::find($employeeExit->id)->delete();
        $notification = array(
            'message' => 'Employee Exit Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}

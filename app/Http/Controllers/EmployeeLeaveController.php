<?php

namespace App\Http\Controllers;

use App\EmployeeLeave;
use App\Employee;
use App\Http\Controllers\Controller;
use App\LeaveCredits;
use App\LeaveType;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EmployeeLeaveController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->employee_id;
        $data = DB::table('employee_leave_applications')
            ->select('leave_type.id', 'leave_type.type_name as leave_type', 'leave_type.days_per_year','employee_leave_applications.id as id','leave_type_id',
                'firstname','lastname','employee_leave_applications.employee_id','employee.employee_no','from_date',
                'to_date','reason','remarks','employee_leave_applications.created_at as created_at','employee_leave_applications.status as status',
                'employee_leave_applications.without_pay', 'employee_leave_applications.half_day'
            )
            ->join('employee', 'employee_leave_applications.employee_id', '=', 'employee.id')
            ->join('leave_type', 'employee_leave_applications.leave_type_id', '=', 'leave_type.id')
            ->join('employee_groups', 'employee_groups.employee_id', '=', 'employee.id')
            ->whereNull('employee_leave_applications.deleted_at')

            ->where('report_to','=',$user_id)
            ->where('report_method','=','Direct')
            ->get();
        $employee = Employee::all()->sortByDesc('lastname');
// dd($data);
        $leave_type=LeaveType::all()->sortByDesc('id');

        return view('Employee.leave', compact('data','employee','leave_type'));
    }

    public function showMyLeave(){
            $user_id=Auth::user()->employee_id;
            $data = DB::table('employee_leave_applications')
                ->select('leave_type.id', 'leave_type.type_name as leave_type', 'leave_type.days_per_year','employee_leave_applications.id as id','leave_type_id',
                    'firstname','lastname','employee_leave_applications.employee_id','employee.employee_no','from_date',
                    'to_date','reason','remarks','employee_leave_applications.created_at as created_at','employee_leave_applications.status as status',
                    'employee_leave_applications.without_pay', 'employee_leave_applications.half_day'
                )
                ->join('employee', 'employee_leave_applications.employee_id', '=', 'employee.id')
                ->join('leave_type', 'employee_leave_applications.leave_type_id', '=', 'leave_type.id')
                ->leftjoin('employee_groups', 'employee_groups.employee_id', '=', 'employee.id')
                ->whereNull('employee_leave_applications.deleted_at')
                ->where('employee_leave_applications.employee_id','=',$user_id)
                ->get();
        $employee = Employee::all()->sortByDesc('lastname')->where('id','=',$user_id);
        $leave_type=LeaveType::all()->sortByDesc('id');

        return view('Employee.my-leave', compact('data','employee','leave_type'));
    }

    public function updateApprove(Request $request, EmployeeLeave $employeeLeave)
    {
        EmployeeLeave::find($employeeLeave->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Leave Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function store(Request $request)
    {
        $getCredits = LeaveCredits::all()
            ->where('employee_id', $request->get('employee_id'))
            ->where('leave_type', $request->get('leave_type_id'));


        EmployeeLeave::create($request->all());

        $notification = array(
            'message' => 'Employee Leave Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeLeave $employeeLeave)
    {
        EmployeeLeave::find($employeeLeave->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Leave Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeLeave $employeeLeave)
    {
        EmployeeLeave::find($employeeLeave->id)->delete();
        $notification = array(
            'message' => 'Employee Leave Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function creditLeave($employee_id, $leave_type_id, $used_leave){
        //
    }

}

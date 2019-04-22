<?php

namespace App\Http\Controllers;

use App\AttendanceTime;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AttendanceTimeController extends Controller
{

    public function index()
    {
        $data = DB::table('attendance_time as at')
            ->select('at.id as id','day_type_id','day_type','day_type_code','firstname','lastname','at.employee_id as employee_id','employee.employee_no',
               'attendance_date','time_in_work','time_out_work','time_in_break','time_out_break','overtime','undertime','tardiness','total_work','total_rest','total_night_diff','day_type_id','overtime_approved','attendance_status')
            ->join('employee', 'at.employee_id', '=', 'employee.id')
            ->join('tax_day_template as dtt', 'at.day_type_id', '=', 'dtt.id')
            ->whereNull('at.deleted_at')
            ->orderByDesc('at.id')
            ->get();
//        dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        $day_type = DB::table('tax_day_template')->get();
        return view('Payroll.attendance', compact('data','employee','day_type'));
    }

    public function listOT()
    {
        $data = DB::table('attendance_time as at')
            ->select('approver.firstname as approvefirstname','approver.lastname as approvelastname','at.id as id','day_type_id','day_type','day_type_code','employee.firstname','employee.lastname','at.employee_id as employee_id','employee.employee_no',
                'attendance_date','time_in_work','time_out_work','time_in_break','time_out_break','overtime','undertime','tardiness','total_work','total_rest','total_night_diff','day_type_id','overtime_approved','attendance_status')
            ->join('employee', 'at.employee_id', '=', 'employee.id')
            ->join('tax_day_template as dtt', 'at.day_type_id', '=', 'dtt.id')
            ->leftjoin('employee as approver', 'at.overtime_approved', '=', 'approver.id')
            ->whereNotNull('at.overtime')
            ->whereNull('at.deleted_at')
            ->orderByDesc('at.id')
            ->get();
        //  dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        return view('Employee.overtime', compact('data','employee'));
    }

    public function store(Request $request)
    {
        AttendanceTime::create($request->all());
        $notification = array(
            'message' => 'Attendance Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, AttendanceTime $attendanceTime)
    {
        AttendanceTime::find($attendanceTime->id)->update($request->all());
        $notification = array(
            'message' => 'Attendance Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(AttendanceTime $attendanceTime)
    {
        AttendanceTime::find($attendanceTime->id)->delete();
        $notification = array(
            'message' => 'Attendance Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}

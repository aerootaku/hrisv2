<?php


namespace App\Http\Controllers;


use App\AttendanceTime;
use App\Employee;
use App\EmployeeAttendance;

use App\MakePayment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class EmployeeAttendanceController extends Controller

{

    public function index()

    {

        //$data=EmployeeAttendance::all()->sortByDesc('date_time');

        $employee = Employee::all()->sortByDesc('lastname');
        $data = DB::table('employee_attendance as at')
            ->select('at.id as id', 'firstname', 'lastname', 'at.employee_id', 'employee.employee_no',

                'date_time', 'action', 'location_name', 'image_blob')
            ->join('employee', 'at.employee_id', '=', 'employee.id')
            ->join('company_branch', 'at.branch_id', '=', 'company_branch.id')
            ->whereNull('at.deleted_at')
            ->orderByDesc('at.date_time')
            ->limit('350')
            ->get();


        return view('Employee.attendance', compact('data', 'employee'));

    }


    public function create()

    {

        //

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $attendance_time = $request->input('date_time');
        $attendance_date = date('Y-m-d', strtotime($attendance_time));

        $action = $request->input('action');
        $employee_id = $request->input('employee_id');

        $date_time = Carbon::parse($request->input('date_time'))->startOfDay();
        //   $date_to = Carbon::parse($request->input('from'))->endOfDay();


        $data = AttendanceTime::all()
            ->where('employee_id', '=', $employee_id)
            ->where('attendance_date', '=', $attendance_date);
        if (count($data) > 0) {
            foreach ($data as $row) {
                $msg = "Updated";
            }
            $this->computeHrs($row->id, $row->time_in_work, $attendance_time);
        } else {
            $msg = "Created";
            DB::table('attendance_time')
                ->insert([
                    "employee_id" => $employee_id,
                    "attendance_date" => $attendance_date,
                    "time_in_work" => $attendance_time
                ]);
        }


        EmployeeAttendance::create($request->all());
        $notification = array(
            'message' => 'Employee Attendance ' . $msg . ' Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function computeHrs($id, $dt_from, $dt_to)
    {
        $start  = new Carbon($dt_from);
        $end    = new Carbon($dt_to);
        $hours=$start->diffInHours($end);
        $minutes_seconds= $start->diff($end)->format('%I:%S');
        $overtime=0;
        $undertime=0;
        $tardiness=0;
        if ($hours > 8){
            $total_work = "08:00:00";
            $overtime= $hours - 8 . ':' . $minutes_seconds;
        }elseif ($hours < 8){
            $total_work= $hours . ':' . $minutes_seconds;
            $undertime= 8 - $hours . ':' . $minutes_seconds;
        }else{
            $total_work= $hours . ':' . $minutes_seconds;
        }


        DB::table('attendance_time')
            ->where( "id",'=',$id )
            ->update([
                "time_out_work" => $dt_to,
                "total_work" => $total_work,
                "overtime" => $overtime,
                "undertime" => $undertime,
                "tardiness" => $tardiness
            ]);
    }

    public function show(EmployeeAttendance $employeeAttendance)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeAttendance $employeeAttendance
     * @return \Illuminate\Http\Response
     */

    public function edit(EmployeeAttendance $employeeAttendance)
    {

        //

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\EmployeeAttendance $employeeAttendance
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {

        //

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeAttendance $employeeAttendance
     * @return \Illuminate\Http\Response
     */

    public function destroy(EmployeeAttendance $employeeAttendance)
    {

        //

    }

}


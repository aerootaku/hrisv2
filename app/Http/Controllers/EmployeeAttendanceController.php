<?php

namespace App\Http\Controllers;

use App\EmployeeAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
      //$data=EmployeeAttendance::all()->sortByDesc('date_time');
        $data = DB::table('employee_attendance as at')
            ->select('at.id as id','firstname','lastname','at.employee_id','employee.employee_no',
                'date_time','action','location_name','image_blob')
            ->join('employee', 'at.employee_id', '=', 'employee.id')
            ->join('company_branch', 'at.branch_id', '=', 'company_branch.id')
            ->whereNull('at.deleted_at')
            ->orderByDesc('at.date_time')
            ->get();

      return view('Employee.attendance',compact('data'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        //
    }
}

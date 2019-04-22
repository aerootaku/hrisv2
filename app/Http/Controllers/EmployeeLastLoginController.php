<?php

namespace App\Http\Controllers;

use App\EmployeeLastLogin;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeLastLoginController extends Controller
{
    public function index()
    {
        $data = Employee::all()->sortByDesc(array('last_login_date','last_logout_date'));

        $data = DB::table('employee')
            ->select('settings_constants.value as employee_type','settings_constants.value as employment_status','username','employee.id as id','firstname','lastname','employee.employee_no','last_login_date','last_logout_date','employee.status')
            ->join('employee_employment', 'employee_employment.employee_id', '=', 'employee.id')
            ->join('settings_constants', 'employee_employment.employee_type', '=', 'settings_constants.id')
            ->join('settings_constants as sc', 'employee_employment.employment_status', '=', 'sc.id')
            ->join('users', 'employee.id', '=', 'users.id')
            ->whereNull('employee.deleted_at')
            ->orderByDesc('last_logout_date')
            ->orderByDesc('last_login_date')
            ->get();
//dd($data);
        return view('Employee.last-login', compact('data'));
    }

    public function create()
    {

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
     * @param  \App\EmployeeLastLogin  $employeeLastLogin
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLastLogin $employeeLastLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeLastLogin  $employeeLastLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLastLogin $employeeLastLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeLastLogin  $employeeLastLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeLastLogin $employeeLastLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeLastLogin  $employeeLastLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLastLogin $employeeLastLogin)
    {
        //
    }
}

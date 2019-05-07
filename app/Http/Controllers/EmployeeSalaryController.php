<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\department;
use App\designation;
use App\EmployeeEmployment;
use App\OfficeShift;
use App\SettingsConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('employee')
            ->select('company.id', 'company.name as company_name', 'company_designation.id', 'company_designation.designation_name',
                'employee.id as employee_id', 'employee.employee_no', 'employee.firstname', 'employee.lastname',
                'employee.current_address', 'employee.company_id', 'employee.gender', 'employee.email', 'employee_employment.designation', 'employee_employment.id as employment_id',
                'employee_employment.employee_id', 'users.username', 'users.employee_id', 'employee_employment.bank_account', 'employee_employment.monthly_salary',
                'employee_employment.per_day_salary')
            ->join('employee_employment', 'employee_employment.employee_id', '=', 'employee.id')
            ->join('company', 'company.id', '=', 'employee.company_id')
            ->join('company_designation', 'company_designation.id', '=', 'employee_employment.designation')
            ->join('users', 'users.employee_id', '=', 'employee.id')
            ->whereNull('employee.deleted_at')
            ->get();
        $company = Company::all()->sortByDesc('id');
        $branch = Branch::all()->sortByDesc('id');
        $schedule = OfficeShift::all()->sortByDesc('id');
        $department = department::all()->sortByDesc('id');
        $designation = designation::all()->sortByDesc('id');
        $constants = SettingsConstants::all()->sortByDesc('id');
        return view('Payroll.employee-salary', compact('data', 'company', 'branch', 'schedule', 'department', 'designation', 'constants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        EmployeeEmployment::find($id)->update($request->all());
        $notification = array(
            'message' => 'Employee Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

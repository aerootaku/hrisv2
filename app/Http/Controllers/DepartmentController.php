<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('company_department')
            ->select('company_department.id as department_id', 'company_department.branch_id', 'company_department.department_name',
                'company_department.department_head', 'company_branch.id as branch_id', 'company_branch.location_name',
                'employee.id as employee_id', 'employee.firstname', 'employee.lastname')
            ->leftJoin('employee', 'employee.id', '=', 'company_department.department_head')
            ->leftJoin('company_branch', 'company_branch.id', '=', 'company_department.branch_id')
            ->whereNull('company_department.deleted_at')
            ->get();

        $company = Company::all();
        $employee = Employee::all()->sortByDesc('id');
        $branch = Branch::all()->sortByDesc('id');
        $department = Department::all()->sortByDesc('id');
        return view('Department.department-list', compact('data', 'company', 'employee', 'branch', 'department'));
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
        $request->validate([
            'department_name'=>'unique:company_department'
        ]);

        Department::create($request->all());
        $notification = array(
            'message' => 'Department Created Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, department $department)
    {
        //

        Department::find($department->id)->update($request->all());
        $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        //

        Department::find($department->id)->delete();
        $notification = array(
            'message' => 'Department Deleted Successfully',
            'alert-type' => 'warning'
        );


        return redirect()->back()->with($notification);
    }
}

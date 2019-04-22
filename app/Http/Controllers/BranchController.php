<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    public function index()
    {
        //

        $branch = DB::table('company_branch')
            ->select('company_branch.id as branchid', 'company_branch.location_name', 'company_branch.email', 'company_branch.phone',
                'company_branch.address_1', 'company_branch.location_head', 'company_branch.address_2', 'company_branch.state', 'company_branch.zipcode',
                'company_branch.company_id', 'company_branch.city', 'company.id as company_id', 'company.name', 'employee.id as employee_id', 'employee.firstname', 'employee.lastname')
            ->join('company', 'company_branch.company_id', '=', 'company.id')
            ->join('employee', 'company_branch.location_head', '=', 'employee.id')
            ->whereNull('company_branch.deleted_at')
            ->get();

        $company = Company::all();
        $employee = Employee::all();

        return view('Branch.branch-list', compact('branch', 'company', 'employee'));

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
            'location_name'=>'unique:company_branch'
        ]);

        Branch::create($request->all());
        $notification = array(
            'message' => 'Branch Created Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //

        Branch::find($branch->id)->update($request->all());
        $notification = array(
            'message' => 'Branch Updated Successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch $branch
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        Branch::find($branch->id)->delete();
        $notification = array(
            'message' => 'Branch Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}

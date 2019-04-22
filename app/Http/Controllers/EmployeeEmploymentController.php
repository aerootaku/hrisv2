<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeEmployment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeEmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\EmployeeEmployment  $employeeEmployment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeEmployment $employeeEmployment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeEmployment  $employeeEmployment
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeEmployment $employeeEmployment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param EmployeeEmployment $employeeEmployment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd($request->all());
        EmployeeEmployment::find(6)->update($request->all());
        $notification = array(
            'message' => 'Employee Information Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeEmployment  $employeeEmployment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeEmployment $employeeEmployment)
    {
        //
    }
}

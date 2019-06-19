<?php

namespace App\Http\Controllers;

use App\EmployeeGroups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeGroupsController extends Controller
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
    public function store(Request $request)
    {
        EmployeeGroups::create($request->all());
        $notification = array(
            'message' => 'Employee Group Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeGroups $employeeGroups)
    {
        EmployeeGroups::find($employeeGroups->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Group Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeGroups $employeeGroups)
    {
        EmployeeGroups::find($employeeGroups->id)->delete();
        $notification = array(
            'message' => 'Employee Group Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeeGroups $employeeGroups)
    {
        //
    }

    public function show(EmployeeGroups $employeeGroups)
    {
        //
    }

    public function create()
    {
        //
    }
}

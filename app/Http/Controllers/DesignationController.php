<?php

namespace App\Http\Controllers;

use App\department;
use App\designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    public function index()
    {
        //

        $data = DB::table('company_department')
            ->join('company_designation', 'company_designation.department_id', '=', 'company_department.id')
            ->get();

        $department = DB::table('company_branch')
            ->join('company_department', 'company_department.branch_id', '=', 'company_branch.id')
            ->get();
        $designation = designation::all()->sortByDesc('id');
        return view('Designation.designation-list', compact('department', 'data', 'designation'));

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
        designation::create($request->all());
        $notification = array(
            'message' => 'Designation Created Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, designation $designation)
    {
        //

        designation::find($designation->id)->update($request->all());
        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(designation $designation)
    {
        //


        designation::find($designation->id)->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}

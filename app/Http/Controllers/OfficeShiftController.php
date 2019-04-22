<?php

namespace App\Http\Controllers;

use App\OfficeShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = OfficeShift::all()->sortByDesc('id');

        return view('Timesheet.office-shifts', compact('data'));
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

//        Employee::find($employee->id)->update($request->all());
        OfficeShift::create($request->all());
        $notification = array(
            'message' => 'Office Shifts Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeShift $officeShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeShift $officeShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeShift $officeShift)
    {
        //
        OfficeShift::find($officeShift->id)->update($request->all());
        $notification = array(
            'message' => 'Office Shifts Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeShift $officeShift)
    {
        //
        OfficeShift::find($officeShift->id)->delete();
        $notification = array(
            'message' => 'Office Shifts Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers;

use App\Company;
use App\holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::all()->sortByDesc('id');
        $data = holiday::all()->sortByDesc('id');

        return view('Timesheet.holiday-list', compact('data', 'company'));
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

        holiday::create($request->all());
        $notification = array(
            "message"=>"Holiday Event Created Successfully",
            "alert-type"=>"success"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(holiday $holiday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, holiday $holiday)
    {
        //
        holiday::find($holiday->id)->update($request->all());

        $notification = array(
            "message"=>"Holiday Event Updated Successfully",
            "alert-type"=>"info"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy(holiday $holiday)
    {
        //

        holiday::find($holiday->id)->delete();

        $notification = array(
            "message"=>"Holiday Event Deleted Successfully",
            "alert-type"=>"warning"
        );

        return redirect()->back()->with($notification);
    }
}

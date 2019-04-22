<?php

namespace App\Http\Controllers;

use App\Company;
use App\LeaveType;
use App\SettingsConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsConstantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $constant = SettingsConstants::all();
        $company = Company::all();
        $religion = SettingsConstants::where('type', '=', 'Religion')->get();
        $civilStatus = SettingsConstants::where('type', '=', 'Civil Status')->get();
        $nationality = SettingsConstants::where('type', '=', 'Nationality')->get();
        $bloodType = SettingsConstants::where('type', '=', 'Blood Type')->get();
        $province = SettingsConstants::where('type', '=', 'Province')->get();
        $ethnicity = SettingsConstants::where('type', '=', 'Ethnicity')->get();
        $employmentStatus = SettingsConstants::where('type', '=', 'Employment Status')->get();
        $employmentType = SettingsConstants::where('type', '=', 'Employment Type')->get();
        $recordStatus = SettingsConstants::where('type', '=', 'Record Status')->get();
        $employeePosition = SettingsConstants::where('type', '=', 'Employee Position')->get();
        $leaveType = LeaveType::all()->sortByDesc('id');

        return view('Settings.constants',  compact('constant', 'religion', 'civilStatus', 'nationality', 'bloodType', 'province', 'ethnicity', 'employmentStatus',
            'employmentType', 'recordStatus', 'employeePosition', 'company', 'leaveType'));
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
            'value'=>['required', 'min:1'],
            'type'=>'required'
        ]);


        SettingsConstants::create($request->all());

        $notification = array(
            "message"=>"$request->type Created Successfully",
            "alert-type"=>"success"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SettingsConstants  $settingsConstans
     * @return \Illuminate\Http\Response
     */
    public function show(SettingsConstants $settingsConstans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SettingsConstants  $settingsConstans
     * @return \Illuminate\Http\Response
     */
    public function edit(SettingsConstants $settingsConstans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SettingsConstants  $settingsConstans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingsConstants $settingsConstans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SettingsConstants  $settingsConstans
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettingsConstants $settingsConstans)
    {
        //
    }
}

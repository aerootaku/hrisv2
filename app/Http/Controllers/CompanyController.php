<?php

namespace App\Http\Controllers;

use App\Company;
use App\SettingsConstants;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        //
        $company = Company::all();
        $constant = SettingsConstants::all()->where('type', 'Company Type');
        return view('Company.company-list', compact('company', 'constant'));
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
//        dd($request->all());

        $request->validate([
            'name'=>'unique:company,deleted_at,null'
        ]);

        Company::create($request->all());
        $notification = array(
            'message' => 'Company Created Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        Company::find($company->id)->update($request->all());
        $notification = array(
            'message' => 'Company Updated Successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //

        Company::find($company->id)->delete();
        $notification = array(
            'message' => 'Company Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}

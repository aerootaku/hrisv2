<?php

namespace App\Http\Controllers;

use App\RateTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateTemplateController extends Controller
{
    public function index()
    {
        $data = RateTemplate::all();
        //dd($data);
        return view('Payroll.rate-template', compact('data'));
    }

    public function store(Request $request)
    {
        RateTemplate::create($request->all());
        $notification = array(
            'message' => 'Rate Template Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, RateTemplate $rateTemplate)
    {
        RateTemplate::find($rateTemplate->id)->update($request->all());
        $notification = array(
            'message' => 'Rate Template Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(RateTemplate $rateTemplate)
    {
        RateTemplate::find($rateTemplate->id)->delete();
        $notification = array(
            'message' => 'Rate Template Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(RateTemplate $rateTemplate)
    {
        //
    }

    public function show(RateTemplate $rateTemplate)
    {
        //
    }

    public function create()
    {
        //
    }

}

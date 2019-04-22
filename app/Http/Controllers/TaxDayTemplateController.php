<?php

namespace App\Http\Controllers;

use App\TaxDayTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxDayTemplateController extends Controller
{
    public function index()
    {
        $data = TaxDayTemplate::all();
        return view('Payroll.tax-day-template', compact('data'));
    }

    public function store(Request $request)
    {
        TaxDayTemplate::create($request->all());
        $notification = array(
            'message' => 'Day Type Tax Template Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, TaxDayTemplate $taxDayTemplate)
    {
        TaxDayTemplate::find($taxDayTemplate->id)->update($request->all());
        $notification = array(
            'message' => 'Day Type Tax Template Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(TaxDayTemplate $taxDayTemplate)
    {
        TaxDayTemplate::find($taxDayTemplate->id)->delete();
        $notification = array(
            'message' => 'Day Type Tax Template Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

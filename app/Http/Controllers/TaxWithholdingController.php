<?php

namespace App\Http\Controllers;

use App\TaxWithholding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxWithholdingController extends Controller
{
    public function index()
    {
        $data = TaxWithholding::all();
        return view('Payroll.tax-wtax', compact('data'));
    }

    public function store(Request $request)
    {
        TaxWithholding::create($request->all());
        $notification = array(
            'message' => 'Withholding Tax Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, TaxWithholding $taxWithholding)
    {
        TaxWithholding::find($taxWithholding->id)->update($request->all());
        $notification = array(
            'message' => 'Withholding Tax Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(TaxWithholding $taxWithholding)
    {
        TaxWithholding::find($taxWithholding->id)->delete();
        $notification = array(
            'message' => 'Withholding Tax Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

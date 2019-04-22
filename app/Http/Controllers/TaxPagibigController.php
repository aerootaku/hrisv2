<?php

namespace App\Http\Controllers;

use App\TaxPagibig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxPagibigController extends Controller
{
    public function index()
    {
        $data = TaxPagibig::all();
        return view('Payroll.tax-pagibig', compact('data'));
    }

    public function store(Request $request)
    {
        TaxPagibig::create($request->all());
        $notification = array(
            'message' => 'Pagibig Tax Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, TaxPagibig $taxPagibig)
    {
        TaxPagibig::find($taxPagibig->id)->update($request->all());
        $notification = array(
            'message' => 'Pagibig Tax Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(TaxPagibig $taxPagibig)
    {
        TaxPagibig::find($taxPagibig->id)->delete();
        $notification = array(
            'message' => 'Pagibig Tax Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

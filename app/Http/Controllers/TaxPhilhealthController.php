<?php

namespace App\Http\Controllers;

use App\TaxPhilhealth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxPhilhealthController extends Controller
{
    public function index()
    {
        $data = TaxPhilhealth::all();
        return view('Payroll.tax-philhealth', compact('data'));
    }

    public function store(Request $request)
    {
        TaxPhilhealth::create($request->all());
        $notification = array(
            'message' => 'Philhealth Tax Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, TaxPhilhealth $taxPhilhealth)
    {
        TaxPhilhealth::find($taxPhilhealth->id)->update($request->all());
        $notification = array(
            'message' => 'Philhealth Tax Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(TaxPhilhealth $taxPhilhealth)
    {
        TaxPhilhealth::find($taxPhilhealth->id)->delete();
        $notification = array(
            'message' => 'Philhealth Tax Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

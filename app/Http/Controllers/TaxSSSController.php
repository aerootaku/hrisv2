<?php

namespace App\Http\Controllers;

use App\TaxSSS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxSSSController extends Controller
{
    public function index()
    {
        $data = TaxSSS::all();
        return view('Payroll.tax-sss', compact('data'));
    }

    public function store(Request $request)
    {
        TaxSSS::create($request->all());
        $notification = array(
            'message' => 'SSS Tax Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, TaxSSS $taxSSS)
    {
        TaxSSS::find($taxSSS->id)->update($request->all());
        $notification = array(
            'message' => 'SSS Tax Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(TaxSSS $taxSSS)
    {
        TaxSSS::find($taxSSS->id)->delete();
        $notification = array(
            'message' => 'SSS Tax  Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

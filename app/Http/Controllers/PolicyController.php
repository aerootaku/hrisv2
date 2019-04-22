<?php

namespace App\Http\Controllers;

use App\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyController extends Controller
{

    public function index()
    {
        $data = Policy::all()->sortByDesc('created_at');
        return view('Company.company-policy', compact('data'));
    }

    public function store(Request $request)
    {
        Policy::create($request->all());
        $notification = array(
            'message' => 'Policy Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, Policy $policy)
    {
        Policy::find($policy->id)->update($request->all());
        $notification = array(
            'message' => 'Policy Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(Policy $policy)
    {
        Policy::find($policy->id)->delete();
        $notification = array(
            'message' => 'Policy Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

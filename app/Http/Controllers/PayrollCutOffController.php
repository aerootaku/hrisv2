<?php



namespace App\Http\Controllers;



use App\PayrollCutOff;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class PayrollCutOffController extends Controller

{

    public function index()

    {

        $data = PayrollCutOff::all();

        return view('Payroll.payroll-cutoff', compact('data'));

    }



    public function store(Request $request)

    {

        PayrollCutOff::create($request->all());

        $notification = array(

            'message' => 'Payroll Cut Off Created Successfully',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }



    public function update(Request $request)
    {

        PayrollCutOff::find($request->id)->update($request->all());

        $notification = array(

            'message' => 'Payroll Cut Off Updated Successfully',

            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);

    }



    public function destroy($id)

    {

        PayrollCutOff::find($id)->delete();

        $notification = array(

            'message' => 'Payroll Cut Off Deleted Successfully',

            'alert-type' => 'error'

        );

        return redirect()->back()->with($notification);

    }



    public function edit(PayrollCutOff $attendance)

    {

        //

    }



    public function show(PayrollCutOff $attendance)

    {

        //

    }



    public function create()

    {

        //

    }



}


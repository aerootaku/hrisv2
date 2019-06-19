<?php

namespace App\Http\Controllers;

use App\EmployeeShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)

    {

        EmployeeShift::create($request->all());

        $notification = array(

            'message' => 'Employee Shift Created Successfully',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }



    public function update(Request $request, EmployeeShift $employeeShift)
    {
        DB::update("update employee_shift set is_primary = '0' where id <> ?", [$employeeShift->id]);

        EmployeeShift::find($employeeShift->id)->update($request->all());

        $notification = array(

            'message' => 'Employee Shift Updated Successfully',

            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);

    }



    public function destroy(EmployeeShift $employeeShift)

    {


        EmployeeShift::find($employeeShift->id)->delete();

        $notification = array(

            'message' => 'Employee Shift Deleted Successfully',

            'alert-type' => 'error'

        );

        return redirect()->back()->with($notification);

    }
}

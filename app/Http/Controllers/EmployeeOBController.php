<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeOB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeOBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->employee_id;
        if(Auth::user()->role_id == '2'){
            $data = DB::table('employee')
                ->join('employee_ob', 'employee_ob.employee_id', '=', 'employee.id')
                ->where('employee_ob.employee_id', '=', Auth::user()->employee_id)
                ->whereNull('employee_ob.deleted_at')
                ->get();
            $employee = Employee::all()->sortByDesc('lastname')->where('id','=',Auth::user()->employee_id);
        } else {
            $data = DB::table('employee')
                ->join('employee_ob', 'employee_ob.employee_id', '=', 'employee.id')
                ->join('employee_groups', 'employee_groups.employee_id', '=', 'employee.id')
                ->where('report_to','=',$user_id)
                ->where('report_method','=','Direct')
                ->whereNull('employee_ob.deleted_at')
                ->get();
            $employee = Employee::all();
        }

        return view('Employee.ob', compact('data', 'employee'));

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

        EmployeeOB::create($request->all());

        $notification = array(
            "message"=>"OB Created Successfully",
            "alert-type"=>"success"
        );

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeOB  $employeeOB
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeOB $employeeOB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeOB  $employeeOB
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeOB $employeeOB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeOB  $employeeOB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        EmployeeOB::find($id)->update($request->all());

        $notification = array(
            "message"=>"OB Updated Successfully",
            "alert-type"=>"info"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeOB  $employeeOB
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        EmployeeOB::find($id)->delete();

        $notification = array(
            "message"=>"OB Deleted Successfully",
            "alert-type"=>"warning"
        );

        return redirect()->back()->with($notification);
    }
}

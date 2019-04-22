<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeTravel;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeTravelController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_travels as et')
            ->select('tmode.value as travel_mode','tarrange.value as travel_arrangement','et.id as id','travel_mode_id','arrangement_type_id','firstname','lastname','et.employee_id','employee.employee_no','start_date','end_date','visit_purpose','visit_place','expected_budget','actual_budget','et.description','et.status')
            ->join('employee', 'et.employee_id', '=', 'employee.id')
            ->join('settings_constants as tmode', 'et.travel_mode_id', '=', 'tmode.id')
            ->join('settings_constants as tarrange', 'et.arrangement_type_id', '=', 'tarrange.id')
            ->whereNull('et.deleted_at')
            ->orderByDesc('et.id')
            ->get();
 //dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        $travel_mode=SettingsConstants::all()->where('type', 'Travel Mode')->sortByDesc('value');
        $travel_arrangement=SettingsConstants::all()->where('type', 'Travel Arrangement Type')->sortByDesc('value');

        return view('Employee.travel', compact('data','employee','travel_mode','travel_arrangement'));
    }

    public function store(Request $request)
    {
        EmployeeTravel::create($request->all());
        $notification = array(
            'message' => 'Employee Travel Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeTravel $employeeTravel)
    {
        EmployeeTravel::find($employeeTravel->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Travel Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeTravel $employeeTravel)
    {
        EmployeeTravel::find($employeeTravel->id)->delete();
        $notification = array(
            'message' => 'Employee Travel Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeeTravel $employeeTravel)
    {
        //
    }

    public function show(EmployeeTravel $employeeTravel)
    {
        //
    }

    public function create()
    {
        //
    }
}

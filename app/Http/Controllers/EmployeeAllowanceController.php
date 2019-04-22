<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeAllowance;
use App\SettingsConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeAllowanceController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_allowance as ea')
            ->select('sc.value as allowance_type','ea.id as id','allowance_type_id','firstname','lastname','ea.employee_id','e.employee_no','description','date_file','date_approved','amount','ea.status')
            ->join('employee as e', 'ea.employee_id', '=', 'e.id')
            ->join('settings_constants as sc', 'ea.allowance_type_id', '=', 'sc.id')
            ->whereNull('ea.deleted_at')
            ->get();
//dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        $allowance_type=SettingsConstants::all()->where('type', 'Allowance Type')->sortByDesc('value');
        // dd($allowance_type);
        return view('Employee.allowance', compact('data','employee','allowance_type'));
    }

    public function store(Request $request)
    {
        EmployeeAllowance::create($request->all());
        $notification = array(
            'message' => 'Employee Allowance Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeAllowance $employeeAllowance)
    {
        EmployeeAllowance::find($employeeAllowance->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Allowance Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeAllowance $employeeAllowance)
    {
        EmployeeAllowance::find($employeeAllowance->id)->delete();
        $notification = array(
            'message' => 'Employee Allowance Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

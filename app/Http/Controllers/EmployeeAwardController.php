<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeAward;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAwardController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_awards as ea')
         ->select('sc.value as award_type','ea.id as id','award_type_id','firstname','lastname','ea.employee_id','e.employee_no','gift_item','cash_price','award_photo','award_month_year','award_information','description','award_date')
            ->join('employee as e', 'ea.employee_id', '=', 'e.id')
            ->join('settings_constants as sc', 'ea.award_type_id', '=', 'sc.id')
            ->whereNull('ea.deleted_at')
            ->get();
//dd($data);
        $employee = Employee::all()->sortByDesc('lastname');
        $award_type=SettingsConstants::all()->where('type', 'Award Type')->sortByDesc('value');
        return view('Employee.award', compact('data','employee','award_type'));
    }

    public function store(Request $request)
    {
        EmployeeAward::create($request->all());
        $notification = array(
            'message' => 'Employee Award Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeAward $employeeAward)
    {
        EmployeeAward::find($employeeAward->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Award Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeAward $employeeAward)
    {
        EmployeeAward::find($employeeAward->id)->delete();
        $notification = array(
            'message' => 'Employee Award Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

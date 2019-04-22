<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeWarning;
use App\SettingsConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeWarningController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_warnings')
            ->select('settings_constants.value as warning_type','employee_warnings.id as id','warning_type_id','warning_to','warning_by', 'wto.firstname as wtofname','wto.lastname as wtolname','wby.firstname as wbyfname','wby.lastname as wbylname','employee_warnings.warning_to as warning_to_id','subject','description','warning_date','employee_warnings.status')
            ->join('employee as wto', 'employee_warnings.warning_to', '=', 'wto.id')
            ->join('employee as wby', 'employee_warnings.warning_by', '=', 'wby.id')
            ->join('settings_constants', 'employee_warnings.warning_type_id', '=', 'settings_constants.id')
            ->whereNull('employee_warnings.deleted_at')
            ->orderByDesc('employee_warnings.id')
            ->get();

        $employee = Employee::all()->sortByDesc('lastname');
        $warning_type=SettingsConstants::all()->where('type', 'Warning Type')->sortByDesc('value');

        return view('Employee.warning', compact('data','employee','warning_type'));
    }

    public function store(Request $request)
    {
        EmployeeWarning::create($request->all());
        $notification = array(
            'message' => 'Employee Warning Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeWarning $employeeWarning)
    {
        EmployeeWarning::find($employeeWarning->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Warning Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeWarning $employeeWarning)
    {
        EmployeeWarning::find($employeeWarning->id)->delete();
        $notification = array(
            'message' => 'Employee Warning Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeePromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeePromotionController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        $data = DB::table('employee_promotions')
            ->select('employee_promotions.id as id','firstname','lastname','employee_promotions.employee_id','employee.employee_no','title','promotion_date','description')
            ->join('employee', 'employee_promotions.employee_id', '=', 'employee.id')
            ->whereNull('employee_promotions.deleted_at')
            ->orderByDesc('employee_promotions.id')
            ->get();
        return view('Employee.promotion', compact('data','employee'));
    }

    public function store(Request $request)
    {
        EmployeePromotion::create($request->all());
        $notification = array(
            'message' => 'Employee Promotion Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeePromotion $employeePromotion)
    {
        EmployeePromotion::find($employeePromotion->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Promotion Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeePromotion $employeePromotion)
    {
        EmployeePromotion::find($employeePromotion->id)->delete();
        $notification = array(
            'message' => 'Employee Promotion Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(EmployeePromotion $employeePromotion)
    {
        //
    }

    public function show(EmployeePromotion $employeePromotion)
    {
        //
    }

    public function create()
    {
        //
    }
}



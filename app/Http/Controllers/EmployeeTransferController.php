<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Employee;
use App\Department;
use App\EmployeeTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeTransferController extends Controller
{
    public function index()
    {
        $data = DB::table('employee_transfer')
            ->select('employee_transfer.id as id','employee_transfer.status','department_name','location_name','firstname','lastname','employee_transfer.employee_id as employee_id','employee.employee_no','transfer_date','transfer_department_id as tdId','transfer_branch_id as bId','description')
            ->join('employee', 'employee_transfer.employee_id', '=', 'employee.id')
            ->join('company_department', 'employee_transfer.transfer_department_id', '=', 'company_department.id')
            ->join('company_branch', 'employee_transfer.transfer_branch_id', '=', 'company_branch.id')
            ->whereNull('employee_transfer.deleted_at')
            ->orderByDesc('employee_transfer.id')
            ->get();
 //dd($data);
        $employee = Employee::all()->sortByDesc('id');
        $department = Department::all()->sortByDesc('id');
        $branch = Branch::all()->sortByDesc('id');
        return view('Employee.transfer', compact('data','employee','department','branch'));
    }

    public function store(Request $request)
    {
        EmployeeTransfer::create($request->all());
        $notification = array(
            'message' => 'Employee Transfer Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeTransfer $employeeTransfer)
    {
        EmployeeTransfer::find($employeeTransfer->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Transfer Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeTransfer $employeeTransfer)
    {
        EmployeeTransfer::find($employeeTransfer->id)->delete();
        $notification = array(
            'message' => 'Employee Transfer Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

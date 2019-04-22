<?php

namespace App\Http\Controllers;

use App\EmployeeContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeContactController extends Controller
{
    public function index()
    {
        $data_contact = DB::table('employee_contacts')
            ->select('employee_contacts.id as id','employee_no','employee_id','relation','is_primary','is_dependent','contact_name','work_phone','work_phone_extension','mobile_phone','home_phone','work_email','personal_email','address_1','address_2','city','state','zipcode','country')
            ->join('employee', 'employee_contacts.employee_id', '=', 'employee.id')
            ->whereNull('employee_contacts.deleted_at')
            ->where('employee_id', '1')
            ->whereNull('employee_contacts.deleted_at')
            ->get();

       //dd($data_contact);

        $employeeContact = EmployeeContact::all();
        return view('Employee.contact-list', compact('employeeContact','data_contact'));
    }

    public function store(Request $request)
    {
        EmployeeContact::create($request->all());
        $notification = array(
            'message' => 'Employee Contact Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeContact $employeeContact)
    {
        EmployeeContact::find($employeeContact->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Contact Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeContact $employeeContact)
    {
        EmployeeContact::find($employeeContact->id)->delete();
        $notification = array(
            'message' => 'Employee Contact Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}

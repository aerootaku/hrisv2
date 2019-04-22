<?php

namespace App\Http\Controllers;

use App\SettingsConstants;
use App\Employee;
use App\EmployeeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeDocumentController extends Controller
{
    public function index()
    {

        $employee = Employee::all()->sortByDesc('lastname');
        $award_type=SettingsConstants::all()->where('type', 'Award Type')->sortByDesc('value');

        return view('Employee.award', compact('employee','award_type'));
    }

    public function store(Request $request)
    {
       EmployeeDocument::create($request->all());
        $notification = array(
            'message' => 'Employee Document Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, EmployeeDocument $employeeDocument)
    {
        EmployeeDocument::find($employeeDocument->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Award Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeDocument $employeeDocument)
    {
        EmployeeDocument::find($employeeDocument->id)->delete();
        $notification = array(
            'message' => 'Employee Document Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

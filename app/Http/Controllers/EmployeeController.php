<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\department;
use App\designation;
use App\Employee;
use App\EmployeeEmployment;
use App\LeaveCredits;
use App\LeaveType;
use App\OfficeShift;
use App\RateTemplate;
use App\SettingsConstants;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = DB::table('employee')
                ->select('company.id', 'company.name as company_name', 'company_designation.id', 'company_designation.designation_name',
                    'employee.id as employee_id', 'employee.employee_no', 'employee.firstname', 'employee.lastname',
                    'employee.current_address', 'employee.company_id', 'employee.gender', 'employee.email', 'employee_employment.designation',
                    'employee_employment.employee_id', 'users.username', 'users.employee_id')
                ->join('employee_employment', 'employee_employment.employee_id', '=', 'employee.id')
                ->join('company', 'company.id', '=', 'employee.company_id')
                ->join('company_designation', 'company_designation.id', '=', 'employee_employment.designation')
                ->join('users', 'users.employee_id', '=', 'employee.id')
                ->whereNull('employee.deleted_at')
                ->get();
        $company = Company::all()->sortByDesc('id');
        $branch = Branch::all()->sortByDesc('id');
        $schedule = OfficeShift::all()->sortByDesc('id');
        $department = department::all()->sortByDesc('id');
        $designation = designation::all()->sortByDesc('id');
        $constants = SettingsConstants::all()->sortByDesc('id');
        return view('Employee.employee-list', compact('data', 'company', 'branch', 'schedule', 'department', 'designation', 'constants'));
    }

    public function create()
    {
        $company = Company::all()->sortByDesc('id');
        $branch = Branch::all()->sortByDesc('id');
        $schedule = OfficeShift::all()->sortByDesc('id');
        $department = department::all()->sortByDesc('id');
        $designation = designation::all()->sortByDesc('id');
        $constants = SettingsConstants::all()->sortByDesc('id');
        $rate = RateTemplate::all()->sortByDesc('id');

        $data = array(
            "company"=>$company,
            "branch"=>$branch,
            "schedule"=>$schedule,
            "department"=>$department,
            "designation"=>$designation,
            "constants"=>$constants,
            "rate"=>$rate
        );

        return view('Employee.employee-create', $data);
    }

    public function store(Request $request)
    {

        DB::transaction(function () use ($request){

            $request->validate([
                'username'=>'unique:users',
                'employee_no'=>'unique:employee'
            ]);

            $employee_id = Employee::create($request->only(
                "company_id", "employee_no", "firstname", "lastname", "middlename", "suffix", "email", "mobile_no", "telephone_no",
                "gender", "birthday", "birthplace", 'age'))->id;

            $request->merge(['employee_id'=>$employee_id]);

            EmployeeEmployment::create($request->only(
                'employee_id', 'department', 'branch', 'designation', 'date_hired', 'contract_start', 'schedule_type', 'employee_type',
                'employment_status', 'monthly_salary', 'per_day_salary'
            ));

            User::create(
                $request->only('username', 'password', 'employee_id', 'company_id', 'role_id')
            );

            $this->LeaveCode($employee_id);
        });


        $notification = array(
            'message' => 'Employee Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show(Employee $employee)
    {

    }

    public function edit(Employee $employee)
    {
    }

    public function update(Request $request, Employee $employee)
    {
        Employee::find($employee->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();
        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function getDepartment(Request $request){

        $data = department::all()->where('branch_id', $request->branch_id)->sortByDesc('id');
        if($data->count() > 0){
            foreach ($data as $row){

                $resp[] = array(
                    'value'=>$row->id,
                    "name"=>$row->department_name,
                );

            }
            return response()->json($resp);
        }
        else{

            $result[] = array(
                'name'=> "No record"
            );
            return response()->json($result);
        }
    }



    public function getBranch(Request $request){

        $data = Branch::all()->where('company_id', $request->company_id)->sortByDesc('id');

        if($data->count() > 0){
            foreach ($data as $row){

                $resp[] = array(
                    'value'=>$row->id,
                    "name"=>$row->location_name,
                );

            }
            return response()->json($resp);
        }
        else{

            $result[] = array(
                'name'=> "No record"
            );
            return response()->json($result);
        }
    }

    public function getDesignation(Request $request)
    {

        $data = designation::all()->where('department_id', $request->department_id)->sortByDesc('id');
        if($data->count() > 0){
            foreach ($data as $row){

                $resp[] = array(
                    'value'=>$row->id,
                    "name"=>$row->designation_name,
                );

            }
            return response()->json($resp);
        }
        else{

            $result[] = array(
                'name'=> "No record"
            );
            return response()->json($result);
        }
    }

    /**
     * @param $employee_id
     */
    public function LeaveCode($employee_id){
        //get all leave type
        $leaveType = LeaveType::all();
        foreach ($leaveType as $type){
            //insert all the leave type to employee leave credits
            LeaveCredits::create([
                'employee_id'=>$employee_id,
                'leave_type_code'=>$type->id,
                'beginning_leave'=>$type->days_per_year
            ]);
        }
    }

    }

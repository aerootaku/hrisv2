<?php

namespace App\Http\Controllers;

use App\Branch;
use App\department;
use App\designation;
use App\Employee;
use App\EmployeeContact;
use App\EmployeeDocument;
use App\EmployeeEducation;
use App\EmployeeEmployment;
use App\EmployeeProfile;
use App\EmployeeWorkExperience;
use App\LeaveType;
use App\MakePayment;
use App\OfficeShift;
use App\RateTemplate;
use App\SettingsConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeProfileController extends Controller
{
    public function index()
    {

        return view('Employee.profile');

    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return int
     */
    public function show($id)
    {
        //
        $employee_id=$id;

//        $employee_documents = EmployeeDocument::all();
//        $data_document = DB::table('employee_documents')
//            ->select('settings_constants.value as document_type','employee_documents.id as id','document_type_id','employee.employee_no','employee_documents.employee_id','date_of_expiry','title','notification_email','is_alert','description','document_file')
//            ->rightJoin('settings_constants', 'employee_documents.document_type_id', '=', 'settings_constants.id')
//            ->rightJoin('employee', 'employee_documents.employee_id', '=', 'employee.id')
//            ->whereNull('employee_documents.deleted_at')
//            ->where('employee.id', $employee_id)
//            ->get();
//
//        $data_announcement = DB::table('announcements as a')
//            ->select('a.id as id','ee.employee_id','a.department','published_by','location','summary','title','start_date','end_date','description')
//            ->rightJoin('company_department as cd', 'a.department', '=', 'cd.id')
//            ->rightJoin('employee_employment as ee', 'ee.department', '=', 'cd.id')
//            ->whereNull('a.deleted_at')
//            //   ->groupBy('a.id')
//            //  ->where('employee_employment.id', '$employee_id')
//            ->get();
//
//        $data_employment=  DB::table('employee_employment as employment')
//            ->select('employment.id as employment_id', 'employment.employee_id as emp_id', 'employment.date_hired', 'employment.date_resign',
//                'employment.contract_start', 'employment.contract_end', 'employment.branch', 'employment.department', 'employment.designation',
//                'employment.employment_status', 'employment.schedule_type', 'employment.employment_status', 'employment.employee_type', 'employment.position', 'company_branch.id as branch_id', 'company_branch.location_name',
//                'company_department.branch_id', 'company_department.id as department_id', 'company_department.department_name', 'company_designation.id as designation_id', 'company_designation.department_id',
//                'company_designation.designation_name','rate_template.id as rate_id')
//            ->rightJoin('company_branch', 'company_branch.id', '=', 'employment.branch')
//            ->rightJoin('company_department', 'company_department.id', '=', 'employment.department')
//            ->rightJoin('company_designation', 'company_designation.id', '=', 'employment.designation')
//            ->rightJoin('office_shifts', 'office_shifts.id', '=', 'employment.schedule_type')
//            ->join('rate_template', 'rate_template.id', '=', 'employment.rate_id')
//            ->where('employment.employee_id' ,'=', $employee_id)
//            ->get();
//
//        $data_leave = DB::table('employee_leave_applications')
//            ->select('leave_type.id', 'leave_type.type_name as leave_type', 'leave_type.days_per_year','employee_leave_applications.id as id','leave_type_id',
//                'firstname','lastname','employee_leave_applications.employee_id','employee.employee_no','from_date',
//                'to_date','reason','remarks','employee_leave_applications.created_at as created_at','employee_leave_applications.status as status')
//            ->join('employee', 'employee_leave_applications.employee_id', '=', 'employee.id')
//            ->join('leave_type', 'employee_leave_applications.leave_type_id', '=', 'leave_type.id')
//            ->whereNull('employee_leave_applications.deleted_at')
//            ->get();
//
//        $leave_type = LeaveType::all()->sortByDesc('id');
//        $document_type = SettingsConstants::all()->where('type', 'Document Type')->sortByDesc('value');
//        $data_employee=  Employee::all()->where('id', $id);
//        $data_education = EmployeeEducation::all()->where('employee_id', $employee_id);
//        $data_work_experience = EmployeeWorkExperience::all()->where('employee_id', $employee_id);
//        $education_level = SettingsConstants::all()->where('type', 'Education Level')->sortByDesc('value');
//        $constant = SettingsConstants::all();
//        $branch = Branch::all();
//        $department = department::all();
//        $rate= RateTemplate::all();
//        $designation = designation::all();

        $personal_info = DB::table('employee')->where('id', '=', $employee_id)->first();
        $employment_info =  $data_employment=  DB::table('employee_employment as employment')
            ->select('employment.id as employment_id', 'employment.employee_id as emp_id', 'employment.date_hired', 'employment.date_resign',
                'employment.contract_start', 'employment.contract_end', 'employment.branch', 'employment.department', 'employment.designation',
                'employment.employment_status', 'employment.schedule_type', 'employment.employment_status', 'employment.employee_type', 'employment.position', 'company_branch.id as branch_id', 'company_branch.location_name',
                'company_department.branch_id', 'company_department.id as department_id', 'company_department.department_name', 'company_designation.id as designation_id', 'company_designation.department_id',
                'company_designation.designation_name','rate_template.id as rate_id')
            ->join('company_branch', 'company_branch.id', '=', 'employment.branch')
            ->join('company_department', 'company_department.id', '=', 'employment.department')
            ->join('company_designation', 'company_designation.id', '=', 'employment.designation')
            ->join('office_shifts', 'office_shifts.id', '=', 'employment.schedule_type')
            ->join('rate_template', 'rate_template.id', '=', 'employment.rate_id')
            ->where('employment.employee_id' ,'=', $employee_id)
            ->first();
//dd($employment_info);
        $employee_contacts = EmployeeContact::all()->where('employee_id', $employee_id);
        $employee_educations = DB::table('settings_constants')
            ->join('employee_educations', 'employee_educations.education_level', '=', 'settings_constants.id')
            ->whereNull('employee_educations.deleted_at')
            ->where('employee_educations.employee_id', $employee_id)
            ->orderByDesc('employee_educations.id')
            ->get();
        $education_constants = SettingsConstants::all()->where('type', 'Education Level');

        $employee_shift = DB::table('office_shifts')
            ->join('employee_shift', 'employee_shift.shift_id', '=', 'office_shifts.id')
            ->whereNull('employee_shift.deleted_at')
            ->where('employee_shift.employee_id', $employee_id)
            ->orderByDesc('employee_shift.id')
            ->get();
        //dd($employee_shift);
        $employee_work_experience = EmployeeWorkExperience::all()->where('employee_id', $employee_id);

        $employee_last_cutoff_salary= DB::table('make_payment')
            ->where('employee_id', $employee_id)
            ->orderByDesc('created_at')
            ->get();
            //dd($employee_last_cutoff_salary);
        $office_shift = OfficeShift::all();

        $employee_groups = DB::table('employee_groups')
            ->select('employee_groups.id as id','firstname','lastname','report_method','employee_id')
            ->join('employee', 'employee_groups.report_to', '=', 'employee.id')
            ->whereNull('employee_groups.deleted_at')
            ->where('employee_groups.employee_id', $employee_id)
            ->orderByDesc('employee_groups.id')
            ->get();

        //dd($employee_groups);
        $data = array(
            "constant"=>SettingsConstants::all(),
            "personal_info"=>$personal_info,
            "employment_info"=>$employment_info,
            "employee_contacts"=>$employee_contacts,
            "employee_educations"=>$employee_educations,
            "education_constants"=>$education_constants,
            "employee_work_experience"=>$employee_work_experience,
            "employee_last_cutoff_salary"=>$employee_last_cutoff_salary,
            "employee_shift"=>$employee_shift,
            "office_shift"=>$office_shift,
            "employee_groups"=>$employee_groups,
            "employee"=>Employee::all()
        );

        return view('Employee.profile', $data)->with('no', 1);

    }

    public function showProfile(Request $request, $id)
    {
        $value = $request->session()->get('key');
        //SELECTid,company_id,employee_no,profile,firstname,middlename,lastname,mi,suffix,nickname,gender,
        //civil_status,nationality,religion,height,weight,birthday,age,birthplace,blood_type,region,province,
        //ethnicity,current_address,current_city,permanent_address,permanent_city,email,mobile_no,telephone_no,fax_no,
        //sss_no,philhealth_no,pagibig_no,tin_no,status,deleted_at,created_at,updated_at FROM employee WHERE 1

        //$nationality=SettingsConstants::all()->where('type', 'Nationality')->sortByDesc('value');
        $employee_documents = EmployeeDocument::all();
        $data_document = DB::table('employee_documents')
            ->select('settings_constants.value as document_type','employee_documents.id as id','document_type_id','employee.employee_no','employee_documents.employee_id','date_of_expiry','title','notification_email','is_alert','description','document_file')
            ->join('settings_constants', 'employee_documents.document_type_id', '=', 'settings_constants.id')
            ->join('employee', 'employee_documents.employee_id', '=', 'employee.id')
            ->whereNull('employee_documents.deleted_at')
            ->where('employee.id', $employee_id)
            ->get();

        $data_announcement = DB::table('announcements as a')
            ->select('a.id as id','ee.employee_id','a.department','published_by','location','summary','title','start_date','end_date','description')
            ->join('company_department as cd', 'a.department', '=', 'cd.id')
            ->join('employee_employment as ee', 'ee.department', '=', 'cd.id')
            ->whereNull('a.deleted_at')
            //   ->groupBy('a.id')
            //  ->where('employee_employment.id', '$employee_id')
            ->get();
//dd($data_announcement);

        $data_employment=  DB::table('employee_employment as employment')
            ->select('employment.id as employment_id', 'employment.employee_id as emp_id', 'employment.date_hired', 'employment.date_resign',
                'employment.contract_start', 'employment.contract_end', 'employment.branch', 'employment.department', 'employment.designation',
                'employment.employment_status', 'employment.schedule_type', 'employment.employment_status', 'employment.employee_type', 'employment.position', 'company_branch.id as branch_id', 'company_branch.location_name',
                'company_department.branch_id', 'company_department.id as department_id', 'company_department.department_name', 'company_designation.id as designation_id', 'company_designation.department_id',
                'company_designation.designation_name','rate_template.id as rate_id')
            ->join('company_branch', 'company_branch.id', '=', 'employment.branch')
            ->join('company_department', 'company_department.id', '=', 'employment.department')
            ->join('company_designation', 'company_designation.id', '=', 'employment.designation')
            ->join('office_shifts', 'office_shifts.id', '=', 'employment.schedule_type')
//            ->join('rate_template', 'rate_template.id', '=', 'employment.rate_id')
            ->where('employment.employee_id' ,'=', $employee_id)
            ->get();

//dd($data_employment);
        $data_leave = DB::table('employee_leave_applications')
            ->select('leave_type.id', 'leave_type.type_name as leave_type', 'leave_type.days_per_year','employee_leave_applications.id as id','leave_type_id',
                'firstname','lastname','employee_leave_applications.employee_id','employee.employee_no','from_date',
                'to_date','reason','remarks','employee_leave_applications.created_at as created_at','employee_leave_applications.status as status')
            ->join('employee', 'employee_leave_applications.employee_id', '=', 'employee.id')
            ->join('leave_type', 'employee_leave_applications.leave_type_id', '=', 'leave_type.id')
            ->whereNull('employee_leave_applications.deleted_at')
            ->get();

        $leave_type = LeaveType::all()->sortByDesc('id');
        $document_type = SettingsConstants::all()->where('type', 'Document Type')->sortByDesc('value');
        $data_employee=  Employee::all()->where('id', $id);
        $data_education=  DB::table('employee_educations')->where('employee_id', $employee_id)->whereNull('deleted_at')->get();
        $data_work_experience=  DB::table('employee_work_experience')->where('employee_id', $employee_id)->whereNull('deleted_at')->get();
        $education_level=SettingsConstants::all()->where('type', 'Education Level')->sortByDesc('value');
        $constant = SettingsConstants::all();
        $branch = Branch::all();
        $department = department::all();
        $rate= RateTemplate::all();
        $designation = designation::all();

        return view('Employee.profile', compact('document_type','data_employee','employee_id','data_document','data_announcement',
            'data_employment','data_education','education_level','data_work_experience', 'constant', 'branch','department',
            'designation', 'property', 'leave_type', 'data_leave','rate', 'employee_documents'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        //
        dd("asd");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeProfile $employeeProfile)
    {
        //
    }

    public function updateBasicInfo(Request $request, Employee $employee)
    {
        Employee::find($employee->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Basic Information Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function updateBasicContactInfo(Request $request, Employee $employee)
    {
        Employee::find($employee->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Basic Contact Information Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function updateSocialNetworking(Request $request, Employee $employee)
    {
        Employee::find($employee->id)->update($request->all());
        $notification = array(
            'message' => 'Employee Social Networking Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeProfile $employeeProfile)
    {
        //
    }
// N ===================================================


}

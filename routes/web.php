<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});
Route::post('login', 'AuthenticationController@login');
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::post('generatePayslip', 'PayslipController@generatePayslip');
Route::get('profile', 'EmployeeProfileController@index');
Route::post('getDepartment', 'EmployeeController@getDepartment');
Route::post('getBranch', 'EmployeeController@getBranch');
Route::post('getDesignation', 'EmployeeController@getDesignation');
Route::get('payslip/{id}/{cutoff_id}', 'PayslipController@generatePayslip');
Route::get('payslipNew/{id}/{cutoff_id}', 'PayslipController@generateNewPayslip');
//Route::post('payslip', 'PayslipController@store');
//
//Route::get('/user', 'PayslipController@index');
Route::resource('dashboard', 'DashboardController')->middleware('auth');
Route::resource('company', 'CompanyController');
Route::resource('branch', 'BranchController');
Route::resource('office-shifts', 'OfficeShiftController');
Route::resource('leave-type', 'LeaveTypeController');
Route::resource('department', 'DepartmentController');
Route::resource('designation', 'DesignationController');
Route::resource('announcement', 'AnnouncementController');
Route::resource('policy', 'PolicyController');
Route::resource('employee', 'EmployeeController');
Route::resource('employee-employment', 'EmployeeEmploymentController');
Route::resource('employee-award', 'EmployeeAwardController');
Route::resource('employee-setrole', 'EmployeeSetRoleController');
Route::resource('employee-transfer', 'EmployeeTransferController');
Route::resource('employee-resignation', 'EmployeeResignationController');
Route::resource('employee-travel', 'EmployeeTravelController');
Route::resource('employee-promotion', 'EmployeePromotionController');
Route::resource('employee-complaint', 'EmployeeComplaintController');
Route::resource('employee-warning', 'EmployeeWarningController');
Route::resource('employee-termination', 'EmployeeTerminationController');
Route::resource('employee-lastlogin', 'EmployeeLastLoginController');
Route::resource('employee-exit', 'EmployeeExitController');
Route::resource('employee-profile', 'EmployeeProfileController');
Route::resource('employee-document', 'EmployeeDocumentController');
Route::resource('employee-contacts', 'EmployeeContactController');
Route::resource('employee-education', 'EmployeeEducationController');
Route::resource('employee-shift', 'EmployeeShiftController');
Route::resource('employee-work-experience', 'EmployeeWorkExperienceController');
Route::resource('settingsConstant', 'SettingsConstantsController');
Route::resource('employee-salary', 'EmployeeSalaryController');
Route::resource('employee-groups', 'EmployeeGroupsController');

//Today
Route::resource('employee-undertime', 'AttendanceTimeController@listUT');

//Aldrin
Route::resource('attendance-time', 'AttendanceTimeController');
//update report, leave, ob
Route::resource('employee-leave', 'EmployeeLeaveController');
Route::resource('office-shifts', 'OfficeShiftController');
Route::resource('holidays', 'HolidayController');

Route::resource('employee-attendance', 'EmployeeAttendanceController');
Route::resource('employee-loan', 'EmployeeLoanController');
Route::resource('employee-allowance', 'EmployeeAllowanceController');
Route::get('employee-overtime', 'AttendanceTimeController@listOT');
//Route::resource('attendance-time', 'AttendanceTimeController');
Route::resource('payslip','PayslipController');
Route::post('generatePayslip', 'PayslipController@generatePayslip');
Route::post('generateNewPayslip', 'PayslipController@generateNewPayslip');
Route::post('savePayslip', 'PayslipController@savePayslip');
Route::post('savePayslipInput', 'PayslipController@savePayslipInput');
Route::resource('payroll', 'PayrollController');
Route::post('generatePayroll', 'PayrollController@generatePayroll');
Route::get('generatePayrollMemo/{company_id}/{cutoff_id}', 'PayrollController@generatePayrollMemo');

Route::resource('payroll-cutoff', 'PayrollCutOffController');
Route::resource('rate-template', 'RateTemplateController');
Route::resource('tax-day-template', 'TaxDayTemplateController');
//TAX Table
Route::resource('tax-sss', 'TaxSSSController');
Route::resource('tax-pagibig', 'TaxPagibigController');
Route::resource('tax-philhealth', 'TaxPhilhealthController');
Route::resource('tax-wtax', 'TaxWithholdingController');



Route::get('logout', function () {
    Auth::logout();
    return view('login');
});

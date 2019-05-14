@extends('layout.app')

@section('content')

    <?php
    $cutoff_id='1';
    $employee_id='1';
    $totalLoan=0;
    $hrs_per_day=8;
    $employee_info=strtoupper($employee_info->lastname . ", " . $employee_info->firstname . " " . $employee_info->middlename . " PAYSLIP");


    //Work
    $per_day=$employment->per_day_salary;
    $per_hour=$employment->per_day_salary/$hrs_per_day;
    $per_month=$employment->monthly_salary;
    $hrs_work=$cutoffWorkingHours->work_hours;
    $days_work=$cutoffWorkingHours->days_work;
    $allowance=0;$absentCount=0; $bonus=0; $salary_adjustments=0; $thirteenth_month_pay=0;$other_deduction=0;
    foreach($payslip_input as $row){
        $allowance=$row->allowance;
        $bonus=$row->bonus;
        $salary_adjustments=$row->salary_adjustments;
        $thirteenth_month_pay=$row->thirteenth_month_pay;
        $other_deduction=$row->thirteenth_month_pay;
    }
    foreach($loan as $row){
        if($row->balance > $row->payable){
            $totalLoan= $totalLoan+$row->payable;
         }else{
            $totalLoan= $totalLoan+$row->balance;
        }
    }

    $overtime_hours=$overtime['overtime'];
    $late_hours=$cutoffWorkingHours->undertime;
    $absences_days=$totalAbsent;


    $basic_pay=$employment->monthly_salary/2;

    $overtime_pay=$overtime['overtime']*$per_hour;
    $holiday_pay=0;

    $gross_pay=$basic_pay+$overtime_pay+$holiday_pay+$allowance+$bonus+$salary_adjustments+$thirteenth_month_pay;//OK

    $late_deduction=$late_hours*$per_hour;
    $absences_deduction=$employment->per_day_salary*$absences_days;

    $sss_cont=$deduction_spp['sss_cont'];
    $pagibig_cont=$deduction_spp['pagibig_cont'];
    $philhealth_cont=$deduction_spp['philhealth_cont'];
    //@foreach($loan as $row)

//    $taxable=($basic_pay+$overtime_pay+$holiday_pay)-($late_deduction+$absences_deduction+$sss_cont+$pagibig_cont+$philhealth_cont);//ok
//    $taxable_income= $taxable;

    $withholding_tax=0;

    $overall_deduction =$totalLoan+$late_deduction + $absences_deduction+ $sss_cont + $pagibig_cont + $philhealth_cont +$other_deduction;
    $net_pay = $gross_pay - ($overall_deduction + $withholding_tax);
    ?>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">
                                Employee Name: {{$employee_info}}
                                {{--<br />--}}
                                {{--Expected Total Working hours: {{ $totalWorkingHours }}--}}
                                {{--<br />--}}
                                {{--Actual Employee Working hours: {{ $cutoffWorkingHours->work_hours }}--}}
                                {{--<br />--}}

                                {{--Total Absences: {{ $totalAbsent }}--}}
                            </h5>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <form class="form" action="savePayslip" method="POST"
                              enctype="multipart/form-data">
                            <input type="hidden" name="cutoff_id" value="{{$cutoff_id}}">
                            <input type="hidden" name="employee_id" value="{{$employee_id}}">
                            {{--<input type="text" name="department_id" value="{{$department_id}}">--}}
                            <input type="hidden" name="company_id" value="6">
                            {{--<input type="text" name="location_id" value="{{$location_id}}">--}}
                            {{--<input type="text" name="designation_id" value="{{$designation_id}}">--}}
                            {{--<input type="text" name="payment_method_id" value="{{$payment_method_id}}">  --}}
                            <div class="form-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 20%; vertical-align: middle;">Per Day</td>
                                                <td style="text-align:right"> {{number_format($per_day,2)}} </td>
                                                <td style="width: 20%; vertical-align: middle;">Per Hour</td>
                                                <td style="text-align:right"> {{number_format($per_hour,2)}} </td>
                                                <td style="width: 20%; vertical-align: middle;">Per Month</td>
                                                <td style="text-align:right"> {{number_format($per_month,2)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row"  style="display: none;">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Per Day</label>
                                                    <input type="number" class="form-control"   placeholder="0" name="per_day"  value="{{$per_day}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Per Hour</label>
                                                    <input type="number" class="form-control"   placeholder="0" name="per_hour"  value="{{$per_hour}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Monthly</label>
                                                    <input type="number" class="form-control"  placeholder="00.00" name="per_month"  value="{{$per_month}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                            WORK INFO
                                        </h4>
                                        {{--<hr/>--}}

                                        <div class="row">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Hours Work</td>
                                                    <td style="text-align:right"> {{$hrs_work}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Days Work</td>
                                                    <td style="text-align:right"> {{number_format($days_work,0)}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Overtime Hours</td>
                                                    <td style="text-align:right"> {{$overtime_hours}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Late Hours</td>
                                                    <td style="text-align:right"> {{$late_hours}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Absences</td>
                                                    <td style="text-align:right"> {{$absences_days}} </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row" style="display: none;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Hours Work</label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="work_hours" value="{{$hrs_work}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Days Work</label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="work_days" value="{{$days_work}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Overtime Work</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="overtime_hours" value="{{$overtime_hours}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Late Hours</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="late_hours" value="{{$late_hours}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Absences</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="absences" value="{{$absences_days}}">
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                            EARNINGS</h4>
                                        <table class="table table-bordered">
                                            <tbody>

                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Basic Pay</td>
                                                <td style="text-align:right"> {{number_format($basic_pay,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Overtime Pay</td>
                                                <td style="text-align:right"> {{number_format($overtime_pay,2)}} </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Salary Adjustments</td>
                                                <td style="text-align:right"> {{number_format($salary_adjustments,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">13th Month Pay</td>
                                                <td style="text-align:right"> {{number_format($thirteenth_month_pay,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Bonus</td>
                                                <td style="text-align:right"> {{number_format($bonus,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Allowance</td>
                                                <td style="text-align:right"> {{number_format($allowance,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">GROSS PAY</td>
                                                <td style="text-align:right"> {{number_format($gross_pay,2)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="row" style="display: none;">
                                            <input name="thirteenth_month_pay" value="{{$thirteenth_month_pay}}">
                                            <input name="salary_adjustments" value="{{$salary_adjustments}}">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Bonus</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="bonus" value="{{$bonus}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Basic Pay</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="basic_salary" value="{{$basic_pay}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Overtime Pay</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="overtime_pay" value="{{$overtime_pay}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Allowance</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="allowance" value="{{$allowance}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="danger">GROSS PAY</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="gross_pay" value="{{$gross_pay}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="form-section"><i class="la la-paperclip"></i> DEDUCTIONS</h4>

                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Late</td>
                                                <td style="text-align:right"> {{number_format($late_deduction,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Absences</td>
                                                <td style="text-align:right"> {{number_format($absences_deduction,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">SSS Cont.</td>
                                                <td style="text-align:right"> {{number_format($sss_cont,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Pag-ibig Cont.</td>
                                                <td style="text-align:right"> {{number_format($pagibig_cont,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Philhealth Cont.</td>
                                                <td style="text-align:right"> {{number_format($philhealth_cont,2)}} </td>
                                            </tr>
                                            @foreach($loan as $row)
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">{{$row->loan_type}} Loan</td>
                                                    <td style="text-align:right">
                                                        @if($row->balance > $row->payable)
                                                            @if($row->payment_term=='Monthly')
                                                                {{number_format($row->payable/2,2)}}
                                                            @else
                                                                {{number_format($row->payable,2)}}
                                                            @endif
                                                        @else
                                                            {{number_format($row->balance,2)}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Other Deduction</td>
                                                <td style="text-align:right"> {{$other_deduction}} </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div class="row" style="display: none;">
                                            <input value="{{$other_deduction}}" name="other_deduc">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>SSS Cont.</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="sss_cont" value="{{$sss_cont}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pag-Ibig Cont.</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="pagibig_cont" value="{{$pagibig_cont}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Philhealth Cont.</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="philhealth_cont" value="{{$philhealth_cont}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: none;">
                                            <div class="col-md-6">
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Taxable Income</label>--}}
                                                    {{--<input type="number" class="form-control" placeholder="00.00"--}}
                                                           {{--name="taxable_income" value="{{$taxable_income}}">--}}
                                                {{--</div>--}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Withholding Tax</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="withholding_tax" value="{{$withholding_tax}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: none;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Late</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           value="{{$late_deduction}}" name="late_deduction">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Absences</label>
                                                    <input type="number" class="form-control" placeholder="0" name="absences" value="{{$absences_deduction}}">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">WITH HOLDING TAX</td>
                                                <td style="text-align:right"> {{$withholding_tax}} </td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">TAXABLE</td>--}}
                                                {{--<td style="text-align:right"> {{$taxable_income}} </td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">OVERALL DEDUCTIONS</td>
                                                <td style="text-align:right"> {{$overall_deduction}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">NET PAY</td>
                                                <td style="text-align:right"> {{$net_pay}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="danger">OVERALL DEDUCTIONS</label>
                                                    <input type="number" class="form-control" placeholder="00.00" value="{{ $overall_deduction}}" name="overall_deduc">
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="danger">NET PAY</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           value="{{ $net_pay}}" name="net_pay">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                {{--<button type="button" class="btn btn-warning mr-1">--}}
                                {{--<i class="ft-x"></i> Cancel--}}
                                {{--</button>--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--<i class="la la-check-square-o"></i> Save--}}
                                {{--</button>--}}
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Attendance
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap"
                               id="customTable">
                            <thead>
                            <tr>
                                <th>Attendance Date</th>
                                <th>Time In Work</th>
                                <th>Time Out Work</th>
                                <th>Overtime</th>
                                <th>Late</th>
                                <th>Total Work</th>
                                <th>Total Rest</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendance_time as $row)
                                <tr>
                                    <td style="text-align:right">{{ $row->attendance_date }}</td>
                                    <td style="text-align:right">{{ $row->time_in_work }}</td>
                                    <td style="text-align:right">{{ $row->time_out_work }}</td>
                                    <td style="text-align:right">{{ $row->overtime }}</td>
                                    <td style="text-align:right">{{ $row->undertime }}</td>
                                    <td style="text-align:right">{{ $row->total_work }}</td>
                                    <td style="text-align:right">{{ $row->total_rest }}</td>
                                    {{--<td style="text-align:right">--}}
                                    {{--<span class="dropdown">--}}
                                    {{--<a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">--}}
                                    {{--<i class="la la-ellipsis-h"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                    {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>--}}
                                    {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>--}}
                                    {{--</div>--}}
                                    {{--</span>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Attendance Date</th>
                                <th>Time In Work</th>
                                <th>Time Out Work</th>
                                <th>Overtime</th>
                                <th>Undertime</th>
                                <th>Total Work</th>
                                <th>Total Rest</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js"
            type="text/javascript"></script>

    <script>


    </script>

@endsection

@extends('layout.app')

@section('content')


    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                    EMPLOYEE INFO ({{ $employee_info }}
                                <br/>
                                Sundays : {{$sundays}}
                                <br/>
                                Working Days : {{$totalWorkingDays}}
                            </h3>
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
                                                <td> {{$per_day}} </td>
                                                <td style="width: 20%; vertical-align: middle;">Per Hour</td>
                                                <td> {{$per_hour}} </td>
                                                <td style="width: 20%; vertical-align: middle;">Per Month</td>
                                                <td> {{$per_month}} </td>
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
                                                    <td> {{$hrs_work}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Days Work</td>
                                                    <td> {{$days_work}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Overtime Hours</td>
                                                    <td> {{$overtime_hours}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Undertime Hours</td>
                                                    <td> {{$under_time_hours}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Absences</td>
                                                    <td> {{$absences_days}} </td>
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
                                            @endforeach
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Overtime Work</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="overtime_hours" value="{{$overtime_hours}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Undertime Hours</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="undertime_hours" value="{{$undertime_hours}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Absences</label>
                                                    <input type="number" class="form-control" placeholder="0"
                                                           name="absences" value="{{$absences_no}}">
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                            EARNINGS</h4>
                                        <table class="table table-bordered">
                                            <tbody>

                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Basic Pay</td>
                                                <td> {{$basic_pay}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Overtime Pay</td>
                                                <td> {{$overtime_pay}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Holiday Pay</td>
                                                <td> {{$holiday_pay}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Allowance</td>
                                                <td> {{$allowance}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">GROSS PAY</td>
                                                <td> {{$gross_pay}} </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="row" style="display: none;">
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
                                                    <label>Holiday Pay</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="holiday_pay" value="{{$holiday_pay}}">
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
                                                <td style="width: 40%; vertical-align: middle;">Undertime Deduction</td>
                                                <td> {{$under_time_deduction}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Absences Deduction</td>
                                                <td> {{$absences_deduction}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">SSS Cont.</td>
                                                <td> {{$sss_cont}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Pag-ibig Cont.</td>
                                                <td> {{$pagibig_cont}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Philhealth Cont.</td>
                                                <td> {{$philhealth_cont}} </td>
                                            </tr>

                                            @foreach($loan as $row)
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">{{$row->loan_type}} Loan</td>
                                                <td>  @if($row->balance > $row->payable)
                                                        @if($row->payment_term=='Monthly')
                                                            {{$row->payable/2}}
                                                        @else
                                                            {{$row->payable}}
                                                        @endif
                                                    @else
                                                        {{$row->balance}}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <div class="row" style="display: none;">
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
                                                <div class="form-group">
                                                    <label>Taxable Income</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           name="taxable_income" value="{{$taxable_income}}">
                                                </div>
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
                                                    <label>Undertime</label>
                                                    <input type="number" class="form-control" placeholder="00.00"
                                                           value="{{$under_time_deduction}}" name="undertime_deduc">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Absences</label>
                                                    <input type="number" class="form-control" placeholder="0" name="absences" value="{{$absences_deduc}}">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">TAXABLE</td>
                                                <td> {{$taxable_income}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">OVERALL DEDUCTIONS</td>
                                                <td> {{$overall_deduc}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">NET PAY</td>
                                                <td> {{$net_pay}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="danger">OVERALL DEDUCTIONS</label>
                                                    <input type="number" class="form-control" placeholder="00.00" value="{{ $overall_deduc}}" name="overall_deduc">
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
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
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
                                <th>Undertime</th>
                                <th>Total Work</th>
                                <th>Total Rest</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendance_time as $row)
                                <tr>
                                    <td>{{ $row->attendance_date }}</td>
                                    <td>{{ $row->time_in_work }}</td>
                                    <td>{{ $row->time_out_work }}</td>
                                    <td>{{ $row->overtime }}</td>
                                    <td>{{ $row->undertime }}</td>
                                    <td>{{ $row->total_work }}</td>
                                    <td>{{ $row->total_rest }}</td>
                                    {{--<td>--}}
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

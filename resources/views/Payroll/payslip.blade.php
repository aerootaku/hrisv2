@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Employee Payslip</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Action
                        </button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i
                                        class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item"
                                                                                              href="#"><i
                                        class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i
                                        class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="content-body"><!-- Configuration option table -->
                @foreach($employee as $row)

                @endforeach

                <section id="configuration">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="height: 1004.5px;">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Employee Payslip</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="card-text">

                                        </div>
                                        <form class="form" action="savePayslip" method="POST" enctype="multipart/form-data">
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
                                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                                            EMPLOYEE INFO  ({{$row->firstname . ' '. $row->lastname}}) - {{$rate_name}}</h4>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Per Day</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="per_day" value="{{$per_day}}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Per Hour</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="per_hour" value="{{$per_hour}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Monthly</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="per_month" value="{{$monthly}}">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                                            WORK INFO</h4>


                                                        <div class="row">
                                                            @foreach($regular_work_hrs as $row)
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Hours Work</label>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="0" name="work_hours"  value="{{$row->work_hours}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Days Work</label>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="0" name="work_days" value="{{$row->days_work}}">
                                                                    </div>
                                                                </div>
                                                            @endforeach


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Overtime Hours</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="overtime_hours" value="{{$overtime_hours}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Undertime Hours</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="undertime_hours" value="{{$undertime_hours}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Night Diff. Hours</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="nightdiff_hours" value="{{$nightdiff_hours}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Absences</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="0" name="absences" value="{{$absences}}">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                                            EARNINGS</h4>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Basic Pay</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="basic_salary"  value="{{$basic_pay}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Overtime</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="overtime_pay"  value="{{$overtime_pay}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Holiday Pay</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="holiday_pay"  value="{{$holiday_pay}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        `
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Night Diff</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="nightdiff_pay"  value="{{$nightdiff_pay}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Allowance</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="allowance" value="{{$allowance}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="danger">GROSS PAY</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="gross_pay" value="{{$gross_pay}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h4 class="form-section"><i class="la la-paperclip"></i>
                                                            DEDUCTIONS</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>SSS Cont.</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="sss_cont" value="{{$sss_cont}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Pag-Ibig Cont.</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="pagibig_cont" value="{{$pagibig_cont}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Philhealth Cont.</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="philhealth_cont" value="{{$philhealth_cont}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Taxable Income</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="taxable_income" value="{{$taxable_income}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Withholding Tax</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="withholding_tax" value="{{$withholding_tax}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Undertime</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" value="{{$undertime_deduc}}" name="undertime_deduc">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Absences</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" name="absences_deduc">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">
                                                            @foreach($loan as $row)
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>{{$row->loan_type}} Loan - {{$row->payable}}</label>
                                                                        <input type="number" class="form-control"
                                                                               placeholder="00.00" value="
@if($row->payment_term=='Monthly')
                                                                        {{$row->payable/2}}
                                                                        @else
                                                                        {{$row->payable}}
                                                                        @endif
                                                                                " name="">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="danger">OVERALL DEDUCTIONS</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00" value="{{$overall_deduc}}" name="overall_deduc">
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <br/>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="danger">NET PAY</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="00.00"  value="{{$net_pay}}" name="net_pay">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Attendance</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Attendance Date</th>
                                                <th>Time In Work</th>
                                                <th>Time Out Work</th>
                                                <th>Overtime</th>
                                                <th>Undertime</th>
                                                <th>Total Work</th>
                                                <th>Total Rest</th>
                                                <th>Status</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($attendance_time as $row)
                                                <tr>
                                                    <td>{{ $row->time_in_work }}</td>
                                                    <td>{{ $row->time_out_work }}</td>
                                                    <td>{{ $row->overtime }}</td>
                                                    <td>{{ $row->undertime }}</td>
                                                    <td>{{ $row->total_work }}</td>
                                                    <td>{{ $row->total_rest }}</td>
                                                    <td>{{ $row->attendance_status }}</td>
                                                    {{--<td>--}}
                                                    {{--<div class="buttons-group">--}}
                                                    {{--<button class="btn btn-group btn-warning btn-xs" data-toggle="modal" data-target="#edit{{ $row->department_id }}"><i class="la la-edit"></i> </button>--}}
                                                    {{--<button class="btn btn-group btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $row->department_id }}"><i class="la la-trash"></i> </button>--}}
                                                    {{--</div> --}}
                                                    {{--</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Configuration option table -->
            </div>
        </div>
    </div>

    {{--<div class="menu pmd-floating-action" role="navigation">--}}
    {{--<a href="#" data-toggle="modal" data-target="#create"--}}
    {{--class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success"--}}
    {{--data-title="Create">--}}
    {{--<span class="pmd-floating-hidden">Primary</span>--}}
    {{--<i class="la la-plus-circle"></i>--}}
    {{--</a>--}}
    {{--</div>--}}

@endsection

@section('script')
    <script>

    </script>
@endsection

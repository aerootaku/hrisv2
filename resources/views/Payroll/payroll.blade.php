@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Employee Payroll List</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- Configuration option table -->

                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Employee Payroll List</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration" id="payroll_table">
                                            <thead>
                                            <tr>
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Cutoff</th>
                                                <th>Per Day</th>
                                                <th>Per Hour</th>
                                                <th>Per Month</th>
                                                <th>Work Hours</th>
                                                <th>Work Days</th>
                                                <th>Overtime Hours</th>
                                                <th>Undertime Hours</th>
                                                <th>Night Diff. Hours</th>
                                                <th>Absences</th>
                                                <th>Basic Pay</th>
                                                <th>Overtime Pay</th>
                                                <th>Holiday Pay</th>
                                                <th>Nigth Diff. Pay</th>
                                                <th>Allowance</th>
                                                <th>Gross Pay</th>
                                                <th>SSS Cont.</th>
                                                <th>Pag-ibig Cont.</th>
                                                <th>Philhealth Cont.</th>
                                                <th>Taxable</th>
                                                <th>With Holding</th>
                                                <th>Undertime Deduc.</th>
                                                <th>Absences Deduc.</th>
                                                <th>Total Loan</th>
                                                <th>Overall Deduc.</th>
                                                <th>Net Pay</th>
                                                <th>Comments</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $row)
                                                <tr>

                                                    <td>{{ $row->employee_no }}</td>
                                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                                    <td>{{$row->cutoff_name}}</td>
                                                    <td> {{ number_format($row->per_day,2)  }}</td>
                                                    <td>{{ $row->per_hour }}</td>
                                                    <td> {{ number_format($row->per_month,2)  }}</td>
                                                    <td>{{ $row->work_hours }}</td>
                                                    <td>{{ $row->work_days }}</td>
                                                    <td>{{ $row->overtime_hours }}</td>
                                                    <td>{{ $row->undertime_hours }}</td>
                                                    <td>{{ $row->nightdiff_hours }}</td>
                                                    <td>{{ $row->absences }}</td>
                                                    <td>{{ $row->basic_pay }}</td>
                                                    <td>{{ $row->overtime_pay }}</td>
                                                    <td>{{ $row->holiday_pay }}</td>
                                                    <td>{{ $row->nightdiff_pay }}</td>
                                                    <td>{{ $row->allowance }}</td>
                                                    <td>{{ $row->gross_pay }}</td>
                                                    <td>{{ $row->sss_cont }}</td>
                                                    <td>{{ $row->pagibig_cont }}</td>
                                                    <td>{{ $row->philhealth_cont }}</td>
                                                    <td>{{ $row->taxable_income }}</td>
                                                    <td>{{ $row->withholding_tax }}</td>
                                                    <td>{{ $row->undertime_deduc }}</td>
                                                    <td>{{ $row->absences_deduc }}</td>
                                                    <td>{{ $row->total_loan }}</td>
                                                    <td>{{ $row->overall_deduc }}</td>
                                                    <td>{{ $row->net_pay }}</td>
                                                    <td>{{ $row->comments }}</td>
                                                    <td>
                                                        <div class="buttons-group">
                                                            <button class="btn btn-group btn-warning btn-xs" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> </button>
                                                            <button class="btn btn-group btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> </button>
                                                        </div>
                                                    </td>
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

    <div class="menu pmd-floating-action" role="navigation">
        <a href="#" data-toggle="modal" data-target="#create" class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success" data-title="Create">
            <span class="pmd-floating-hidden">Primary</span>
            <i class="la la-plus-circle"></i>
        </a>
    </div>

    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="employee-award" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Award Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_id"  required >
                                        {{--@foreach($employee as $employees):--}}
                                        {{--<option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                        <button type="submit" class="btn btn-info">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @foreach($data as $row)
        <div class="modal fade" id="edit{{ $row->id }}" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="employee-award/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Employee</label>
                                        {{--<select name="employee_id" class="form-control" id="employee_idU"  required >--}}
                                        {{--@foreach($employee as $employees):--}}
                                        {{--<option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>--}}
                                        {{--@endforeach--}}
                                        {{--</select>--}}
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                            <button type="submit" class="btn btn-info">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($data as $row)
        <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-award/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <p>Are you sure you want to delete this record?</p>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                            <button type="submit" class="btn btn-warning">Delete Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@section('script')
    <script >
        $('#payroll_table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    </script>
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>

@endsection

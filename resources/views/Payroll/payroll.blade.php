@extends('layout.app')

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->
        <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Employee Payroll List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a  href="{{ url('/generatePayrollMemo/'.$company_id.'/'.$cutoff_id) }}"  class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Generate Payroll Memo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="payroll_table">
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
                                <th>Absences</th>
                                <th>Basic Pay</th>
                                <th>Overtime Pay</th>
                                <th>Nigth Diff. Pay</th>
                                <th>Allowance</th>
                                <th>Gross Pay</th>
                                <th>SSS Cont.</th>
                                <th>Pag-ibig Cont.</th>
                                <th>Philhealth Cont.</th>
                                <th>Taxable</th>
                                {{--<th>Withholding</th>--}}
                                <th>Undertime Deduc.</th>
                                <th>Absences Deduc.</th>
                                <th>Total Loan</th>
                                <th>Overall Deduc.</th>
                                <th>Net Pay</th>
                                <th>Comments</th>
                                <th>Actions</th>
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
                                    <td>{{ $row->absences }}</td>
                                    <td>{{ $row->basic_pay }}</td>
                                    <td>{{ $row->overtime_pay }}</td>
                                    <td>{{ $row->holiday_pay }}</td>
                                    <td>{{ $row->allowance }}</td>
                                    <td>{{ $row->gross_pay }}</td>
                                    <td>{{ $row->sss_cont }}</td>
                                    <td>{{ $row->pagibig_cont }}</td>
                                    <td>{{ $row->philhealth_cont }}</td>
                                    <td>{{ $row->taxable_income }}</td>
                                    {{--<td>{{ $row->withholding_tax }}</td>--}}
                                    <td>{{ $row->undertime_deduc }}</td>
                                    <td>{{ $row->absences_deduc }}</td>
                                    <td>{{ $row->total_loan }}</td>
                                    <td>{{ $row->overall_deduc }}</td>
                                    <td>{{ $row->net_pay }}</td>
                                    <td>{{ $row->comments }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
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
                                <th>Absences</th>
                                <th>Basic Pay</th>
                                <th>Overtime Pay</th>
                                <th>Holiday Pay</th>
                                <th>Allowance</th>
                                <th>Gross Pay</th>
                                <th>SSS Cont.</th>
                                <th>Pag-ibig Cont.</th>
                                <th>Philhealth Cont.</th>
                                <th>Taxable</th>
                                {{--<th>Withholding</th>--}}
                                <th>Undertime Deduc.</th>
                                <th>Absences Deduc.</th>
                                <th>Total Loan</th>
                                <th>Overall Deduc.</th>
                                <th>Net Pay</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        <!--End::Dashboard 1--></div>


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
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>

@endsection


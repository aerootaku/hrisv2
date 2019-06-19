@extends('layout.app')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">        <!--Begin::Dashboard 1-->
        <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title"> Employee Overtime List </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a href="#" data-toggle="modal" data-target="#create"
                                       class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i> New Record
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap"
                               id="customTable">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Day Type</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Overtime</th>
                                <th>Total Work Hours</th>
                                <th>Overtime Approved</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->attendance_date }}</td>
                                    <td>{{ $row->day_type }}</td>
                                    <td>{{ $row->employee_no }}</td>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->time_in_work }}</td>
                                    <td>{{ $row->time_out_work }}</td>
                                    <td>{{ $row->overtime }}</td>
                                    <td>{{ $row->total_work }}</td>
                                    <td>{{ $row->approvefirstname . " " . $row->approvelastname }}</td>
                                    <td><span class="dropdown">
                                            <a href="#"
                                               class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md"
                                               data-toggle="dropdown" aria-expanded="true">
                                                <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit"
                                                   data-target="#edit{{ $row->id }}">
                                                    <i class="la la-edit"></i> Edit Details
                                                </a> {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>--}}                                            </div>                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Day Type</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Overtime</th>
                                <th>Total Work Hours</th>
                                <th>Overtime Approved</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>        <!--End::Dashboard 1-->

    </div>
    @foreach($data as $row)
        <div class="modal fade" id="edit{{ $row->id }}" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="/employee-overtime/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header"><h4 class="title" id="defaultModalLabel">Edit Record</h4></div>
                        <div class="modal-body"> @csrf @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12"><label>Status</label> <select name="status"
                                                                                         class="form-control">
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="0">Declined</option>
                                        </select></div>
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

@endsection

@section('script')
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js"
            type="text/javascript"></script>
    <script></script>

@endsection
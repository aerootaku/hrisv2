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
                                Employee Leave List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a href="#" data-toggle="modal" data-target="#create"
                                       class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        New Record
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap"
                               id="customTable">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Leave Type</th>
                                <th>Request Duration</th>
                                <th>Payment Status</th>
                                <th>Duration</th>
                                <th>Applied On</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->leave_type }}</td>
                                    <td>{{ $row->from_date . " " . $row->to_date }}</td>
                                    <td>
                                        @if($row->without_pay == '1')
                                            <p class="badge badge-pill badge-glow badge-danger">Leave Without Pay</p>
                                        @endif
                                        @if($row->without_pay == '0')
                                            <p class="badge badge-pill badge-glow badge-success">Leave With Pay</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->half_day == '1')
                                            <p class="badge badge-pill badge-glow badge-warning">Half Day Leave</p>
                                        @endif
                                        @if($row->half_day == '0')
                                            <p class="badge badge-pill badge-glow badge-info">Whole Day Leave</p>
                                        @endif
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->reason }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#"
                                               class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md"
                                               data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit"
                                                   data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-title="Delete" data-target="#delete{{ $row->id }}"><i
                                                            class="la la-trash"></i> Delete Record</a>
                                            </div>
                                        </span>
                                        {{--@if(Auth::user()->id<>'1')--}}
                                            {{--{{Auth::user()->id}}--}}
                                            {{--@if( $row->status =='Pending')--}}
                                                <a class="btn btn-warning btn-icon btn-icon-md " href="#"
                                                   data-toggle="modal" data-title="Approval"
                                                   data-target="#approval{{ $row->id }}"><i
                                                            class="fa flaticon-like"></i></a>
                                            {{--@endif--}}
                                        {{--@endif--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Employee Name</th>
                                <th>Leave Type</th>
                                <th>Request Duration</th>
                                <th>Payment Status</th>
                                <th>Duration</th>
                                <th>Applied On</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        <!--End::Dashboard 1-->
    </div>


    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="employee-leave" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Leave Request</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_id" required>
                                        @foreach($employee as $employees)
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Leave Type</label>
                                    <select name="leave_type_id" class="form-control" id="leave_type_id" required>
                                        @foreach($leave_type as $leave_types)
                                            <option value="{{ $leave_types->id }}">{{  $leave_types->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="from_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="to_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Reason</label>
                                    <textarea class="form-control" name="reason" data-provide="markdown" rows="3"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Remarks</label>
                                    <textarea class="form-control" name="remarks" data-provide="markdown" rows="3"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Declined">Declined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Leave Without Pay?</label>
                                <select name="without_pay" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Half Day Leave?</label>
                                <select name="half_day" class="form-control" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
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
                    <form action="employee-leave/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                        <select name="employee_id" class="form-control" id="employee_idU" required>
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Leave Type</label>
                                        <select name="leave_type_id" class="form-control" id="leave_type_idU" required>
                                            @foreach($leave_type as $leave_types)
                                                <option value="{{ $leave_types->id }}" {{ $leave_types->id == $row->leave_type_id? "Selected": "" }}>{{  $leave_types->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="from_date"
                                               value="{{ $row->from_date }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" name="to_date"
                                               value="{{ $row->to_date }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Reason</label>
                                        <textarea class="form-control" name="reason" data-provide="markdown" rows="3"
                                                  required> {{ $row->reason }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remarks" data-provide="markdown" rows="3"
                                                  required>{{ $row->remarks }}</textarea>
                                    </div>
                                </div>
                                {{--<div class="form-group row">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<label>Status</label>--}}
                                {{--<select name="status" class="form-control">--}}
                                {{--<option value="Pending" {{ $row->status == 'Pending'? "Selected": "" }}>Pending</option>--}}
                                {{--<option value="Approved" {{ $row->status == 'Approved'? "Selected": "" }}>Approved</option>--}}
                                {{--<option value="Declined" {{ $row->status == 'Declined'? "Selected": "" }}>Declined</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                {{--</div>--}}
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
                    <form action="employee-leave/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

    @foreach($data as $row)
        <div class="modal fade" id="approval{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-leave/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="Approved" {{ $row->status == "Approved"? "Selected": "" }}>
                                                Approved
                                            </option>
                                            <option value="Declined" {{ $row->status == "Declined"? "Selected": "" }}>
                                                Declined
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js"
            type="text/javascript"></script>
    <script>
        $("#leave_type_id, #employee_id").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1,
        });
        $("#leave_type_idU, #employee_idU").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1,
        });
    </script>
@endsection

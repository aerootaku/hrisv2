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
                                Employee Exit List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a  href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">
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
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                            <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Exit Type</th>
                                <th>Exit Date</th>
                                <th>Exit Interview</th>
                                <th>Inactivate Account</th>
                                <th>Reason</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->employee_no }}</td>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->exit_type }}</td>
                                    <td>{{ $row->exit_date }}</td>
                                    <td>{{ $row->exit_interview }}</td>
                                    <td>{{ $row->is_inactivate_account }}</td>
                                    <td>{{ $row->reason }}</td>
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
                                <th>Exit Type</th>
                                <th>Exit Date</th>
                                <th>Exit Interview</th>
                                <th>Inactivate Account</th>
                                <th>Reason</th>
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
                <form action="employee-exit" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Exit Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_id"  required >
                                        @foreach($employee as $employees):
                                        <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Exit Date</label>
                                    <input type="date" class="form-control" name="exit_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Type of Exit</label>
                                    <select name="exit_type_id" class="form-control" id="exit_type_id"  required  >
                                        @foreach($exit_type as $exit_types):
                                        <option value="{{ $exit_types->id }}">{{  $exit_types->value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Conducted Exit Interview</label>
                                    <select name="exit_interview" class="form-control" id="exit_interview"  required  >
                                        @foreach($yes_no as $yes_nos):
                                        <option value="{{ $yes_nos->value }}">{{  $yes_nos->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Inactive Employee Account</label>
                                    <select name="is_inactivate_account" class="form-control" id="is_inactivate_account"  required  >
                                        @foreach($yes_no as $yes_nos):
                                        <option value="{{ $yes_nos->value }}">{{  $yes_nos->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea  class="form-control" name="reason" data-provide="markdown" rows="3" required></textarea>
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
                    <form action="employee-exit/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                        <select name="employee_id" class="form-control employee_idU"  required >
                                            @foreach($employee as $employees):
                                            <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Exit Date</label>
                                        <input type="date" class="form-control" name="exit_date" value="{{$row->exit_date}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Type of Exit</label>
                                        <select name="exit_type_id" class="form-control exit_type_idU"  required  >
                                            @foreach($exit_type as $exit_types):
                                            <option value="{{ $exit_types->id }}" {{ $exit_types->id == $row->exit_type_id? "Selected": "" }}>{{  $exit_types->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Conducted Exit Interview</label>
                                        <select name="exit_interview" class="form-control exit_interviewU"  required  >
                                            @foreach($yes_no as $yes_nos):
                                            <option value="{{ $yes_nos->value }}"  {{ $yes_nos->id == $row->exit_interview? "Selected": "" }}>{{  $yes_nos->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Inactive Employee Account</label>
                                        <select name="is_inactivate_account" class="form-control is_inactivate_accountU"  required  >
                                            @foreach($yes_no as $yes_nos):
                                            <option value="{{ $yes_nos->value }} "  {{ $yes_nos->id == $row->is_inactivate_account? "Selected": "" }}>{{  $yes_nos->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea  class="form-control" name="reason" data-provide="markdown" rows="3" required>{{$row->reason}}</textarea>
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
                    <form action="employee-exit/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>
    <script>
        $("#exit_type_id, #employee_id,#is_inactivate_account,#exit_interview").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
        $(".exit_type_idU, .employee_idU,.is_inactivate_accountU,.exit_interviewU").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@endsection

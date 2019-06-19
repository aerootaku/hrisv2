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
                                Employee Warning List
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
                                <th>Employee</th>
                                <th>Warning Date</th>
                                <th>Subject</th>
                                <th>Warning Type</th>
                                <th>Approval Status</th>
                                <th>Warning By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->wtofname . " " . $row->wtolname }}</td>
                                    <td>{{ $row->warning_date }}</td>
                                    <td>{{ $row->subject }}</td>
                                    <td>{{ $row->warning_type }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->wbyfname . " " . $row->wbylname }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#"
                                               class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md"
                                               data-toggle="dropdown" aria-expanded="true">
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
                                <th>Employee</th>
                                <th>Warning Date</th>
                                <th>Subject</th>
                                <th>Warning Type</th>
                                <th>Approval Status</th>
                                <th>Warning By</th>
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
                <form action="employee-warning" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="status" value="Pending">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Warning Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="warning_to" class="form-control" id="warning_to" required>
                                        @foreach($employee as $employees)
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Type of Warning</label>
                                    <select name="warning_type_id" class="form-control" id="award_type_id" required>
                                        @foreach($warning_type as $warning_types)
                                            <option value="{{ $warning_types->id }}">{{  $warning_types->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Warning By</label>
                                    <select name="warning_by" class="form-control" id="warning_by" required>
                                        @foreach($employee as $employees)
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Warning Date</label>
                                    <input type="date" class="form-control" name="warning_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" data-provide="markdown" rows="3" required></textarea>
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
                    <form action="employee-warning/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                        <select name="warning_to" class="form-control warning_to" required>
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->warning_to? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Type of Warning</label>
                                        <select name="warning_type_id" class="form-control award_type_id"
                                                required>
                                            @foreach($warning_type as $warning_types)
                                                <option value="{{ $warning_types->id }}" {{ $warning_types->id == $row->warning_type_id? "Selected": "" }}>{{  $warning_types->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{$row->subject}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Warning By</label>
                                        <select name="warning_by" class="form-control warning_by" required>
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->warning_by? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Warning Date</label>
                                        <input type="date" class="form-control" name="warning_date" value="{{$row->warning_date}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" data-provide="markdown" rows="3"  required>{{$row->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="Pending" {{ $row->status == 'Pending'? "Selected": "" }}>
                                                Pending
                                            </option>
                                            <option value="Approved" {{ $row->status == 'Approved'? "Selected": "" }}>
                                                Approved
                                            </option>
                                            <option value="Declined" {{ $row->status == 'Declined'? "Selected": "" }}>
                                                Declined
                                            </option>
                                        </select>
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
                    <form action="employee-warning/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
        $("#employee_id, #warning_to,#warning_by").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });

        $(".award_type_id, .warning_to,.warning_by").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>

@endsection


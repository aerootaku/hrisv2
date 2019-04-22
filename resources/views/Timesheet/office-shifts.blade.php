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
                                Employee List
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
                                <th>Shift Name</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->shift_name }}</td>
                                    <td>{{ $row->monday_in_time  . " - " . $row->monday_out_time }}</td>
                                    <td>{{ $row->tuesday_in_time  . " - " . $row->tuesday_out_time }}</td>
                                    <td>{{ $row->wednesday_in_time  . " - " . $row->wednesday_out_time }}</td>
                                    <td>{{ $row->thursday_in_time  . " - " . $row->thursday_out_time }}</td>
                                    <td>{{ $row->friday_in_time  . " - " . $row->friday_out_time }}</td>
                                    <td>{{ $row->saturday_in_time  . " - " . $row->saturday_out_time }}</td>
                                    <td>{{ $row->sunday_in_time  . " - " . $row->sunday_out_time }}</td>
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
                                <th>Shift Name</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
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
                <form action="office-shifts" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Office Shift</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shift Name</label>
                                    <input type="text" name="shift_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Monday Time-in</label>
                                        <input type="time" class="form-control" name="monday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Monday Time-out</label>
                                        <input type="time" class="form-control" name="monday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tuesday Time-in</label>
                                        <input type="time" class="form-control" name="tuesday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tuesday Time-out</label>
                                        <input type="time" class="form-control" name="tuesday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Wednesday Time-in</label>
                                        <input type="time" class="form-control" name="wednesday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Wednesday Time-out</label>
                                        <input type="time" class="form-control" name="wednesday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Thursday Time-in</label>
                                        <input type="time" class="form-control" name="thursday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Thursday Time-out</label>
                                        <input type="time" class="form-control" name="thursday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Friday Time-in</label>
                                        <input type="time" class="form-control" name="friday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Friday Time-out</label>
                                        <input type="time" class="form-control" name="friday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Saturday Time-in</label>
                                        <input type="time" class="form-control" name="saturday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Saturday Time-out</label>
                                        <input type="time" class="form-control" name="saturday_out_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Sunday Time-in</label>
                                        <input type="time" class="form-control" name="sunday_in_time" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Sunday Time-out</label>
                                        <input type="time" class="form-control" name="sunday_out_time" />
                                    </div>
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


    @foreach($data as $row):
    <div class="modal fade" id="edit{{ $row->id }}" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="office-shifts/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shift Name</label>
                                    <input type="text" name="shift_name" class="form-control"  value="{{$row->shift_name}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Monday Time-in</label>
                                        <input type="time" class="form-control" name="monday_in_time" value="{{ $row->monday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Monday Time-out</label>
                                        <input type="time" class="form-control" name="monday_out_time" value="{{ $row->monday_out_time }}"  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tuesday Time-in</label>
                                        <input type="time" class="form-control" name="tuesday_in_time" value="{{ $row->tuesday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tuesday Time-out</label>
                                        <input type="time" class="form-control" name="tuesday_out_time" value="{{ $row->tuesday_out_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Wednesday Time-in</label>
                                        <input type="time" class="form-control" name="wednesday_in_time" value="{{ $row->wednesday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Wednesday Time-out</label>
                                        <input type="time" class="form-control" name="wednesday_out_time" value="{{ $row->wednesday_out_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Thursday Time-in</label>
                                        <input type="time" class="form-control" name="thursday_in_time" value="{{ $row->thursday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Thursday Time-out</label>
                                        <input type="time" class="form-control" name="thursday_out_time" value="{{ $row->thursday_out_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Friday Time-in</label>
                                        <input type="time" class="form-control" name="friday_in_time" value="{{ $row->friday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Friday Time-out</label>
                                        <input type="time" class="form-control" name="friday_out_time" value="{{ $row->friday_out_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Saturday Time-in</label>
                                        <input type="time" class="form-control" name="saturday_in_time" value="{{ $row->saturday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Saturday Time-out</label>
                                        <input type="time" class="form-control" name="saturday_out_time" value="{{ $row->saturday_out_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Sunday Time-in</label>
                                        <input type="time" class="form-control" name="sunday_in_time" value="{{ $row->sunday_in_time }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Sunday Time-out</label>
                                        <input type="time" class="form-control" name="sunday_out_time" value="{{ $row->sunday_out_time }}" />
                                    </div>
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
                <form action="office-shifts/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

    </script>
@endsection

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
                                Company Announcements
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        New Record
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin: Search Form -->
                    {{--<form class="kt-form kt-form--fit kt-margin-b-20">--}}
                    {{--<div class="row kt-margin-b-20">--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>RecordID:</label>--}}
                    {{--<input type="text" class="form-control kt-input" placeholder="E.g: 4590" data-col-index="0">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>OrderID:</label>--}}
                    {{--<input type="text" class="form-control kt-input" placeholder="E.g: 37000-300" data-col-index="1">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>Country:</label>--}}
                    {{--<select class="form-control kt-input" data-col-index="2">--}}
                    {{--<option value="">Select</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>Agent:</label>--}}
                    {{--<input type="text" class="form-control kt-input" placeholder="Agent ID or name" data-col-index="4">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row kt-margin-b-20">--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>Ship Date:</label>--}}
                    {{--<div class="input-daterange input-group" id="kt_datepicker">--}}
                    {{--<input type="text" class="form-control kt-input" name="start" placeholder="From" data-col-index="5" />--}}
                    {{--<div class="input-group-append">--}}
                    {{--<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>--}}
                    {{--</div>--}}
                    {{--<input type="text" class="form-control kt-input" name="end" placeholder="To" data-col-index="5" />--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>Status:</label>--}}
                    {{--<select class="form-control kt-input" data-col-index="6">--}}
                    {{--<option value="">Select</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">--}}
                    {{--<label>Type:</label>--}}
                    {{--<select class="form-control kt-input" data-col-index="7">--}}
                    {{--<option value="">Select</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="kt-separator kt-separator--md kt-separator--dashed"></div>--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-lg-12">--}}
                    {{--<button class="btn btn-primary btn-brand--icon" id="kt_search">--}}
                    {{--<span>--}}
                    {{--<i class="la la-search"></i>--}}
                    {{--<span>Search</span>--}}
                    {{--</span>--}}
                    {{--</button>--}}
                    {{--&nbsp;&nbsp;--}}
                    {{--<button class="btn btn-secondary btn-secondary--icon" id="kt_reset">--}}
                    {{--<span>--}}
                    {{--<i class="la la-close"></i>--}}
                    {{--<span>Reset</span>--}}
                    {{--</span>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</form>--}}

                    <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Branch / Location</th>
                                    <th>Published By</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->summary }}</td>
                                    <td>{{ $row->location }}</td>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->start_date }}</td>
                                    <td>{{ $row->end_date }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Department</th>
                                    <th>Published By</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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
                <form action="/announcement" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Announcement Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="col-md-12">
                            <input type="hidden" name="created_by" class="form-control" value="{{ Session::get('employee_id') }}" />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Location / Branch</label>
                                    <select name="location" class="form-control">
                                        @foreach ($branch as $row)
                                            <option value="{{ $row->id }}">{{ $row->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Summary</label>
                                    <input type="text" class="form-control" name="summary" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea  class="form-control" name="description" required></textarea>
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

                    <form action="/announcement/{{ $row->id }}" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">

                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>

                        </div>

                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" name="end_date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Location / Branch</label>
                                        <select name="location" class="form-control">
                                            @foreach ($branch as $row)
                                                <option value="{{ $row->id }}">{{ $row->location_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Summary</label>
                                        <input type="text" class="form-control" name="summary" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea  class="form-control" name="description" required></textarea>
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
                    <form action="/announcement/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

    <script>

        $("#department, #published_by").select2({

            width:"100%",

            placeholder: "Select",

            maximumSelectionSize: 1

        });

    </script>

@endsection


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
                                Holiday List
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
                                <th>Event Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->event_name }}</td>
                                    <td>{{ $row->is_publish == 0? "Published":"Un Published" }}</td>
                                    <td>{{ $row->start_date }}</td>
                                    <td>{{ $row->end_date }}</td>
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
                                <th>Event Name</th>
                                <th>Status</th>
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

                <form action="/holidays" method="POST" enctype="multipart/form-data">

                    <div class="modal-header">

                        <h4 class="title" id="defaultModalLabel">New Holiday Record</h4>

                    </div>

                    <div class="modal-body">

                        @csrf
                        <div class="col-md-12">

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label>Company List</label>
                                    <select name="company_id" class="form-control" id="company_list">
                                        @foreach($company as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">

                                    <label>Event Name</label>
                                    <input type="text" name="event_name" class="form-control" />

                                </div>

                                <div class="col-md-6">

                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date" />
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date" />

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label>Description</label>
                                    <textarea name="description" class="form-control" data-provide="markdown" rows="4"></textarea>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label>Status</label>
                                    <select name="is_publish" class="form-control">
                                        <option value="0">Published</option>
                                        <option value="1">Un Published</option>
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


    @foreach($data as $row):
    <div class="modal fade" id="edit{{ $row->id }}" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="/holidays/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company List</label>
                                <select name="company_id" class="form-control">
                                    @foreach($company as $companies)
                                        <option value="{{ $companies->id }}" {{ $row->company_id == $companies->id? "Selected": "" }}>{{ $companies->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Event Name</label>
                                <input type="text" name="event_name" class="form-control" value="{{ $row->event_name }}" />
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="{{ $row->start_date }}" />
                                </div>
                                <div class="col-md-6">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{ $row->end_date }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" data-provide="markdown" rows="4">{{ $row->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_publish" class="form-control">
                                    <option value="0" {{ $row->is_publish == 0? "Selected": "" }}>Published</option>
                                    <option value="1"  {{ $row->is_publish == 1? "Selected": "" }}>Un Published</option>
                                </select>
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
                    <form action="/holidays/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

        $("#company_list").select2({

            width:"100%",

            placeholder: "Select",

            maximumSelectionSize: 1

        });

    </script>

@endsection


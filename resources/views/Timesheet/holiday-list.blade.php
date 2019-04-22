@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Holiday Event</h3>
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
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    Add Holiday Event
                                </div>
                                <div class="card-body">
                                    <form action="/holidays" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Company List</label>
                                            <select name="company_id" class="form-control" id="company_list">
                                                @foreach($company as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input type="text" name="event_name" class="form-control" />
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control" name="start_date" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>End Date</label>
                                                <input type="date" class="form-control" name="end_date" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="is_publish" class="form-control">
                                                <option value="0">Publshed</option>
                                                <option value="1">Un Published</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info btn-block" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Holiday Event</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Event Name</th>
                                                <th>Status</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($holidays as $row)
                                                <tr>
                                                    <td>{{ $row->event_name }}</td>
                                                    <td>{{ $row->is_published == 0? "Published":"Un Published" }}</td>
                                                    <td>{{ $row->start_date }}</td>
                                                    <td>{{ $row->end_date }}</td>
                                                    <td>
                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="la la-bars"></i></button>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}">Delete</a>
                                                            </div>
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

    @foreach($holidays as $row):
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
                                <textarea name="description" class="form-control" rows="4">{{ $row->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_publish" class="form-control">
                                    <option value="0" {{ $row->is_published == 0? "Selected": "" }}>Published</option>
                                    <option value="1"  {{ $row->is_published == 1? "Selected": "" }}>Un Published</option>
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

    @foreach($holidays as $row)
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
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>
    <script>
        $("#company_list").select2();
    </script>
@endsection

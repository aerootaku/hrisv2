@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Office Shifts</h3>
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
                                    <h4 class="card-title">Office Shifts</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
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
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($shifts as $row)
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

    <div class="menu pmd-floating-action" role="navigation">
        <a href="#" data-toggle="modal" data-target="#create" class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success" data-title="Create">
            <span class="pmd-floating-hidden">Primary</span>
            <i class="la la-plus-circle"></i>
        </a>
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
                            <div class="form-group">
                                <label>Shift Name</label>
                                <input type="text" name="shift_name" class="form-control" />
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


    @foreach($shifts as $row):
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
                            <div class="form-group">
                                <label>Shift Name</label>
                                <input type="text" name="shift_name" class="form-control"  value="{{$row->shift_name}}" />
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

    @foreach($shifts as $row)
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
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>
    <script>

    </script>
@endsection

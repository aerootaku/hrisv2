@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Attendance Time List</h3>
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
                                    <h4 class="card-title">Attendance Time List</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Day Type</th>
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Overtime</th>
                                                <th>Undertime</th>
                                                <th>Tardiness</th>
                                                <th>Total Work Hours</th>
                                                <th>Overtime Approved</th>
                                                <th width="13%">Actions</th>
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
                                                <td>{{ $row->undertime }}</td>
                                                <td>{{ $row->tardiness }}</td>
                                                <td>{{ $row->total_work }}</td>
                                                <td>{{ $row->overtime_approved }}</td>

                                                <td>
                                                    <div class="buttons-group">
                                                        <button class="btn btn-group btn-warning btn-xs" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> </button>
                                                        <button class="btn btn-group btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> </button>
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
                <form action="attendance-time" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Attendance Time In/Out Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Day Type</label>
                                    <select name="employee_id" class="form-control" id="employee_id"  required >
                                        @foreach($day_type as $day_types):
                                        <option value="{{ $day_types->id }}">{{ $day_types->day_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="attendance_date" required>
                                </div>
                            </div>
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
                                <div class="col-md-12">
                                    <label>Time In</label>
                                    <input type="datetime-local" class="form-control" name="time_in_work" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Time Out</label>
                                    <input type="datetime-local" class="form-control" name="time_out_work" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Overtime</label>
                                    <input type="time" class="form-control" name="overtime" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Undertime</label>
                                    <input type="time" class="form-control" name="undertime" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Tardiness</label>
                                    <input type="time" class="form-control" name="tardiness" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Work Hours</label>
                                    <input type="time" class="form-control" name="total_work" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Rest Hours</label>
                                    <input type="time" class="form-control" name="total_rest" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Night Differential Hours</label>
                                    <input type="time" class="form-control" name="total_night_diff" required>
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
                <form action="attendance-time/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Day Type</label>
                                    <select name="employee_id" class="form-control" id="employee_id"  required >
                                        @foreach($day_type as $day_types):
                                        <option value="{{ $day_types->id }}  {{ $day_types->id == $row->day_type_id? "Selected": "" }}">{{ $day_types->day_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="attendance_date" value="{{$row->attendance_date}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_idU"  required >
                                        @foreach($employee as $employees):
                                        <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Time In</label>
                                    <input type="text" class="form-control" name="time_in_work" value="{{$row->time_in_work}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Time Out</label>
                                    <input type="text" class="form-control" name="time_out_work" value="{{$row->time_out_work}}"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Overtime</label>
                                    <input type="text" class="form-control" name="overtime" value="{{$row->overtime}}"  >
                                </div>
                                <div class="col-md-4">
                                    <label>Undertime</label>
                                    <input type="text" class="form-control" name="undertime" value="{{$row->undertime}}"  >
                                </div>
                                <div class="col-md-4">
                                    <label>Tardiness</label>
                                    <input type="text" class="form-control" name="tardiness" value="{{$row->tardiness}}"  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Work Hours</label>
                                    <input type="text" class="form-control" name="total_work" value="{{$row->total_work}}"  required>
                                </div>
                                <div class="col-md-4">
                                    <label>Rest Hours</label>
                                    <input type="text" class="form-control" name="total_rest" value="{{$row->total_rest}}"  >
                                </div>
                                <div class="col-md-4">
                                    <label>Night Differential Hours</label>
                                    <input type="text" class="form-control" name="total_night_diff" value="{{$row->total_night_diff}}"  >
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

    @foreach($data as $row):
    <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="attendance-time/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
        $("#day_type_id, #employee_id").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });

        function diffGetTime(date1, date2) {
            return date2.getTime() - date1.getTime();
        }

        $("#day_type_idU, #employee_idU").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@endsection

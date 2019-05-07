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
                                Attendance Time List
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

                                    <td>{{ $row->undertime }}</td>

                                    <td>{{ $row->tardiness }}</td>

                                    <td>{{ $row->total_work }}</td>

                                    <td>{{ $row->overtime_approved }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>--}}
                                            </div>
                                        </span>
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

                                <th>Undertime</th>

                                <th>Tardiness</th>

                                <th>Total Work Hours</th>

                                <th>Overtime Approved</th>

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

                                    <select name="day_type_id" class="form-control" id="day_type_id"  required >

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

                                    <input type="text" class="form-control" name="overtime">

                                </div>

                                <div class="col-md-4">

                                    <label>Undertime</label>

                                    <input type="text" class="form-control" name="undertime">

                                </div>

                                <div class="col-md-4">

                                    <label>Tardiness</label>

                                    <input type="text" class="form-control" name="tardiness" required>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-4">

                                    <label>Work Hours</label>

                                    <input type="text" class="form-control" name="total_work">

                                </div>

                                <div class="col-md-4">

                                    <label>Rest Hours</label>

                                    <input type="text" class="form-control" name="total_rest" required>

                                </div>

                                <div class="col-md-4">

                                    <label>Night Differential Hours</label>

                                    <input type="text" class="form-control" name="total_night_diff" >

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

                                    <select name="employee_id" class="form-control" id="employee_idU"  required >

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

                                    <input type="datetime-local" class="form-control" name="time_in_work" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->time_in_work)) }}" required>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label>Time Out</label>

                                    <input type="datetime-local" class="form-control" name="time_out_work" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->time_out_work)) }}"  required>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-4">

                                    <label>Overtime</label>

                                    <input type="text" class="form-control" name="overtime" id="overtime" value="{{$row->overtime}}"  >

                                </div>

                                <div class="col-md-4">

                                    <label>Undertime</label>

                                    <input type="text" class="form-control" name="undertime" id="undertime" value="{{$row->undertime}}"  >

                                </div>

                                <div class="col-md-4">

                                    <label>Tardiness</label>

                                    <input type="text" class="form-control" name="tardiness" id="tardiness" value="{{$row->tardiness}}"  >

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-4">

                                    <label>Work Hours</label>

                                    <input type="text" class="form-control total_work" name="total_work" id="total_work" value="{{$row->total_work}}"  >

                                </div>

                                <div class="col-md-4">

                                    <label>Rest Hours</label>

                                    <input type="text" data-inputmask="'mask': '99-9999999'" class="form-control" name="total_rest" id="total_rest" value="{{$row->total_rest}}"  >

                                </div>

                                {{--<div class="col-md-4">--}}

                                    {{--<label>Night Differential Hours</label>--}}

                                    {{--<input type="text" class="form-control" name="total_night_diff" value="{{$row->total_night_diff}}"  >--}}

                                {{--</div>--}}

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

    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>

    <script>


        $("#total_work").inputmask({
            mask: "99-9999-99999-9",
            placeholder: "XX-XX",
        });

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


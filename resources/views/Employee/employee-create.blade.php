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
                    </div>
                    <form action="/employee" method="POST" enctype="multipart/form-data">
                        <div class="kt-portlet__body">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <h4><strong>Company Designation</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Company</label>
                                    <select name="company_id" id="company_id" class="form-control company">
                                        <option value="">-- Select Company -- </option>
                                        @foreach($company as $companies)
                                            <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Department</label>
                                    <select name="department" class="form-control" id="department">
                                        <option value=""> -- Select Department --</option>
                                        {{--@foreach($department as $departments)--}}
                                            {{--<option value="{{ $departments->id }}">{{ $departments->department_name }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Designation</label>
                                    <select name="designation" class="form-control" id="designation">
                                        <option value=""></option>
                                        {{--@foreach($designation as $designations)--}}
                                            {{--<option value="{{ $designations->id }}">{{ $designations->designation_name }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control">
                                        <option value="1">System Administrator</option>
                                        <option value="2">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-3">
                                    <label>Employee No</label>
                                    <input type="text" class="form-control" name="employee_no" />
                                </div>
                            </div>
                            <h4><strong>Personal Information</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" class="form-control"  name="firstname">
                                </div>
                                <div class="col-md-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control"  name="lastname">
                                </div>
                                <div class="col-md-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control"  name="middlename">
                                </div>
                                <div class="col-md-2">
                                    <label>Suffix</label>
                                    <input type="text" class="form-control" name="suffix">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="mail" class="form-control" id="emailMask">
                                </div>
                                <div class="col-md-4">
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile_no" class="form-control" id="kt_inputmask_3">
                                </div>
                                <div class="col-md-4">
                                    <label>Telephone No</label>
                                    <input type="tel" name="telephone_no" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" max="{{ date("Y-m-d") }}" onfocusout='dateToAge()' name="birthdate">
                                    <input class="form-control" type="hidden" name="age" id="age" />
                                </div>
                                <div class="col-md-5">
                                    <label>Birth Place</label>
                                    <input type="text" class="form-control" name="birthplace" />
                                </div>
                            </div>
                            <h4><strong>Employment Information</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Date Hired</label>
                                    <input type="date" class="form-control"  name="date_hired">
                                </div>
                                <div class="col-md-4">
                                    <label>Contract Start</label>
                                    <input type="date" class="form-control" name="contract_start">
                                </div>
                                <div class="col-md-4">
                                    <label>Schedule</label>
                                    <select name="schedule_type" class="form-control">
                                        @foreach($schedule as $schedules)
                                            <option value="{{ $schedules->id }}">{{ $schedules->shift_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Employment Status</label>
                                    <select name="employment_status" class="form-control">
                                        @foreach($constants as $constant)
                                            @if ($constant->type == 'Employment Status')
                                                <option value="{{ $constant->id }}">{{ $constant->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Employment Type</label>
                                    <select name="employee_type" class="form-control">
                                        @foreach($constants as $constant)
                                            @if ($constant->type == 'Employment Type')
                                                <option value="{{ $constant->id }}">{{ $constant->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4><strong>Credentials</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Username</label>
                                    <input type="text" class="form-control"  name="username">
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password">
                                </div>
                                <div class="col-md-4">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control"  name="confirm-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <button type="submit" class="btn btn-info btn-block">Save Record</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End::Dashboard 1-->
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/employee" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Employee Record</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <h4><strong>Company Designation</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Company</label>
                                    <select name="company_id" id="company_id" class="form-control company">
                                        @foreach($company as $companies)
                                            <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value="">-- Select Branch --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Department</label>
                                    <select name="department" class="form-control" id="department">
                                        <option value=""> -- Select Department -- </option>
                                        {{--@foreach($department as $departments)--}}
                                            {{--<option value="{{ $departments->id }}">{{ $departments->department_name }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Designation</label>
                                    <select name="designation" class="form-control">
                                        <option value=""> -- Select Designation -- </option>
                                        {{--@foreach($designation as $designations)--}}
                                            {{--<option value="{{ $designations->id }}">{{ $designations->designation_name }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control">
                                        <option value="1">System Administrator</option>
                                        <option value="2">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-3">
                                    <label>Employee No</label>
                                    <input type="text" class="form-control" name="employee_no" />
                                </div>
                            </div>
                            <h4><strong>Personal Information</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" class="form-control"  name="firstname">
                                </div>
                                <div class="col-md-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control"  name="lastname">
                                </div>
                                <div class="col-md-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control"  name="middlename">
                                </div>
                                <div class="col-md-2">
                                    <label>Suffix</label>
                                    <input type="text" class="form-control" name="suffix">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Mobile No</label>
                                    <input type="tel" name="mobile_no" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Telephone No</label>
                                    <input type="tel" name="telephone_no" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" max="{{ date("Y-m-d") }}" onfocusout='dateToAge()' name="birthdate">
                                    <input class="form-control" type="text" name="age" id="age" hidden>
                                </div>
                                <div class="col-md-5">
                                    <label>Birth Place</label>
                                    <input type="text" class="form-control" name="birthplace" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Date Hired</label>
                                    <input type="date" class="form-control"  name="date_hired">
                                </div>
                                <div class="col-md-4">
                                    <label>Contract Start</label>
                                    <input type="date" class="form-control" name="contract_start">
                                </div>
                                <div class="col-md-4">
                                    <label>Schedule</label>
                                    <select name="schedule_type" class="form-control">
                                        @foreach($schedule as $schedules)
                                            <option value="{{ $schedules->id }}">{{ $schedules->shift_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Employee Rate</label>
                                    <select name="rate_id" class="form-control">
                                        @foreach($rate as $rates)
                                            <option value="{{ $rates->id }}">{{ $rates->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Employment Status</label>
                                    <select name="employment_status" class="form-control">
                                        @foreach($constants as $constant)
                                            @if ($constant->type == 'Employment Status')
                                                <option value="{{ $constant->id }}">{{ $constant->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Employment Type</label>
                                    <select name="employee_type" class="form-control">
                                        @foreach($constants as $constant)
                                            @if ($constant->type == 'Employment Type')
                                                <option value="{{ $constant->id }}">{{ $constant->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4><strong>Credentials</strong></h4>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Username</label>
                                    <input type="text" class="form-control"  name="username">
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password">
                                </div>
                                <div class="col-md-4">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control"  name="confirm-password">
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

@endsection

@section('script')
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>

    <script>
        function getMiddleInitial(){
            var str     = $("#middlename").val();
            var matches = str.match(/\b(\w)/g);
            var acronym = matches.join('.');
            $("#middleInitial").val(acronym + '.');
        }
        function dateToAge(){
            var dateString = $("#birthdate").val();
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            $("#age").val(age);
        }
    </script>

    <script>


        function getBranch(){
            let company_id = $("#company_id").val();
            let branch = $("#branch").empty();
            $.ajax({
                url: '/getBranch',
                data: {'company_id': company_id, "_token": $('#token').val()},
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    $('<option value="">' + "-- Select Record --" + '</option>').appendTo(branch);
                    $.each(response, function(i, item) {
                        $('<option value="' + item.value + '">' + item.name + '</option>').
                        appendTo(branch);
                    });
                },
                error: function (response) {

                }
            });
        }

        function getDepartment(){
            let branch_id = $("#branch").val();
            let department = $("#department").empty();
            $.ajax({
                url: '/getDepartment',
                data: {'branch_id': branch_id, "_token": $('#token').val()},
                type: 'POST',

                success: function (response) {
                    console.log(response);
                    $.each(response, function(i, item) {
                        console.log(item.value);
                        $('<option value="' + item.value + '">' + item.name + '</option>').
                        appendTo(department);
                    });
                },
                error: function (response) {

                }
            });
        }

        function getDesignation(){
            let department = $("#department").val();
            let designation = $("#designation").empty();
            $.ajax({
                url: '/getDesignation',
                data: {'department_id': department, "_token": $('#token').val()},
                type: 'POST',

                success: function (response) {
                    console.log(response);
                    $.each(response, function(i, item) {
                        console.log(item.value);
                        $('<option value="' + item.value + '">' + item.name + '</option>').
                        appendTo(designation);
                    });
                },
                error: function (response) {

                }
            });
        }
        //get branch
        $("#company_id").on("change", function (e) {
            e.preventDefault();
            getBranch();
        });



        $("#branch").on("change", function (e) {
            getDepartment();
        });

        $("#department").on("change", function (e) {
            getDesignation();
        });
    </script>

@endsection

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
                                    <a href="{{ url('employee/create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Employee No</th>
                                <th>Gender</th>
                                <th>Bank Account</th>
                                <th>Daily Salary</th>
                                <th>Monthly Salary</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->company_name }}</td>
                                    <td>{{ $row->employee_no }}</td>
                                    <td>{{ $row->gender }}</td>
                                    <td>{{ $row->bank_account }}</td>
                                    <td>{{ $row->per_day_salary }}</td>
                                    <td>{{ $row->monthly_salary }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Tag Salary" data-target="#tag{{ $row->employee_id }}"><i class="la la-trash"></i> Tag Salary</a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Employee No</th>
                                <th>Gender</th>
                                <th>Bank Account</th>
                                <th>Daily Salary</th>
                                <th>Monthly Salary</th>
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

    @foreach($data as $row)
        <div class="modal fade" id="tag{{ $row->employee_id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-salary/{{ $row->employment_id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Update Salary Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <p>Tag Salary</p>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Daily Salary</label>
                                        <input type="number" step='0.01' class="form-control" value="{{ $row->per_day_salary }}"  name="per_day_salary">

                                    </div>
                                    <div class="col-md-12">
                                        <label>Monthly Salary</label>
                                        <input type="number" step='0.01'  class="form-control" value="{{ $row->monthly_salary }}"  name="monthly_salary">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                            <button type="submit" class="btn btn-warning">Update Salary</button>
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
        $('.amt').inputmask('00000.00', { reverse: true });

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

        //get branch
        $("#company_id").on("change", function (e) {
            e.preventDefault();
            let company_id = $("#company_id").val();
            let branch = $("#branch").empty();
            $.ajax({
                url: '/getBranch',
                data: {'company_id': company_id, "_token": $('#token').val()},
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    $.each(response, function(i, item) {
                        console.log(item.value);
                        console.log(response.value);
                        $('<option value="' + response.value + '">' + response.name + '</option>').
                        appendTo(branch);
                    });
                },
                error: function (response) {

                }
            });

        });

        $("#branch").on("change", function (e) {
            e.preventDefault();
            let branch_id = $("#prnumber").val();
            $.ajax({
                url: '/prFetch',
                data: {'branch_id': branch_id, "_token": $('#token').val()},
                type: 'POST',

                success: function (response) {
                    console.log(response);
                },
                error: function (response) {

                }
            });
        });
    </script>

@endsection

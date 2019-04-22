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
                                Company List
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
                                    <th>Branch Name</th>
                                    <th>Branch Head</th>
                                    <th>Company</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($branch as $row)
                                    <tr>
                                        <td>{{ $row->location_name }}</td>
                                        <td>{{ $row->firstname . " " . $row->lastname  }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{!! $row->address_1 !!}</td>
                                        <td>{{ $row->city }}</td>
                                        <td>
                                            <span class="dropdown">
                                                <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                  <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{ $row->branchid }}"><i class="la la-edit"></i> Edit Details</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{ $row->branchid }}"><i class="la la-trash"></i> Delete Record</a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Branch Head</th>
                                    <th>Company</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>City</th>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="branch" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Branch Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Company</label>
                                    <select name="company_id" class="form-control" id="company" style="width: 100%">
                                        @foreach($company as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Branch Name</label>
                                    <input type="text" class="form-control" name="location_name" required >
                                </div>
                                <div class="col-md-6">
                                    <label>Branch Head</label>
                                    <select name="location_head" class="form-control" id="location_head" style="width: 100%">
                                        @foreach($employee as $row)
                                            <option value="{{ $row->id }}">{{ $row->firstname . " " .  $row->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="text" id="emailMask" class="form-control" name="email" />
                                </div>
                                <div class="col-md-6">
                                    <label>Telephone Number</label>
                                    <input type="tel" class="form-control" name="phone" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Address Line 1</label>
                                    <textarea name="address_1" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>Address Line 2</label>
                                    <textarea name="address_2" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" required />
                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Zip Code</label>
                                    <input class="form-control" type="text" name="zipcode" required />
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

    @foreach($branch as $row)
        <div class="modal fade" id="edit{{ $row->branchid }}" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="branch/{{ $row->branchid }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Company</label>
                                        <select name="company_id" class="form-control" id="company">
                                            @foreach($company as $companies)
                                                <option value="{{ $companies->id }}" {{ $companies->id == $row->company_id? "Selected": "" }}>{{ $companies->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Branch Name</label>
                                        <input type="text" class="form-control" name="location_name" value="{{ $row->location_name }}" required >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Branch Head</label>
                                        <select name="location_head" class="form-control" id="location_head">
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{ $employees->firstname . " " .  $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ $row->email }}" name="email" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Telephone Number</label>
                                        <input type="tel" class="form-control" name="phone" value="{{ $row->phone }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Address Line 1</label>
                                        <textarea name="address_1" class="form-control" rows="4">{{ $row->address_1 }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address Line 2</label>
                                        <textarea name="address_2" class="form-control" rows="4">{{ $row->address_2 }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>City</label>
                                        <input class="form-control" type="text" name="city" value="{{ $row->city }}" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label>State</label>
                                        <input class="form-control" type="text" name="state" value="{{ $row->state }}" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Zip Code</label>
                                        <input class="form-control" type="text" name="zipcode" value="{{ $row->zipcode }}" required />
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

    @foreach($branch as $row)
        <div class="modal fade" id="delete{{ $row->branchid }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="branch/{{ $row->branchid }}" method="POST" enctype="multipart/form-data">
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
        $('#company').select2();
        $("#location_head").select2();
    </script>

@endsection

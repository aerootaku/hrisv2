@extends('layout.app')@section('content')    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">        <!--Begin::Dashboard 1-->        <div class="row">            <div class="col-12">                <div class="kt-portlet kt-portlet--mobile">                    <div class="kt-portlet__head kt-portlet__head--lg">                        <div class="kt-portlet__head-label">                            <h3 class="kt-portlet__head-title">                                Employee Attendance List                            </h3>                        </div>                        {{--<div class="kt-portlet__head-toolbar">--}}                            {{--<div class="kt-portlet__head-wrapper">--}}                                {{--<div class="kt-portlet__head-actions">&nbsp;--}}                                    {{--<a  href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">--}}                                        {{--<i class="la la-plus"></i>--}}                                        {{--New Record--}}                                    {{--</a>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                    </div>                    <div class="kt-portlet__body">                        <!--begin: Search Form -->                        <!--begin: Datatable -->                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">                            <thead>                            <tr>                                <th>Image Capture</th>                                <th>Date/Time</th>                                <th>Action</th>                                <th>Employee ID</th>                                <th>Employee Name</th>                                <th>Branch</th>                            </tr>                            </thead>                            <tbody>                            @foreach($data as $row)                                <tr>                                    <td><img src="data:image/png;base64,{{chunk_split(base64_encode($row->image_blob))}}" height="100" width="100"></td>                                    <td>{{ $row->date_time }}</td>                                    <td>{{ $row->action }}</td>                                    <td>{{ $row->employee_no }}</td>                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>                                    <td>{{ $row->location_name }}</td>                                    {{--<td>--}}                                        {{--<span class="dropdown">--}}                                            {{--<a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">--}}                                              {{--<i class="la la-ellipsis-h"></i>--}}                                            {{--</a>--}}                                            {{--<div class="dropdown-menu dropdown-menu-right">--}}                                                {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>--}}                                                {{--<a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>--}}                                            {{--</div>--}}                                        {{--</span>--}}                                    {{--</td>--}}                                </tr>                            @endforeach                            </tbody>                            <tfoot>                            <tr>                                <th>Image Capture</th>                                <th>Date/Time</th>                                <th>Action</th>                                <th>Employee ID</th>                                <th>Employee Name</th>                                <th>Branch</th>                            </tr>                            </tfoot>                        </table>                        <!--end: Datatable -->                    </div>                </div>            </div>        </div>        <!--End::Dashboard 1-->    </div>@endsection@section('script')    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>    <script>    </script>@endsection
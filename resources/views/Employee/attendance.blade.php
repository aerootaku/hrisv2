@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Employee Attendance List</h3>
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
                                    <h4 class="card-title">Employee Attendance List</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Image Capture</th>
                                                <th>Date/Time</th>
                                                <th>Action</th>
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Branch</th>
                                                {{--<th width="13%">Actions</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $row)
                                                <tr>
                                                    <td><img src="data:image/png;base64,{{chunk_split(base64_encode($row->image_blob))}}" height="100" width="100"></td>
                                                    <td>{{ $row->date_time }}</td>
                                                    <td>{{ $row->action }}</td>
                                                    <td>{{ $row->employee_no }}</td>
                                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                                    <td>{{ $row->location_name }}</td>

                                                    {{--<td>--}}
                                                        {{--<div class="buttons-group">--}}
                                                            {{--<button class="btn btn-group btn-warning btn-xs" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> </button>--}}
                                                            {{--<button class="btn btn-group btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> </button>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}
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


@endsection

@section('script')
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>
    <script>

    </script>
@endsection

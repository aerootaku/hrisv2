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
                                Employee Last Login List
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">--}}
                            {{--<div class="kt-portlet__head-wrapper">--}}
                                {{--<div class="kt-portlet__head-actions">&nbsp;--}}
                                    {{--<a  href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">--}}
                                        {{--<i class="la la-plus"></i>--}}
                                        {{--New Record--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                            <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Username</th>
                                <th>Last Login</th>
                                <th>Last Logout</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->employee_no }}</td>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{$row->username}} </td>
                                    <td>{{ $row->last_login_date }}</td>
                                    <td>{{ $row->last_logout_date }}</td>
                                    <td>{{$row->employment_status}}</td>
                                    <td>{{$row->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Username</th>
                                <th>Last Login</th>
                                <th>Last Logout</th>
                                <th>Role</th>
                                <th>Status</th>
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


@endsection

@section('script')
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>
    <script>

    </script>
@endsection

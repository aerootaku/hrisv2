@extends('layout.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Award List</h3>
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
                                <h4 class="card-title">Department List</h4>

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered dataex-res-configuration">
                                        <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Award Name</th>
                                            <th>Gift</th>
                                            <th>Cash Price</th>
                                            <th>Month & Year</th>
                                            <th width="13%">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{ $row->employee_no }}</td>
                                            <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                            <td>{{ $row->award_information }}</td>
                                            <td>{{ $row->gift_item }}</td>
                                            <td>{!! $row->cash_price !!}</td>
                                            <td>{{ $row->award_month_year }}</td>
                                            <td>
                                                <div class="buttons-group">
                                                    <button class="btn btn-group btn-warning btn-xs" data-toggle="modal" data-target="#edit3"><i class="la la-edit"></i> </button>
                                                    <button class="btn btn-group btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $row->award_id }}"><i class="la la-trash"></i> </button>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="employee-award" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">New Award Record</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Employee</label>
                                <select name="employee_id" class="form-control" id="employee_id" required >
                                    @foreach($employee as $employees)
                                    <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Award Type</label>
                                <select name="award_type_id" class="form-control" id="award_type_id" required  >
                                    @foreach($award_type as $award_types)
                                    <option value="{{ $award_types->id }}">{{  $award_types->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Date</label>
                                <input type="date" class="form-control" name="created_at" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Month & Year</label>
                                <input type="text" class="form-control" name="award_month_year" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Gift</label>
                                <input type="text" class="form-control" name="gift_item" required>
                            </div>
                            <div class="col-md-6">
                                <label>Cash</label>
                                <input type="number" class="form-control" name="cash_price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Award Information</label>
                                <input type="text" class="form-control" name="award_information" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Photo</label>
                                <input type="text" class="form-control" name="award_photo" required>
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
<div class="modal fade" id="edit3" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Edit Award Record</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<label>Gift </label>--}}
                                {{--<input type="text" class="form-control"  name="gift_item" value="{{ $row->gift_item }}" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}


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



@endsection

@section('script')
<script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>
<script>
    $("#award_type_id, #employee_id").select2();
</script>


@endsection

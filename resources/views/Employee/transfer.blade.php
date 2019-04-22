@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Employee Transfer List</h3>
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
                                    <h4 class="card-title">Employee Transfer List</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Transfer Date</th>
                                                <th>Transfer to (Department)</th>
                                                <th>Transfer to (Location)</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $row)
                                                <tr>
                                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                                    <td>{{ $row->transfer_date }}</td>
                                                    <td>{{ $row->department_name }}</td>
                                                    <td>{{ $row->location_name }}</td>
                                                    <td>{!! $row->description !!}</td>
                                                    <td>{{ $row->status }}</td>
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
                <form action="employee-transfer" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Transfer Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_id"  required >
                                        @foreach($employee as $employees)
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Transfer Date</label>
                                    <input type="date" class="form-control" name="transfer_date"   required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Transfer To (Department)</label>
                                    <select name="transfer_department_id" class="form-control" id="transfer_department_id"  required  >
                                        @foreach($department as $departments)
                                            <option value="{{ $departments->id }}">{{  $departments->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Transfer To (Location)</label>
                                    <select name="transfer_branch_id" class="form-control" id="transfer_branch_id"  required  >
                                        @foreach($branch as $branchs)
                                            <option value="{{ $branchs->id }}">{{  $branchs->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" data-provide="markdown" rows="3" required></textarea>
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
                    <form action="employee-transfer/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Transfer Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Employee</label>
                                        <select name="employee_id" class="form-control" id="employee_idU"  required >
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Transfer Date</label>
                                        <input type="date" class="form-control" name="transfer_date" value="{{ $row->transfer_date }}"   required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Transfer To (Department)</label>
                                        <select name="transfer_department_id" class="form-control" id="transfer_department_idU"  required  >
                                            @foreach($department as $departments)
                                                <option value="{{ $departments->id }}"  {{ $departments->id == $row->tdId? "Selected": "" }}>{{  $departments->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Transfer To (Location)</label>
                                        <select name="transfer_branch_id" class="form-control" id="transfer_branch_idU"  required  >
                                            @foreach($branch as $branchs)
                                                <option value="{{ $branchs->id }}"  {{ $branchs->id == $row->bId? "Selected": "" }} >{{  $branchs->location_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" data-provide="markdown" rows="3" required>{{ $row->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="Pending" {{ $row->status == 'Pending'? "Selected": "" }}>Pending</option>
                                            <option value="Approved" {{ $row->status == 'Approved'? "Selected": "" }}>Approved</option>
                                            <option value="Declined" {{ $row->status == 'Declined'? "Selected": "" }}>Declined</option>
                                        </select>
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


    @foreach($data as $row)
        <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-transfer/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
        $("#transfer_department_id,#transfer_branch_id, #employee_id").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1,
        });
        $("#transfer_department_idU,#transfer_branch_id, #employee_idU").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1,
        });
    </script>
@endsection

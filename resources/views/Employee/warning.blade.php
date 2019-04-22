@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Employee Warning List</h3>
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
                                    <h4 class="card-title">Employee Warning List</h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-configuration">
                                            <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Warning Date </th>
                                                <th>Subject</th>
                                                <th>Warning Type</th>
                                                <th>Approval Status</th>
                                                <th>Warning By</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $row)
                                                <tr>
                                                    <td>{{ $row->wtofname . " " . $row->wtolname }}</td>
                                                    <td>{{ $row->warning_date }}</td>
                                                    <td>{{ $row->subject }}</td>
                                                    <td>{{ $row->warning_type }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td>{{ $row->wbyfname . " " . $row->wbylname }}</td>
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
                <form action="employee-warning" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="status" value="Pending">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Warning Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="warning_to" class="form-control" id="warning_to"  required >
                                        @foreach($employee as $employees):
                                        <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Type of Warning</label>
                                    <select name="warning_type_id" class="form-control" id="award_type_id"  required  >
                                        @foreach($warning_type as $warning_types):
                                        <option value="{{ $warning_types->id }}">{{  $warning_types->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Warning By</label>
                                    <select name="warning_by" class="form-control" id="warning_by"  required >
                                        @foreach($employee as $employees):
                                        <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Warning Date</label>
                                    <input type="date" class="form-control" name="warning_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                <label>Description</label>
                              <textarea  class="form-control" name="description" required></textarea>
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
                    <form action="employee-warning/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Employee</label>
                                        <select name="warning_to" class="form-control" id="warning_to"  required >
                                            @foreach($employee as $employees):
                                            <option value="{{ $employees->id }}" {{ $employees->id == $row->warning_to? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Type of Warning</label>
                                        <select name="warning_type_id" class="form-control" id="award_type_idU"  required  >
                                            @foreach($warning_type as $warning_types):
                                            <option value="{{ $warning_types->id }}" {{ $warning_types->id == $row->warning_type_id? "Selected": "" }}>{{  $warning_types->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{$row->subject}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Warning By</label>
                                        <select name="warning_by" class="form-control" id="warning_by"  required >
                                            @foreach($employee as $employees):
                                            <option value="{{ $employees->id }}" {{ $employees->id == $row->warning_by? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Warning Date</label>
                                        <input type="date" class="form-control" name="warning_date" value="{{$row->warning_date}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea  class="form-control" name="description" required>{{$row->description}}</textarea>
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
                    <form action="employee-warning/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
        $("#award_type_id, #warning_to,#warning_by").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });

        $("#award_type_idU, #warning_toU,#warning_byU").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@endsection

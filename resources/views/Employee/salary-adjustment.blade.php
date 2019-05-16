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
                                Employee Salary Adjustment List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a href="#" data-toggle="modal" data-target="#create"
                                       class="btn btn-brand btn-elevate btn-icon-sm">
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
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap"
                               id="customTable">
                            <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Cut Off</th>
                                <th>Salary Adjustments</th>
                                <th>Bonus</th>
                                <th>Allowance</th>
                                <th>Other Deduction</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                    <td>{{ $row->cutoff_name }}</td>
                                    <td>{{ $row->salary_adjustments }}</td>
                                    <td>{{ $row->bonus }}</td>
                                    <td>{{ $row->allowance }}</td>
                                    <td>{{ $row->other_deduc }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#"
                                               class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md"
                                               data-toggle="dropdown" aria-expanded="true">
                                              <i class="la la-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Employee</th>
                                <th>Cut Off</th>
                                <th>Salary Adjustments</th>
                                <th>Bonus</th>
                                <th>Allowance</th>
                                <th>Other Deduction</th>
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
                <form action="employee-salary-adjustment" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Salary Adjustment Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control" id="employee_id" required>
                                        @foreach($employee as $employees)
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Cutoff</label>
                                    <select name="cutoff_id" class="form-control" id="cutoff_id" required>
                                        @foreach($cutoff as $cutoffs)
                                            <option value="{{ $cutoffs->id }}">{{  $cutoffs->cutoff_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Salary Adjustment</label>
                                    <input type="number" name="salary_adjustments" class="form-control"  >
                                </div>
                                <div class="col-md-6">
                                    <label>Bonus</label>
                                    <input type="number" name="bonus" class="form-control"  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Allowance</label>
                                    <input type="number" name="allowance" class="form-control"  >
                                </div>
                                <div class="col-md-6">
                                    <label>Other Deduction</label>
                                    <input type="number" name="other_deduc" class="form-control"  >
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
                    <form action="employee-salary-adjustment/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <input type="hidden" name="id" value="{{$row->id}}" class="form-control"  >

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Employee</label>
                                        <select name="employee_id" class="form-control employee_id" required>
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cutoff</label>
                                        <select name="cutoff_id" class="form-control cutoff_id" required>
                                            @foreach($cutoff as $cutoffs)
                                                <option value="{{ $cutoffs->id }}" {{ $cutoffs->id == $row->cutoff_id? "Selected": "" }}>{{  $cutoffs->cutoff_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Salary Adjustment</label>
                                        <input type="number" name="salary_adjustments" value="{{$row->salary_adjustments}}" class="form-control"  >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Bonus</label>
                                        <input type="number" name="bonus" class="form-control" value="{{$row->bonus}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Allowance</label>
                                        <input type="number" name="allowance" class="form-control"  value="{{$row->allowance}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Other Deduction</label>
                                        <input type="number" name="other_deduc" class="form-control"  value="{{$row->other_deduc}}">
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
                    <form action="employee-salary-adjustment/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
        $("#employee_id, .employee_id,#cutoff_id,.cutoff_id").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });

        $(".award_type_id, .warning_to,.warning_by").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>

@endsection


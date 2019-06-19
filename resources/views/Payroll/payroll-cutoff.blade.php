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
                                Payroll Cut-Off List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a  href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">
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
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                            <thead>
                            <tr>
                                <th>Cut Off Name</th>
                                <th>Cut Off From </th>
                                <th>Cut Off To</th>
                                <th>Deduction</th>
                                <th>SSS,Philhealth,Pagibig</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->cutoff_name }}</td>
                                    <td>{{ $row->cutoff_from}}</td>
                                    <td>{{ $row->cutoff_to}}</td>
                                    <td>
                                        @if($row->deduction_type=='0') Zero Deduction
                                        @elseif($row->deduction_type=='2') Half Deduction
                                        @elseif($row->deduction_type=='1') Whole Deduction
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->sss_philhealth_pagibig_deduction=='1') Yes
                                        @else No
                                        @endif
                                    </td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
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
                                <th>Cut Off Name</th>
                                <th>Cut Off From </th>
                                <th>Cut Off To</th>
                                <th>SSS,Philhealth,Pagibig</th>
                                <th>Deduction</th>
                                <th>Actions</th>
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
                <form action="payroll-cutoff" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Payroll Cut Off Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Cut Off Name</label>
                                    <input type="text" class="form-control" name="cutoff_name"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Cut Off From</label>
                                    <input type="date" class="form-control" name="cutoff_from" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Cut Off To</label>
                                    <input type="date" class="form-control" name="cutoff_to" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>  SSS, Philhealth, Pagibig
                                    <input type="checkbox" name="sss_philhealth_pagibig_deduction" value="1"  class="form-control">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Tax Deduction</label>
                                    <select name="deduction_type" class="form-control">
                                        <option value="0" >Zero</option>
                                        <option value="2" >Half</option>
                                        <option value="1">Whole</option>
                                    </select>
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
                    <form action="payroll-cutoff/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <input type="hidden" class="form-control" name="id"  value="{{ $row->id }}"  required>
                                    <div class="col-md-12">
                                        <label>Cut Off Name</label>
                                        <input type="text" class="form-control" name="cutoff_name"  value="{{ $row->cutoff_name }}"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cut Off From</label>
                                        <input type="date" class="form-control" name="cutoff_from"  value="{{ $row->cutoff_from }}"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cut Off To</label>
                                        <input type="date" class="form-control" name="cutoff_to"  value="{{ $row->cutoff_to }}"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>  SSS, Philhealth, Pagibig
                                            <input type="checkbox" name="sss_philhealth_pagibig_deduction"  value="1" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tax Deduction</label>
                                        <select name="deduction_type" class="form-control">
                                            <option value="0" {{ $row->deduction_type == 0? "Selected": "" }}>Zero</option>
                                            <option value="1"  {{ $row->deduction_type == 1? "Selected": "" }}>Whole</option>
                                            <option value="2" {{ $row->deduction_type == 2? "Selected": "" }}>Half</option>
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
                    <form action="payroll-cutoff/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

    </script>

@endsection


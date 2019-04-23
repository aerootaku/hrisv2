@extends('layout.app')@section('content')    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">        <!--Begin::Dashboard 1-->        <div class="row">            <div class="col-12">                <div class="kt-portlet kt-portlet--mobile">                    <div class="kt-portlet__head kt-portlet__head--lg">                        <div class="kt-portlet__head-label">                            <h3 class="kt-portlet__head-title">                                SSS Tax List                            </h3>                        </div>                        <div class="kt-portlet__head-toolbar">                            <div class="kt-portlet__head-wrapper">                                <div class="kt-portlet__head-actions">&nbsp;                                    <a  href="#" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">                                        <i class="la la-plus"></i>                                        New Record                                    </a>                                </div>                            </div>                        </div>                    </div>                    <div class="kt-portlet__body">                        <!--begin: Search Form -->                        <!--begin: Datatable -->                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">                            <thead>                            <tr>                                <th>Minimum</th>                                <th>Maximum</th>                                <th>Monthly Salary Creadit</th>                                <th>EE_Share</th>                                <th>ER_Share</th>                                <th>Total Share</th>                                <th>Actions</th>                            </tr>                            </thead>                            <tbody>                            @foreach($data as $row)                                <tr>                                    <td>{{ $row->range_from }}</td>                                    <td>{{ $row->range_to}}</td>                                    <td>{{ $row->monthly_salary_credit}}</td>                                    <td>{{ $row->ee_share}}</td>                                    <td>{{ $row->er_share}}</td>                                    <td>{{ $row->total_share }}</td>                                    <td>                                        <span class="dropdown">                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">                                              <i class="la la-ellipsis-h"></i>                                            </a>                                            <div class="dropdown-menu dropdown-menu-right">                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Edit" data-target="#edit{{ $row->id }}"><i class="la la-edit"></i> Edit Details</a>                                                <a class="dropdown-item" href="#" data-toggle="modal" data-title="Delete" data-target="#delete{{ $row->id }}"><i class="la la-trash"></i> Delete Record</a>                                            </div>                                        </span>                                    </td>                                </tr>                            @endforeach                            </tbody>                            <tfoot>                            <tr>                                <th>Minimum</th>                                <th>Maximum</th>                                <th>Monthly Salary Creadit</th>                                <th>EE_Share</th>                                <th>ER_Share</th>                                <th>Total Share</th>                                <th>Actions</th>                            </tr>                            </tfoot>                        </table>                        <!--end: Datatable -->                    </div>                </div>            </div>        </div>        <!--End::Dashboard 1-->    </div>    <div class="modal fade" id="create" role="dialog">        <div class="modal-dialog modal-md" role="document">            <div class="modal-content">                <form action="tax-sss" method="POST" enctype="multipart/form-data">                    <div class="modal-header">                        <h4 class="title" id="defaultModalLabel">New SSS Tax Record</h4>                    </div>                    <div class="modal-body">                        @csrf                        <div class="col-md-12">                            <div class="form-group row">                                <div class="col-md-12">                                    <label>Minimum Compensatory</label>                                    <input type="number" class="form-control" name="range_from"  required>                                </div>                            </div>                            <div class="form-group row">                                <div class="col-md-12">                                    <label>Maximum Compensatory</label>                                    <input type="number" class="form-control" name="range_to" required>                                </div>                            </div>                            <div class="form-group row">                                <div class="col-md-12">                                    <label>EE Share </label>                                    <input type="number" class="form-control" name="ee_share"   required>                                </div>                            </div>                            <div class="form-group row">                                <div class="col-md-12">                                    <label>ER Share </label>                                    <input type="number" class="form-control" name="er_share"   required>                                </div>                            </div>                            <div class="form-group row">                                <div class="col-md-12">                                    <label>Total Share </label>                                    <input type="number" class="form-control" name="total_share"   required>                                </div>                            </div>                        </div>                    </div>                    <div class="modal-footer">                        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>                        <button type="submit" class="btn btn-info">Save Record</button>                    </div>                </form>            </div>        </div>    </div>    @foreach($data as $row)        <div class="modal fade" id="edit{{ $row->id }}" role="dialog">            <div class="modal-dialog modal-md" role="document">                <div class="modal-content">                    <form action="tax-sss/{{ $row->id }}" method="POST" enctype="multipart/form-data">                        <div class="modal-header">                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>                        </div>                        <div class="modal-body">                            @csrf                            @method('PATCH')                            <div class="col-md-12">                                    <div class="form-group row">                                        <div class="col-md-12">                                            <label>Minimum Compensatory</label>                                            <input type="number" class="form-control" name="range_from" value="{{ $row->range_from }}" required>                                        </div>                                    </div>                                    <div class="form-group row">                                        <div class="col-md-12">                                            <label>Maximum Compensatory</label>                                            <input type="number" class="form-control" name="range_to"  value="{{ $row->range_to }}" required>                                        </div>                                    </div>                                    <div class="form-group row">                                        <div class="col-md-12">                                            <label>EE Share </label>                                            <input type="number" class="form-control" name="ee_share"  value="{{ $row->ee_share }}" required>                                        </div>                                    </div>                                    <div class="form-group row">                                        <div class="col-md-12">                                            <label>ER Share </label>                                            <input type="number" class="form-control" name="er_share"  value="{{ $row->er_share }}" required>                                        </div>                                    </div>                                    <div class="form-group row">                                        <div class="col-md-12">                                            <label>Total Share </label>                                            <input type="number" class="form-control" name="total_share"    value="{{ $row->total_share }}" required>                                        </div>                                    </div>                            </div>                        </div>                        <div class="modal-footer">                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>                            <button type="submit" class="btn btn-info">Update Record</button>                        </div>                    </form>                </div>            </div>        </div>@endforeach    @foreach($data as $row)        <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog">            <div class="modal-dialog modal-sm" role="document">                <div class="modal-content">                    <form action="tax-sss/{{ $row->id }}" method="POST" enctype="multipart/form-data">                        <div class="modal-header">                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>                        </div>                        <div class="modal-body">                            @csrf                            @method('DELETE')                            <p>Are you sure you want to delete this record?</p>                        </div>                        <div class="modal-footer">                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>                            <button type="submit" class="btn btn-warning">Delete Record</button>                        </div>                    </form>                </div>            </div>        </div>    @endforeach@endsection@section('script')    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>    <script>    </script>@endsection
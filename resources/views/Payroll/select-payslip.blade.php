@extends('layout.app')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->
        {{--<div class="row">--}}
        {{--<div class="col-12">--}}
        {{--<div class="kt-portlet kt-portlet--mobile">--}}
        {{--<div class="kt-portlet__head kt-portlet__head--lg">--}}
        {{--<div class="kt-portlet__head-label">--}}
        {{--<h3 class="kt-portlet__head-title">--}}
        {{--Payslip Input--}}
        {{--</h3>--}}
        {{--</div>--}}
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
        {{--</div>--}}
        {{--<div class="kt-portlet__body">--}}
        {{--<!--begin: Search Form -->--}}
        {{--<form action="savePayslipInput" method="POST">--}}
        {{--@csrf--}}
        {{--<div class="col-md-12">--}}
        {{--<div class="form-group row">--}}
        {{--<div class="col-md-6">--}}
        {{--<label>Select Employee</label>--}}
        {{--<select name="employee_id" class="form-control" id="employee_id_input"  required >--}}
        {{--@foreach($employee as $employees)--}}
        {{--<option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
        {{--<label>Cut off</label>--}}
        {{--<select name="cutoff_id" class="form-control" id="cutoff_id_input"  required >--}}
        {{--@foreach($cutoff as $cut)--}}
        {{--<option value="{{ $cut->id }}">{{  $cut->cutoff_from . " " . $cut->cutoff_to }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--</div>--}}


        {{--<div class="form-group row">--}}
        {{--<div class="col-md-3">--}}
        {{--<label>Salary</label>--}}
        {{--<input type="number" name="salary_adjustments" class="form-control"  >--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<label>Bonus</label>--}}
        {{--<input type="number" name="bonus" class="form-control"  >--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<label>Allowance</label>--}}
        {{--<input type="number" name="allowance" class="form-control"  >--}}
        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<label>Other Deduction</label>--}}
        {{--<input type="number" name="other_deduc" class="form-control"  >--}}
        {{--</div>--}}
        {{--</div>--}}


        {{--<div class="form-group row">--}}
        {{--<div class="col-md-12">--}}
        {{--<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm">Save Payslip</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Generate Payslip
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
                        <form action="generateNewPayslip" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Select Employee</label>
                                        <select name="employee_id" class="form-control" id="employee_id"  required >
                                            @foreach($employee as $employees)
                                                <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cut off</label>
                                        <select name="cutoff_id" class="form-control" id="cutoff_id"  required >
                                            @foreach($cutoff as $cut)
                                                <option value="{{ $cut->id }}">{{  $cut->cutoff_name . " ". $cut->cutoff_from . " " . $cut->cutoff_to }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-brand btn-elevate btn-icon-sm">Check payslip</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
        $("#cutoff_id, #employee_id,#cutoff_id_input, #employee_id_input").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@endsection

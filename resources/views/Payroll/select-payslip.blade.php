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
                        <form action="generatePayslip" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Select Employee</label>
                                        <select name="employee_id" class="form-control" id="employee_id"  required >
                                            @foreach($employee as $employees):
                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cut off</label>
                                        <select name="cut_off_id" class="form-control" id="cut_off_id"  required >
                                            @foreach($cutoff as $cut):
                                            <option value="{{ $cut->id }}">{{  $cut->cutoff_name . " " .$cut->cutoff_from . " " . $cut->cutoff_to }}</option>
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
        $("#cut_off_id, #employee_id").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@endsection

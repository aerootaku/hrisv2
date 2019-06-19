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
                                Generate Payroll
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
                        <form action="/generatePayroll" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Select Company</label>
                                        <select name="company_id" class="form-control" id="company_id"  required >
                                            @foreach($company as $companys)
                                                <option value="{{ $companys->id }}">{{  $companys->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Cut off</label>
                                        <select name="cutoff_id" class="form-control" id="cutoff_id"  required >
                                            @foreach($cutoff as $cut)
                                                <option value="{{ $cut->id }}">{{  $cut->cutoff_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-brand btn-elevate btn-icon-sm">Generate Payroll</button>
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
@stop

@section('script')
    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>
    <script>
        $("#company_id, #cutoff_id").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });
    </script>
@stop


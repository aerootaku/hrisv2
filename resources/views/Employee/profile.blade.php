@extends('layout.app')

@section('style')
    <style>


        .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: white;
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card .card-heading {
            padding: 0 20px;
            margin: 0;
        }

        .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #ffffff;
            border-bottom: 1px solid #ffffff;
        }

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #ffffff;
        }

        .card .card-body {
            padding: 0 20px;
            margin-top: 20px;
        }

        .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #ffffff;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .card.people:first-child {
            margin-left: 0;
        }

        .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .card.people .card-top.green {
            background-color: #53a93f;
        }

        .card.people .card-top.blue {
            background-color: #427fed;
        }

        .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: white;
            text-overflow: ellipsis;
        }

        .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: white;
        }

        .card.hovercard .cardheader {
            background: url("http://lorempixel.com/850/280/nature/4/");
            background-size: cover;
            height: 135px;
        }

        .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 3px solid rgb(255, 255, 255);
        }

        .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color:black;
            text-overflow: ellipsis;
        }

        .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }

    </style>
@endsection

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__itekt--fluid" id="kt_content">
        <!--Begin::Dashboard 1-->
        <div class="row">
            <div class="col-lg-4 col-sm-6">

                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <img alt="" src="http://lorempixel.com/100/100/people/9/">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank">{{ $personal_info->firstname . " " . $personal_info->lastname }}</a>
                        </div>
                        {{--<div class="desc">{{ $employment_info->designation_name }}</div>--}}
                    </div>
                    <div class="bottom">
                        <div class="kt-section kt-section__content">
                            <button class="btn btn-outline-warning btn-elevated">Reset Password</button>
                            <button class="btn btn-outline-danger btn-elevated">Disable Account</button>
                        </div>
                        <div class="divider"></div>
                        <div class="kt-section kt-section__content kt-separator--border-solid" style="border: 2px">
                                <h5 class="font-weight-bold">Last Login</h5>
                                <span class="text-muted">22-Apr-2019 11:56 AM from 130.105.22.31</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Employee Information
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personalInfo" role="tab" aria-selected="false">
                                        <i class="la la-user"></i>
                                        Personal Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#salary" role="tab" aria-selected="false">
                                        <i class="la la-usd"></i>
                                        Salary
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="la la-cogs"></i> More</a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(87px, 49px, 0px);">
                                        <a class="dropdown-item" data-toggle="tab" href="#contactDetails" aria-expanded="true">Contact Details</a>
                                        {{--<a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Social Media Details</a>--}}
                                        {{--<a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Emergency Contact</a>--}}
                                        {{--<a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Dependents</a>--}}
                                        <a class="dropdown-item" data-toggle="tab" href="#educationalBackground" aria-expanded="true">Educational Background</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#workExperience" aria-expanded="true">Work Experience</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#officeShift" aria-expanded="true">Office Shift</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#reportTo" aria-expanded="true">Report to</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalInfo">
                                <div class="row">
                                    <form action="/employee/{{ $personal_info->id }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-12">
                                                    <label>Employee Id</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Employeee Number"
                                                           name="employee_no"
                                                           value="{{ $personal_info->employee_no }}" readonly>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>First
                                                        Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="First Name"
                                                           name="firstname"
                                                           value="{{ $personal_info->firstname }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Last
                                                        Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Last Name"
                                                           name="lastname"
                                                           value="{{ $personal_info->lastname }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-2">
                                                    <label>Middle
                                                        Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Middle Name"
                                                           name="middlename"
                                                           value="{{ $personal_info->middlename }}">
                                                </div>
                                                <div class="form-group col-md-2 mb-2">
                                                    <label>MI</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="MI"
                                                           name="mi"
                                                           value="{{ $personal_info->mi }}">
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Suffix</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Suffix"
                                                           name="suffix"
                                                           value="{{ $personal_info->suffix }}">
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Nick
                                                        Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Nick Name"
                                                           name="nickname"
                                                           value="{{ $personal_info->nickname }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-8 mb-2">
                                                    <label>Current
                                                        Address</label>
                                                    <textarea type="text"
                                                              class="form-control"
                                                              placeholder="Current Address"
                                                              name="current_address" rows="4">{{ $personal_info->current_address }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                    <label>Current
                                                        City</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Current City"
                                                           name="current_city"
                                                           value="{{ $personal_info->current_city }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-8 mb-2">
                                                    <label>Permanent
                                                        Address</label>
                                                    <textarea type="text"
                                                              class="form-control"
                                                              placeholder="Permanent Address"
                                                              name="permanent_address" rows="4">{{ $personal_info->permanent_address }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                    <label>Permanent
                                                        city</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Permanent city"
                                                           name="permanent_city" value="{{ $personal_info->permanent_city }}">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label>Provincial
                                                        Address</label>
                                                    <textarea type="text"
                                                              class="form-control"
                                                              placeholder="Provincial Address"
                                                              name="province" rows="4">{{ $personal_info->province }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Gender</label>
                                                    <select class="form-control"
                                                            name="gender">
                                                        <option>{{ $personal_info->gender }}</option>
                                                        <option>
                                                            Male
                                                        </option>
                                                        <option>
                                                            Female
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Civil
                                                        Status</label>
                                                    <select name="civil_status" class="form-control">
                                                    @foreach($constant as $constants)
                                                        @if($constants->type == 'Civil Status')
                                                            <option value="{{ $constants->value }}" {{ $constants->value == $personal_info->civil_status? "Selected": "" }}>{{ $constants->value }}</option>
                                                        @endif;
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Nationality</label>
                                                    <select name="nationality" class="form-control">
                                                        @foreach($constant as $constants)
                                                            @if($constants->type == 'Nationality')
                                                                <option value="{{ $constants->value }}" {{ $constants->value == $personal_info->nationality? "Selected": "" }}>{{ $constants->value }}</option>
                                                            @endif;
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Religion</label>
                                                    <select name="blood_type" class="form-control">
                                                        @foreach($constant as $constants)
                                                            @if($constants->type == 'Religion')
                                                                <option value="{{ $constants->value }}" {{ $constants->value == $personal_info->religion? "Selected": "" }}>{{ $constants->value }}</option>
                                                            @endif;
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-2">
                                                    <label>Birthdate</label>
                                                    <input type="date"
                                                           class="form-control"
                                                           placeholder="Birthdate"
                                                           name="birthdate"
                                                           value="{{ $personal_info->birthdate }}">
                                                </div>
                                                <div class="form-group col-md-8 mb-2">
                                                    <label>Birthplace</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Birthplace"
                                                           name="birthplace"
                                                           value="{{ $personal_info->birthplace }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Height
                                                        (cm)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           placeholder="Height"
                                                           name="height"
                                                           value="{{ $personal_info->height }}">
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Weight
                                                        (lbs)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           placeholder="Weight"
                                                           name="weight"
                                                           value="{{ $personal_info->weight }}">
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Blood
                                                        Type</label>
                                                    <select name="blood_type" class="form-control">
                                                        @foreach($constant as $constants)
                                                            @if($constants->type == 'Blood Type')
                                                                <option value="{{ $constants->value }}" {{ $constants->value == $personal_info->blood_type? "Selected": "" }}>{{ $constants->value }}</option>
                                                            @endif;
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <label>Region</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Region"
                                                           name="region"
                                                           value="{{ $personal_info->region }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>SSS
                                                        Number</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="SSS Number"
                                                           name="sss_no" id="sssId"
                                                           value="{{ $personal_info->sss_no }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Philhealth
                                                        Number</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Philhealth Number"
                                                           name="philhealth_no" id="philhealthId"
                                                           value="{{ $personal_info->philhealth_no }}">
                                                </div>

                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Pagibig
                                                        Number</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Pagibig Number"
                                                           name="pagibig_no" id="pagibigId"
                                                           value="{{ $personal_info->pagibig_no }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>TIN
                                                        Number</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="TIN Number"
                                                           name="tin_no" id="tinId"
                                                           value="{{ $personal_info->tin_no }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Driver's License</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="Drivers License"
                                                           name="drivers_license" id="drivers_license"
                                                           value="{{ $personal_info->drivers_license }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Expiry Date
                                                        Number</label>
                                                    <input type="date"
                                                           class="form-control"
                                                           placeholder="Expiry Date"
                                                           name="license_expiry_date" id="license_expiry_date"
                                                           value="{{ $personal_info->license_expiry_date }}">
                                                </div>

                                                <div class="form-group col-md-12 mb-12">
                                                <h4><strong>Contact Information</strong></h4>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Home Telephone</label>
                                                    <input type="text" class="form-control" id="telephoneNumber" name="telephone_no">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Work Telephone</label>
                                                    <input type="text" class="form-control" id="telephoneNumberE" name="work_telephone">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobileNumber" name="mobile_no">
                                                </div>

                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Work Email</label>
                                                    <input type="email" class="form-control"  name="work_email">
                                                </div>

                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Other Email</label>
                                                    <input type="email" class="form-control"  name="email">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-block btn-elevate-air"><i class="la la-save"></i> Save All</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="salary">

                                @foreach($employee_last_cutoff_salary as $salaries)
                                    @if($no == 1)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 20%; vertical-align: middle;">Per Day</td>
                                                <td> {{number_format($salaries->per_day,2)}} </td>
                                                <td style="width: 20%; vertical-align: middle;">Per Hour</td>
                                                <td> {{number_format($salaries->per_hour,2)}} </td>
                                                {{--<td style="width: 20%; vertical-align: middle;">Per Semi-Month</td>--}}
                                                {{--<td> {{number_format(($salaries->per_month)/2,2)}} </td>--}}
                                                <td style="width: 20%; vertical-align: middle;">Per Month</td>
                                                <td> {{number_format($salaries->per_month,2)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <br/>

                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>

                                             <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Hours Work</td>
                                                    <td> {{number_format($salaries->work_hours)}} </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%; vertical-align: middle;">Days Work</td>
                                                    <td> {{number_format($salaries->work_days)}} </td>
                                                </tr>

                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Overtime Hours</td>
                                                <td> {{number_format($salaries->overtime_hours)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Undertime Hours</td>
                                                <td> {{number_format($salaries->undertime_hours)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Absences</td>
                                                <td> {{number_format($salaries->absences)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>

                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Basic Pay</td>
                                                <td> {{number_format($salaries->basic_pay,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Overtime Pay</td>
                                                <td> {{number_format($salaries->overtime_pay,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Holiday Pay</td>
                                                <td> {{number_format($salaries->holiday_pay,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;">Allowance</td>
                                                <td> {{number_format($salaries->allowance,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">GROSS PAY</td>
                                                <td> {{number_format($salaries->gross_pay,2)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td style="width: 40%; vertical-align: middle;">Undertime Deduction</td>
                                            <td> {{number_format($salaries->undertime_deduc,2)}} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%; vertical-align: middle;">Absences Deduction</td>
                                            <td> {{number_format($salaries->absences_deduc,2)}} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%; vertical-align: middle;">SSS Cont.</td>
                                            <td> {{number_format($salaries->sss_cont,2)}} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%; vertical-align: middle;">Pag-ibig Cont.</td>
                                            <td> {{number_format($salaries->pagibig_cont,2)}} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%; vertical-align: middle;">Philhealth Cont.</td>
                                            <td> {{number_format($salaries->philhealth_cont,2)}} </td>
                                        </tr>

                                        {{--@foreach($loan as $row)--}}
                                            {{--<tr>--}}
                                                {{--<td style="width: 40%; vertical-align: middle;">{{$row->loan_type}} Loan</td>--}}
                                                {{--<td>  @if($row->balance > $row->payable)--}}
                                                        {{--@if($row->payment_term=='Monthly')--}}
                                                            {{--{{$row->payable/2}}--}}
                                                        {{--@else--}}
                                                            {{--{{$row->payable}}--}}
                                                        {{--@endif--}}
                                                    {{--@else--}}
                                                        {{--{{$row->balance}}--}}
                                                    {{--@endif--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach  --}}
                                        </tbody>
                                    </table>
                                </div>

                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">TAXABLE</td>
                                                <td> {{number_format($salaries->taxable_income,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">OVERALL DEDUCTIONS</td>
                                                <td> {{number_format($salaries->overall_deduc,2)}} </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; vertical-align: middle;color:red;font-weight:bold;">NET PAY</td>
                                                <td> {{number_format($salaries->net_pay,2)}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                      {{$no++}}
                                    @endif
                                @endforeach



                            </div>
                            <div class="tab-pane" id="workExperience">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                            <div class="kt-portlet__head-toolbar">
                                                <div class="kt-portlet__head-wrapper">
                                                    <div class="kt-portlet__head-actions float-right">
                                                        <a href="#" data-target="#createWork" data-toggle="modal" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                                                            <i class="la la-plus"></i>
                                                            New Record
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                                                <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th>Post</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_work_experience as $works)
                                                    <tr>
                                                        <td>{{ $works->company_name }}</td>
                                                        <td>{{ $works->from_date }}</td>
                                                        <td>{{ $works->to_date }}</td>
                                                        <td>{{ $works->post}}</td>
                                                        <td>{{ $works->description }}</td>
                                                        <td>
                                                        <span class="dropdown">
                                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                              <i class="la la-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editWork{{ $works->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteWork{{ $works->id }}"><i class="la la-trash"></i> Delete Record</a>
                                                            </div>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th>Post</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!--end: Datatable -->
                                        </div>
                                        <div class="modal fade" id="createWork" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-work-experience" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">New Record</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="employee_id" value="{{ $personal_info->id }}" />
                                                                <div class="form-group">
                                                                    <label>Company Name</label>
                                                                    <input type="text" name="company_name" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date Start</label>
                                                                    <input type="date" name="from_date" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date End</label>
                                                                    <input type="date" name="to_date" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Post</label>
                                                                    <input type="text" name="post" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea type="text" class="form-control" name="description" data-provide="markdown" rows="3"  required></textarea>
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
                                        @foreach($employee_work_experience as $row)
                                            <div class="modal fade" id="editWork{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-work-experience/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Company Name</label>
                                                                        <input type="text" name="company_name" class="form-control" value="{{$row->company_name}}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date Start</label>
                                                                        <input type="date" name="from_date" class="form-control" value="{{$row->from_date}}"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date End</label>
                                                                        <input type="date" name="to_date" class="form-control" value="{{$row->to_date}}"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Post</label>
                                                                        <input type="text" name="post" class="form-control" value="{{$row->post}}"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea type="text" class="form-control" name="description" data-provide="markdown" rows="3"  required>{{$row->description}}</textarea>

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
                                        @foreach($employee_work_experience as $row)
                                            <div class="modal fade" id="deleteWork{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-work-experience/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="officeShift">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                            <div class="kt-portlet__head-toolbar">
                                                <div class="kt-portlet__head-wrapper">
                                                    <div class="kt-portlet__head-actions float-right">
                                                        <a href="#" data-target="#createShift" data-toggle="modal" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                                                            <i class="la la-plus"></i>
                                                            New Record
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                                                <thead>
                                                <tr>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th>Shift Name</th>
                                                    <th>Primary</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_shift as $shift)
                                                    <tr>
                                                        <td>{{ $shift->from_date }}</td>
                                                        <td>{{ $shift->to_date }}</td>
                                                        <td>{{ $shift->shift_name }}</td>
                                                        <td>
                                                            @if($shift->is_primary == '1')
                                                              Primary
                                                            @endif
                                                            @if($shift->is_primary == '0')
                                                             Secondary
                                                            @endif
                                                        </td>
                                                        {{--<td>{{ $shift->monday_in_time }}</td>--}}
                                                        {{--<td>{{ $shift->monday_out_time }}</td>--}}
                                                        {{--<td>{{ $shift->tuesday_in_time }}</td>--}}
                                                        {{--<td>{{ $shift->tuesday_out_time }}</td>--}}
                                                        <td>
                                                        <span class="dropdown">
                                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                              <i class="la la-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editShift{{ $shift->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteShift{{ $shift->id }}"><i class="la la-trash"></i> Delete Record</a>
                                                            </div>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th>Shift Name</th>
                                                    <th>Primary</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!--end: Datatable -->
                                        </div>
                                    </div>

                                    <div class="modal fade" id="createShift" role="dialog">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <form action="/employee-shift" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h4 class="title" id="defaultModalLabel">New Record</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="employee_id" value="{{ $personal_info->id }}" />

                                                            <div class="form-group">
                                                                <label>Shift Name</label>
                                                                <select name="shift_id" class="form-control" id="shift_id"  required  >
                                                                    @foreach($office_shift as $row)
                                                                        <option value="{{ $row->id }}">{{  $row->shift_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-6">
                                                                    <label>Date From</label>
                                                                    <input type="date" class="form-control" name="from_date" />
                                                                </div>
                                                                <div class="col-6">
                                                                    <label>Date To</label>
                                                                    <input type="date" class="form-control" name="to_date" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-12">
                                                                    <label>Primary</label>
                                                                    <select name="is_primary" class="form-control">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
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



                                    @foreach($employee_shift as $row)
                                        <div class="modal fade" id="editShift{{ $row->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-shift/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Shift Name</label>
                                                                    <select name="shift_id" class="form-control" id="shift_id"  required  >
                                                                        @foreach($office_shift as $shifts)
                                                                            <option value="{{ $shifts->id }}" {{ $shifts->id == $row->shift_id? "Selected": "" }}>{{  $shifts->shift_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <label>Date From</label>
                                                                        <input type="date" class="form-control" name="from_date" value="{{$row->from_date}}" />
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label>Date To</label>
                                                                        <input type="date" class="form-control" name="to_date" value="{{$row->to_date}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <label>Primary</label>
                                                                        <select name="is_primary" class="form-control">
                                                                            <option value="0" {{ $row->is_primary == 0? "Selected": "" }}>No</option>
                                                                            <option value="1"  {{ $row->is_primary == 1? "Selected": "" }}>Yes</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                                                                <button type="submit" class="btn btn-info">Update Record</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($employee_shift as $row)
                                        <div class="modal fade" id="deleteShift{{ $row->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-shift/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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

                                </div>
                            </div>
                            <div class="tab-pane" id="reportTo">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                            <div class="kt-portlet__head-toolbar">
                                                <div class="kt-portlet__head-wrapper">
                                                    <div class="kt-portlet__head-actions float-right">
                                                        <a href="#" data-target="#createReportTo" data-toggle="modal" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                                                            <i class="la la-plus"></i>
                                                            New Record
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Reporting Method</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_groups as $group)
                                                    <tr>
                                                        <td>{{ $group->firstname.''.$group->lastname }}</td>
                                                        <td>{{ $group->report_method }}</td>
                                                        <td>
                                                        <span class="dropdown">
                                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                              <i class="la la-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editReportTo{{ $group->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteReportTo{{ $group->id }}"><i class="la la-trash"></i> Delete Record</a>
                                                            </div>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Reporting Method</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!--end: Datatable -->
                                        </div>
                                        <div class="modal fade" id="createReportTo" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-groups" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">New Record</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="employee_id" value="{{ $personal_info->id }}" />
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <select name="report_to" class="form-control" id="report_to"  required >
                                                                        @foreach($employee as $employees)
                                                                            <option value="{{ $employees->id }}">{{  $employees->firstname . " " . $employees->lastname }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Report Method</label>
                                                                    <select name="report_method" class="form-control" required>
                                                                        <option value="Direct">Direct</option>
                                                                        <option value="Indirect">Indirect</option>
                                                                    </select>
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
                                        @foreach($employee_groups as $row)
                                            <div class="modal fade" id="editReportTo{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-groups/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <select name="report_to" class="form-control report_to"  required >
                                                                            @foreach($employee as $employees)
                                                                                <option value="{{ $employees->id }}" {{ $employees->id == $row->employee_id? "Selected": "" }}>{{  $employees->firstname . " " . $employees->lastname }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Report Method</label>
                                                                        <select name="report_method" class="form-control" required>
                                                                            <option value="Direct" {{ $row->report_method == 'Direct'? "Selected": "" }}>Direct</option>
                                                                            <option value="Indirect" {{ $row->report_method == 'Indirect'? "Selected": "" }}>Indirect</option>
                                                                        </select>
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
                                        @foreach($employee_groups as $row)
                                            <div class="modal fade" id="deleteReportTo{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-groups/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contactDetails">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                            <div class="kt-portlet__head-toolbar">
                                                <div class="kt-portlet__head-wrapper">
                                                    <div class="kt-portlet__head-actions float-right">
                                                        <a href="#" data-target="#createContacts" data-toggle="modal" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                                                            <i class="la la-plus"></i>
                                                            New Record
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                                                <thead>
                                                <tr>
                                                    <th>Relationship</th>
                                                    <th>Contact Name</th>
                                                    <th>Telephone Number</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email Address</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_contacts as $contacts)
                                                    <tr>
                                                        <td>{{ $contacts->relation }}</td>
                                                        <td>{{ $contacts->contact_name }}</td>
                                                        <td>{{ $contacts->home_phone }}</td>
                                                        <td>{{ $contacts->mobile_phone }}</td>
                                                        <td>{{ $contacts->personal_email }}</td>
                                                        <td>
                                                        <span class="dropdown">
                                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                              <i class="la la-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editContacts{{ $contacts->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteContacts{{ $contacts->id }}"><i class="la la-trash"></i> Delete Record</a>
                                                            </div>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Relationship</th>
                                                    <th>Contact Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email Address</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!--end: Datatable -->
                                        </div>
                                        <div class="modal fade" id="createContacts" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-contacts" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">New Record</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="employee_id" value="{{ $personal_info->id }}" />
                                                                <div class="form-group">
                                                                    <label>Relationship</label>
                                                                    <input type="text" name="relation" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Contact Name</label>
                                                                    <input type="text" name="contact_name" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Mobile Number</label>
                                                                    <input type="text" name="mobile_phone" id="mobileNumber" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Personal Email</label>
                                                                    <input type="email" name="personal_email" class="form-control" />
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
                                        @foreach($employee_contacts as $row)
                                            <div class="modal fade" id="editContacts{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-contacts/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Relationship</label>
                                                                        <input type="text" name="relation" class="form-control" value="{{ $row->relation }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Contact Name</label>
                                                                        <input type="text" name="contact_name" class="form-control" value="{{ $row->contact_name }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Mobile Number</label>
                                                                        <input type="text" name="mobile_phone" class="form-control" value="{{ $row->mobile_phone }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Personal Email</label>
                                                                        <input type="email" name="personal_email" class="form-control" value="{{ $row->personal_email }}" />
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
                                        @foreach($employee_contacts as $row)
                                            <div class="modal fade" id="deleteContacts{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-contacts/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="educationalBackground">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                            <div class="kt-portlet__head-toolbar">
                                                <div class="kt-portlet__head-wrapper">
                                                    <div class="kt-portlet__head-actions float-right">
                                                        <a href="#" data-target="#createEducation" data-toggle="modal" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                                                            <i class="la la-plus"></i>
                                                            New Record
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="customTable">
                                                <thead>
                                                <tr>
                                                    <th>Education Level</th>
                                                    <th>School</th>
                                                    <th>Attended From</th>
                                                    <th>Attended Until</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_educations as $education)
                                                    <tr>
                                                        <td>{{ $education->value }}</td>
                                                        <td>{{ $education->school }}</td>
                                                        <td>{{ $education->attended_from }}</td>
                                                        <td>{{ $education->attended_until }}</td>
                                                        <td>
                                                        <span class="dropdown">
                                                            <a href="#" class="btn btn-sm btn btn-info btn-elevate btn-elevate-air btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                              <i class="la la-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editContacts{{ $contacts->id }}"><i class="la la-edit"></i> Edit Details</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteContacts{{ $contacts->id }}"><i class="la la-trash"></i> Delete Record</a>
                                                            </div>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Relationship</th>
                                                    <th>Contact Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email Address</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!--end: Datatable -->
                                        </div>
                                        <div class="modal fade" id="createEducation" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <form action="/employee-education" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">New Record</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="employee_id" value="{{ $personal_info->id }}" />
                                                                <div class="form-group">
                                                                    <label>Education Level</label>
                                                                    <select name="education_level" class="form-control">
                                                                        @foreach($education_constants as $education_constant)
                                                                            <option value="{{ $education_constant->id }}">{{ $education_constant->value }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>School</label>
                                                                    <input type="text" class="form-control" name="school" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea name="description" class="form-control"></textarea>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <label>From</label>
                                                                        <input type="date" class="form-control" name="attended_from" />
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label>to</label>
                                                                        <input type="date" class="form-control" name="attended_until" />
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
                                        @foreach($employee_educations as $row)
                                            <div class="modal fade" id="editEducation{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-education/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Education Level</label>
                                                                        <select name="education_level" class="form-control">
                                                                            @foreach($education_constants as $education_constant)
                                                                                <option value="{{ $education_constant->id }}"{{ $row->education_level == $education_constant->id? "Selected": "" }}>{{ $education_constant->value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>School</label>
                                                                        <input type="text" class="form-control" name="school" value="{{ $row->school }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="description" class="form-control">{{ $row->description }}</textarea>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <label>From</label>
                                                                            <input type="date" class="form-control" name="attended_from" value="{{ $row->attended_from}}" />
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label>to</label>
                                                                            <input type="date" class="form-control" name="attended_until" value="{{ $row->attended_until }}" />
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                                                                <button type="submit" class="btn btn-info">Update Record</button>
                                                            </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($employee_educations as $row)
                                            <div class="modal fade" id="deleteEducation{{ $row->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="/employee-education/{{ $row->id }}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                </div>
                            </div>

                        </div>
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
        $("#shift_id,#report_to,.report_to").select2({
            width:"100%",
            placeholder: "Select",
            maximumSelectionSize: 1
        });



    </script>
@endsection

@extends('layout.app')

@section('style')
    <style>


        .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: rgba(214, 224, 226, 0.2);
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
            color: #d8d8d8;
            border-bottom: 1px solid #e5e5e5;
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
            color: #999999;
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
            color: #999;
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
            color: #737373;
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
            background-color: rgba(214, 224, 226, 0.2);
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
            border: 5px solid rgba(255,255,255,0.5);
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
            color: #737373;
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
                        <div class="desc">{{ $employment_info->designation_name }}</div>
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
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Contact Details</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Social Media Details</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Emergency Contact</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_2" aria-expanded="true">Dependents</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_3" aria-expanded="true">Educational Background</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_3" aria-expanded="true">Work Experience</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_3" aria-expanded="true">Office Shift</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_portlet_tab_2_1" aria-expanded="true">Report to</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalInfo">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
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
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="civil Status"
                                                       name="civil_status"
                                                       value="{{ $personal_info->civil_status }}">
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <label>Nationality</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="nationality"
                                                       name="nationality"
                                                       value="{{ $personal_info->nationality }}">
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
                                                <input type="text"
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
                                                       name="sss_no"
                                                       value="{{ $personal_info->sss_no }}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label>Philhealth
                                                    Number</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="Philhealth Number"
                                                       name="philhealth_no"
                                                       value="{{ $personal_info->philhealth_no }}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label>Pagibig
                                                    Number</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="Pagibig Number"
                                                       name="pagibig_no"
                                                       value="{{ $personal_info->pagibig_no }}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label>TIN
                                                    Number</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="TIN Number"
                                                       name="tin_no"
                                                       value="{{ $personal_info->tin_no }}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="salary">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                            </div>
                            <div class="tab-pane" id="kt_portlet_tab_2_3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
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

@endsection

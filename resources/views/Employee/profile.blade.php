@extends('layout.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-with-cover">
                                <div class="card-img-top img-fluid bg-cover height-300"
                                     style="background: url('{{ asset('app-assets') }}/images/carousel/22.jpg') 50%;"></div>
                                <div class="media profil-cover-details w-100">
                                    <div class="media-left pl-2 pt-2">
                                        <a href="#" class="profile-image">
                                            <img src="{{ asset('app-assets') }}/images/portrait/small/avatar-s-8.png"
                                                 class="rounded-circle img-border height-100" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="media-body pt-3 px-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="card-title">
                                                    @foreach($data_employee as $row)
                                                        {{$row->firstname . " " . $row->lastname}}
                                                    @endforeach
                                                </h3>
                                            </div>
                                            <div class="col text-right">
                                                <button type="button" class="btn btn-primary d-"><i
                                                            class="la la-cloud-upload"></i> Upload
                                                </button>
                                                <div class="btn-group d-none d-md-block float-right ml-2" role="group"
                                                     aria-label="Basic example">
                                                    <button type="button" class="btn btn-success"><i
                                                                class="la la-bell-o"></i> Notification
                                                    </button>
                                                    <button type="button" class="btn btn-success"><i
                                                                class="la la-cog"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav class="navbar navbar-light navbar-profile align-self-end">
                                    <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse"
                                            aria-expanded="false" aria-label="Toggle navigation"></button>
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="nav nav-tabs ">

                                                <li class="nav-item">
                                                    <a class="nav-link active" id="base-tabGeneralInfo"
                                                       data-toggle="tab" aria-controls="tabGeneralInfo"
                                                       href="#tabGeneralInfo" aria-expanded="true"><i
                                                                class="la la-user"></i> General Info.
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabEmpInfo" data-toggle="tab"
                                                       aria-controls="tabEmpInfo" href="#tabEmpInfo"
                                                       aria-expanded="false"><i class="la la-briefcase"></i> Employee
                                                        Info.</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabSalary" data-toggle="tab"
                                                       aria-controls="tabSalary" href="#tabSalary"
                                                       aria-expanded="false"><i class="la la-money"></i> Salary</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabAllowance" data-toggle="tab"
                                                       aria-controls="tabAllowance" href="#tabAllowance"
                                                       aria-expanded="false"><i class="la la-check-square"></i>
                                                        Allowance & Benefits</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabLeaves" data-toggle="tab"
                                                       aria-controls="tabLeaves" href="#tabLeaves"
                                                       aria-expanded="false"><i class="la la-calendar"></i> Leaves</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabDocument" data-toggle="tab"
                                                       aria-controls="tabDocumnet" href="#tabDocument"
                                                       aria-expanded="false"><i class="la la-file-text"></i>
                                                        Document</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabRulesPolicy" data-toggle="tab"
                                                       aria-controls="tabRulesPolicy" href="#tabRulesPolicy"
                                                       aria-expanded="false"><i class="la la-balance-scale"></i> Rules &
                                                        Policy</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tabAnnouncement" data-toggle="tab"
                                                       aria-controls="tabAnnouncement" href="#tabAnnouncement"
                                                       aria-expanded="false"><i class="la la-bullhorn"></i> Announcement</a>
                                                </li>


                                            </ul>
                                        </div>
                                    </nav>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tabGeneralInfo"
                                                 aria-expanded="true" aria-labelledby="base-tabGeneralInfo">
                                                <div class="nav-vertical">
                                                    <div class="card-header">

                                                        <a class="heading-elements-toggle"><i
                                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                                        <div class="heading-elements">
                                                            <ul class="list-inline mb-0">
                                                                <li>
                                                                    <a data-action="collapse"><i
                                                                                class="ft-minus"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a data-action="reload"><i class="ft-rotate-cw"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a data-action="expand"><i
                                                                                class="ft-maximize"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="row match-height">
                                                        <div class="col-md-12">
                                                            <div class="card" style="height:100%;">

                                                                <div class="card-content">
                                                                    <div class="card-body ">


                                                                        <ul class="nav nav-tabs  nav-justified">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active show"
                                                                                   id="baseVerticalLeft-tabBasicInfo"
                                                                                   data-toggle="tab"
                                                                                   aria-controls="tabVerticalBasicInfo"
                                                                                   href="#tabVerticalLeftBasicInfo"
                                                                                   aria-expanded="true"><i
                                                                                            class="ft-user"></i>
                                                                                    Basic Information</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link "
                                                                                   id="baseVerticalLeft-tabEmergencyContact"
                                                                                   data-toggle="tab"
                                                                                   aria-controls="tabVerticalLeftEmergencyContact"
                                                                                   href="#tabVerticalLeftEmergencyContact"
                                                                                   aria-expanded="false"><i
                                                                                            class="ft-mail"></i>
                                                                                    Contact</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                   id="baseVerticalLeft-tabSocialNetworking"
                                                                                   data-toggle="tab"
                                                                                   aria-controls="tabVerticalLeftSocialNetworking"
                                                                                   href="#tabVerticalLeftSocialNetworking"
                                                                                   aria-expanded="false"><i
                                                                                            class="la la-send-o"></i>
                                                                                    Social Networking</a>

                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                   id="baseVerticalLeft-tabEducation"
                                                                                   data-toggle="tab"
                                                                                   aria-controls="tabVerticalLeftEducation"
                                                                                   href="#tabVerticalLeftEducation"
                                                                                   aria-expanded="false"><i
                                                                                            class="la la-send-o"></i>
                                                                                    Education</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                   id="baseVerticalLeft-tabWorkExperience"
                                                                                   data-toggle="tab"
                                                                                   aria-controls="tabVerticalLeftWorkExperience"
                                                                                   href="#tabVerticalLeftWorkExperience"
                                                                                   aria-expanded="false"><i
                                                                                            class="la la-send-o"></i>
                                                                                    Work Experience</a>
                                                                            </li>
                                                                        </ul>


                                                                        <div class="tab-content px-1">
                                                                            <div role="tabpanel"
                                                                                 class="tab-pane  active show"
                                                                                 id="tabVerticalLeftBasicInfo"
                                                                                 aria-expanded="true"
                                                                                 aria-labelledby="baseVerticalLeft-tabBasicInfo">
                                                                                <div class="col-md-12">
                                                                                    <div class="card"
                                                                                         style="height: 100%">


                                                                                        <form action="/employee/{{ $employee_id }}"
                                                                                              method="POST"
                                                                                              enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            @method('PATCH')
                                                                                            @foreach($data_employee as $row)
                                                                                                <div class="card-content collpase show">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-body">
                                                                                                            <div class="row">
                                                                                                                <div class="form-group col-md-6 mb-2">
                                                                                                                    <label>First
                                                                                                                        Name</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="First Name"
                                                                                                                           name="firstname"
                                                                                                                           value="{{ $row->firstname }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6 mb-2">
                                                                                                                    <label>Last
                                                                                                                        Name</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Last Name"
                                                                                                                           name="lastname"
                                                                                                                           value="{{ $row->lastname }}">
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
                                                                                                                           value="{{ $row->middlename }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-2 mb-2">
                                                                                                                    <label>MI</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="MI"
                                                                                                                           name="mi"
                                                                                                                           value="{{ $row->mi }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Suffix</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Suffix"
                                                                                                                           name="suffix"
                                                                                                                           value="{{ $row->suffix }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Nick
                                                                                                                        Name</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Nick Name"
                                                                                                                           name="nickname"
                                                                                                                           value="{{ $row->nickname }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="form-group col-md-8 mb-2">
                                                                                                                    <label>Current
                                                                                                                        Address</label>
                                                                                                                    <textarea type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Current Address"
                                                                                                                           name="current_address" rows="4">{{ $row->current_address }}</textarea>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-4 mb-2">
                                                                                                                    <label>Current
                                                                                                                        City</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Current City"
                                                                                                                           name="current_city"
                                                                                                                           value="{{ $row->current_city }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="form-group col-md-8 mb-2">
                                                                                                                    <label>Permanent
                                                                                                                        Address</label>
                                                                                                                    <textarea type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Permanent Address"
                                                                                                                           name="permanent_address" rows="4">{{ $row->permanent_address }}</textarea>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-4 mb-2">
                                                                                                                    <label>Permanent
                                                                                                                        city</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Permanent city"
                                                                                                                           name="permanent_city" value="{{ $row->permanent_city }}">

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="form-group col-md-12 mb-2">
                                                                                                                    <label>Provincial
                                                                                                                        Address</label>
                                                                                                                    <textarea type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Provincial Address"
                                                                                                                           name="province" rows="4">{{ $row->province }}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Gender</label>
                                                                                                                    <select class="form-control"
                                                                                                                            name="gender">
                                                                                                                        <option>{{ $row->gender }}</option>
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
                                                                                                                           value="{{ $row->civil_status }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Nationality</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="nationality"
                                                                                                                           name="nationality"
                                                                                                                           value="{{ $row->nationality }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Religion</label>
                                                                                                                    <select name="blood_type" class="form-control">
                                                                                                                        @foreach($constant as $constants)
                                                                                                                        @if($constants->type == 'Religion')
                                                                                                                        <option value="{{ $constants->value }}" {{ $constants->value == $row->religion? "Selected": "" }}>{{ $constants->value }}</option>
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
                                                                                                                           value="{{ $row->birthdate }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-8 mb-2">
                                                                                                                    <label>Birthplace</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Birthplace"
                                                                                                                           name="birthplace"
                                                                                                                           value="{{ $row->birthplace }}">
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
                                                                                                                           value="{{ $row->height }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Weight
                                                                                                                        (lbs)</label>
                                                                                                                    <input type="number"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Weight"
                                                                                                                           name="weight"
                                                                                                                           value="{{ $row->weight }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3 mb-2">
                                                                                                                    <label>Blood
                                                                                                                        Type</label>
                                                                                                                    <select name="blood_type" class="form-control">
                                                                                                                        @foreach($constant as $constants)
                                                                                                                            @if($constants->type == 'Blood Type')
                                                                                                                                <option value="{{ $constants->value }}" {{ $constants->value == $row->blood_type? "Selected": "" }}>{{ $constants->value }}</option>
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
                                                                                                                           value="{{ $row->region }}">
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
                                                                                                                           value="{{ $row->sss_no }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6 mb-2">
                                                                                                                    <label>Philhealth
                                                                                                                        Number</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Philhealth Number"
                                                                                                                           name="philhealth_no"
                                                                                                                           value="{{ $row->philhealth_no }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6 mb-2">
                                                                                                                    <label>Pagibig
                                                                                                                        Number</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="Pagibig Number"
                                                                                                                           name="pagibig_no"
                                                                                                                           value="{{ $row->pagibig_no }}">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6 mb-2">
                                                                                                                    <label>TIN
                                                                                                                        Number</label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="TIN Number"
                                                                                                                           name="tin_no"
                                                                                                                           value="{{ $row->tin_no }}">
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div align="right">
                                                                                                                <button type="submit"
                                                                                                                        class="btn btn-primary btn-block">
                                                                                                                    <i class="la la-check-square-o"></i>
                                                                                                                    Update
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            @endforeach
                                                                                        </form>

                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="tab-pane"
                                                                                 id="tabVerticalLeftEmergencyContact"
                                                                                 aria-labelledby="baseVerticalLeft-tabEmergencyContact">
                                                                                <div class="card"
                                                                                     style="height: 1148.5px;">

                                                                                    <form action="/employee/{{ $employee_id }}"
                                                                                          method="POST"
                                                                                          enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        @foreach($data_employee as $row)
                                                                                            <div class="card-content collpase show">
                                                                                                <div class="card-body">
                                                                                                    <div class="form-body">
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-12 mb-2">
                                                                                                                <label>E-mail</label>
                                                                                                                <input type="email"
                                                                                                                       id="projectinput3"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="E-mail"
                                                                                                                       name="email"
                                                                                                                       value="{{ $row->email }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Mobile
                                                                                                                    Number</label>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Mobile Number"
                                                                                                                       name="mobile_no"
                                                                                                                       value="{{ $row->mobile_no }}">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Telephone
                                                                                                                    Number</label>
                                                                                                                <input type="tel"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Mobile Number"
                                                                                                                       name="telephone_no"
                                                                                                                       value="{{ $row->telephone_no }}">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Fax
                                                                                                                    Number</label>
                                                                                                                <input type="tel"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Fax Number"
                                                                                                                       name="fax_no"
                                                                                                                       value="{{ $row->fax_no }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div align="right">
                                                                                                        <button type="submit"
                                                                                                                class="btn btn-primary btn-block">
                                                                                                            <i class="la la-check-square-o"></i>
                                                                                                            Update
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </form>


                                                                                </div>


                                                                            </div>
                                                                            <div class="tab-pane"
                                                                                 id="tabVerticalLeftSocialNetworking"
                                                                                 aria-labelledby="baseVerticalLeft-tabSocialNetworking">


                                                                                @foreach($data_employee as $row)
                                                                                    <div class="card-content collpase show">
                                                                                        <div class="card-body">
                                                                                            <div class="form-body">
                                                                                                <div class="row">
                                                                                                    <div class="form-group col-md-6 mb-2">
                                                                                                        <label>Facebook
                                                                                                            Profile</label>
                                                                                                        <input type="email"
                                                                                                               id="projectinput3"
                                                                                                               class="form-control"
                                                                                                               placeholder="E-mail"
                                                                                                               name="email"
                                                                                                               value="{{ $row->email }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach


                                                                            </div>
                                                                            <div class="tab-pane"
                                                                                 id="tabVerticalLeftEducation"
                                                                                 aria-labelledby="baseVerticalLeft-tabEducation">

                                                                                <div class="content-body">
                                                                                    <section id="configuration">
                                                                                        <div class="row">
                                                                                            <div class="menu pmd-floating-action"
                                                                                                 role="navigation">
                                                                                                <a href="#"
                                                                                                   data-toggle="modal"
                                                                                                   data-target="#createEducation"
                                                                                                   class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success"
                                                                                                   data-title="Create">
                                                                                                    <span class="pmd-floating-hidden">Primary</span>
                                                                                                    <i class="la la-plus-circle"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-header">

                                                                                                    </div>
                                                                                                    <div class="card-content collapse show">
                                                                                                        <div class="card-body card-dashboard">
                                                                                                            <table class="table table-striped table-bordered dataex-res-configuration" width="100%">
                                                                                                                <thead>
                                                                                                                <tr>
                                                                                                                    <th>
                                                                                                                        Education Level
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                        School
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                        Attended
                                                                                                                        From
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                        Attended
                                                                                                                        Until
                                                                                                                    </th>
                                                                                                                    <th width="13%">
                                                                                                                        Actions
                                                                                                                    </th>
                                                                                                                </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                @foreach($data_education as $row)
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                            @foreach($education_level as $education_levels)
                                                                                                                                {{ $education_levels->id == $row->education_level? $education_levels->value: "" }}
                                                                                                                            @endforeach
                                                                                                                        </td>
                                                                                                                        <td>{{ $row->school }}</td>
                                                                                                                        <td>{{ $row->attended_from }}</td>
                                                                                                                        <td>{{ $row->attended_until }}</td>
                                                                                                                        <td>
                                                                                                                            <div class="buttons-group">
                                                                                                                                <button class="btn btn-group btn-warning btn-xs"
                                                                                                                                        data-toggle="modal"
                                                                                                                                        data-target="#editEducation{{ $row->id }}">
                                                                                                                                    <i class="la la-edit"></i>
                                                                                                                                </button>
                                                                                                                                <button class="btn btn-group btn-danger btn-xs"
                                                                                                                                        data-toggle="modal"
                                                                                                                                        data-target="#deleteEducation{{ $row->id }}">
                                                                                                                                    <i class="la la-trash"></i>
                                                                                                                                </button>
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
                                                                                </div>

                                                                            </div>
                                                                            <div class="tab-pane"
                                                                                 id="tabVerticalLeftWorkExperience"
                                                                                 aria-labelledby="baseVerticalLeft-tabWorkExperience">

                                                                                <section id="configuration">
                                                                                    <div class="row">
                                                                                        <div class="menu pmd-floating-action"
                                                                                             role="navigation">
                                                                                            <a href="#"
                                                                                               data-toggle="modal"
                                                                                               data-target="#createWorkExperience"
                                                                                               class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success"
                                                                                               data-title="Create">
                                                                                                <span class="pmd-floating-hidden">Primary</span>
                                                                                                <i class="la la-plus-circle"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="card">
                                                                                                <div class="card-header">

                                                                                                </div>
                                                                                                <div class="card-content collapse show">
                                                                                                    <div class="card-body card-dashboard">
                                                                                                        <table class="table table-striped table-bordered dataex-res-configuration" style="width: 100%">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    Company Name
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    From
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    To
                                                                                                                </th>
                                                                                                                {{--<th>--}}
                                                                                                                   {{--Post--}}
                                                                                                                {{--</th>--}}
                                                                                                                <th>
                                                                                                                    Description
                                                                                                                </th>
                                                                                                                <th width="13%">
                                                                                                                    Actions
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                            @foreach($data_work_experience as $row)
                                                                                                                <tr>
                                                                                                                    <td>{{ $row->company_name }}</td>
                                                                                                                    <td>{{ $row->from_date }}</td>
                                                                                                                    <td>{{ $row->to_date }}</td>
                                                                                                                    {{--<td>{{ $row->post }}</td>--}}
                                                                                                                    <td>{{ $row->description }}</td>
                                                                                                                    <td>
                                                                                                                        <div class="buttons-group">
                                                                                                                            <button class="btn btn-group btn-warning btn-xs"
                                                                                                                                    data-toggle="modal"
                                                                                                                                    data-target="#editWorkExperience{{ $row->id }}">
                                                                                                                                <i class="la la-edit"></i>
                                                                                                                            </button>
                                                                                                                            <button class="btn btn-group btn-danger btn-xs"
                                                                                                                                    data-toggle="modal"
                                                                                                                                    data-target="#deleteWorkExperience{{ $row->id }}">
                                                                                                                                <i class="la la-trash"></i>
                                                                                                                            </button>
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

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tabEmpInfo" aria-labelledby="base-tabEmpInfo">
                                                <div class="card-header">
                                                    <h4 class="card-title"
                                                        id="from-actions-bottom-right">
                                                        Employment Information</h4>
                                                    <a class="heading-elements-toggle"><i
                                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li>
                                                                <a data-action="collapse"><i
                                                                            class="ft-minus"></i></a>
                                                            </li>
                                                            <li>
                                                                <a data-action="reload"><i
                                                                            class="ft-rotate-cw"></i></a>
                                                            </li>
                                                            <li>
                                                                <a data-action="expand"><i
                                                                            class="ft-maximize"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row match-height">
                                                    <div class="col-md-12">
                                                        <div class="card" style="height:100%;">

                                                            <div class="card-content">
                                                                <div class="card-body ">


                                                                    <ul class="nav nav-tabs  nav-justified">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active show"
                                                                               id="baseVerticalLeft-tabBasicInfo"
                                                                               data-toggle="tab"
                                                                               aria-controls="tabVerticalBasicInfo"
                                                                               href="#tabVerticalLeftBasicInfo"
                                                                               aria-expanded="true"><i
                                                                                    class="ft-user"></i>
                                                                                Employment Information</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link "
                                                                               id="baseVerticalLeft-tabEmergencyContact"
                                                                               data-toggle="tab"
                                                                               aria-controls="tabVerticalLeftEmergencyContact"
                                                                               href="#tabVerticalLeftEmergencyContact"
                                                                               aria-expanded="false"><i
                                                                                    class="ft-clock"></i>
                                                                                Schedule</a>
                                                                        </li>
                                                                    </ul>


                                                                    <div class="tab-content px-1">
                                                                        <div role="tabpanel"
                                                                             class="tab-pane  active show"
                                                                             id="tabVerticalLeftBasicInfo"
                                                                             aria-expanded="true"
                                                                             aria-labelledby="baseVerticalLeft-tabBasicInfo">
                                                                            <div class="col-md-12">
                                                                                <div class="card"
                                                                                     style="height: 100%">


                                                                                        @foreach($data_employment as $row)
                                                                                        <form action="/employee-employment/{{ $row->employment_id }}"
                                                                                              method="POST"
                                                                                              enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            @method('PATCH')
                                                                                            <div class="card-content collpase show">
                                                                                                <div class="card-body">
                                                                                                    <div class="form-body">
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Date Hired</label>
                                                                                                                <input type="date"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="First Name"
                                                                                                                       name="date_hired"
                                                                                                                       value="{{ $row->date_hired }}" {{ $property }}>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Date Resign</label>
                                                                                                                <input type="date"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Last Name"
                                                                                                                       name="date_resign"
                                                                                                                       value="{{ $row->date_resign }}" {{ $property }}>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Contract Start</label>
                                                                                                                <input type="date"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Middle Name"
                                                                                                                       name="contract_start"
                                                                                                                       value="{{ $row->contract_start }}" {{ $property }}>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6 mb-2">
                                                                                                                <label>Contract End</label>
                                                                                                                <input type="date"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="Contract End"
                                                                                                                       name="contract_end"
                                                                                                                       value="{{ $row->contract_end }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Branch</label>
                                                                                                                <select name="branch" class="form-control">
                                                                                                                    @foreach($branch as $branchs)
                                                                                                                        <option value="{{ $branchs->id }}" {{ $branchs->id == $row->branch_id? "Selected": "" }}>{{ $branchs->location_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Department</label>
                                                                                                                <select name="department" class="form-control">
                                                                                                                    @foreach($department as $departments)
                                                                                                                    <option value="{{ $departments->id }}" {{ $departments->id == $row->department_id? "Selected": "" }}>{{ $departments->department_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Designation</label>
                                                                                                                <select name="designation" class="form-control" >
                                                                                                                    @foreach($designation as $designations)
                                                                                                                    <option value="{{ $designations->id }}" {{ $designations->id == $row->designation_id? "Selected": "" }}>{{ $designations->designation_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Employment Status</label>
                                                                                                                <select name="employment_status" class="form-control">
                                                                                                                    @foreach($constant as $constants)
                                                                                                                        @if ($constants->type == 'Employment Status')
                                                                                                                            <option value="{{ $constants->id }}" {{ $constants->id == $row->employment_status? "Selected": "" }}>{{ $constants->value }}</option>
                                                                                                                        @endif
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Employment Type</label>
                                                                                                                <select name="employee_type" class="form-control">
                                                                                                                    @foreach($constant as $constants)
                                                                                                                        @if ($constants->type == 'Employment Type')
                                                                                                                            <option value="{{ $constants->id }}" {{ $constants->id == $row->employee_type? "Selected": "" }}>{{ $constants->value }}</option>
                                                                                                                        @endif
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 mb-2">
                                                                                                                <label>Rate</label>
                                                                                                                <select name="rate_id" class="form-control">
                                                                                                                    @foreach($rate as $rates)
                                                                                                                        <option value="{{ $rates->id }}  {{ $rates->id == $row->rate_id? "Selected": "" }}">{{ $rates->rate_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div align="right">
                                                                                                            <button type="submit"
                                                                                                                    class="btn btn-primary btn-block">
                                                                                                                <i class="la la-check-square-o"></i>
                                                                                                                Update Employment Information
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                        @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div role="tabpanel"
                                                                             class="tab-pane"
                                                                             id="tabVerticalLeftEmergencyContact"
                                                                             aria-expanded="true"
                                                                             aria-labelledby="baseVerticalLeft-tabBasicInfo">
                                                                            <div class="col-md-12">
                                                                                <div class="card"
                                                                                     style="height: 100%">
                                                                                    @foreach($data_employment as $row)
                                                                                        <form action="/employee-employment/{{ $row->employment_id }}"
                                                                                              method="POST"
                                                                                              enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            @method('PATCH')
                                                                                            <div class="card-content collpase show">
                                                                                                <div class="card-body">

                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabSalary" aria-labelledby="base-tabSalary">
                                                This module is underdevelopments

                                            </div>
                                            <div class="tab-pane" id="tabAllowance" aria-labelledby="base-tabAllowance">
                                                This module is underdevelopments
                                            </div>
                                            <div class="tab-pane" id="tabLeaves" aria-labelledby="base-tabLeaves">
                                                <h1>Employee Leave</h1>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <button data-target="#createLeave" data-toggle="modal" type="button" class="btn btn-info">Leave Form</button>
                                                                <table class="table table-striped table-bordered dataex-res-configuration" style="width: 100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Employee Name</th>
                                                                        <th>Leave Type</th>
                                                                        <th>Request Duration</th>
                                                                        <th>Applied On</th>
                                                                        <th>Reason</th>
                                                                        <th>Status</th>
                                                                        <th width="13%">Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($data_leave as $row)
                                                                        <tr>
                                                                            <td>{{ $row->firstname . " " . $row->lastname }}</td>
                                                                            <td>{{ $row->leave_type }}</td>
                                                                            <td>{{ $row->from_date . " " . $row->to_date }}</td>
                                                                            <td>{{ $row->created_at }}</td>
                                                                            <td>{{ $row->reason }}</td>
                                                                            <td>{{ $row->status }}</td>
                                                                            <td>
                                                                                <div class="buttons-group">
                                                                                    <button class="btn btn-group btn-warning btn-xs"
                                                                                            data-toggle="modal" data-target="#edit{{ $row->id }}"><i
                                                                                            class="la la-edit"></i></button>
                                                                                    @if($row->status != 'Approved')
                                                                                        <button class="btn btn-group btn-danger btn-xs"
                                                                                                data-toggle="modal" data-target="#delete{{ $row->id }}">
                                                                                            <i class="la la-trash"></i></button>
                                                                                    @endif
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

                                            <div class="tab-pane" id="tabDocument" aria-labelledby="base-tabDocument">
                                                <h1>Document</h1>
                                                <div class="menu pmd-floating-action" role="navigation">
                                                    <a href="#" data-toggle="modal" data-target="#createDocument"
                                                       class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-success"
                                                       data-title="Create">
                                                        <span class="pmd-floating-hidden">Primary</span>
                                                        <i class="la la-plus-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <table class="table table-striped table-bordered dataex-res-configuration" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Document Type</th>
                                                                        <th>Title</th>
                                                                        <th>Notification Email</th>
                                                                        <th>Date of Expiry</th>
                                                                        <th width="13%">Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($data_document as $row)
                                                                        <tr>
                                                                            <td>{{ $row->document_type }}</td>
                                                                            <td>{{ $row->title }}</td>
                                                                            <td>{{ $row->notification_email }}</td>
                                                                            <td>{{ $row->date_of_expiry }}</td>
                                                                            <td>
                                                                                <div class="buttons-group">
                                                                                    <button class="btn btn-group btn-warning btn-xs"
                                                                                            data-toggle="modal"
                                                                                            data-target="#editDocument{{ $row->id }}">
                                                                                        <i class="la la-edit"></i>
                                                                                    </button>
                                                                                    <button class="btn btn-group btn-danger btn-xs"
                                                                                            data-toggle="modal"
                                                                                            data-target="#deleteDocument{{ $row->id }}">
                                                                                        <i class="la la-trash"></i>
                                                                                    </button>
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
                                            <div class="tab-pane" id="tabRulesPolicy"
                                                 aria-labelledby="base-tabRulesPolicy">
                                                <div class="card collapse-icon accordion-icon-rotate">
                                                    <div id="headingCollapse41" class="card-header bg-success">
                                                        <a data-toggle="collapse" href="#collapse41"
                                                           aria-expanded="false" aria-controls="collapse41"
                                                           class="card-title lead white collapsed">Collapsible Group
                                                            Item #1</a>
                                                    </div>
                                                    <div id="collapse41" role="tabpanel"
                                                         aria-labelledby="headingCollapse41"
                                                         class="border-success card-collapse collapse"
                                                         aria-expanded="true" style="">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Input Text Here . . . . .
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="headingCollapse42" class="card-header bg-danger">
                                                        <a data-toggle="collapse" href="#collapse42"
                                                           aria-expanded="false" aria-controls="collapse42"
                                                           class="card-title lead white collapsed">Collapsible Group
                                                            Item #2</a>
                                                    </div>
                                                    <div id="collapse42" role="tabpanel"
                                                         aria-labelledby="headingCollapse42"
                                                         class="border-danger card-collapse collapse"
                                                         aria-expanded="false" style="">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Input Text Here . . . . .
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="headingCollapse43" class="card-header bg-info">
                                                        <a data-toggle="collapse" href="#collapse43"
                                                           aria-expanded="false" aria-controls="collapse43"
                                                           class="card-title lead white collapsed">Collapsible Group
                                                            Item #3</a>
                                                    </div>
                                                    <div id="collapse43" role="tabpanel"
                                                         aria-labelledby="headingCollapse43"
                                                         class="border-info card-collapse collapse"
                                                         aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Input Text Here . . . . .
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="headingCollapse44" class="card-header bg-warning">
                                                        <a data-toggle="collapse" href="#collapse44"
                                                           aria-expanded="false" aria-controls="collapse44"
                                                           class="card-title lead white collapsed">Collapsible Group
                                                            Item #4</a>
                                                    </div>
                                                    <div id="collapse44" role="tabpanel"
                                                         aria-labelledby="headingCollapse44"
                                                         class="border-warning card-collapse collapse"
                                                         aria-expanded="false" style="height: 0px;">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Input Text Here . . . . .
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabAnnouncement"
                                                 aria-labelledby="base-tabAnnouncement">
                                                ann
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Leave -->
    <div class="modal fade" id="createLeave" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="employee-document" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $employee_id }}" name="employee_id">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Document Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Leave Application
                                </div>

                                <div class="card-body">
                                    <form action="employee-leave" method="POST">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Leave Type</label>
                                                <select name="leave_type_id" class="form-control" id="leave_type_id" required>
                                                    @foreach($leave_type as $leave_types)
                                                        <option value="{{ $leave_types->id }}">{{  $leave_types->type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control" name="from_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>End Date</label>
                                                <input type="date" class="form-control" name="to_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Reason</label>
                                                <textarea class="form-control" name="reason" rows="4" required></textarea>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                        </button>
                        <button type="submit" class="btn btn-info">Apply for Leave</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($data_document as $row)
        <div class="modal fade" id="editDocument{{ $row->id }}" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="employee-document/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Document Type</label>
                                        <select name="document_type_id" class="form-control"
                                                id="document_type_id" required>
                                            @foreach($document_type as $document_types)
                                                <option value="{{ $document_types->id }}" {{ $document_types->id == $row->document_type_id? "Selected": "" }}>{{  $document_types->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Document Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $row->title }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description"
                                               value="{{ $row->description }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Send notification email when expired?</label>
                                        <select class="form-control" name="is_alert" required>
                                            <option>{{ $row->is_alert }}</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Date of Expiry</label>
                                        <input type="date" class="form-control" name="date_of_expiry"
                                               value="{{ $row->date_of_expiry }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Notification Email</label>
                                        <input type="email" class="form-control" name="notification_email"
                                               value="{{ $row->notification_email }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Document File</label>
                                        <input type="file" class="form-control" name="document_file"
                                               value="{{ $row->document_file }}" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-info">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteDocument{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-document/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <p>Are you sure you want to delete this record?</p>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-warning">Delete Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

{{--EMPLOYEE DOCUMENT ================================--}}
    <div class="modal fade" id="createDocument" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="employee-document" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $employee_id }}" name="employee_id">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Document Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Document Type</label>
                                    <select name="document_type_id" class="form-control"
                                            id="document_type_id" required>
                                        @foreach($document_type as $document_types)
                                            <option value="{{ $document_types->id }}">{{  $document_types->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Document Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Send notification email when expired?</label>
                                    <select class="form-control" name="is_alert" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Date of Expiry</label>
                                    <input type="date" class="form-control" name="date_of_expiry" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Notification Email</label>
                                    <input type="email" class="form-control" name="notification_email"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Document File</label>
                                    <input type="file" class="form-control" name="document_file" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                        </button>
                        <button type="submit" class="btn btn-info">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($data_document as $row)
        <div class="modal fade" id="editDocument{{ $row->id }}" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="employee-document/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Document Type</label>
                                        <select name="document_type_id" class="form-control"
                                                id="document_type_id" required>
                                            @foreach($document_type as $document_types)
                                                <option value="{{ $document_types->id }}" {{ $document_types->id == $row->document_type_id? "Selected": "" }}>{{  $document_types->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Document Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $row->title }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description"
                                               value="{{ $row->description }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Send notification email when expired?</label>
                                        <select class="form-control" name="is_alert" required>
                                            <option>{{ $row->is_alert }}</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Date of Expiry</label>
                                        <input type="date" class="form-control" name="date_of_expiry"
                                               value="{{ $row->date_of_expiry }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Notification Email</label>
                                        <input type="email" class="form-control" name="notification_email"
                                               value="{{ $row->notification_email }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Document File</label>
                                        <input type="file" class="form-control" name="document_file"
                                               value="{{ $row->document_file }}" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-info">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteDocument{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="employee-document/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <p>Are you sure you want to delete this record?</p>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-warning">Delete Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
{{--EMPLOYEE EDUCATION ==================================--}}
    <div class="modal fade" id="createEducation" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="/employee-education" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $employee_id }}" name="employee_id">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Education Record</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>School/University</label>
                                    <input type="text" class="form-control" name="school" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Education Level</label>
                                    <select name="education_level" class="form-control" id="education_level" required>
                                        @foreach($education_level as $education_levels)
                                        <option value="{{ $education_levels->id }}">{{  $education_levels->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Attended From</label>
                                    <input type="date" class="form-control" name="attended_from" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Attended Until</label>
                                    <input type="date" class="form-control" name="attended_until" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3" required> </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                        </button>
                        <button type="submit" class="btn btn-info">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($data_education as $row)
        <div class="modal fade" id="editEducation{{ $row->id }}" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form action="/employee-education/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Edit Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-12">

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>School/University</label>
                                        <input type="text" class="form-control" name="school" value="{{ $row->school }}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Education Level</label>
                                        <select name="education_level" class="form-control" id="education_level"
                                                required>
                                            @foreach($education_level as $education_levels)
                                            <option value="{{ $education_levels->id }}" {{ $education_levels->id == $row->education_level? "Selected": "" }}>{{  $education_levels->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Attended From</label>
                                        <input type="date" class="form-control" name="attended_from"
                                               value="{{ $row->attended_from }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Attended Until</label>
                                        <input type="date" class="form-control" name="attended_until"
                                               value="{{ $row->attended_until }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  required>{{ $row->description }} </textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-info">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteEducation{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="/employee-education/{{ $row->id }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <p>Are you sure you want to delete this record?</p>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel
                            </button>
                            <button type="submit" class="btn btn-warning">Delete Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
{{--EMPLOYEE WORK EXPERIENCE ================================================================--}}
    <div class="modal fade" id="createWorkExperience" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="/employee-work-experience" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $employee_id }}" name="employee_id">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">New Work Experience</h4>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Date From</label>
                                    <input type="date" class="form-control" name="from_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Date To</label>
                                    <input type="date" class="form-control" name="to_date" required>
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<label>Post</label>--}}
                                    {{--<textarea rows="3" class="form-control" name="post" required></textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Job Description</label>
                                    <textarea rows="3" class="form-control" name="description" required></textarea>
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


    @foreach($data_work_experience as $row)
    <div class="modal fade" id="editWorkExperience{{ $row->id }}" role="dialog">
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
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name"  value="{{ $row->company_name }}"   required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Date From</label>
                                    <input type="date" class="form-control" name="from_date" value="{{ $row->from_date }}"  required>
                                </div>
                                <div class="col-md-6">
                                    <label>Date To</label>
                                    <input type="date" class="form-control" name="to_date" value="{{ $row->to_date }}"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Post</label>
                                    <textarea rows="3" class="form-control" name="post" required> value="{{ $row->post }}" </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea rows="3" class="form-control" name="description" required> {{ $row->description }} </textarea>
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

    <div class="modal fade" id="deleteWorkExperience{{ $row->id }}" tabindex="-1" role="dialog">
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


@endsection


@section('script')
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables-extensions/datatable-responsive.min.js"></script>
    <script>
        $("#education_level, #employee_id").select2({
            width: "100%",
            placeholder: "Select",
            maximumSelectionSize: 1,
        });
    </script>
@endsection

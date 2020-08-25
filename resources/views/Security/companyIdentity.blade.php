@extends('layouts.default')

@section('title', 'Dashboard V2')
@push('css')
    <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="styl


@endpush
    @section('content')
            <!-- begin breadcrumb -->
            <ol class=" breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Company Identity</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Company Identity <small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Company Details </h4>
                </div>

                <form class="form-horizontal" method="POST" action="{{ route('add_contacts') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4><i class="icon fa fa-ban"></i> Invalid Input Data!</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-sm-2 control-label">Company Name</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                           value="{{ ($companyDetails) ? $companyDetails->company_name : '' }}"
                                           placeholder=Company Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('full_company_name') ? ' has-error' : '' }}">
                            <label for="full_company_name" class="col-sm-2 control-label">Full Company Name</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="full_company_name"
                                           name="full_company_name"
                                           value="{{ ($companyDetails) ? $companyDetails->full_company_name : '' }}"
                                           placeholder="Full Company Name">
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('header_name_bold') || $errors->has('header_name_regular') ? ' has-error' : '' }}">
                            <label for="header_name_bold" class="col-sm-2 control-label">Name On Header (Bold) <a
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="This is the name that is used by the system's layout header. The first box contains the part of the name to be displayed in bold and the second box will contain the part to be displayed in regular"><i
                                            class="fa fa-info-circle"></i></a></label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="header_name_bold"
                                           name="header_name_bold"
                                           value="{{ ($companyDetails) ? $companyDetails->header_name_bold : '' }}"
                                           placeholder="Bold part of the name"
                                           onkeyup="companyNamePreview($('#header_name_bold'), $('#hnb_preview'))">
                                </div>
                            </div>

                            <label for="header_name_regular" class="col-sm-2 control-label">Name On Header
                                (Regular)</label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="header_name_regular"
                                           name="header_name_regular"
                                           value="{{ ($companyDetails) ? $companyDetails->header_name_regular : '' }}"
                                           placeholder="Regular part of the name"
                                           onkeyup="companyNamePreview($('#header_name_regular'), $('#hnr_preview'))">
                                </div>
                            </div>

                            <div class="col-sm-5 control-label">
                                <!-- Logo -->
                                <a class="lead logo">
                                    <!-- logo for regular state and mobile devices -->
                                    <span class="logo-lg"><b id="hnb_preview"></b> <span id="hnr_preview"></span></span>
                                </a>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('header_acronym_bold') || $errors->has('header_acronym_regular') ? ' has-error' : '' }}">
                            <label for="header_acronym_bold" class="col-sm-2 control-label">Acronym On Header (Bold) <a
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="This is the name that is used by the system's layout header when the sidebar is collapsed. The first box contains the part of the acronym to be displayed in bold and the second box will contain the part to be displayed in regular"><i
                                            class="fa fa-info-circle"></i></a></label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="header_acronym_bold"
                                           name="header_acronym_bold"
                                           value="{{ ($companyDetails) ? $companyDetails->header_acronym_bold : '' }}"
                                           placeholder="Bold part of the acronym"
                                           onkeyup="companyNamePreview($('#header_acronym_bold'), $('#hab_preview'))">
                                </div>
                            </div>

                            <label for="header_acronym_regular" class="col-sm-2 control-label"> Acronym On Header
                                (Regular)</label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="header_acronym_regular"
                                           name="header_acronym_regular"
                                           value="{{ ($companyDetails) ? $companyDetails->header_acronym_regular : '' }}"
                                           placeholder="Regular part of the acronym"
                                           onkeyup="companyNamePreview($('#header_acronym_regular'), $('#har_preview'))">
                                </div>
                            </div>

                            <div class="col-sm-5 control-label">
                                <!-- Logo -->
                                <a class="lead logo">
                                    <!-- logo for regular state and mobile devices -->
                                    <span class="logo-lg"><b id="hab_preview"></b><span id="har_preview"></span></span>
                                </a>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company_logo') ? ' has-error' : '' }}">
                            <label for="company_logo" class="col-sm-2 control-label">Company Logo</label>

                            @if( $companyDetails && !empty($companyDetails->company_logo_url) )
                                <div class="col-sm-5" style="margin-bottom: 10px;">
                                    <img src="{{ $companyDetails->company_logo_url }}"
                                         class="img-responsive img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            <div class="file-field" {{ ($companyDetails && !empty($companyDetails->company_logo_url)) ? 'col-sm-5' : 'col-sm-10' }}">
                            <div class="btn btn-outline-success btn-rounded waves-effect btn-sm float-left">
                                <span>Choose file</span>
                                <input type="file" id="company_logo" name="company_logo"
                                       class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'
                                       data-show-upload="false">
                            </div>
                        </div>
                            <br><br><br>
                        <div class="form-group{{ $errors->has('sys_theme_color') ? ' has-error' : '' }}">
                            <label for="sys_theme_color" class="col-sm-2 control-label">System Theme Color</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="form-control selectpicker" style="width: 100%;"
                                            data-live-search="true" data-style="btn-inverse">
                                        <option selected="selected" value="">*** Select a Theme ***</option>
                                        <option value="blue" {{ ($companyDetails && 'blue' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Blue
                                        </option>
                                        <option value="black" {{ ($companyDetails && 'black' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Black
                                        </option>
                                        <option value="purple" {{ ($companyDetails && 'purple' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Purple
                                        </option>
                                        <option value="green" {{ ($companyDetails && 'green' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Green
                                        </option>
                                        <option value="red" {{ ($companyDetails && 'red' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Red
                                        </option>
                                        <option value="yellow" {{ ($companyDetails && 'yellow' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Yellow
                                        </option>
                                        <option value="blue-light" {{ ($companyDetails && 'blue-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Blue Light
                                        </option>
                                        <option value="black-light" {{ ($companyDetails && 'black-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Black Light
                                        </option>
                                        <option value="purple-light" {{ ($companyDetails && 'purple-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Purple Light
                                        </option>
                                        <option value="green-light" {{ ($companyDetails && 'green-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Green Light
                                        </option>
                                        <option value="red-light" {{ ($companyDetails && 'red-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Red Light
                                        </option>
                                        <option value="yellow-light" {{ ($companyDetails && 'yellow-light' == $companyDetails->sys_theme_color) ? ' selected' : '' }}>
                                            Yellow Light
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('mailing_name') ? ' has-error' : '' }}">
                            <label for="mailing_name" class="col-sm-2 control-label">Mailing Name</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" id="mailing_name" name="mailing_name"
                                           value="{{ ($companyDetails) ? $companyDetails->mailing_name : '' }}"
                                           placeholder="Mailing Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mailing_address') ? ' has-error' : '' }}">
                            <label for="mailing_address" class="col-sm-2 control-label">Mailing Address</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" class="form-control" id="mailing_address" name="mailing_address"
                                           value="{{ ($companyDetails) ? $companyDetails->mailing_address : '' }}"
                                           placeholder="Mailing Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('support_email') ? ' has-error' : '' }}">
                            <label for="support_email" class="col-sm-2 control-label">Support Email</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" class="form-control" id="support_email" name="support_email"
                                           value="{{ ($companyDetails) ? $companyDetails->support_email : '' }}"
                                           placeholder="Support Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company_website') ? ' has-error' : '' }}">
                            <label for="company_website" class="col-sm-2 control-label">Compony Website</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-internet-explorer"></i>
                                    </div>
                                    <input type="text" class="form-control" id="company_website" name="company_website"
                                           value="{{ ($companyDetails) ? $companyDetails->company_website : '' }}"
                                           placeholder="Company Website ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_expiring_month') ? ' has-error' : '' }}">
                            <label for="company_website" class="col-sm-2 control-label">Password Duration
                                (Months)</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="password_expiring_month"
                                           name="password_expiring_month"
                                           value="{{ ($companyDetails) ? $companyDetails->password_expiring_month : '' }}"
                                           placeholder="Password Duration (Months)... ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('login_background_image') ? ' has-error' : '' }}">
                            <label class="myFile" for="login_background_image" class="col-sm-2 control-label">Login
                                Background Image</label>

                            @if( $companyDetails && !empty($companyDetails->loginImageUrl) )
                                <div class="col-sm-5" style="margin-bottom: 10px;">
                                    <img src="{{ $companyDetails->loginImageUrl }}"
                                         class="img-responsive img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif

                            <div class="file-field" {{ ($companyDetails && !empty($companyDetails->loginImageUrl)) ? 'col-sm-5' : 'col-sm-10' }}">
                            <div class="btn btn-outline-success btn-rounded waves-effect btn-sm float-left">
                                <span>Choose file</span>
                                <input type="file" id="login_background_image" name="login_background_image"
                                       class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'
                                       data-show-upload="false">
                            </div>
                        </div>
                    </div>
                    <div>
                        <br>
                        <br>
                        <br>
                    </div>
                    <br>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Search</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    <!-- begin col-6 -->


    @endsection

    @push('scripts')
        <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="/assets/plugins/dropzone/dist/dropzone.js"></script>
        <script src="/assets/plugins/highlight/highlight.min.js"></script>
        <script src="/assets/js/demo/render.highlight.js"></script>
        <script>
            $(document).ready(function () {

            });
        </script>

        <script>
            $("div#myId").dropzone({url: "/file/post"});
        </script>
    @endpush
@extends('layouts.default')

@section('title', 'Settings')

@push('css')
    <link href="/assets/plugins/powerange/powerange.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
        <li class="breadcrumb-item active">Form Elements</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Form Elements <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Modules</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Module Name</th>
                                <th>Code Name</th>
                                <th>Path</th>
                                <th>Font Awesome</th>
                                <th width="2%"
                                "></th>
                            </tr>
                            </thead>
                            @if (count($modules) > 0)
                                @foreach($modules as $module)
                                    <tbody>
                                    <tr>
                                        <td nowrap>
                                            <button type="button" id="view_ribbons" class="btn btn-primary  btn-xs"
                                                    onclick="postData({{$module->id}}, 'ribbons');"><i
                                                        class="fa fa-eye"></i> Ribbons
                                            </button>
                                            <button type="button" id="edit_module" class="btn btn-primary  btn-xs"
                                                    data-toggle="modal" data-target="#edit-module-modal"
                                                    data-id="{{ $module->id }}" data-name="{{ $module->name }}"
                                                    data-path="{{ $module->path }}"
                                                    data-font_awesome="{{ $module->font_awesome }}"
                                                    data-code_name="{{ $module->code_name }}"><i
                                                        class="fa fa-pencil-square-o"></i> Edit
                                            </button>
                                        </td>
                                        <td>{{ $module->name }} </td>
                                        <td>{{ $module->code_name }} </td>
                                        <td>
                                            {{ (!empty($module->path) && $module->path != '') ? str_replace('\/',"/",$module->path) : ''  }}
                                        </td>
                                        <td>{{ $module->font_awesome }} </td>
                                        <td>
                                            <p class="m-b-0">
                                                <input type="checkbox" data-render="switchery" data-theme="blue" data-change="check-switchery-state-text" checked />
                                                <a href="javascript:;" class="btn btn-xs btn-primary disabled m-l-5" data-id="switchery-state-text">true</a>
                                            </p>
                                        </td>
                                        <td>
                                            <button type="button" id="view_ribbons"
                                                    class="btn {{ (!empty($module->active) && $module->active == 1) ? "btn-danger" : "btn-success" }} btn-xs"
                                                    onclick="postData({{$module->id}}, 'actdeac');"><i
                                                        class="fa {{ (!empty($module->active) && $module->active == 1) ? "fa-times" : "fa-check" }}"></i> {{(!empty($module->active) && $module->active == 1) ? "De-Activate" : "Activate"}}
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tr id="modules-list">
                                    <td colspan="5">
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                &times;
                                            </button>
                                            No Module to display, please start by adding a new module.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <div class="box-footer">
                        <button type="button" id="add-new-module" class="btn btn-primary pull-right" data-toggle="modal"
                                data-target="#add-new-module-modal">Add New Module
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="m-b-5 text-inverse f-w-600">Checked & Unchecked Switchery</div>
            <p>
                <input type="checkbox" data-render="switchery" data-theme="default" checked />
                <span class="text-muted m-l-5 m-r-20">checked</span>
                <input type="checkbox" data-render="switchery" data-theme="default" />
                <span class="text-muted m-l-5">unchecked</span>
            </p>
            <div class="m-b-5 text-inverse f-w-600">Disabled</div>
            <p>
                <input type="checkbox" data-render="switchery" data-theme="default" data-disabled="true" checked />
                <span class="text-muted m-l-5">checked</span>
            </p>
            <p>
                <input type="checkbox" data-render="switchery" data-theme="orange" data-disabled="true" checked />
                <span class="text-muted m-l-5">unchecked</span>
            </p>
            <div class="m-b-5 text-inverse f-w-600">State</div>
            <p class="m-b-10">
                <input type="checkbox" data-render="switchery" data-theme="black" data-id="switchery-state" checked />
                <a href="javascript:;" class="btn btn-xs btn-success m-l-5" data-click="check-switchery-state">check state</a>
            </p>
            <p class="m-b-0">
                <input type="checkbox" data-render="switchery" data-theme="blue" data-change="check-switchery-state-text" checked />
                <a href="javascript:;" class="btn btn-xs btn-primary disabled m-l-5" data-id="switchery-state-text">true</a>
            </p>
        </div>
        <!-- end col-6 -->
        <!-- begin col-6 -->
        {{--        <div class="col-lg-6">--}}
        {{--            <!-- begin panel -->--}}
        {{--            <div class="panel panel-inverse" data-sortable-id="form-stuff-3">--}}
        {{--                <!-- begin panel-heading -->--}}
        {{--                <div class="panel-heading">--}}
        {{--                    <div class="panel-heading-btn">--}}
        {{--                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"--}}
        {{--                           data-click="panel-expand"><i class="fa fa-expand"></i></a>--}}
        {{--                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"--}}
        {{--                           data-click="panel-reload"><i class="fa fa-redo"></i></a>--}}
        {{--                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"--}}
        {{--                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>--}}
        {{--                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"--}}
        {{--                           data-click="panel-remove"><i class="fa fa-times"></i></a>--}}
        {{--                    </div>--}}
        {{--                    <h4 class="panel-title">Sizing</h4>--}}
        {{--                </div>--}}
        {{--                <!-- end panel-heading -->--}}
        {{--                <!-- begin panel-body -->--}}
        {{--                <div class="panel-body p-t-10">--}}
        {{--                    <div class="row row-space-10">--}}
        {{--                        <div class="col-md-6">--}}
        {{--                            <div class="form-group m-b-10 p-t-5">--}}
        {{--                                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg"/>--}}
        {{--                            </div>--}}
        {{--                            <div class="form-group m-b-10">--}}
        {{--                                <input class="form-control" type="text" placeholder="default input"/>--}}
        {{--                            </div>--}}
        {{--                            <div class="form-group m-b-10">--}}
        {{--                                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm"/>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-md-6">--}}
        {{--                            <div class="form-group m-b-10 p-t-5">--}}
        {{--                                <select class="form-control form-control-lg">--}}
        {{--                                    <option>.form-control-lg</option>--}}
        {{--                                </select>--}}
        {{--                            </div>--}}
        {{--                            <div class="form-group m-b-10">--}}
        {{--                                <select class="form-control">--}}
        {{--                                    <option>default select</option>--}}
        {{--                                </select>--}}
        {{--                            </div>--}}
        {{--                            <div class="form-group m-b-10">--}}
        {{--                                <select class="form-control form-control-sm">--}}
        {{--                                    <option>.form-control-sm</option>--}}
        {{--                                </select>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--        </div>--}}
        {{--        <!-- end col-6 -->--}}
        {{--    </div>--}}
        @endsection

        @push('scripts')
            <script src="/assets/plugins/highlight/highlight.min.js"></script>
            <script src="/assets/js/demo/render.highlight.js"></script>
            <script src="/assets/plugins/switchery/switchery.min.js"></script>
            <script src="/assets/plugins/powerange/powerange.min.js"></script>
            <script src="/assets/js/demo/form-slider-switcher.demo.js"></script>
    @endpush
    <?php

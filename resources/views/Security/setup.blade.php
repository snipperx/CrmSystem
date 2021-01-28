@extends('layouts.default')

@section('title', 'Form Slider + Switcher')

@push('css')
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/assets/css/tongle.css" rel="stylesheet"/>
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
        <li class="breadcrumb-item active">Form Slider + Switcher</li>
    </ol>

    <h1 class="page-header">Add New Ribbon <small></small></h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="flot-chart-1">
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
                    <h4 class="panel-title">New Module </h4>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success" style="display:none"></div>
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 40px"></th>
                                <th>Module Name</th>
                                <th>Code Name</th>
                                <th>Path</th>
                                <th>Font Awesome</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </thead>
                            @if (count($modules) > 0)
                                @foreach($modules as $module)
                                    <tr id="ribbons-list">
                                        <td nowrap>
                                            <button type="button" id="view_ribbons" class="btn btn-grey  btn-xs"
                                                    onclick="postData({{$module->id}}, 'ribbons');"> Ribbons
                                            </button>
                                            <button type="button" id="edit_module" class="btn btn-primary  btn-xs"
                                                    data-toggle="modal" data-target="#edit-module-modal"
                                                    data-id="{{ $module->id }}" data-name="{{ $module->name }}"
                                                    data-path="{{ $module->path }}"
                                                    data-font_awesome="{{ $module->font_awesome }}"
                                                    data-code_name="{{ $module->code_name }}"><i
                                                        class="fa fa-pencil-square-o "></i> Edit
                                            </button>
                                        </td>
                                        <td>{{ (!empty($module->name)) ?  $module->name : ''}} </td>
                                        <td>{{ (!empty($module->code_name ? $module->code_name: '' }} </td>
                                        <td>
                                            {{ (!empty($module->path) && $module->path != '') ? str_replace('\/',"/",$module->path) : ''  }}
                                        </td>
                                        <td>{{ $module->font_awesome }} </td>
                                        <td>
                                            @if((!empty($module->active) && $module->active == 1))
                                                <p>
                                                    <input type="checkbox" name="module" id="{{$module->id}}" checked>
                                                </p>
                                            @else((!empty($module->active) && $module->active == 0))
                                                <input type="checkbox" name="module" id="{{$module->id}}" unchecked>
                                            @endif
                                        </td>
                                    </tr>
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
                        <button type="button" class="btn btn-success pull-right" id="add-new-module" data-toggle="modal"
                                data-target="#add-new-module-modal">Add new Module
                        </button>
                        {{--                        <button type="button" id="add-new-ribbon" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-new-ribbon-modal">Add New ribbon</button>--}}
                    </div>

                </div>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- include module modal -->
    @include('Security.partials.add_module')
    <!-- end panel -->
    @endsection

    @push('scripts')
        <!-- animated switcher -->
            <script>
                function postData(id, data) {
                    if (data == 'ribbons') {
                        location.href = "/add_ribbons/" + id;
                    }
                }


                $('input[type="checkbox"]').on('click', function () {
                    console.log('here');
                    let token = $('meta[name="csrf-token"]').attr('content');
                    let data = {};
                    data.id = $(this).attr('id');
                    data.value = $(this).is(':checked') ? 1 : 0;

                    $.ajax({
                        type: "POST",
                        url: "/module_active" + "/" + data.id,


                        data: {
                            _token: token,
                            data
                        }, success: function (result) {
                            jQuery('.alert').show();
                            jQuery('.alert').html(result.success);
                        }
                    });

                    $(document).ajaxStop(function () {
                        setInterval(function () {
                            location.reload();
                        }, 2000);
                    });
                });

                let moduleId;
                $('[data-toggle="tooltip"]').tooltip();

                //Vertically center modals on page
                function reposition() {
                    var modal = $(this),
                        dialog = modal.find('.modal-dialog');
                    modal.css('display', 'block');
                    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
                }

                // Reposition when a modal is shown
                $('.modal').on('show.bs.modal', reposition);
                // Reposition when the window is resized
                $(window).on('resize', function () {
                    $('.modal:visible').each(reposition);
                });

                //Post module form to server using ajax (ADD)
                $('#add-module').on('click', function () {
                    var strUrl = '/add_module';
                    var formName = 'add-module-form';
                    var modalID = 'add-new-module-modal';
                    var submitBtnID = 'add-module';
                    var redirectUrl = '/setup';
                    var successMsgTitle = 'Module Added!';
                    var successMsg = 'The Module Has Been Successfully Saved!';
                    modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
                });

            </script>

    @endpush
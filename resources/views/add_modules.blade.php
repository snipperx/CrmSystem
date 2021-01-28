@extends('layouts.default')

@section('title', 'Managed Tables')

@push('css')
    <link href="/assets/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet"/>
    <link href="/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet"/>
    <link href="/assets/css/tongle.css" rel="stylesheet"/>
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item active">Managed Tables</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                            class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Data Table - Default</h4>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <div class="panel-body">
                <div class="alert alert-success" style="display:none"></div>
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 40px"></th>
                            <th style="width: 40px">Module Name</th>
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
                                                onclick="window.location='{{ route("add_ribbons", $module->hashid ) }} '"> Ribbons
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
                                    <td>{{ $module->name }} </td>
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
    <!-- include model -->
    @include('Security.partials.add_module')
@endsection

@push('scripts')

    <script>




        $('input[type="checkbox"]').on('click', function () {
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
        $('#add-module').on('click', function() {
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
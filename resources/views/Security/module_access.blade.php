@extends('layouts.default')

@section('title', 'Managed Tables - Select')

@push('css')

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
            <h4 class="panel-title">Module Access</h4>

        </div>
        <!-- end panel-heading -->
        <div class="box-body">
            <form class="form-horizontal" method="POST" action="/access_save/{{$modID}}">
                {{ csrf_field() }}
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th style="width: 400px">Access Level</th>
                </tr>
                @foreach($modules as $module)
                    <tr id="modules-list">
                        <td style="vertical-align: middle;">{{ $module->mod_name }}</td>
                        <td>
                            <select class="form-control" name="module_access[{{$module->mod_id}}]"
                                    id="access_level">
                                <option value="0" {{ (empty($module->access_level)) ? ' selected' : '' }}>
                                    None
                                </option>
                                <option value="1" {{ (!empty($module->access_level)) && $module->access_level == 1 ? ' selected' : '' }} >
                                    Read
                                </option>
                                <option value="2" {{ (!empty($module->access_level)) && $module->access_level == 2 ? ' selected' : '' }} >
                                    Write
                                </option>
                                <option value="3" {{ (!empty($module->access_level)) && $module->access_level == 3 ? ' selected' : '' }} >
                                    Modify
                                </option>
                                <option value="4" {{ (!empty($module->access_level)) && $module->access_level == 4 ? ' selected' : '' }} >
                                    Admin
                                </option>
                                <option value="5" {{ (!empty($module->access_level)) && $module->access_level == 5 ? ' selected' : '' }} >
                                    Super User
                                </option>
                            </select>
                        </td>
                    </tr>
                @endforeach

            </table>
                <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" id="back_button"><i class="fa fa-arrow-left"></i> Back</button>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Submit</button>
                </div>
    </form>
        <!-- begin panel-body -->

        <!-- end panel-body -->
    </div>
    <!-- include model -->
@endsection

@push('scripts')

@endpush
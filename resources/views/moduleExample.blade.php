@extends('layouts.default')

@section('title', 'Managed Tables - Fixed Header')

@push('css')
    <link href="/assets/css/tree.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
        <li class="breadcrumb-item active">Modules Directory</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Modules Directory <small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Modules Directory<p/h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin alert -->
                <br>
                <!-- end alert -->
                <!-- begin panel-body -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu">

                                <div class="accordion">
                                    <!-- Áreas -->
                                    @foreach($modulesAccess as $module)
                                        @if(count($module->moduleRibbon) > 0)
                                            <div class="accordion-group">
                                                <!-- Área -->
                                                <div class="accordion-heading area">
                                                    <a class="accordion-toggle" data-toggle="collapse" href="#area{{$module->id}}">{{ $module->name }}</a>
                                                </div><!-- /Área -->

                                                @foreach($module->moduleRibbon as $ribbon)
                                                    <div class="accordion-body collapse" id="area{{$ribbon->module_id}}">
                                                        <div class="accordion-inner">
                                                            <div class="accordion" id="equipamento1">
                                                                <!-- Equipamentos -->
                                                                <div class="accordion-group">
                                                                    <div class="accordion-heading equipamento">
                                                                        <a class="accordion-toggle" data-parent="#equipamento2-2" data-toggle="collapse" href="#ponto1-{{$ribbon->module_id}}">{{$ribbon->ribbon_name}}</a>
                                                                    </div><!-- Pontos -->
                                                                </div><!-- /Equipamentos -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div><!-- /accordion -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
    @endsection

            @push('scripts')

        </script>
    @endpush
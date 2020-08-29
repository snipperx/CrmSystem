<?php $__env->startSection('title', 'Managed Tables - Fixed Header'); ?>

<?php $__env->startPush('css'); ?>
    <link href="/assets/css/tree.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                        <div class="col-md-12">
                            <div class="menu">

                                <div class="accordion">
                                    <!-- Áreas -->
                                    <div class="accordion-group">
                                        <!-- Área -->
                                        <div class="accordion-heading area">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#area1">Área #1</a>
                                        </div><!-- /Área -->

                                        <div class="accordion-body collapse" id="area1">
                                            <div class="accordion-inner">
                                                <div class="accordion" id="equipamento1">
                                                    <!-- Equipamentos -->

                                                    <div class="accordion-group">
                                                        <div class="accordion-heading equipamento">
                                                            <a class="accordion-toggle" data-parent="#equipamento1-1" data-toggle="collapse" href="#ponto1-1">Equipamento #1-1</a>
                                                        </div><!-- Pontos -->

                                                        <div class="accordion-body collapse" id="ponto1-1">
                                                            <div class="accordion-inner">
                                                                <div class="accordion" id="servico1">
                                                                    <div class="accordion-group">
                                                                        <div class="accordion-heading ponto">
                                                                            <a class="accordion-toggle" data-parent="#servico1-1-1" data-toggle="collapse" href="#servico1-1-1">Ponto #1-1-1</a>
                                                                        </div><!-- Serviços -->

                                                                        <div class="accordion-body collapse" id="servico1-1-1">
                                                                            <div class="accordion-inner">
                                                                                <ul class="nav nav-list">
                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-1</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-2</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-3</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div><!-- /Serviços -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Pontos -->
                                                    </div><!-- /Equipamentos -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /accordion -->

                                <div class="accordion">
                                    <!-- Áreas -->
                                    <div class="accordion-group">
                                        <!-- Área -->
                                        <div class="accordion-heading area">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#area2">Área #1</a>
                                        </div><!-- /Área -->

                                        <div class="accordion-body collapse" id="area2">
                                            <div class="accordion-inner">
                                                <div class="accordion" id="equipamento1">
                                                    <!-- Equipamentos -->

                                                    <div class="accordion-group">
                                                        <div class="accordion-heading equipamento">
                                                            <a class="accordion-toggle" data-toggle="collapse" href="#ponto2-1">Equipamento #1-1</a>
                                                        </div><!-- Pontos -->

                                                        <div class="accordion-body collapse" id="ponto2-1">
                                                            <div class="accordion-inner">
                                                                <div class="accordion" id="servico1">
                                                                    <div class="accordion-group">
                                                                        <div class="accordion-heading ponto">
                                                                            <a class="accordion-toggle" data-toggle="collapse" href="#servico1-2-1">Ponto #1-1-1</a>
                                                                        </div><!-- Serviços -->

                                                                        <div class="accordion-body collapse" id="servico1-2-1">
                                                                            <div class="accordion-inner">
                                                                                <ul class="nav nav-list">
                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-1</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-2</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-3</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div><!-- /Serviços -->
                                                                    </div>
                                                                </div>

                                                                <div class="accordion" id="servico2">
                                                                    <div class="accordion-group">
                                                                        <div class="accordion-heading ponto">
                                                                            <a class="accordion-toggle" data-toggle="collapse" href="#servico2-2-2">Ponto #1-1-1</a>
                                                                        </div><!-- Serviços -->

                                                                        <div class="accordion-body collapse" id="servico2-2-2">
                                                                            <div class="accordion-inner">
                                                                                <ul class="nav nav-list">
                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-1</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-2</a></li>

                                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-3</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div><!-- /Serviços -->
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- /Pontos -->
                                                    </div><!-- /Equipamentos -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /accordion -->

                                <div class="accordion">
                                    <!-- Áreas -->
                                    <div class="accordion-group">
                                        <!-- Área -->
                                        <div class="accordion-heading area">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#area3">Área #1</a>
                                        </div><!-- /Área -->

                                        <div class="accordion-body collapse" id="area3">
                                            <div class="accordion-inner">
                                                <div class="accordion" id="equipamento1">
                                                    <!-- Equipamentos -->


                                                    <div class="accordion-group">
                                                        <div class="accordion-heading equipamento">
                                                            <a class="accordion-toggle" data-toggle="collapse" href="#servico3-1-1">Ponto #1-1-1</a>
                                                        </div><!-- Serviços -->

                                                        <div class="accordion-body collapse" id="servico3-1-1">
                                                            <div class="accordion-inner">
                                                                <ul class="nav nav-list">
                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-1</a></li>

                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-2</a></li>

                                                                    <li><a href="#"><i class="icon-chevron-right"></i> Serviço #1-1-1-3</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- /Serviços -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="/assets/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="/assets/plugins/datatables/js/dataTables.bootstrap4.js"></script>
    <script src="/assets/plugins/datatables/js/fixedHeader/dataTables.fixedHeader.js"></script>
    <script src="/assets/plugins/datatables/js/responsive/dataTables.responsive.js"></script>
    <script src="/assets/plugins/datatables/js/responsive/responsive.bootstrap4.js"></script>
    <script src="/assets/js/demo/table-manage-fixed-header.demo.js"></script>
    <script>
        $(document).ready(function() {
            TableManageFixedHeader.init();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
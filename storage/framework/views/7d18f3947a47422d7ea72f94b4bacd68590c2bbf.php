<?php $__env->startSection('title', 'Managed Tables'); ?>

<?php $__env->startPush('css'); ?>
    <link href="/assets/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet"/>
    <link href="/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet"/>
    <link href="/assets/css/tongle.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                        <?php if(count($modules) > 0): ?>
                            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="ribbons-list">
                                    <td nowrap>
                                        <button type="button" id="view_ribbons" class="btn btn-grey  btn-xs"
                                                onclick="window.location='<?php echo e(route("add_ribbons", $module->hashid )); ?> '"> Ribbons
                                        </button>

                                        <button type="button" id="edit_module" class="btn btn-primary  btn-xs"
                                                data-toggle="modal" data-target="#edit-module-modal"
                                                data-id="<?php echo e($module->id); ?>" data-name="<?php echo e($module->name); ?>"
                                                data-path="<?php echo e($module->path); ?>"
                                                data-font_awesome="<?php echo e($module->font_awesome); ?>"
                                                data-code_name="<?php echo e($module->code_name); ?>"><i
                                                    class="fa fa-pencil-square-o "></i> Edit
                                        </button>
                                    </td>
                                    <td><?php echo e($module->name); ?> </td>
                                    <td>
                                        <?php echo e((!empty($module->path) && $module->path != '') ? str_replace('\/',"/",$module->path) : ''); ?>

                                    </td>
                                    <td><?php echo e($module->font_awesome); ?> </td>
                                    <td>
                                        <?php if((!empty($module->active) && $module->active == 1)): ?>
                                            <p>
                                                <input type="checkbox" name="module" id="<?php echo e($module->id); ?>" checked>
                                            </p>
                                        <?php else: ?>
                                            <input type="checkbox" name="module" id="<?php echo e($module->id); ?>" unchecked>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
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
                        <?php endif; ?>
                    </table>
                </div>
                <!-- end table-responsive -->
                <div class="box-footer">
                    <button type="button" class="btn btn-success pull-right" id="add-new-module" data-toggle="modal"
                            data-target="#add-new-module-modal">Add new Module
                    </button>
                    
                </div>

            </div>
        </div>
        <!-- end panel-body -->
    </div>
    <!-- include model -->
    <?php echo $__env->make('Security.partials.add_module', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title', 'Form Slider + Switcher'); ?>

<?php $__env->startPush('css'); ?>
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/assets/css/tongle.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">New Ribbon for <?php echo e($ribbons->name); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success" style="display:none"></div>
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Sort Order</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Path</th>
                                <th>Access Right</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </thead>
                            <?php if(count($ribbons->moduleRibbon) > 0): ?>
                                <?php $__currentLoopData = $ribbons->moduleRibbon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ribbon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="ribbons-list">
                                        <td><?php echo e((!empty($ribbon->sort_order)) ?  $ribbon->sort_order : ''); ?> </td>
                                        <td><?php echo e((!empty($ribbon->ribbon_name)) ?  $ribbon->ribbon_name : ''); ?> </td>
                                        <td><?php echo e((!empty( $ribbon->description)) ?  $ribbon->description : ''); ?> </td>
                                        <td>
                                            <?php echo e((!empty($ribbon->ribbon_path) && $ribbon->ribbon_path != '') ? str_replace('\/',"/",$ribbon->ribbon_path) : ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($ribbon->access_level) ? $arrayRights[$ribbon->access_level] : 'None'); ?>

                                        </td>
                                        <td nowrap>
                                            <button type="button" id="edit_ribbon" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#edit-ribbon-modal" data-id="<?php echo e($ribbon->id); ?>" data-name="<?php echo e($ribbon->ribbon_name); ?>" data-path="<?php echo e($ribbon->ribbon_path); ?>" data-description="<?php echo e($ribbon->description); ?>" data-sort_order="<?php echo e($ribbon->sort_order); ?>" data-access_level="<?php echo e($ribbon->access_level); ?>"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        </td>
                                        <td nowrap>
                                            <?php if((!empty($ribbon->active) && $ribbon->active == 1)): ?><p><input type="checkbox" id="<?php echo e($ribbon->id); ?>" checked></p><?php else: ?><input type="checkbox" id="<?php echo e($ribbon->id); ?>" unchecked><?php endif; ?>
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

                        <button type="button" id="add-new-ribbon" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-new-ribbon-modal">Add New ribbon</button>
                    </div>

                    </div>
                </div>
                <!-- end panel-body -->
            </div>
            <!-- include module modal -->
        <?php echo $__env->make('Security.partials.add_ribbon', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- end panel -->
        <?php $__env->stopSection(); ?>

        <?php $__env->startPush('scripts'); ?>
            <!-- animated switcher -->
                <script>
                    $('input[type="checkbox"]').on('click', function () {

                        let token = $('meta[name="csrf-token"]').attr('content');
                        let data = {};
                        data.id = $(this).attr('id');
                        data.value = $(this).is(':checked') ? 1 : 0;

                        $.ajax({
                            type: "POST",
                            url: "/ribbon_active" + "/" + data.id,
                            data:{
                                _token: token,
                                data
                            },success: function(result){
                                jQuery('.alert').show();
                                jQuery('.alert').html(result.success);
                            }});

                        $(document).ajaxStop(function() {
                            setInterval(function() {
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
                    $(window).on('resize', function() {
                        $('.modal:visible').each(reposition);
                    });

                    //Post module form to server using ajax (ADD)
                    $('#add-ribbon').on('click', function() {
                        var strUrl = '/add_ribbon';
                        var formName = 'add-ribbon-form';
                        var modalID = 'add-new-ribbon-modal';
                        var submitBtnID = 'add-ribbon';
                        var redirectUrl = '/add_ribbons/' + <?php echo e($mod); ?>;
                        var successMsgTitle = 'New Ribbon Added!';
                        var successMsg = 'The Ribbon Has Been Successfully Saved!';
                        modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
                    });

                </script>

    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
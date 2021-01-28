<?php $__env->startSection('title', 'Managed Tables - Fixed Header'); ?>

<?php $__env->startPush('css'); ?>
    <link href="/assets/css/bootstrap_tree.css" rel="stylesheet" />
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
                    <div class="row" class="col-lg-12">

                        <div class="tree well" >
                            <?php $__currentLoopData = $modulesAccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($module->moduleRibbon) > 0): ?>
                            <ul>
                                <li>
                                    <i class="fa <?php echo e(!empty($module->font_awesome) ? $module->font_awesome : ''); ?>"></i>
                                    <span><i class="icon-folder-open"></i><?php echo e($module->name); ?></span> <a href="">Goes somewhere</a>
                                    <ul>
                                        <?php $__currentLoopData = $module->moduleRibbon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ribbon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <span><i class="icon-minus-sign"></i><?php echo e($ribbon->ribbon_name); ?> </span> <a href="<?php echo e($ribbon->ribbon_path); ?>"><span class="badge badge-secondary">badge</span></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            </ul>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    <!-- beg
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

    <script>
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gift/GiftedSpace/crm/resources/views/Security/modules.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Managed Tables - Select'); ?>

<?php $__env->startPush('css'); ?>
    <link href="/assets/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet"/>
    <link href="/assets/plugins/datatables/css/select/select.bootstrap4.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
        <li class="breadcrumb-item active">Select</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Managed Tables - Select <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin col-10 -->
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
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
                    <h4 class="panel-title">DataTable - Select</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin alert -->
                <div class="alert alert-lime fade show">
                    <div class="row filter-row form-group">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input class="form-control form-control-lg" name="employee_id" id="employee_id"
                                       type="text"
                                       placeholder="Employee ID"/>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 form-group">
                            <div class="form-group form-focus focused">
                                <input class="form-control form-control-lg" name="name" id="name" type="text"
                                       placeholder="Employee Name"/>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 form-group">
                            <div class="form-group form-focus select-focus focused">
                                <select class="form-control form-control-lg" data-select2-id="1" tabindex="-1"
                                        name="designation" id="designation"
                                        aria-hidden="true" placeholder="Designation">
                                    <option value="">Select Designation</option>
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label class="focus-label"></label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 form-group">
                            <a href="#" class="btn-lg btn-success btn-submit"><i class="fa fa-search fa-fw"></i> Search
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end alert -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <table id="data-table-select" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="30%">Name</th>
                            <th class="text-nowrap">Employee ID</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Mobile</th>
                            <th class="text-nowrap">status</th>
                            <th class="text-nowrap">Start date</th>
                            <th class="text-nowrap"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                                <td>
                                    <a class="media-left" href="javascript:;">
                                        <img src="<?php echo e((!empty($user->profile_pic)) ? Storage::disk('local')->url("avatars/$user->profile_pic") : '/assets/img/avatars/m-silhouette.jpg'); ?>"
                                             class="rounded-circle " width="36" height="36" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4  class="media-heading"> &ensp; <?php echo e((!empty($user->first_name)) ?  $user->first_name : ''); ?></h4>
                                        <p> &ensp; &ensp;<?php echo e((!empty($user->positions)) ?  $user->positions : ''); ?> </p>
                                    </div>
                                </td>
                                <td><?php echo e((!empty($user->profile_pic)) ?  $user->employee_number : ''); ?> </td>
                                <td><?php echo e((!empty($user->email)) ?  $user->email : ''); ?> </td>
                                <td><?php echo e((!empty($user->cell_number)) ?  $user->cell_number : ''); ?> </td>

                                <?php if($user->status === 1): ?>
                                    <td>

                                        <span class="badge f-w-500 bg-gradient-green f-s-10">Active</span>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <span class="badge f-w-500 bg-gradient-green f-s-10">De-Activated</span>
                                    </td>
                                <?php endif; ?>
                                <td><?php echo e((!empty($user->date_joined)) ? date(' d M Y', $user->date_joined) :''); ?> </td>
                                <td>
                                    <a href="<?php echo e('/users/' . $user->hashid); ?>" class="btn btn-success  btn-sm"
                                       data-id="<?php echo e($user->hashid); ?>"> View Details <i class="fa fa-arrow-right"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
    <script src="/assets/plugins/datatables/js/select/dataTables.select.js"></script>
    <script src="/assets/plugins/datatables/js/responsive/dataTables.responsive.js"></script>
    <script src="/assets/plugins/datatables/js/responsive/responsive.bootstrap4.js"></script>
    <script src="/assets/js/demo/table-manage-select.demo.js"></script>
    <script>
        $(document).ready(function () {
            TableManageSelect.init();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gift/GiftedSpace/crm/resources/views/Hr/users.blade.php ENDPATH**/ ?>
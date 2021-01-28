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
        <!-- begin col-2 -->

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







                        <div class="col-sm-6 col-md-3 form-group">
                            <div class="form-group form-focus focused">
                                <select class="form-control form-control-lg"  name="filter_gender" id="filter_gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 form-group">
                            <div class="form-group form-focus select-focus focused">
                                <select class="form-control form-control-lg" data-select2-id="1" tabindex="-1"
                                        name="filter_country" id="filter_country"
                                        aria-hidden="true" placeholder="Designation">
                                    <option value="">Select Country ..</option>
                                    <?php $__currentLoopData = $country_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->country); ?>"><?php echo e($country->country); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label class="focus-label"></label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 form-group">
                            <a id="searchUser" class="btn-lg btn-success btn-submit"><i class="fa fa-search fa-fw"></i> Search
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end alert -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <table id="customer_data" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="7%">Gender</th>
                            <th class="text-nowrap">Address</th>
                            <th class="text-nowrap">City</th>
                            <th class="text-nowrap">Postal Code</th>
                            <th class="text-nowrap">Country</th>
                        </tr>
                        </thead>
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

    <script>
        $(document).ready(function(){

            fill_datatable();


            function fill_datatable(filter_gender = '', filter_country = '')

            {
             var oTable =   $('#customer_data').DataTable({

                    processing: true,
                    serverSide: true,
                    ajax:{
                        url: "<?php echo e(route('customer')); ?>",
                        data:{
                            filter_gender:filter_gender,
                            filter_country:filter_country}
                    },
                    columns: [
                        {
                            data:'gender',
                            name:'gender'
                        },
                        {
                            data:'address',
                            name:'address'
                        },
                        {
                            data:'city',
                            name:'city'
                        },
                        {
                            data:'postalCode',
                            name:'postalCode'
                        },
                        {
                            data:'country',
                            name:'country'
                        }
                    ]
                });
            }


            $('#searchUser').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });

            $('#filter').click(function(){
                console.log('kill');
                var filter_gender = $('#filter_gender').val();
                var filter_country = $('#filter_country').val();

                console.log(filter_gender);

            });


        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gift/GiftedSpace/crm/resources/views/custom_search.blade.php ENDPATH**/ ?>
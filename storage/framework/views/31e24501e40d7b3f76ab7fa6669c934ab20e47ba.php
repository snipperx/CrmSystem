<?php $__env->startSection('title', 'Managed Tables - Select'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <body>
    <div class="container">
        <br />
        <h3 align="center">Laravel 5.8 - Custom Search in Datatables using Ajax</h3>
        <br />
        <br />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <select name="filter_gender" id="filter_gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="filter_country" id="filter_country" class="form-control" required>
                        <option value="">Select Country</option>
                      
                    </select>
                </div>

                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                    <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br />
        <div class="table-responsive">
            <table id="customer_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                </tr>
                </thead>
            </table>
        </div>
        <br />
        <br />
    </div>
    </body>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gift/GiftedSpace/crm/resources/views/example.blade.php ENDPATH**/ ?>
<div id="add-new-ribbon-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="add-ribbon-form">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title">Add New ribbon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="ribbon-invalid-input-alert"></div>
                    <div id="ribbon-success-alert"></div>


                    <div class="form-group" <?php echo e($errors->has('module_name') ? ' has-error' : ''); ?>">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-eercast"></i>
                            </div>
                            <input type="text" class="form-control" id="ribbon_name" name="ribbon_name" value=""
                                   placeholder="Enter ribbon Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-minus-square"></i>
                            </div>
                            <input type="text" class="form-control" id="description" name="description" value=""
                                   placeholder="Enter ribbon Description" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ribbon_path" class="col-sm-3 control-label">Path</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-exchange"></i>
                            </div>
                            <input type="text" class="form-control" id="ribbon_path" name="ribbon_path" value=""
                                   placeholder="Enter ribbon Path" required>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label for="sort_order" class="col-sm-3 control-label">Sort Number</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-sort-amount-asc"></i>
                            </div>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value=""
                                   placeholder="Enter Sort Number" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="access_level" class="col-sm-3 control-label">Access Right</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>
                        <select class="form-control" name="access_level" id="access_level" placeholder="" required>
                            <option value="0">None</option>
                            <option value="1">Read</option>
                            <option value="2">Write</option>
                            <option value="3">Modify</option>
                            <option value="4">Admin</option>
                            <option value="5">Super User</option>
                        </select>
                    </div>
                </div>
        </div>

                <input type="hidden" class="form-control" id="module_id" name="module_id" value="<?php echo e($mod); ?>"
                       placeholder="Enter Module Font Awesome Class">

        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="add-ribbon" class="btn btn-success">Add ribbon</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
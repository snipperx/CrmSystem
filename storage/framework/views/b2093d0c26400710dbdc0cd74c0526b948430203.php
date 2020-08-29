<div id="add-new-module-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="add-module-form">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title">Add New Module</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="form-group" <?php echo e($errors->has('module_name') ? ' has-error' : ''); ?>">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-minus-square"></i>
                            </div>
                            <input type="text" class="form-control" id="module_name" name="module_name" value=""
                                   placeholder="Enter Module Name">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="path" class="col-sm-2 control-label">Path</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-exchange"></i>
                            </div>
                            <input type="text" class="form-control" id="module_path" name="module_path" value=""
                                   placeholder="Enter Module Path">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="font_awesome" class="col-sm-2 control-label">Font awsone</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-font-awesome"></i>
                            </div>
                            <input type="text" class="form-control" id="font_awesome" name="font_awesome" value=""
                                   placeholder="Enter Module Font Awesome Class">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="add-module" class="btn btn-success">Add Module</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
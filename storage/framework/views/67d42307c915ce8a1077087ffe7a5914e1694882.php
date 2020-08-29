<?php $__env->startSection('title', 'Login Page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-cover">
        <div class="login-cover-image" style="background-image: url(<?php echo e($login_background_image); ?>)"
             data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">

                <a href="<?php echo e(url('/')); ?>" class="navbar-brand"><span class="navbar-logo"></span> <img
                            src="<?php echo e($companyDetailLogo); ?>"
                            class="img-responsive " width="36" height="36"> <b><?php echo e($headerNameBold); ?></b> </a>

                <small><?php echo e($headerAcronymBold); ?> </small>

            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
            <form method="POST" action="<?php echo e(route('login')); ?>" class="margin-bottom-0">
                <?php echo csrf_field(); ?>

                <div class="form-group m-b-20">
                    <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror"
                           name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email"
                           autofocus>
                    <?php if($errors->has('name')): ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group m-b-20">
                    <input id="password" class="form-control input-lg" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password" placeholder="Password">
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <div class="checkbox m-b-20">

                    <label class="form-check-label" for="remember">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <?php echo e(__('Remember Me')); ?>


                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">
                        <?php echo e(__('Login')); ?>

                    </button>

                    <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                    <?php endif; ?>

                </div>
                <div class="m-t-20">
                    Not a member yet? Click <a href="<?php echo e(__('register')); ?>">here</a> to register.
                </div>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="/assets/js/demo/login-v2.demo.js"></script>
    <script>
        $(document).ready(function () {
            LoginV2.init();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.empty', ['paceTop' => true], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
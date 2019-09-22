<?php $__env->startSection('body-class', 'login-page'); ?>

<?php $__env->startSection('content'); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="/"><?php echo e(config('app.name', 'Mojito')); ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo e(__('Login')); ?></p>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="<?php echo e(__('E-Mail Address')); ?>"  name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus />
        <span class="glyphicon glyphicon-envelope form-control-feedback  <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"></span>

        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" placeholder="<?php echo e(__('Password')); ?>" class="form-control" name="password" required autocomplete="current-password" />
        <span class="glyphicon glyphicon-lock form-control-feedback <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"></span>

        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                <?php echo e(__('Remember Me')); ?>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(__('Login')); ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php if(Route::has('password.request')): ?>
        <a href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('Forgot Your Password?')); ?>

        </a>
    <?php endif; ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>
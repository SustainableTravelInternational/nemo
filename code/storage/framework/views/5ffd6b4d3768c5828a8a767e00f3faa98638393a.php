<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('title.description', ''); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo e(\App\Models\User::count()); ?></h3>

          <p><?php echo e(__('User Registrations')); ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo e(route('users')); ?>" class="small-box-footer">
          <?php echo e(__('More info')); ?> <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/admin/home.blade.php ENDPATH**/ ?>
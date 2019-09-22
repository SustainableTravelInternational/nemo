<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('title.description', 'Create a new user'); ?>

<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="box box-primary">
	<!-- form start -->
	<form role="form" action="<?php echo e(route('users.patch', $user->id)); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<?php echo method_field('PATCH'); ?>
		<input type="hidden" name="id" value="<?php echo e($user->id); ?>">

	  <div class="box-body">
	  	<div class="row">
	  		<div class="col-xs-6">
	    <div class="form-group">
	      <label for="name"><?php echo e(__('Name')); ?></label>
	      <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter name')); ?>" value="<?php echo e($user->name); ?>">
	    </div>
	    <div class="form-group">
	      <label for="email"><?php echo e(__('Email address')); ?></label>
	      <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('Enter email address')); ?>" value="<?php echo e($user->email); ?>">
	    </div>
	    <div class="form-group">
	      <label for="password"><?php echo e(__('Password')); ?></label>
	      <input type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter password')); ?>">
	    </div>
	    <div class="form-group">
	      <label for="password_confirmation"><?php echo e(__('Password Confirmation')); ?></label>
	      <input type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(__('Enter password Confirmation')); ?>">
	    </div>
	    <div class="row">
	    	<div class="col-xs-3">
	    		<div class="form-group">
		    		<label><?php echo e(__('User role:')); ?></label>
		    	</div>
	    	</div>
	    	<div class="col-xs-9">
			    <div class="form-group">
				    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('createSuperAdmin', App\User::class)): ?>
				        <div class="radio">
				            <label>
				              <input type="radio" name="role" value="superadmin" <?php echo e($user->role == 'superadmin' ? "checked" : ""); ?>>
				              <?php echo e(__('Super Admin')); ?>

				            </label>
				        </div>
			        <?php endif; ?>
			        <div class="radio">
			            <label>
			            	<input type="radio" name="role" value="admin" <?php echo e($user->role == 'admin' ? "checked" : ""); ?>>
			            	<?php echo e(__('Admin')); ?>

			            </label>
				        </div>
				        <div class="radio">
			            <label>
			            	<input type="radio" name="role" value="general" <?php echo e($user->role == 'general' || $user->role == '' ? "checked" : ""); ?>>
			            	<?php echo e(__('General')); ?>

			            </label>
			          	</div>
			        </div>
				  </div>
	    	</div>
	    </div>
	  		<div class="col-xs-6">
	  			<div class="form-group">
				    <label for="profile_picture"><?php echo e(__('Your Profile Picture')); ?></label>
	    			<div class="user-header text-center">
		            	<img src="<?php echo e($user->getProfilePhoto()); ?>" class="img-circle profile-picture" alt="User Image">
	              	</div>
	  			</div>
	  			<div class="form-group">
				      <input type="file" class="form-control" name="profile_photo">
		    	</div>
	  		</div>
	    </div>
	  <!-- /.box-body -->

	  <div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>
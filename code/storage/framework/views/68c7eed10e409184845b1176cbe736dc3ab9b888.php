<!-- Notifications: style can be found in dropdown.less -->
<?php if(count(auth()->user()->notifications) > 0): ?>
  <li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-bell-o"></i>
      <span class="label label-warning"><?php echo e(count(auth()->user()->notifications)); ?></span>
    </a>
    <ul class="dropdown-menu">
      <li class="header"><?php echo e(__('You have')); ?> <?php echo e(count(auth()->user()->notifications)); ?> <?php echo e(__('notifications')); ?></li>
      <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
          <?php $__currentLoopData = auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <?php if($notification->type == 'App\Notifications\PasswordReset'): ?>
                <a href="#" style="cursor: initial">
                  <i class="fa fa-unlock text-aqua"></i><?php echo e(__('Your password has been reset!')); ?>

                  <span class="pull-right">
                    <?php echo e($notification->created_at->format('h:i')); ?>

                  </span>
                </a>
              <?php endif; ?>
            </li>
            <?php
               $notification->markAsRead();

               if ($notification->read_at < \Carbon\Carbon::now()->addMinutes(-15)) {
                  $notification->delete();
               }
            ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </li>
      
    </ul>
  </li>
<?php endif; ?>

<?php /**PATH /var/www/laravel/resources/views/admin/shared/notifications.blade.php ENDPATH**/ ?>
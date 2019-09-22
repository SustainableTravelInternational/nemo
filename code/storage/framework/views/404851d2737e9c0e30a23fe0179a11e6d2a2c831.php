<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="/img/icons/favicon-32.png" alt="<?php echo e(config('app.name', 'Mojito')); ?>"/></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/img/logo.png" alt="<?php echo e(config('app.name', 'Mojito')); ?>" width="100"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"><?php echo e(__('Toggle navigation')); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php echo $__env->make('admin.shared.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(auth()->user()->getProfilePhoto()); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo e(isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(auth()->user()->getProfilePhoto()); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo e(isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email); ?> <?php echo e(isset(Auth::user()->role) ? ' - ' . Auth::user()->role : ''); ?>

                  <small><?php echo e(__('Member since')); ?> <?php echo e(Auth::user()->created_at); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo e(route('users.edit', auth()->id())); ?>" class="btn btn-default btn-flat"><?php echo e(__('Profile')); ?></a>
                </div>
                <div class="pull-right">
                  <a href="javascript:document.logoutForm.submit()" class="btn btn-default btn-flat"><?php echo e(__('Sign out')); ?></a>
                  <form action="<?php echo e(route('logout')); ?>" method="POST" name="logoutForm">
                    <?php echo csrf_field(); ?>
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header><?php /**PATH /var/www/laravel/resources/views/admin/shared/main-header.blade.php ENDPATH**/ ?>
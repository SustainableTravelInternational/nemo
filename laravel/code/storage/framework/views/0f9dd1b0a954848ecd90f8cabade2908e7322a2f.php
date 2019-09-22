<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Mojito')); ?></title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
    <?php echo "
				<link rel='shortcut icon' sizes='16x16 24x24 32x32 48x48 64x64' href='/favicon.ico'>
				<link rel='apple-touch-icon' sizes='57x57' href='/img/icons/favicon-57.png'>
				<link rel='apple-touch-icon-precomposed' sizes='57x57' href='/img/icons/favicon-57.png'>
				<link rel='apple-touch-icon' sizes='72x72' href='/img/icons/favicon-72.png'>
				<link rel='apple-touch-icon' sizes='114x114' href='/img/icons/favicon-114.png'>
				<link rel='apple-touch-icon' sizes='120x120' href='/img/icons/favicon-120.png'>
				<link rel='apple-touch-icon' sizes='144x144' href='/img/icons/favicon-144.png'>
				<link rel='apple-touch-icon' sizes='152x152' href='/img/icons/favicon-152.png'>
				<meta name='application-name' content='Mojito'>
				<meta name='msapplication-TileImage' content='/img/icons/favicon-144.png'>
				<meta name='msapplication-TileColor' content='#2A2A2A'>
			"; ?>

    <?php echo $__env->yieldContent('head'); ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <?php echo $__env->make('admin.shared.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.shared.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-xs-6">
                    <section class="content-header">
                      <h1>
                        <?php echo $__env->yieldContent('title'); ?>
                        <small><?php echo $__env->yieldContent('title.description'); ?></small>
                      </h1>
                    </section>
                </div>
                <div class="col-xs-6">
                    <?php echo $__env->yieldContent('buttons'); ?>
                </div>
            </div>
            <section class="content">
                <?php echo $__env->make('admin.shared.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>

    </div>

    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Cookie -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
    <!-- Admin App -->
    <script src="/js/admin.js"></script>

    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH /var/www/laravel/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>
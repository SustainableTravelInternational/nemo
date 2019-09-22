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
    <!-- Custom style -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
<body class="hold-transition <?php echo $__env->yieldContent('body-class'); ?>">

    <?php echo $__env->yieldContent('content'); ?>

    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH /var/www/laravel/resources/views/admin/layouts/guest.blade.php ENDPATH**/ ?>
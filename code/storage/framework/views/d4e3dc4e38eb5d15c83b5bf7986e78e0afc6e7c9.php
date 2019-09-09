<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<title>Support Nemo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/app.css">

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
</head>
<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>

	<div id="root"></div>
    <div id="modal"></div>

    <script src="/js/index.js"></script>
</body>
</html><?php /**PATH /var/www/laravel/resources/views/web/home.blade.php ENDPATH**/ ?>
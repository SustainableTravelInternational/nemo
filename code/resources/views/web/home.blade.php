<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Support Nemo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="/css/app.css">

	<!-- Favicons -->
    @mojitoFavicons
</head>
<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>

	<div id="root"></div>
    <div id="modal"></div>

    <script src="/js/index.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Larahunt - @yield('title', 'The most popular Laravel news, packages and products, every day!')</title>

	<link href="/assets/styles/larahunt.css" rel="stylesheet">
</head>
<body>
    @include('partials.nav')

    @include('partials.messages')

	<div class="container">
		@yield('content')
	</div><!-- /container -->

    @include('partials.footer')
</body>
</html>

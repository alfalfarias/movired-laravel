<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link href="{{ asset(mix('dist/css/app.css')) }}" rel="stylesheet">
	@yield('styles')
</head>
<body>
	@yield('content')
	<script src="{{ asset(mix('dist/js/app.js')) }}"></script>
	@yield('scripts')
</body>
</html>
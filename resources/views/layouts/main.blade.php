<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	@vite('resources/css/app.css')
</head>
<body>
	<section id="app">
		<header-component></header-component>
		<router-view></router-view>
	</section>
	@vite('resources/js/app.js')
</body>
</html>
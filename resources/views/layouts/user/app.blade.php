<!DOCTYPE html>
<html>
<head>
	<title>EducateSystem</title>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('usertemplate/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('usertemplate/css/all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('usertemplate/style.css')}}">   
</head>
<body>
<header>
	@include('layouts.user.inc.header')

	@yield('content')
</header>
<script src="{{asset('usertemplate/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('usertemplate/js/script.js')}}"></script>
<script src="{{asset('usertemplate/js/bootstrap.js')}}"></script>


@yield('script')
</body>
</html>

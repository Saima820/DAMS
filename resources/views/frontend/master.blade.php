<!DOCTYPE html>
<html lang="en">

<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>

		<!-- Favicons -->
		<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{url('/assets/plugins/fontawesome/css/all.min.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/assets/css/style.css')}}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        @notifyCss


<style type="text/css"> .notify{ z-index: 1000000; margin-top: 5%; } </style>
	</head>
	<body>





@include('frontend.partials.header')
@include('notify::components.notify')

@yield('content')

@include('frontend.partials.footer')




		<!-- jQuery -->
		<script src="{{url('assets/js/jquery.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{url('assets/js/popper.min.js')}}"></script>
		<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

		<!-- Slick JS -->
		<script src="{{url('assets/js/slick.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{url('assets/js/script.js')}}"></script>



      @notifyJs

	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>

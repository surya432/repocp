<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 3'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    @if(! config('adminlte.enabled_laravel_mix'))
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    @yield('adminlte_css_pre')

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<link href="https://stream.ksplayer.com/templates/jwplayer/skin/asset/css/kunamthemes.css" rel="stylesheet">
	<script type="text/javascript" src="https://ssl.p.jwpcdn.com/player/v/8.6.2/jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer.key = "cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";
	</script>
	<style type="text/css" media="screen">


		#apicodes-player {
			width: 100% !important;
			height: 100% !important;
			overflow: hidden;
			background-color: #000
		}
	</style>
    @yield('adminlte_css')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="@yield('classes_body')" @yield('body_data')>

@yield('body')

@if(! config('adminlte.enabled_laravel_mix'))
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script>
$(document).ajaxStart(function() { Pace.restart(); });
</script>
@include('adminlte::plugins', ['type' => 'js'])

@yield('adminlte_js')
@else
<script src="{{ asset('js/app.js') }}"></script>
@endif

</body>
</html>

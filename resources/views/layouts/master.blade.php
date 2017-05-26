<!DOCTYPE html>
<html lang="es">
<head>
    {{-- header common --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @section('metadata')
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:description" content="">
        <meta property="og:site_name" content="">
        <meta property="og:image" content="">
        <meta property="og:image:secure_url" content="">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="">
        <meta property="twitter:account_id" content="">
    @show
    <title>Club Inmueble</title>
    
    {{-- css section --}}
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/elegant-fonts.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/zabuto_calendar.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/trackpad-scroll-emulator.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.nouislider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jssocials.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jssocials-theme-minima.css') }}" />
    @yield('header-scripts')
</head>

{{-- container section --}}
@yield('content')

{{-- js section --}}
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
<script type="text/javascript" src="{{ asset('assets/js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/richmarker-compiled.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.trackpad-scroll-emulator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/markerclusterer_packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.fitvids.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nouislider.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jssocials.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/maps.js') }}"></script>
<script>
    $(document).ready(function(){
       if($('.alert').attr('class')!=undefined){
           setTimeout(function(){
               $('.alert').slideUp('slow');
           }, 3000);
       }
    });
</script>

@yield('scripts')
@show


</body>
</html>
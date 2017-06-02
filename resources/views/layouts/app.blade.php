<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Club inmueble</title>

    {{-- For production, it is recommended to combine following styles into one. --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.css') }}" type="text/css">

    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ url('assets/img/logo.png') }}" alt="Club inmueble" style="width: 100%;margin-left: 0px;margin-top: -10px;">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse">
                <a href="#" id="sidebar-toggle" class="btn">
                    <i class="navbar-icon fa fa-bars icon"></i>
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img alt="image" class="img-circle" src="/assets/img/profile.png">
                            {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    Cerrar Sesion
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @include('partials.sidebar')

    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    {{-- For production, it is recommended to combine following scripts into one. --}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/delete.handler.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/as/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/as/auth-frontend.js') }}"></script>
    @yield('scripts')
</body>
</html>

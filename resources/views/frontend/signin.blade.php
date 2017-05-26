@extends('layouts.master')
@section('metadata')
    @parent
@stop
@section('title')
    @parent
@stop
@section('css')
    @parent
@stop

@section('content')

    <body class="nav-btn-only homepage">

    <div class="page-wrapper">

        @include('partials.navigation')

        <div id="page-content">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Inicio</a></li>
                    <li class="active">Iniciar sesión</li>
                </ol>
                @include('partials.messages')
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                        <section class="page-title">
                            <h1>Iniciar sesión</h1>
                        </section>
                        <section>
                            <form class="form inputs-underline" method="POST" action="{{route('login')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="username" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                                </div>
                                <div class="form-group center">
                                    <button type="submit" class="btn btn-primary width-100">Ingresar</button>
                                </div>
                            </form>

                            <hr>

                            <p class="center">Si no tenés un usuario, <a href="{{route('signup')}}">Registrate ahora</a>.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')

    </div>
    <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')

@stop
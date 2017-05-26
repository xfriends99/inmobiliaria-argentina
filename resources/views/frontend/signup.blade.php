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
                    <li class="active">Registrate</li>
                </ol>
                @include('partials.messages')
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                        <section class="page-title">
                            <h1>Registrate ahora</h1>
                        </section>
                        <section>
                            <form class="form inputs-underline" method="POST" action="{{route('signup.register')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="first_name">Nombre</label>
                                            <input type="text" class="form-control" name="name" id="first_name" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Apellido</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirmá la Contraseña</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Contraseña">
                                </div>
                                <div class="form-group center">
                                    <button type="submit" class="btn btn-primary width-100">Registrarme ahora</button>
                                </div>
                            </form>

                            <hr>

                            <p class="center">Si ya tenés un usuario, hacé click en <a href="{{ route('signin') }}">Iniciar sesión</a>.</p>
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
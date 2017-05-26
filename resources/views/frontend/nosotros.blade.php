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
                    <li class="active">Nosotros</li>
                </ol>
                <section class="page-title">
                    <h1>Acerca de Club Inmueble</h1>
                </section>
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <section>
                            <p>Mediante una alianza estratégica entre los dos sistemas más importantes de la Zona Sur, el Círculo Inmobiliario de Coparticipación (C.I.C) y la Unión de Inmobiliarias Computadas (UICOM), el día 6 de octubre de 1997 deciden lanzar al mercado "EL INMOBILIARIO", un medio gráfico que cuenta con el apoyo de 62 firmas integrantes de reconocida trayectoria dentro del mercado local, lo que representa una opción eficaz y segura a la hora de llevar adelante una operación inmobiliaria.</p>
                            <p>Diez años más tarde, creamos nuestro propio sitio web con el propósito de seguir contribuyendo al mejoramiento del mercado inmobiliario. Manteniendo el compromiso intacto de seguir esforzándonos, presentamos nuestra nueva página web con importantes cambios con el propósito de facilitar la búsqueda de innumerables oportunidades de negocios.</p>
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
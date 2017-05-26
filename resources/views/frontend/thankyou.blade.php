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
                    <li class="active">Listo</li>
                </ol>
                <section class="page-title center error">
                    <h1>Listo</h1>
                    <h2>En breve XXXX se contactará con vos</h2>
                    <p>Revisá tu correo donde recibirás un detalle de la propiedad XXXXX</p>
                </section>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                        <form class="form inputs-underline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_keyword" placeholder="¿Querés seguir buscando?">
                                <span class="input-group-btn">
                                        <button class="btn" type="submit"><i class="arrow_right"></i></button>
                                    </span>
                            </div>
                        </form>
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
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
                    <li class="active">Mis Propiedades</li>
                </ol>
                <div class="row">
                    <div class="col-md-12 ">
                        <section class="page-title">
                            <h1>Tu lista de propiedades</h1>
                        </section>
                        <section>
                            <div class="row">
                                <!--PROPIEDAD-->
                                <div class="item item-row" data-id="1" data-latitude="40.72807182" data-longitude="-73.85735035">
                                    <a href="propiedad.php">
                                        <div class="image">
                                            <img class="img-height-100" src="assets/img/items/1.jpg" alt="">
                                        </div>
                                        <div class="description description-row">
                                            <div class="label label-default">Tipo de Operación</div>
                                            <h3>Nombre de la propiedad</h3>
                                            <address><i class="fa fa-map-marker"></i> Dirección</address>
                                            <p class="hidden-xs hidden-sm">Descripción description description-row description description-row description description-row description description-row</p>
                                        </div>
                                    </a>
                                    <div class="controls-more-inmo">
                                        <div class="text-right"><a href=""><i class="fa fa-close"></i></a></div>
                                    </div>
                                    <div class="controls-more-pricing">
                                        <h6>U$S 1.220.000</h6>
                                    </div>
                                </div>
                                <!--PROPIEDAD-->
                            </div>
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
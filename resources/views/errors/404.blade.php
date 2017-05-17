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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Contact</li>
                </ol>
                <section class="page-title center error">
                    <h1>Ups</h1>
                    <h2>No existen resultados exactos</h2>
                    <p>Pero encontramos estas propiedades que también podrían interesarte</p>
                </section>
            </div>

            <section class="block no-padding-top">
                <div class="container">
                    <div class="row">
                        <!--PROPIEDAD-->
                        <div class="col-md-3 col-sm-3">
                            <div class="item" data-id="1">
                                <a href="propiedad.php">
                                    <div class="description description-grid">
                                        <div class="label label-default">Operación</div>
                                        <div class="label label-default bg-green">Apto Crédito</div>
                                        <h3>Dueño Alquila Studio Amueblado en Complejo Art Maria</h3>
                                        <address><i class="fa fa-map-marker"></i> Dirección</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        <img src="assets/img/items/2.jpg" alt="">
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">3 ambientes</span></div>
                                    <div class="controls-more"><a href="#">U$S 20.000</a></div>
                                </div>
                            </div>
                        </div>
                        <!--PROPIEDAD-->
                        <div class="col-md-3 col-sm-3">
                            <div class="item" data-id="1">
                                <a href="propiedad.php">
                                    <div class="description description-grid">
                                        <div class="label label-default">Operación</div>
                                        <div class="label label-default bg-green">Apto Crédito</div>
                                        <h3>Dueño Alquila Studio Amueblado en Complejo Art Maria</h3>
                                        <address><i class="fa fa-map-marker"></i> Dirección</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        <img src="assets/img/items/2.jpg" alt="">
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">3 ambientes</span></div>
                                    <div class="controls-more"><a href="#">U$S 20.000</a></div>
                                </div>
                            </div>
                        </div>
                        <!--PROPIEDAD-->
                        <div class="col-md-3 col-sm-3">
                            <div class="item" data-id="1">
                                <a href="propiedad.php">
                                    <div class="description description-grid">
                                        <div class="label label-default">Operación</div>
                                        <div class="label label-default bg-green">Apto Crédito</div>
                                        <h3>Dueño Alquila Studio Amueblado en Complejo Art Maria</h3>
                                        <address><i class="fa fa-map-marker"></i> Dirección</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        <img src="assets/img/items/2.jpg" alt="">
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">3 ambientes</span></div>
                                    <div class="controls-more"><a href="#">U$S 20.000</a></div>
                                </div>
                            </div>
                        </div>
                        <!--PROPIEDAD-->
                        <div class="col-md-3 col-sm-3">
                            <div class="item" data-id="1">
                                <a href="propiedad.php">
                                    <div class="description description-grid">
                                        <div class="label label-default">Operación</div>
                                        <div class="label label-default bg-green">Apto Crédito</div>
                                        <h3>Dueño Alquila Studio Amueblado en Complejo Art Maria</h3>
                                        <address><i class="fa fa-map-marker"></i> Dirección</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        <img src="assets/img/items/2.jpg" alt="">
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">3 ambientes</span></div>
                                    <div class="controls-more"><a href="#">U$S 20.000</a></div>
                                </div>
                            </div>
                        </div>
                        <!--PROPIEDAD-->
                    </div>
                    <div class="center">
                        <a href="#" class="btn btn-primary btn-light-frame btn-rounded">Volver a buscar</a>
                        <a href="#" class="btn btn-primary btn-rounded bg-green border-green">Ver más propiedades así</a>
                    </div>
                </div>
        </div>
        @include('partials.footer')

    </div>
    <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')

@stop
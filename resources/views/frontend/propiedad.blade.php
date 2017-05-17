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

                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <section class="page-title">
                            <div class="pull-left">
                                <h1>Nombre propiedad</h1>
                                <h3 class="display-inline">Precio de venta <strong>U$S 20.000</strong></h3>
                                <div class="label label-default bg-green padding-5px display-inline">Apto Crédito</div>
                            </div>
                            <a href="#" class="btn btn-primary btn-rounded icon scroll pull-right hidden-xs"><i class="fa fa-shopping-cart"></i>Agregar a mi lista</a>
                        </section>

                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <section>
                                    <div class="gallery detail">
                                        <div class="owl-carousel" data-owl-nav="0" data-owl-dots="1">
                                            <div class="image">
                                                <div class="bg-transfer"><img src="assets/img/items/1.jpg" title="" alt=""></div>
                                            </div>
                                            <div class="image">
                                                <div class="bg-transfer"><img src="assets/img/items/1.jpg" title="" alt=""></div>
                                            </div>
                                            <div class="image">
                                                <div class="bg-transfer"><img src="assets/img/items/1.jpg" title="" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <section>
                                        <h2>Descripción</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur tristique enim, ac tincidunt
                                            massa pulvinar non. Donec scelerisque libero eu tincidunt cursus. Phasellus vel commodo nunc, nec suscipit
                                            enim. Integer suscipit, mauris consectetur pharetra ultrices, neque sem malesuada mauris, id tristique
                                            ante leo vel magna. Phasellus ac risus vel erat elementum fringilla et non massa. Pellentesque habitant
                                            morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                        </p>
                                    </section>
                                </section>

                                <section class="box">
                                    <h2>Información principal</h2>
                                    <dl>
                                        <dt>Tipo de propiedad</dt>
                                        <dd>Casa</dd>
                                        <dt>Dormitorios</dt>
                                        <dd>1</dd>
                                        <dt>Baños</dt>
                                        <dd>1</dd>
                                        <dt>Garages</dt>
                                        <dd>1</dd>
                                    </dl>
                                </section>

                                <section class="box hidden-xs">
                                    <h2>Recorré la propiedad</h2>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses!2sar!4v1492176190379!6m8!1m7!1s6xyYTVLdoxTd00cCXgRucg!2m2!1d-34.5938383138036!2d-58.39270609541227!3f7.565881360058729!4f0!5f0.7820865974627469" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </section>
                            </div>
                            <!--end col-md-6-->
                            <div class="col-md-4 col-sm-12">
                                <section>
                                    <div class="detail-sidebar">
                                        <section class="shadow">
                                            <div class="map height-280px" id="map-detail"></div>

                                            <div class="content">
                                                <address>
                                                    <figure><i class="fa fa-map-marker"></i>3858 Marion Street<br>Morrisville, VT 05661 </figure>
                                                </address>
                                            </div>
                                        </section>
                                    </div>
                                </section>

                                <section>
                                    <h2>Amenities</h2>
                                    <ul class="tags">
                                        <li>Agua corriente</li>
                                    </ul>
                                </section>
                                <section>
                                    <h2>Compartir</h2>
                                    <div class="social-share"></div>
                                </section>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <aside class="sidebar box">
                            <section>
                                <h2>Agendá una visita</h2>
                                <div class="element"><img src="assets/img/logo-2.png" alt=""></div>
                                <h3>Teléfono: <a href="tel:+5411">11 5163-0000</a></h3>
                                <form class="form inputs-underline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="telefono" placeholder="Teléfono">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right">Quiero que me contacten<i class="fa fa-envelope"></i></button>
                                    </div>
                                </form>
                            </section>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')

    </div>
    <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')
    <script>
        rating(".visitor-rating");
        var _latitude = 40.7344458;
        var _longitude = -73.86704922;
        var element = "map-detail";
        simpleMap(_latitude,_longitude, element);
    </script>

    <script>
        $("#share").jsSocials({
            shares: ["email", "facebook", "whatsapp"]
        });
    </script>
@stop
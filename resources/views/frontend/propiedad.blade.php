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
                    <li class="active">Propiedad</li>
                </ol>
                @include('partials.messages')
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <section class="page-title">
                            <div class="pull-left">
                                <h1>{{$data['publication_title']}}</h1>
                                <h3 class="display-inline">Precio de venta <strong>{{$property->get_available_prices()[0]}}</strong></h3>
                                <?php
                                $array = [];
                                foreach ($data['tags'] as $tag){
                                    $array[] = $tag->id;
                                }
                                ?>
                                @if(in_array(1528, $array))
                                    <div class="label label-default bg-green padding-5px display-inline">Apto Crédito</div>
                                @endif
                            </div>
                            @if(Auth::check() && !$property_user)
                                <form method="POST" action="{{route('carrito.add', $data['id'])}}">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary btn-rounded icon scroll pull-right hidden-xs"><i class="fa fa-shopping-cart"></i>Agregar a mi lista</button>
                                </form>

                            @elseif(Auth::check() && $property_user)
                                <form method="POST" action="{{route('carrito.delete', $data['id'])}}">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary btn-rounded icon scroll pull-right hidden-xs"><i class="fa fa-shopping-cart"></i>Borrar de mi lista</button>
                                </form>
                            @endif
                        </section>

                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <section>
                                    <div class="gallery detail">
                                        <div class="owl-carousel" data-owl-nav="0" data-owl-dots="1">
                                            @foreach($data['photos'] as $photo)
                                                <div class="image">
                                                    <div class="bg-transfer"><img src="{{$photo->image}}" title="{{$photo->description}}" alt=""></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <section>
                                        <h2>Descripción</h2>
                                        <p>
                                            {{$data['description']}}
                                        </p>
                                    </section>
                                </section>

                                <section class="box">
                                    <h2>Información principal</h2>
                                    <dl>
                                        <dt>Tipo de propiedad</dt>
                                        <dd>{{$data['type']->name}}</dd>
                                        <dt>Dormitorios</dt>
                                        <dd>{{$data['room_amount']}}</dd>
                                        <dt>Baños</dt>
                                        <dd>{{$data['bathroom_amount']}}</dd>
                                        <dt>Garages</dt>
                                        <dd>{{$data['parking_lot_amount']}}</dd>
                                    </dl>
                                </section>
                                @if(isset($data['geo_lat']) && isset($data['geo_long']))
                                    <section class="box hidden-xs">
                                        <h2>Recorré la propiedad</h2>
                                        <iframe src="https://www.google.com/maps/embed/v1/streetview?key=AIzaSyASbXb64d2fKwT3rdqqCvZYmq4jCdFDtIQ&location={{$data['geo_lat']}},{{$data['geo_long']}}" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </section>
                                @endif
                            </div>
                            <!--end col-md-6-->
                            <div class="col-md-4 col-sm-12">
                                <section>
                                    <div class="detail-sidebar">
                                        <section class="shadow">
                                            <div class="map height-280px" id="map-detail"></div>

                                            <div class="content">
                                                <address>
                                                    <figure><i class="fa fa-map-marker"></i>{{$data['address']}} </figure>
                                                </address>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                @if(count($data['tags'])>0)
                                <section>
                                    <h2>Amenities</h2>
                                    <ul class="tags">
                                        @foreach($data['tags'] as $tag)
                                            <li>{{$tag->name}}</li>
                                        @endforeach
                                    </ul>
                                </section>
                                @endif
                                <!--
                                <section>
                                    <h2>Compartir</h2>
                                    <div class="social-share"></div>
                                </section>-->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <aside class="sidebar box">
                            <section>
                                <h2>Agendá una visita</h2>
                                @if(isset($data['company']))
                                    <div class="element"><img src="{{$data['company']->logo}}" alt="" style="width:100px;"></div>
                                @endif
                                <!--<h3> <!--<a href="tel:+54"></a></h3>-->
                                <form class="form inputs-underline" method="POST" action="{{route('propiedad.contacto', $data['id'])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="key" value="{{$data['company']->key}}">
                                    <div class="form-group">
                                        <input type="text" @if(Auth::check()) readonly value="{{Auth::user()->name}}" @endif class="form-control" name="name" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel"  @if(Auth::check()) readonly value="{{Auth::user()->phone}}" @endif class="form-control" name="phone" placeholder="Teléfono">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" @if(Auth::check()) readonly value="{{Auth::user()->email}}" @endif class="form-control" name="email" placeholder="Email">
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
    @if(isset($data['geo_lat']) && isset($data['geo_long']))
        <script>
            rating(".visitor-rating");
            var _latitude = "{{$data['geo_lat']}}";
            var _longitude = "{{$data['geo_long']}}";
            var element = "map-detail";
            simpleMap(_latitude,_longitude, element);
        </script>
    @endif

    <script>
        $("#share").jsSocials({
            shares: ["email", "facebook", "whatsapp"]
        });
    </script>
@stop
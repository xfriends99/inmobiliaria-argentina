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
        <div class="hero-section has-background height-600px">
            <div class="wrapper">
                <div class="inner">
                    <div class="container">
                        <div class="page-title center">
                            <h1>Buscá y encontrá tu inmueble hoy</h1>
                            <h2 class="hidden-xs">Nuestras inmobiliarias te ayudan a encontrar la propiedad que querés</h2>
                            <h2 class="hidden-sm hidden-md hidden-lg">Agendá ahora una visita y descubrí oportunidades imperdibles</h2>
                        </div>
                        <div class="form search-form horizontal">
                            <form method="GET" action="{{route('search')}}">
                                <div class="row">
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" name="operacion">
                                                <option value="1">Venta</option>
                                                <option value="2">Alquilar</option>
                                                <option value="2">Alquilar Temporalmente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" name="propiedad">
                                                @foreach($tokko_properties as $property)
                                                <option value="{{$property->id}}">{{$property->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Buscá por lugar, dirección o inmobiliaria">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary pull-right darker"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-wrapper">
                <div class="bg-transfer opacity-90"><img src="/assets/img/bg-1.jpeg" title="Club Inmueble" alt="Club Inmueble"></div>
                <div class="background-color background-color-black"></div>
            </div>
        </div>

        <section class="block">
            <div class="container">
                <div class="center">
                    <div class="section-title">
                        <div class="center">
                            <h2>Nuevas propiedades disponibles <span class="text-green">apto crédito</span></h2>
                            <h3 class="subtitle">Descubrí las últimas oportunidades en bienes raíces de la mano de las más destacadas inmobiliarias de Argentina.</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--PROPIEDAD-->
                    @foreach($properties as $d)
                        <div class="col-md-3 col-sm-3">
                            <div class="item" data-id="{{$d->data->id}}">
                                <a href="{{route('propiedad', $d->data->id)}}">
                                    <div class="description description-grid">
                                        <div class="label label-default">Operación</div>
                                        <div class="label label-default bg-green">Apto Crédito</div>
                                        <h3>{{$d->data->publication_title}}</h3>
                                        <address><i class="fa fa-map-marker"></i> {{$d->data->address}}</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        @if(isset($d->data->photos[0]))
                                            <img src="{{$d->data->photos[0]->image}}" alt="">
                                        @endif
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">{{$d->data->room_amount}} ambientes</span></div>
                                    <div class="controls-more"><a href="#">{{$d->get_available_prices()[0]}}</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--PROPIEDAD-->
                </div>
                <div class="center">
                    <a href="{{route('search')}}" class="btn btn-primary btn-light-frame btn-rounded btn-framed arrow">Ver todas las propiedades</a>
                </div>
            </div>
        </section>
    </div>

    @include('partials.footer')

</div>
<a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')

@stop
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
                    <li class="active">Error</li>
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
                        @foreach($properties as $d)
                            <div class="col-md-3 col-sm-3">
                                <div class="item" data-id="{{$d->data->id}}">
                                    <a href="{{route('propiedad', $d->data->id)}}">
                                        <div class="description description-grid">
                                            <div class="label label-default">
                                                <?php $pop = ''; ?>
                                                @foreach($d->data->operations as $ope)
                                                    <?php $pop.= ($pop!='') ? ' - '.$ope->operation_type : $ope->operation_type; ?>
                                                @endforeach
                                                {{$pop}}
                                            </div>
                                            <?php
                                            $array = [];
                                            foreach ($d->data->tags as $tag){
                                                $array[] = $tag->id;
                                            }
                                            ?>
                                            @if(in_array(1528, $array))
                                                <div class="label label-default bg-green">Apto Crédito</div>
                                            @endif
                                            <h3>{{$d->data->publication_title}}</h3>
                                            <address><i class="fa fa-map-marker"></i> {{$d->data->location->name}}</address>
                                        </div>
                                        <div class="image bg-transfer">
                                            @if(isset($d->data->photos[0]))
                                                <img src="{{$d->data->photos[0]->image}}" alt="">
                                            @else
                                                <img src="/img-default.jpg" alt="">
                                            @endif
                                        </div>
                                    </a>
                                    <div class="additional-info">
                                        <div class="rating-passive"><span class="reviews">
                                            @if(number_format(round($d->data->surface), 0, ',', '.')!='0')
                                                    {{number_format(round($d->data->surface), 0, ',', '.')}} M2
                                                @else
                                                    <br>
                                                @endif
                                            </span></div>
                                        <div class="controls-more"><a href="#">{{$d->get_available_prices()[0]}}</a></div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                        <!--PROPIEDAD-->
                    </div>
                    <div class="center">
                        <a href="{{route('home')}}" class="btn btn-primary btn-light-frame btn-rounded">Volver a buscar</a>
                        <a href="{{route('search')}}" class="btn btn-primary btn-rounded bg-green border-green">Ver más propiedades así</a>
                    </div>
                </div>
        </div>

        @include('partials.footer')

    </div>
    <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')

@stop
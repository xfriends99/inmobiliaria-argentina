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
                @include('partials.messages')
                <div class="row">
                    <div class="col-md-12 ">
                        <section class="page-title">
                            <h1>Tu lista de propiedades</h1>
                        </section>
                        <section>
                            <div class="row">
                                <!--PROPIEDAD-->
                                @foreach($data as $d)
                                <div class="item item-row" data-id="{{$d['property_id']}}" data-latitude="{{$d['data']['geo_lat']}}" data-longitude="{{$d['data']['geo_long']}}">
                                    @if($d['type']=='property')
                                        <a href="{{route('propiedad', $d['property_id'])}}">
                                    @else
                                        <a href="{{route('emprendimiento', $d['property_id'])}}">
                                    @endif
                                        <div class="image">
                                            @if(isset($d['data']['photos'][0]))
                                                <img class="img-height-100" src="{{$d['data']['photos'][0]->image}}" alt="">
                                            @endif
                                        </div>
                                        <div class="map hidden-xs hidden-sm"></div>
                                        <div class="description description-row">
                                            <div class="label label-default">Tipo de Operación</div>
                                            <h3>
                                                @if($d['type']=='property')
                                                    {{$d['data']['publication_title']}}
                                                @else
                                                    {{$d['data']['name']}}
                                                @endif
                                            </h3>
                                            <address><i class="fa fa-map-marker"></i> {{$d['data']['address']}}</address>
                                            <p class="hidden-xs hidden-sm">{{$d['data']['description']}}</p>
                                        </div>
                                    </a>
                                    <form method="POST" action="{{route('carrito.delete', $d['property_id'])}}" class="form-delete">
                                        {{csrf_field()}}
                                        <div class="controls-more-inmo">
                                            <div class="text-right"><a class="delete" href="#"><i class="fa fa-close"></i></a></div>
                                        </div>
                                    </form>
                                    <div class="controls-more-pricing">
                                        <h6>
                                            @if($d['type']=='property')
                                                {{$d['object']->get_available_prices()[0]}}
                                            @else
                                                Desconocido
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
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
    <script>
        $(document).ready(function(){
            $('.delete').click(function(e){
               console.log('mamalo vale');
               e.preventDefault();
               console.log($(this).parent().parent().parent());
               $(this).parent().parent().parent().submit();
            });
        });
    </script>
@stop
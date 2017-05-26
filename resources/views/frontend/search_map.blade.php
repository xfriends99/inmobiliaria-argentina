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
                    <li class="active">Propiedades</li>
                </ol>
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <aside class="sidebar">
                            <!--FILTROS-->
                        @include("partials.filtros")
                        <!--FILTROS-->
                        </aside>
                    </div>

                    <d  iv class="col-md-9 col-sm-8 hidden-xs hidden-sm">
                        <div class="search-results-controls clearfix">
                            <div class="pull-right">
                                <a href="{{route('search')}}?@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon"><i class="fa fa-th"></i></a>
                                <a href="{{route('search')}}?ord=row&@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon"><i class="fa fa-bars"></i></a>
                                <a href="{{route('search')}}?ord=map&@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon active"><i class="fa fa-map-marker"></i></a>
                            </div>
                        </div>
                        <div class="hero-section full-screen has-map has-sidebar margin-top-15px">
                            @foreach($properties as $d)
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyASbXb64d2fKwT3rdqqCvZYmq4jCdFDtIQ&q={{$d->data->address}}" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                            @endforeach
                        </div>
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
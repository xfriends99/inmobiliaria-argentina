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
                    <li class="active">Inmobiliarias</li>
                </ol>
                <div class="row">
                    <div class="col-md-12 ">
                        <section class="page-title">
                            <h1>Inmobiliarias en Club Inmueble</h1>
                            <form class="form inputs-underline">
                                <div class="form-group ">
                                    <input type="text" class="form-control" name="keyword" placeholder="Buscá por nombre">
                                </div>
                            </form>
                        </section>
                        <section>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="" class="image">
                                            <img src="http://www.clubinmueble.com/imgInmob/alem.jpeg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">Inmobiliaria</a></h3>
                                                <address>23 Listings</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>(123) 456 789</figure>
                                                <figure><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i>jane.doe@example.com</a></figure>
                                                <figure><a href="http://" target="_blank"><i class="fa fa-laptop"></i>www.web.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
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
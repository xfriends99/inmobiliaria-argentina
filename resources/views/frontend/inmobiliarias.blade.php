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
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_8.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">ACEVEDO NEGOCIOS INMOBILIARIOS</a></h3>
                                                <address>Acevedo 1401</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4242-0780 * 4242-0634</figure>
                                                <figure><a href="mailto:info@acevedopropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@acevedopropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.acevedopropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>acevedopropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/alem.jpeg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">ALEM PROPIEDADES</a></h3>
                                                <address>Portela 306</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-1001 (rotativas)</figure>
                                                <figure><a href="mailto:info@alemprop.com" target="_blank"><i class="fa fa-envelope"></i>info@alemprop.com</a></figure>
                                                <figure><a href="http://www.alemprop.com" target="_blank"><i class="fa fa-laptop"></i>www.alemprop.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/alem.jpeg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">ALEM PROPIEDADES (SUC. CANNING)</a></h3>
                                                <address>Portela 306</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>Castex Office | Castex 468 | Canning</figure>
                                                <figure><a href="canning@alemprop.com" target="_blank"><i class="fa fa-envelope"></i>canning@alemprop.com</a></figure>
                                                <figure><a href="http://www.alemprop.com" target="_blank"><i class="fa fa-laptop"></i>www.alemprop.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_19.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">ALICIA VINELLI</a></h3>
                                                <address>Av. Meeks 269</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4245-0618 (Lí­neas rotativas)</figure>
                                                <figure><a href="mailto:aliciavinellipropiedades@gmail.com" target="_blank"><i class="fa fa-envelope"></i>aliciavinellipropiedades@gmail.com</a></figure>
                                                <figure><a href="http://www.aliciavinelliprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.aliciavinelliprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_70.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">ALVAREZ PROPIEDADES</a></h3>
                                                <address>L. N. Alem 515</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-4500 (Líneas rotativas)</figure>
                                                <figure><a href="mailto:alvarezpropiedades@hotmail.com" target="_blank"><i class="fa fa-envelope"></i>alvarezpropiedades@hotmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_2.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">BARAGLI NEGOCIOS INMOBILIARIOS</a></h3>
                                                <address>Chacabuco 167</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4242-6958</figure>
                                                <figure><a href="mailto:bonatti@bonattipropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>bonatti@bonattipropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.bonattipropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.bonattipropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_46.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">BONATTI PROPIEDADES</a></h3>
                                                <address> Av. L.N. Alem 1688/90</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>3964-9949</figure>
                                                <figure><a href="mailto:canning@bonattipropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>canning@bonattipropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.bonattipropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.bonattipropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_46.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">BONATTI PROPIEDADES (SUC. CANNING)</a></h3>
                                                <address>Mariano Castex 1257 of.306</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>3964-9949</figure>
                                                <figure><a href="mailto:canning@bonattipropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>canning@bonattipropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_37.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CABELLO PROPIEDADES</a></h3>
                                                <address>Alvarez Thomas 245</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-4162</figure>
                                                <figure><a href="mailto:cabellop@infovia.com.ar" target="_blank"><i class="fa fa-envelope"></i>cabellop@infovia.com.ar</a></figure>
                                                <figure><a href="http://www.cabellopropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.cabellopropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_55.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CABRERA PROPIEDADES</a></h3>
                                                <address>Av. Alsina 498</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4248-9597 * 4202-7492 * 4202-6619</figure>
                                                <figure><a href="mailto:info@cabrerapropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@cabrerapropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.cabrerapropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.cabrerapropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_35.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CAIZZA RODOLFO INMOBILIARIA</a></h3>
                                                <address>Carlos Pellegrini 166</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-1371 * 4244-8867</figure>
                                                <figure><a href="mailto:rodolfocaizza@ciudad.com.ar" target="_blank"><i class="fa fa-envelope"></i>rodolfocaizza@ciudad.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_7.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CARLOS MORENO DEL CAMPO PROP.</a></h3>
                                                <address>Loria 119</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-8118  *  4244-8880</figure>
                                                <figure><a href="mailto:carlosmorenodelcampoprop@datamarkets.com.ar" target="_blank"><i class="fa fa-envelope"></i>carlosmorenodelcampoprop<br>@datamarkets.com.ar</a></figure>
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
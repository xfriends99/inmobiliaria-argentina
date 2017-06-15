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
                                    <input type="text" id="search" class="form-control" name="keyword" placeholder="Buscá por nombre">
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
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/caruso.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CARUSO PROPIEDADES</a></h3>
                                                <address>Malabia 329</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4248-7070</figure>
                                                <figure><a href="mailto:caru@carusoprop.com.ar" target="_blank"><i class="fa fa-envelope"></i>caru@carusoprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/celanogandolfo.jpeg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CELANO & GANDOLFO NEGOCIOS INMOBILIARIOS</a></h3>
                                                <address>Av. Castex 468 1er piso</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>0810-333-1000</figure>
                                                <figure><a href="mailto:info@celanogandolfo.com" target="_blank"><i class="fa fa-envelope"></i>info@celanogandolfo.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_47.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CESAR KOTLER PROPIEDADES</a></h3>
                                                <address>Cangallo 177</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-7898 * 4292-8878</figure>
                                                <figure><a href="mailto:info@kotlerpropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@kotlerpropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.kotlerpropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.kotlerpropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_29.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">COMITO BROKERS INMOB. (TEMPERLEY)</a></h3>
                                                <address>Av. Meeks 1038</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-3036 * 4292-0038</figure>
                                                <figure><a href="mailto:temperley@comitopropiedades.com" target="_blank"><i class="fa fa-envelope"></i>temperley@comitopropiedades.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_29.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">COMITO PROPIEDADES</a></h3>
                                                <address>España 288</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-1199</figure>
                                                <figure><a href="mailto:comitoprop@sinectis.com.ar" target="_blank"><i class="fa fa-envelope"></i>comitoprop@sinectis.com.ar</a></figure>
                                                <figure><a href="http://www.comitopropiedades.com" target="_blank"><i class="fa fa-laptop"></i>www.comitopropiedades.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_43.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">CONFORT PROPIEDADES</a></h3>
                                                <address>Manuel Castro 88</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-3284  *  4243-3287</figure>
                                             </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_33.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">DARQUIER PROPIEDADES</a></h3>
                                                <address>Spiro 1052</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4294-8181 * 4294-8500 * 4214-2942</figure>
                                                <figure><a href="mailto:info@darquierpropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@darquierpropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.darquierpropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.darquierpropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_18.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">DARQUIER PROPIEDADES (SUC. CENTRO)</a></h3>
                                                <address>Av. Corrientes 1296 - 8º Piso</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4116-2551 * 4116-2548</figure>
                                                <figure><a href="mailto:info@darquiercentro.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@darquiercentro.com.ar</a></figure>
                                                <figure><a href="http://www.darquierpropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.darquierpropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_13.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">DIAZ MAYER & BRIE PROPIEDADES</a></h3>
                                                <address>E. Adrogué 1015 - 1º Piso</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4293-4400</figure>
                                                <figure><a href="mailto:diazmayerybrie@ciudad.com.ar" target="_blank"><i class="fa fa-envelope"></i>diazmayerybrie@ciudad.com.ar</a></figure>
                                                <figure><a href="http://www.diazmayer-brie.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.diazmayer-brie.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_61.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">DINO RODRIGUEZ PROPIEDADES</a></h3>
                                                <address>Luzuriaga 444</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4298-2311</figure>
                                                <figure><a href="mailto:realestate@dinoprop.com" target="_blank"><i class="fa fa-envelope"></i>realestate@dinoprop.com</a></figure>
                                                <figure><a href="http://www.dinoprop.com" target="_blank"><i class="fa fa-laptop"></i>www.dinoprop.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_15.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">DUCHINI PROPIEDADES</a></h3>
                                                <address>25 de Mayo 75</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-0967 * 4244-8057 * 4292-6241</figure>
                                                <figure><a href="mailto:sylviaduchini@gmail.com" target="_blank"><i class="fa fa-envelope"></i>sylviaduchini@gmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/foce.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">FABIAN FOCE</a></h3>
                                                <address>Av. H.Yrigoyen 7907</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4242-4350 * 4202-5886</figure>
                                                <figure><a href="mailto:info@fabianfoce.com" target="_blank"><i class="fa fa-envelope"></i>info@fabianfoce.com</a></figure>
                                           </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/e-gandolfo.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">EDUARDO GANDOLFO NEGOCIOS INMOB</a></h3>
                                                <address>Av. Hipólito Yrigoyen 6119</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4202-5009</figure>
                                                <figure><a href="mailto:info@eduardogandolfo.com" target="_blank"><i class="fa fa-envelope"></i>info@eduardogandolfo.com</a></figure>
                                                <figure><a href="http://www.eduardogandolfo.com" target="_blank"><i class="fa fa-laptop"></i>www.eduardogandolfo.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/e-gandolfo.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">EDUARDO GANDOLFO (SUC. CANNING)</a></h3>
                                                <address>Castex Office | Castex 468 | Canning</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4295-9582</figure>
                                                <figure><a href="mailto:info@eduardogandolfo.com" target="_blank"><i class="fa fa-envelope"></i>info@eduardogandolfo.com</a></figure>
                                                <figure><a href="http://www.eduardogandolfo.com" target="_blank"><i class="fa fa-laptop"></i>www.eduardogandolfo.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_49.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">EMPRIN</a></h3>
                                                <address>Loria 421</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-9566 * 4406-6668</figure>
                                                <figure><a href="mailto:emprin@infovia.com.ar" target="_blank"><i class="fa fa-envelope"></i>emprin@infovia.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_54.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">FABIAN TORTELLO NEGOC. INMOB.</a></h3>
                                                <address>Sarmiento 165</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-0133</figure>
                                                <figure><a href="mailto:ftortello@infovia.com.ar" target="_blank"><i class="fa fa-envelope"></i>ftortello@infovia.com.ar</a></figure>
                                                <figure><a href="http://www.fabiantortello.com" target="_blank"><i class="fa fa-laptop"></i>www.fabiantortello.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_4.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">FANDIÑO PROPIEDADES</a></h3>
                                                <address>Av. Alsina 1010</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4242-9141</figure>
                                                <figure><a href="mailto:fandi@fandiprop.com.ar" target="_blank"><i class="fa fa-envelope"></i>fandi@fandiprop.com.ar</a></figure>
                                                <figure><a href="http://www.fandiprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.fandiprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_23.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">FAUSTI PROPIEDADES</a></h3>
                                                <address>Gorriti 7</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-0428 * 4292-8260</figure>
                                                <figure><a href="mailto:faustiprop@gmail.com" target="_blank"><i class="fa fa-envelope"></i>faustiprop@gmail.com</a></figure>
                                             </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_63.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">GARROTE PROPIEDADES</a></h3>
                                                <address>Av. Mitre 1321</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4293-9500</figure>
                                                <figure><a href="mailto:garrotepropiedades@gmail.com" target="_blank"><i class="fa fa-envelope"></i>garrotepropiedades@gmail.com</a></figure>
                                                <figure><a href="http://www.garrote.multi-pagina.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.garrote.multi-pagina.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_51.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">GIORGIS Y CIA.</a></h3>
                                                <address>Esteban Adrogué 1097</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4294-1236 * 4294-5327</figure>
                                                <figure><a href="mailto:info@giorgisycompania.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@giorgisycompania.com.ar</a></figure>
                                                <figure><a href="http://www.giorgisycompania.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.giorgisycompania.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_27.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">GUSTAVO FERRARI INMUEBLES</a></h3>
                                                <address>Av. Pte. Hipolito Yrigoyen 9908</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4292-2420 * 4245-6116 *  15-3454-0050</figure>
                                                <figure><a href="mailto:ferrarinmuebles@gmail.com" target="_blank"><i class="fa fa-envelope"></i>ferrarinmuebles@gmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_25.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">H. LISSI INMOBILIARIA</a></h3>
                                                <address>Almte. Brown 3989</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-4076</figure>
                                                <figure><a href="mailto:h.lissi_inmobiliaria@hotmail.com" target="_blank"><i class="fa fa-envelope"></i>h.lissi_inmobiliaria@hotmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/habitar.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">HABITAR PROPIEDADES</a></h3>
                                                <address>Colombres 107</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-6536 * 4244-9082</figure>
                                                <figure><a href="mailto:habitarpropiedades@speedy.com.ar" target="_blank"><i class="fa fa-envelope"></i>habitarpropiedades@speedy.com.ar</a></figure>
                                                <figure><a href="http://www.habitarpropiedades.com" target="_blank"><i class="fa fa-laptop"></i>www.habitarpropiedades.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_16.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">HERNANDO PROPIEDADES</a></h3>
                                                <address>Av. H. Yrigoyen 7389</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4202-9400 * 4248-4776 * 4202-1401</figure>
                                                <figure><a href="mailto:hernandopropiedades@2vias.com.ar" target="_blank"><i class="fa fa-envelope"></i>hernandopropiedades@2vias.com.ar</a></figure>
                                                <figure><a href="http://www.hernandoprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.hernandoprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_59.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">INMOBILIARIA SANGIACOMO</a></h3>
                                                <address>Av. Hipólito Yrigoyen 11229</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4298-3777 * 4298-2333</figure>
                                                <figure><a href="mailto:inmosanturdera@yahoo.com.ar" target="_blank"><i class="fa fa-envelope"></i>inmosanturdera@yahoo.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_42.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">JUAN CARLOS della PAOLERA PROP</a></h3>
                                                <address>Demaría 575</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4214-6400 * 4294-1182</figure>
                                                <figure><a href="mailto:info@jcdp.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@jcdp.com.ar</a></figure>
                                                <figure><a href="http://www.jcdp.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.jcdp.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lesza.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">LESZA</a></h3>
                                                <address>Del Valle Iberlucea 2910 | Lanús</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4241-6131 | 4240-5773 | 4225-100</figure>
                                                <figure><a href="mailto:info@lesza.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@lesza.com.ar</a></figure>
                                                <figure><a href="http://www.lesza.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.lesza.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_39.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">LO RE PROPIEDADES</a></h3>
                                                <address>Av. Alsina 1400</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-1000</figure>
                                                <figure><a href="mailto:loreprop@loreprop.com.ar" target="_blank"><i class="fa fa-envelope"></i>loreprop@loreprop.com.ar</a></figure>
                                                <figure><a href="http://www.loreprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.loreprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_12.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">LORAY PROPIEDADES</a></h3>
                                                <address>Colombres 230</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-3000</figure>
                                                <figure><a href="mailto:lorayprop@speedy.com.ar" target="_blank"><i class="fa fa-envelope"></i>lorayprop@speedy.com.ar</a></figure>
                                                <figure><a href="http://www.loraypropiedades.com" target="_blank"><i class="fa fa-laptop"></i>www.loraypropiedades.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/luvina.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">LUVINA PROPIEDADES</a></h3>
                                                <address>Dir: Loria 315/7 - Lomas de Zamora</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>(011) 4245-3104</figure>
                                                <figure><a href="http://www.luvinapropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.luvinapropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_56.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">MARCELO CANDEL PROPIEDADES</a></h3>
                                                <address>Italia 202</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4292-4117 * 4245-7561</figure>
                                                <figure><a href="mailto:mecp@fibertel.com.ar" target="_blank"><i class="fa fa-envelope"></i>mecp@fibertel.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_34.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">MARCONI RASSO NEGOC. INMOB</a></h3>
                                                <address>Italia 252</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-1605</figure>
                                                <figure><a href="mailto:marconirasso@yahoo.com.ar" target="_blank"><i class="fa fa-envelope"></i>marconirasso@yahoo.com.ar</a></figure>
                                                <figure><a href="http://www.marconirassoprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.marconirassoprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_36.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">MARTIN GRANDOLI NEG. INMOB</a></h3>
                                                <address>Conscripto Bernardi 672</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4294-4525</figure>
                                                <figure><a href="mailto:martingrandoli@hotmail.com" target="_blank"><i class="fa fa-envelope"></i>martingrandoli@hotmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/monica-zuccatti.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">MONICA ZUCCATTI NEGOCIOS INMOB.</a></h3>
                                                <address>L. N. Alem 1399 - PB</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4242-1728 * 4242-2924</figure>
                                                <figure><a href="mailto:zuccatti@sion.com.ar" target="_blank"><i class="fa fa-envelope"></i>zuccatti@sion.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_17.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">MUNNO PROPIEDADES</a></h3>
                                                <address>Manuel Castro 355</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-1618</figure>
                                                <figure><a href="mailto:munnoprop@yahoo.com.ar" target="_blank"><i class="fa fa-envelope"></i>munnoprop@yahoo.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_24.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">NUÑEZ PROPIEDADES</a></h3>
                                                <address>Av. Garibaldi 898</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-8305 * 4292-4237</figure>
                                                <figure><a href="mailto:nunezpropiedades@hotmail.com.ar" target="_blank"><i class="fa fa-envelope"></i>nunezpropiedades@hotmail.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/osvaldo_mendez.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">OSVALDO MENDEZ NEG. INMOB</a></h3>
                                                <address>Dr. A. Alsina 1212</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4299-1524</figure>
                                                <figure><a href="mailto:consultas@osvaldomendezprop.com" target="_blank"><i class="fa fa-envelope"></i>consultas@osvaldomendezprop.com</a></figure>
                                                <figure><a href="http://www.marconirassoprop.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.marconirassoprop.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_58.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">OSVALDO POPLIKO PROPIEDADES</a></h3>
                                                <address>Castelli 1208</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4294-8998</figure>
                                                <figure><a href="mailto:osvaldopopliko@yahoo.com.ar" target="_blank"><i class="fa fa-envelope"></i>osvaldopopliko@yahoo.com.ar</a></figure>
                                                <figure><a href="http://www.popliko.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.popliko.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_5.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">PANIZZI INMOBILIARIA</a></h3>
                                                <address>Pereyra Lucena 766</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-7345 * 4245-9193 *  15 - 63998337 - 587*3166</figure>
                                                <figure><a href="mailto:info@inmobiliariapanizzi.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@inmobiliariapanizzi.com.ar</a></figure>
                                                <figure><a href="http://www.inmobiliariapanizzi.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.inmobiliariapanizzi.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/pilares.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">PILARES PROPIEDADES</a></h3>
                                                <address>Av. L.N. Alem 1097</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4248-7799 * 2050-8842 * 4202-8422</figure>
                                                <figure><a href="mailto:info@pilarespropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@pilarespropiedades.com.ar</a></figure>
                                                <figure><a href="http://www.inmobiliariapanizzi.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.inmobiliariapanizzi.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_20.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">PITTON INMOBILIARIA</a></h3>
                                                <address>Av. Alsina 284</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4202-6625 * 4202-6626</figure>
                                                <figure><a href="mailto:info@pitton.net" target="_blank"><i class="fa fa-envelope"></i>info@pitton.net</a></figure>
                                                <figure><a href="http://www.pitton.net" target="_blank"><i class="fa fa-laptop"></i>www.pitton.net</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_45.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">RAIMONDO NEGOCIOS INMOBILIARIOS</a></h3>
                                                <address>Av. Espora 1100</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4293-0668</figure>
                                                <figure><a href="mailto:info@raimondopropiedades.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@raimondopropiedades.com.art</a></figure>
                                                <figure><a href="http://www.raimondopropiedades.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.raimondopropiedades.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_14.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">RODRIGUEZ DRIMAL NEG. INMOB</a></h3>
                                                <address>Av. Hipolito Yrigoyen 11134</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4231-7405 * 4231-7696</figure>
                                                <figure><a href="mailto:rodriguezdrimal@yahoo.com.ar" target="_blank"><i class="fa fa-envelope"></i>rodriguezdrimal@yahoo.com.ar</a></figure>
                                                <figure><a href="http://www.rodriguezdrimal.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.rodriguezdrimal.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_1.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">SANTILLI INMOBILIARIA</a></h3>
                                                <address>Gorriti 130</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4244-8080 * 4292-4447</figure>
                                                <figure><a href="mailto:info@santilli.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@santilli.com.ar</a></figure>
                                                <figure><a href="http://www.santilli.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.santilli.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/toneguzzo.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">TONEGUZZO INMOBILIARIA</a></h3>
                                                <address>E. de Burzaco 601</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4299-8855 / 22</figure>
                                                <figure><a href="mailto:turtoneguzzo@gmail.com" target="_blank"><i class="fa fa-envelope"></i>turtoneguzzo@gmail.com</a></figure>
                                                <figure><a href="http://www.toneguzzo.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.toneguzzo.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/vaccher.png" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">VACCHER ESTUDIO INMOBILIARIO</a></h3>
                                                <address>Av. Santamarina 195</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4290-0480</figure>
                                                <figure><a href="mailto:info@vaccher.com.ar" target="_blank"><i class="fa fa-envelope"></i>info@vaccher.com.ar</a></figure>
                                                <figure><a href="http://www.vaccher.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.vaccher.com.ar</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_11.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">VANDEN BOSCHE PROPIEDADES</a></h3>
                                                <address>Cangallo 122</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4243-5713 * 4243-0103</figure>
                                                <figure><a href="mailto:vandenbocheprop@gmail.com" target="_blank"><i class="fa fa-envelope"></i>vandenbocheprop@gmail.com</a></figure>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="#" class="image">
                                            <img src="imgInmob/lg_30.jpg" alt="">
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="">VILLAR PROPIEDADES</a></h3>
                                                <address>Av. Alsina 636 | Banfield Este</address>
                                            </section>
                                            <section class="contacts">
                                                <figure><i class="fa fa-phone"></i>4248-3180 | 4242-0327 | 4288-3495</figure>
                                                <figure><a href="mailto:villarpropiedades@gmail.com" target="_blank"><i class="fa fa-envelope"></i>villarpropiedades@gmail.com</a></figure>
                                                <figure><a href="http://www.inmobiliariavillar.com.ar" target="_blank"><i class="fa fa-laptop"></i>www.inmobiliariavillar.com.ar</a></figure>
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
    <script>
        $(document).ready(function(){
           $('#search').keyup(function(){
               $('.subject-list').parent().show();
               var value = $(this).val();
               $('.subject-list').each(function(){
                   console.log($(this).find('h3 a').html());
                   if($(this).find('h3 a').html().indexOf(value.toUpperCase())==-1){
                       $(this).parent().hide();
                   }
               });
           });
        });
    </script>
@stop
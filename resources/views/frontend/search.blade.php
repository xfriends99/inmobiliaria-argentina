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
                        @include('partials.filtros')
                        <!--FILTROS-->
                        </aside>
                    </div>

                    <div class="col-md-9 col-sm-8">
                        <section class="page-title">
                            <h1>{{$tokko_search->get_result_count()}} resultados</h1>
                        </section>

                        <section>
                            <div class="search-results-controls clearfix">
                                <div class="pull-left">
                                    <a href="{{route('search')}}?@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon active"><i class="fa fa-th"></i></a>
                                    <a href="{{route('search')}}?ord=row&@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon"><i class="fa fa-bars"></i></a>
                                    <a href="{{route('search')}}?ord=map&@foreach($request->all() as $k => $r){{$k.'='.$r.'&'}}@endforeach" class="circle-icon hidden-xs hidden-sm"><i class="fa fa-map-marker"></i></a>
                                </div>

                                <div class="pull-right">
                                    <div class="input-group inputs-underline min-width-150px">
                                        <select class="form-control selectpicker" name="sort">
                                            <option value="">Ordernar por</option>
                                            <option value="1">Menor precio</option>
                                            <option value="2">Mayor precio</option>
                                            <option value="3">Más recientes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row">
                                <!--PROPIEDAD-->
                                @foreach($properties as $d)
                                    <div class="col-md-4 col-sm-6">
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
                        </section>

                        <section>
                            <div class="center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="disabled previous">
                                            <a href="#" aria-label="Previous">
                                                <i class="arrow_left"></i>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li class="active"><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li class="next">
                                            <a href="#" aria-label="Next">
                                                <i class="arrow_right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
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
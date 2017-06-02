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
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $k => $r){
                                        $url .= $k.'='.$r.'&';
                                    }
                                    ?>
                                    <a href="{{route('search')}}?{{$url}}" class="circle-icon active"><i class="fa fa-th"></i></a>
                                    <a href="{{route('search')}}?ord=row&{{$url}}" class="circle-icon"><i class="fa fa-bars"></i></a>
                                    <a href="{{route('search')}}?ord=map&{{$url}}" class="circle-icon hidden-xs hidden-sm"><i class="fa fa-map-marker"></i></a>
                                </div>

                                <div class="pull-right">
                                    <div class="input-group inputs-underline min-width-150px">
                                        <select class="form-control selectpicker sort-search" name="sort">
                                            <option value="">Ordernar por</option>
                                            <option value="1" @if(isset($request->orden) && $request->orden==1){{"selected"}}@endif>Menor precio</option>
                                            <option value="2" @if(isset($request->orden) && $request->orden==2){{"selected"}}@endif>Mayor precio</option>
                                            <option value="3" @if(isset($request->orden) && $request->orden==3){{"selected"}}@endif>Más recientes</option>
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
                                                    <div class="label label-default">{{$d->data->operations[0]->operation_type}}</div>
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
                                        <li class="@if($tokko_search->get_current_page()<=1){{"disabled"}}@endif previous">
                                            <?php
                                                if($tokko_search->get_current_page()<=1){
                                                    $url = "#";
                                                }else{
                                                    $url = route('search').'?';
                                                    foreach($request->all() as $k => $r){
                                                        if($k!='page'){
                                                            $url .= $k.'='.$r.'&';
                                                        }
                                                    }
                                                    $url .= 'page='.($tokko_search->get_current_page()-1).'&';
                                                }
                                            ?>
                                            <a href="{{$url}}" aria-label="Previous">
                                                <i class="arrow_left"></i>
                                            </a>
                                        </li>
                                        @for($i = $tokko_search->get_current_page() - 4; $i<$tokko_search->get_current_page();$i=$i+1)
                                            @if($i>=1)
                                                <?php
                                                $url = '';
                                                foreach ($request->all() as $k => $r){
                                                    if($k!='page'){
                                                        $url .=$k.'='.$r.'&';
                                                    }
                                                }
                                                $url .= 'page='.$i.'&';
                                                ?>
                                                <li><a href="{{route('search')}}?{{$url}}">{{$i}}</a></li>
                                            @endif
                                        @endfor
                                        <li class="active"><a href="{{route('search')}}?@foreach($request->all() as $k => $r) @if($k!='page'){{$k.'='.$r.'&'}}@else{{$k.'='.$tokko_search->get_current_page().'&'}}@endif @endforeach">{{$tokko_search->get_current_page()}}</a></li>
                                        <?php $adelante = 1 ?>
                                        @for($i = $tokko_search->get_current_page()+1; $i<=$tokko_search->get_current_page()+4;$i=$i+1)
                                            @if($i<=$tokko_search->get_result_page_count())
                                                <?php
                                                    $url = '';
                                                    foreach ($request->all() as $k => $r){
                                                        if($k!='page'){
                                                            $url .=$k.'='.$r.'&';
                                                        }
                                                    }
                                                    $url .= 'page='.$i.'&';
                                                ?>
                                                <li><a href="{{route('search')}}?{{$url}}">{{$i}}</a></li>
                                            @endif
                                            <?php $adelante++; ?>
                                        @endfor
                                        <li class="@if($tokko_search->get_current_page()>=$tokko_search->get_result_page_count()){{"disabled"}}@endif next">
                                            <?php
                                            if($tokko_search->get_current_page()>=$tokko_search->get_result_page_count()){
                                                $url = "#";
                                            }else{
                                                $url = route('search').'?';
                                                foreach($request->all() as $k => $r){
                                                    if($k!='page'){
                                                        $url .= $k.'='.$r.'&';
                                                    }
                                                }
                                                $url .= 'page='.($tokko_search->get_current_page()+1).'&';
                                            }
                                            ?>
                                            <a href="{{$url}}" aria-label="Next">
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
    <script>
        $(document).ready(function(){
           $('.disabled').click(function(e){
             e.preventDefault();
           });

           $('.sort-search').change(function(){
               var url = '{{route("search")}}?';
               <?php
                   $url = route('search')."?";
                   foreach($request->all() as $k => $r){
                        if($k!='orden' && $k!='page'){
                            echo "url += '".$k."=".$r."&"."';";
                        }
                   }
               ?>
               url = url+"orden="+$(this).val();
               location.replace(url);
           });
        });
    </script>
@stop
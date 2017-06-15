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
                                        if($k!='ord'){
                                            $url .= $k.'='.$r.'&';
                                        }
                                    }
                                    ?>
                                    <a href="{{route('search')}}?{{$url}}" class="circle-icon"><i class="fa fa-th"></i></a>
                                    <a href="{{route('search')}}/row?{{$url}}" class="circle-icon active"><i class="fa fa-bars"></i></a>
                                    <a href="{{route('search')}}/map?{{$url}}" class="circle-icon hidden-xs hidden-sm"><i class="fa fa-map-marker"></i></a>
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

                        <section style="position: relative; z-index:0;">
                            <!--PROPIEDAD-->
                            @foreach($properties as $d)
                                <div class="item item-row" data-id="{{$d->data->id}}" data-latitude="{{$d->data->geo_lat}}" data-longitude="{{$d->data->geo_long}}">
                                    <a href="{{route('propiedad', $d->data->id)}}">
                                        <div class="image bg-transfer">
                                            <figure>
                                                @if(number_format(round($d->data->surface), 0, ',', '.')!='0')
                                                    {{number_format(round($d->data->surface), 0, ',', '.')}} M2
                                                @endif
                                            </figure>
                                            @if(isset($d->data->photos[0]))
                                                <img src="{{$d->data->photos[0]->image}}" alt="">
                                            @else
                                                <img src="/img-default.jpg" alt="">
                                            @endif
                                        </div>
                                        <div class="map hidden-xs hidden-sm"></div>
                                        <div class="description description-row">
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
                                            <address class="hidden-sm"><i class="fa fa-map-marker"></i> {{$d->data->location->name}}</address>
                                            <p class="hidden-xs hidden-sm">{{substr($d->data->description, 0 , 200)}}</p>
                                        </div>
                                    </a>
                                    <div class="controls-more-inmo">
                                        @if(isset($d->data->company))
                                            <div class="element"><img src="{{$d->data->company->logo}}" alt=""></div>
                                        @endif
                                    </div>
                                    <div class="controls-more-pricing">
                                        <h6>{{$d->get_available_prices()[0]}}</h6>
                                    </div>
                                </div>
                            @endforeach
                            <!--PROPIEDAD-->
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
                                                <li><a href="{{$search}}?{{$url}}">{{$i}}</a></li>
                                            @endif
                                        @endfor
                                        <li class="active"><a href="{{$search}}?@foreach($request->all() as $k => $r) @if($k!='page'){{$k.'='.$r.'&'}}@else{{$k.'='.$tokko_search->get_current_page().'&'}}@endif @endforeach">{{$tokko_search->get_current_page()}}</a></li>
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
                                                <li><a href="{{$search}}?{{$url}}">{{$i}}</a></li>
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
                    <!--end col-md-9-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>

        @include('partials.footer')

    </div>
    <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')
    <script src="/assets/js/filtro.js"></script>
    <script>
        $(document).ready(function(){
            $('#send_precio').click(function(){
                if($('#preciodesde').val()!='' || $('#preciohasta').val()!='') {
                    var url = '{{route("search")}}?';
                    <?php
                        foreach ($request->all() as $kk => $rr) {
                            if ($kk != 'preciodesde' && $kk != 'preciohasta') {
                                echo "url += '" . $kk . "=" . $rr . "&" . "';";
                            }
                        };
                        ?>
                    if ($('#preciodesde').val() != '') {
                        url += 'preciodesde=' + $('#preciodesde').val() + '&';
                    }
                    if ($('#preciohasta').val() != '') {
                        url += 'preciohasta=' + $('#preciohasta').val();
                    }
                    if($('#preciodesde').val()=='' || $('#preciohasta').val()=='' || parseInt($('#preciohasta').val())>parseInt($('#preciodesde').val())){
                        location.href = url;
                    }
                }
            });

            $('.disabled').click(function(e){
                e.preventDefault();
            });

            $('.sort-search').change(function(){
                @if($ord!=null)
                var url = '{{route("search")}}/{{$ord}}?';
                        @else
                var url = '{{route("search")}}?';
                @endif
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
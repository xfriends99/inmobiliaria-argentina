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

                    <div class="col-md-9 col-sm-8 hidden-xs hidden-sm">
                        <div class="search-results-controls clearfix">
                            <div class="pull-right">
                                <?php
                                $url = '';
                                foreach($request->all() as $k => $r){
                                    if($k!='ord'){
                                        $url .= $k.'='.$r.'&';
                                    }
                                }
                                ?>
                                <a href="{{route('search')}}?{{$url}}" class="circle-icon"><i class="fa fa-th"></i></a>
                                <a href="{{route('search')}}?ord=row&{{$url}}" class="circle-icon"><i class="fa fa-bars"></i></a>
                                <a href="{{route('search')}}?ord=map&{{$url}}" class="circle-icon hidden-xs hidden-sm active"><i class="fa fa-map-marker"></i></a>
                            </div>
                        </div>
                        <div class="hero-section full-screen has-map has-sidebar margin-top-15px">
                            <div id="map" style="height: 360px; width: 100%;"></div>
<!--                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyASbXb64d2fKwT3rdqqCvZYmq4jCdFDtIQ&q={{$properties[0]->data->location->full_location}}" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                        </div>
                    </div>
                    <section>
                        <div class="center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination" style="margin: 50px 0 !important;">
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

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat:-34.6159474, lng:-58.5733852},
            });
            @foreach($properties as $d)
                var marker = new google.maps.Marker({
                    position: {lat:{{$d->data->geo_lat}}, lng: {{$d->data->geo_long}}},
                    map: map,
                    title: "{{$d->data->publication_title}}"
                });
            @endforeach
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFmet5T7-qa2T9R3G2-ebQ6f-DGuC-tAE&callback=initMap"></script>
@stop
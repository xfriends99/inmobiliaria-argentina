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
                                <a href="{{route('search')}}/row?{{$url}}" class="circle-icon"><i class="fa fa-bars"></i></a>
                                <a href="{{route('search')}}/map?{{$url}}" class="circle-icon hidden-xs hidden-sm active"><i class="fa fa-map-marker"></i></a>
                            </div>
                        </div>
                        <div class="hero-section full-screen has-map has-sidebar margin-top-15px">
                            <div id="map" style="height: 100%; width: 100%;"></div>
<!--                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyASbXb64d2fKwT3rdqqCvZYmq4jCdFDtIQ&q={{$properties[0]->data->location->full_location}}" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                        </div>
                        <section>
                            <!--PROPIEDAD-->
                            @foreach($properties as $d)
                                <div class="item item-row properties-map" style="display:none;" id="property-{{$d->data->id}}" data-id="{{$d->data->id}}" data-latitude="{{$d->data->geo_lat}}" data-longitude="{{$d->data->geo_long}}">
                                    <a href="{{route('propiedad', $d->data->id)}}" >
                                        <div class="image bg-transfer" @if(isset($d->data->photos[0])) style="background-image: url('{{$d->data->photos[0]->image}}')" @else style="background-image: url('/img-default.jpg')" @endif>
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
                                        <div class="map hidden-xs hidden-sm hidden-md hidden-lg"></div>
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
                    </div>
                    <section>
                        <div class="center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination" >
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
            </div>
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

                marker.addListener('click', function() {
                    var id = "{{$d->data->id}}";
                    map.setCenter(marker.getPosition());
                    console.log(id);
                    $('.properties-map').hide();
                    $('#property-'+id).slideDown('slow');
                    $("html, body").animate({ scrollTop: $('#property-'+id).offset().top }, 1000);
                });
            @endforeach
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFmet5T7-qa2T9R3G2-ebQ6f-DGuC-tAE&callback=initMap"></script>
@stop
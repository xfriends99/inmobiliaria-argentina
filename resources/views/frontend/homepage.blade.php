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
        <div class="hero-section has-background height-600px">
            <div class="wrapper">
                <div class="inner">
                    <div class="container">
                        <div class="page-title center">
                            <h1>Buscá y encontrá tu inmueble hoy</h1>
                            <h2 class="hidden-xs">Nuestras inmobiliarias te ayudan a encontrar la propiedad que querés</h2>
                            <h2 class="hidden-sm hidden-md hidden-lg">Agendá ahora una visita y descubrí oportunidades imperdibles</h2>
                        </div>
                        <div class="form search-form horizontal">
                            <form method="GET" action="{{route('search')}}">
                                <div class="row">
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" name="operacion">
                                                <option value="1">Venta</option>
                                                <option value="2" selected>Alquiler</option>
                                                <option value="2">Alquiler Temporalmente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" name="property_type">
                                                <option value="3">Casa</option>
                                                <option value="10">Cochera</option>
                                                <option value="2" selected>Departamento</option>
                                                <option value="7">Local</option>
                                                <option value="1">Terreno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="form-group full-relative">
                                            <input type="text" class="form-control typeaheadd" autocomplete="off" placeholder="Buscá por lugar, dirección o inmobiliaria">
                                            <input type="hidden" name="keyword" id="typea">
                                            <div class="typeahead-search" style="display:none;"><ul></ul></div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" id="buscar" class="btn btn-primary pull-right darker"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-wrapper">
                <div class="bg-transfer opacity-90"><img src="/assets/img/bg-1.jpeg" title="Club Inmueble" alt="Club Inmueble"></div>
                <div class="background-color background-color-black"></div>
            </div>
        </div>

        <section class="block">
            <div class="container">
                <div class="center">
                    <div class="section-title">
                        <div class="center">
                            <h2>Nuevas propiedades disponibles <span class="text-green">apto crédito</span></h2>
                            <h3 class="subtitle">Descubrí las últimas oportunidades en bienes raíces de la mano de las más destacadas inmobiliarias de Argentina.</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--PROPIEDAD-->
                    <?php
                    $i = 1;
                    ?>
                    @foreach($properties as $d)
                        <div @if($i==3 || $i==4) class="col-md-6 col-sm-6" @else class="col-md-3 col-sm-3" @endif>
                            <div class="item" data-id="{{$d->data->id}}">
                                <a href="{{route('propiedad', $d->data->id)}}">
                                    <div class="description description-grid">
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
                                        <address><i class="fa fa-map-marker"></i> {{$d->data->location->name}}</address>
                                    </div>
                                    <div class="image bg-transfer">
                                        @if(isset($d->data->photos[0]))
                                            <img src="{{$d->data->photos[0]->image}}" alt="">
                                        @else
                                            <img src="/img-default.jpg" alt="">
                                        @endif
                                    </div>
                                </a>
                                <div class="additional-info">
                                    <div class="rating-passive"><span class="reviews">
                                            @if(number_format(round($d->data->surface), 0, ',', '.')!='0')
                                                {{number_format(round($d->data->surface), 0, ',', '.')}} M2
                                            @else
                                                <br>
                                            @endif
                                            </span></div>
                                    <div class="controls-more"><a href="#">{{$d->get_available_prices()[0]}}</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                        ?>
                    @endforeach
                    <!--PROPIEDAD-->
                </div>
                <div class="center">
                    <a href="{{route('search')}}" class="btn btn-primary btn-light-frame btn-rounded btn-framed arrow">Ver todas las propiedades</a>
                </div>
            </div>
        </section>
    </div>

    @include('partials.footer')

</div>
<a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            array_results = [];
            properties_id = [];
            $('.typeaheadd').keyup(function(){
                if($(this).val()=='' || $(this).val().length<3){
                    $('.typeahead-search').hide();
                    $('#typea').val('');
                } else {
                    $('.typeahead-search').hide();
                    var val = $(this).val();
                    $.ajax({
                        method: "GET",
                        url: "{{route('quicksearch')}}?search="+val,
                        success: function(response){
                            var html = '';
                            array_results = [];
                            properties_id = [];
                            for(var i = 0; i<response.length;i++){
                                array_results.push(response[i].id);
                                if(!properties_id[response[i].name]){
                                    html += "<li class='typeahead-search-item' val="+response[i].id+">"+response[i].name+"</li>";
                                }
                                if(properties_id[response[i].name]){
                                    properties_id[response[i].name] += ','+response[i].id;
                                } else {
                                    properties_id[response[i].name] = response[i].id;
                                }
                            }
                            $('.typeahead-search ul').html(html);
                            $('.typeahead-search').show();
                        }
                    })
                }
            });

            $('#buscar').click(function(e){
                if($('#typea').val()=='' && $('.typeaheadd').val().length>=3){
                    if(array_results.length==0){
                        e.preventDefault();
                        location.replace('/'+$('.typeaheadd').val()+'/propiedad');
                        return false;
                    } else {
                        $('#typea').val($('.typeaheadd').val());
                    }
                }
            });

            $('body').on('click', '.typeahead-search-item', function(){
                console.log($(this).attr('val'));
                $('.typeahead-search').hide();
                $('#typea').val(properties_id[$(this).html()]);
                $('.typeaheadd').val($(this).html());
            });
            /*$('.typeahead').typeahead({
                source: function (typeahead, query) {
                    $.get('/quicksearch', { query: query }, function (data) {
                        return typeahead.process(data);
                    });
                }
            });*/
        });
    </script>
@stop
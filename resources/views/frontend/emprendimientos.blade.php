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
                    <li class="active">Emprendimientos</li>
                </ol>
                <div class="row">
                    <div class="col-md-12 ">
                        <section class="page-title">
                            <h1>Emprendimientos en Club Inmueble {{$data->meta->total_count}}</h1>
                            <!--<form class="form inputs-underline">
                                <div class="form-group ">
                                    <input type="text" id="search" class="form-control" name="keyword" placeholder="Buscá por nombre">
                                </div>
                            </form>-->
                        </section>
                        <section>
                            <div class="row">
                                @foreach($data->objects as $emp)
                                <div class="col-md-3 col-sm-4">
                                    <div class="subject-list">
                                        <a href="{{route('emprendimiento', $emp->id)}}" class="image">
                                            @if(isset($emp->photos[0]))
                                                <img src="{{$emp->photos[0]->image}}" alt="">
                                            @else
                                                <img src="/img-default.jpg" alt="">
                                            @endif
                                        </a>
                                        <div class="description">
                                            <section class="name">
                                                <h3><a href="{{route('emprendimiento', $emp->id)}}">{{$emp->name}}</a></h3>
                                                <address>{{$emp->address}}</address>
                                            </section>
                                            <section class="contacts">
                                                <strong>Tipo:</strong> {{$emp->type->name}}<br>
                                                <strong>Localidad:</strong> {{$emp->location->name}}<br>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <section>
                            <div class="center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="@if($current_page<=1){{"disabled"}}@endif previous">
                                            <?php
                                            if($current_page<=1){
                                                $url = "#";
                                            }else{
                                                $url = route('emprendimientos').'?';
                                                $url .= 'page='.($current_page-1).'&';
                                            }
                                            ?>
                                            <a href="{{$url}}" aria-label="Previous">
                                                <i class="arrow_left"></i>
                                            </a>
                                        </li>
                                        @for($i = $current_page - 4; $i<$current_page;$i=$i+1)
                                            @if($i>=1)
                                                <?php
                                                $url = 'page='.$i.'&';
                                                ?>
                                                <li><a href="{{route('emprendimientos')}}?{{$url}}">{{$i}}</a></li>
                                            @endif
                                        @endfor
                                        <li class="active"><a href="{{route('emprendimientos')}}?{{'page='.$current_page.'&'}}">{{$current_page}}</a></li>
                                        <?php $adelante = 1 ?>
                                        @for($i = $current_page+1; $i<=$current_page+4;$i=$i+1)
                                            @if($i<=$pages)
                                                <?php
                                                $url = 'page='.$i.'&';
                                                ?>
                                                <li><a href="{{route('emprendimientos')}}?{{$url}}">{{$i}}</a></li>
                                            @endif
                                            <?php $adelante++; ?>
                                        @endfor
                                        <li class="@if($current_page>=$pages){{"disabled"}}@endif next">
                                            <?php
                                            if($current_page>=$pages){
                                                $url = "#";
                                            }else{
                                                $url = route('emprendimientos').'?';
                                                $url .= 'page='.($current_page+1).'&';
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
<section id="Filtros">
    <h2><i class="fa fa-filter"></i> Filtros</h2>
    <section id="FiltrosSeleccionados">
        @if($request->all())
        <ul class="tags">
            @foreach($request->all() as $key => $value)
                @if($value!='')
                    @if($key!='operacion' && $key!='propiedad' && $key!='orden' && $key!='page' && $key!='ord' && $key!='surfaces' && $key!='parking_lot_amount' && $key!='tags' && $key!='keyword' && $key!='preciodesde' && $key!='preciohasta')
                        <?php
                        $url = '';
                        foreach($request->all() as $kk => $rr){
                            if($kk!=$key){
                                $url .= $kk.'='.$rr.'&';
                            }
                        };
                        ?>
                        <li>{{$value}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                    @else
                        @if($key=='operacion')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='operacion'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            <li>{{$tokko_search->get_operation_name($value)}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='propiedad')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='propiedad'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            <li>{{$data_properties[$value]}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='orden')
                            <li>
                                @if($value==1)
                                    {{"Menor precio"}}
                                @elseif($value==2)
                                    {{"Mayor precio"}}
                                @else
                                    {{"Más recientes"}}
                                @endif
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $kk => $rr){
                                        if($kk!='orden'){
                                            $url .= $kk.'='.$rr.'&';
                                        }
                                    };
                                    ?>
                                <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='surfaces')
                            <?php
                                $url = '';
                                foreach($request->all() as $kk => $rr){
                                    if($kk!='surfaces'){
                                        $url .= $kk.'='.$rr.'&';
                                    }
                                };
                                if(substr($request->surfaces, -1) == ':'){
                                    $val = "Desde ".substr($request->surfaces, 0, strlen($request->surfaces)-1)." m2";
                                } else if(substr($request->surfaces, 0, 1) == ':'){
                                    $val = "Hasta ".substr($request->surfaces, 1)." m2";
                                } else {
                                    $da = explode(':', $request->surfaces);
                                    $val = "Desde ".$da[0]." m2 Hasta ".$da[1]." m2";
                                }
                            ?>
                            <li>{{$val}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='parking_lot_amount')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='parking_lot_amount'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            <li>{{$value}} Cocheras <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='tags')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='tags'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            $tagss = explode(',', $request->tags);
                            foreach($tagss as $ta){
                                if(preg_match('/,'.$ta.'/', $request->tags)){
                                    $o = ''.str_replace(','.$ta,'', $request->tags);
                                } else if(preg_match('/'.$ta.',/', $request->tags)){
                                    $o = str_replace($ta.',','', $request->tags);
                                } else {
                                    $o = str_replace($ta,'', $request->tags);
                                }
                                $url = $url.'tags='.$o.'&';
                                ?>
                                <li>{{$tags_name[$ta]}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            <?php
                            }
                            ?>
                        @elseif($key=='keyword' && isset($locations[0]))
                            <?php
                                $url = '';
                                foreach($request->all() as $kk => $rr){
                                    if($kk!='keyword'){
                                        $url .= $kk.'='.$rr.'&';
                                    }
                                }
                            ?>
                            <li>{{$locations[0]->location_name}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @endif
                    @endif
                @endif
            @endforeach
            <?php
                $precio = '';
                $url = '';
                foreach($request->all() as $kk => $rr){
                    if($kk!='preciodesde' && $kk!='preciohasta'){
                        $url .= $kk.'='.$rr.'&';
                    }
                }
            ?>
            @if(isset($request->preciodesde))
                <?php $precio.= 'Desde $'.number_format($request->preciodesde, 0, ',', '.'); ?>
            @endif
            @if(isset($request->preciohasta))
                <?php $precio.= ' Hasta $'.number_format($request->preciohasta, 0, ',', '.') ; ?>
            @endif
            @if($precio!='')
                    <li>{{$precio}} <a href="{{route('search')}}?{{$url}}"><i class="fa fa-close"></i></a></li>
            @endif
        </ul>
        @endif
        @if($request->all())
        <div class="">
            <h6><a href="{{route('search')}}">Eliminar todos los filtros</a></h6>
        </div>
        @endif
    </section>
    <form class="form inputs-underline">
        <div class="form-group">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="Filtro1">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Zona" aria-expanded="true" aria-controls="Zona">
                                Zona
                            </a>
                        </h4>
                    </div>
                    <div id="Zona" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Filtro1">
                        <ul class="padding-left-15px padding-right-15px scroll-y">
                            @foreach ($locations as $location)
                                <?php
                                $url = '';
                                foreach($request->all() as $kk => $rr){
                                    if($kk!='keyword'){
                                        $url .= $kk.'='.$rr.'&';
                                    }
                                };
                                $url .= 'keyword='.$location->location_id.'&';
                                ?>
                                <li><a href="{{route('search')}}?{{$url}}">{{$location->location_name}} ({{$location->count}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="Filtro2">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Precio" aria-expanded="true" aria-controls="Precio">
                                Precio
                            </a>
                        </h4>
                    </div>
                    <div id="Precio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro2">
                        <ul class="padding-left-15px padding-right-15px">
                            <input @if(isset($request->preciodesde)) value="{{$request->preciodesde}}" @endif type="number" class="form-control display-inline width-45 margin-right-4" id="preciodesde" name="preciodesde" placeholder="Desde">
                            <input @if(isset($request->preciohasta)) value="{{$request->preciohasta}}" @endif type="number" class="form-control display-inline width-45 float-right" id="preciohasta" name="preciohasta" placeholder="Hasta">
                            <button id="send_precio" type="button" class="btn btn-framed btn-light-frame padding-5px width-100">Aplicar precio<i class="fa fa-search"></i></button>
                        </ul>
                    </div>
                </div>
                @if(!isset($request->operacion))
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro3">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Operacion" aria-expanded="true" aria-controls="Operacion">
                                    Tipo de Operación
                                </a>
                            </h4>
                        </div>
                        <div id="Operacion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro3">
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($operations as $operation)
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $kk => $rr){
                                        if($kk!='operacion'){
                                            $url .= $kk.'='.$rr.'&';
                                        }
                                    }
                                    $url .= 'operacion='.$operation->operation_type.'&';

                                    ?>
                                    @if ($operation->operation_type==1)
                                        <li><a href="{{route('search')}}?{{$url}}">Venta ({{$operation->count}})</a></li>
                                    @endif
                                    @if ($operation->operation_type==2)
                                        <li><a href="{{route('search')}}?{{$url}}">Alquiler ({{$operation->count}})</a></li>
                                    @endif
                                    @if ($operation->operation_type==3)
                                        <li><a href="{{route('search')}}?{{$url}}">Alquiler Temporario ({{$operation->count}})</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if(!isset($request->surfaces))
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro4">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Superficie" aria-expanded="true" aria-controls="Superficie">
                                    Superficie
                                </a>
                            </h4>
                        </div>
                        <div id="Superficie" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro4">
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($total_surfaces as $total_surface)
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $kk => $rr){
                                        if($kk!='surfaces'){
                                            $url .= $kk.'='.$rr.'&';
                                        }
                                    };
                                    $url .= 'surfaces='.$total_surface['value'].'&';

                                    ?>
                                    <li><a href="{{route('search')}}?{{$url}}">{{$total_surface['range']}} ({{$total_surface['count']}})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="Filtro5">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Ammenities" aria-expanded="true" aria-controls="Ammenities">
                                Ammenities
                            </a>
                        </h4>
                    </div>
                    <div id="Ammenities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro5">
                        <ul class="padding-left-15px padding-right-15px scroll-y">
                            @foreach ($tags as $tag)
                                @if(!preg_match('/'.$tag->tag_id.'/', $request->tags))
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $kk => $rr){
                                        if($kk!='tags'){
                                            $url .= $kk.'='.$rr.'&';
                                        }
                                    };
                                    if(!isset($request->tags)){
                                        $url .= 'tags='.$tag->tag_id.'&';
                                    } else {
                                        $url .= 'tags='.$request->tags.','.$tag->tag_id.'&';
                                    }
                                    ?>
                                    <li><a href="{{route('search')}}?{{$url}}">{{$tag->tag_name}} ({{$tag->count}})</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if(!isset($request->parking_lot_amount))
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro6">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Cochera" aria-expanded="true" aria-controls="Cochera">
                                    Cochera
                                </a>
                            </h4>
                        </div>
                        <div id="Cochera" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro6">
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($tokko_search->get_summary_field('parking_lot_amount') as $parking)
                                    <?php
                                    $url = '';
                                    foreach($request->all() as $kk => $rr){
                                        if($kk!='parking_lot_amount'){
                                            $url .= $kk.'='.$rr.'&';
                                        }
                                    };
                                    $url .= 'parking_lot_amount='.$parking->amount.'&';

                                    ?>
                                    <li><a href="{{route('search')}}?{{$url}}">{{$parking->amount}} Cocheras ({{$parking->count}})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
</section>


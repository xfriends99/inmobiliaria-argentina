<section id="Filtros">
    <h2><i class="fa fa-filter"></i> Filtros</h2>
    <section id="FiltrosSeleccionados">
        @if($request->all())
        <ul class="tags">
            @foreach($request->all() as $key => $value)
                @if($value!='')
                    @if($key!='operacion' && $key!='property_type' && $key!='propiedad' && $key!='orden' && $key!='page' && $key!='ord' && $key!='surfaces' && $key!='parking_lot_amount' && $key!='room_amount' && $key!='suite_amount' && $key!='age' && $key!='tags' && $key!='keyword' && $key!='preciodesde' && $key!='preciohasta')
                        <?php
                        $url = '';
                        foreach($request->all() as $kk => $rr){
                            if($kk!=$key){
                                $url .= $kk.'='.$rr.'&';
                            }
                        };
                        ?>
                        <li>{{$value}} <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                    @else
                        @if($key=='operacion')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='operacion'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            $tagss = explode(',', $request->operacion);
                            foreach($tagss as $ta){
                            if(preg_match('/,'.$ta.'/', $request->operacion)){
                                $o = ''.str_replace(','.$ta,'', $request->operacion);
                            } else if(preg_match('/'.$ta.',/', $request->operacion)){
                                $o = str_replace($ta.',','', $request->operacion);
                            } else {
                                $o = str_replace($ta,'', $request->operacion);
                            }
                            $urll = $url.'operacion='.$o.'&';
                            ?>
                            <li>{{$tokko_search->get_operation_name($ta)}} <a href="{{$search}}?{{$urll}}"><i class="fa fa-close"></i></a></li>
                            <?php
                            }
                            ?>
                        @elseif($key=='property_type')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='property_type'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            $tagss = explode(',', $request->property_type);
                            foreach($tagss as $ta){
                            if(preg_match('/,'.$ta.'/', $request->property_type)){
                                $o = ''.str_replace(','.$ta,'', $request->property_type);
                            } else if(preg_match('/'.$ta.',/', $request->property_type)){
                                $o = str_replace($ta.',','', $request->property_type);
                            } else {
                                $o = str_replace($ta,'', $request->property_type);
                            }
                            $urll = $url.'property_type='.$o.'&';
                            ?>
                                @if(isset($property_types[$ta]))<li>{{$property_types[$ta]->type}} <a href="{{$search}}?{{$urll}}"><i class="fa fa-close"></i></a></li>@endif
                            <?php
                            }
                            ?>
                        @elseif($key=='propiedad')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='propiedad'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            $tagss = explode(',', $request->propiedad);
                            foreach($tagss as $ta){
                            if(preg_match('/,'.$ta.'/', $request->propiedad)){
                                $o = ''.str_replace(','.$ta,'', $request->propiedad);
                            } else if(preg_match('/'.$ta.',/', $request->propiedad)){
                                $o = str_replace($ta.',','', $request->propiedad);
                            } else {
                                $o = str_replace($ta,'', $request->propiedad);
                            }
                            $urll = $url.'propiedad='.$o.'&';
                            ?>
                            <li>{{$data_properties[$ta]}} <a href="{{$search}}?{{$urll}}"><i class="fa fa-close"></i></a></li>
                            <?php
                            }
                            ?>
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
                                <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='surfaces' && $request->surfaces!='')
                            <?php
                                $url = '';
                                foreach($request->all() as $kk => $rr){
                                    if($kk!='surfaces'){
                                        $url .= $kk.'='.$rr.'&';
                                    }
                                };
                                if(substr($surfaces, -1) == ':'){
                                    $val = "Desde ".substr($surfaces, 0, strlen($surfaces)-1)." m2";
                                } else if(substr($surfaces, 0, 1) == ':'){
                                    $val = "Hasta ".substr($surfaces, 1)." m2";
                                } else {
                                    $da = explode(':', $surfaces);
                                    $val = "Desde ".$da[0]." m2 Hasta ".$da[1]." m2";
                                }
                            ?>
                            <li>{{$val}} <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                        @elseif($key=='parking_lot_amount')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='parking_lot_amount'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            @if($value==0)
                                <li>Sin Cocheras <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @else
                                <li>{{$value}} Cocheras <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @endif
                        @elseif($key=='room_amount')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='room_amount'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            @if($value==0)
                                <li>Sin Ambientes <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @else
                                <li>{{$value}} Ambientes <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @endif
                        @elseif($key=='suite_amount')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='suite_amount'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            @if($value==0)
                                <li>Sin Dormitorios <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @else
                                <li>{{$value}} Dormitorios <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @endif
                        @elseif($key=='age')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='age'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            ?>
                            @if($value==0)
                                <li>Actual <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @else
                                <li>@if(strlen($value)>3) Del año {{$value}} @else {{$value}} Años de antiguedad  @endif <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
                            @endif
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
                                $urll = $url.'tags='.$o.'&';
                                ?>
                                @if(isset($tags[$ta]))
                                <li>{{$tags[$ta]->tag_name}} <a href="{{$search}}?{{$urll}}"><i class="fa fa-close"></i></a></li>
                                @endif
                            <?php
                            }
                            ?>
                        @elseif($key=='keyword')
                            <?php
                            $url = '';
                            foreach($request->all() as $kk => $rr){
                                if($kk!='keyword'){
                                    $url .= $kk.'='.$rr.'&';
                                }
                            };
                            $tagss = explode(',', $keywords);
                            foreach($tagss as $ta){
                                if(preg_match('/,'.$ta.'/', $keywords)){
                                    $o = ''.str_replace(','.$ta,'', $keywords);
                                } else if(preg_match('/'.$ta.',/', $keywords)){
                                    $o = str_replace($ta.',','', $keywords);
                                } else {
                                    $o = str_replace($ta,'', $keywords);
                                }
                                $urll = $url.'keyword='.$o.'&';
                                ?>
                                @if(isset($locations[$ta]))
                                <li>{{$locations[$ta]->location_name}} <a href="{{$search}}?{{$urll}}"><i class="fa fa-close"></i></a></li>
                                @endif
                                <?php
                            }
                            ?>
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
                    <li>{{$precio}} <a href="{{$search}}?{{$url}}"><i class="fa fa-close"></i></a></li>
            @endif
        </ul>
        @endif
        @if($request->all())
        <div class="">
            <h6><a href="{{$search}}">Eliminar todos los filtros</a></h6>
        </div>
        @endif
    </section>
    <form class="form inputs-underline" method="GET" >
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
                        <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                        <ul class="padding-left-15px padding-right-15px scroll-y">
                            @foreach ($locations as $location)
                                <li><span class="color-azul">{{$location->location_name}} </span>
                                    <input @if(isset($request->keyword) && in_array($location->location_id, explode(',', $keywords))) checked @endif value="{{$location->location_id}}" type="checkbox" class="keyword"></li>
                            @endforeach
                            <input type="hidden" @if(isset($request->keyword)) value="{{$keywords}}" @endif id="keyword" name="keyword">
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
                        <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                        <div class="button-price-filter-container">
                            <button type="button" data-price="ARG" class="change-price @if(isset($request->currency) && $request->currency=='ARG') button-price-filter-active @else button-price-filter @endif">PESOS</button><button data-price="USD" class="change-price @if(isset($request->currency) && $request->currency=='USD') button-price-filter-active @else button-price-filter @endif" type="button">DOLARES</button>
                            <input type="hidden" id="price-filter" name="currency" @if(isset($request->currency) && ($request->currency=='USD' || $request->currency=='ARG')) value="{{$request->currency}}" @else value="ANY" @endif >
                        </div>
                        <ul class="padding-left-15px padding-right-15px">
                            <input @if(isset($request->preciodesde)) value="{{$request->preciodesde}}" @endif type="text" class="form-control display-inline width-45 margin-right-4" id="preciodesde" name="preciodesde" placeholder="Desde">
                            <input @if(isset($request->preciohasta)) value="{{$request->preciohasta}}" @endif type="text" class="form-control display-inline width-45 float-right" id="preciohasta" name="preciohasta" placeholder="Hasta">
                            <!--<button id="send_precio" type="button" class="btn btn-framed btn-light-frame padding-5px width-100">Aplicar precio<i class="fa fa-search"></i></button>-->
                        </ul>
                    </div>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro3">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#ope" aria-expanded="true" aria-controls="Operacion">
                                    Tipo de Operación
                                </a>
                            </h4>
                        </div>
                        <div id="ope" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro3">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($operations as $operation)
                                    @if ($operation->operation_type==1)
                                        <li><span class="color-azul">Venta </span>
                                            <input @if(isset($request->operacion) && preg_match('/'.$operation->operation_type.'/', $request->operacion)) checked @endif value="{{$operation->operation_type}}" type="checkbox" class="operacion"></li>
                                    @endif
                                    @if ($operation->operation_type==2)
                                        <li><span class="color-azul">Alquiler </span>
                                            <input @if(isset($request->operacion) && preg_match('/'.$operation->operation_type.'/', $request->operacion)) checked @endif value="{{$operation->operation_type}}" type="checkbox" class="operacion"></li>
                                    @endif
                                    @if ($operation->operation_type==3)
                                        <li><span class="color-azul">Alquiler Temporario </span>
                                            <input @if(isset($request->operacion) && preg_match('/'.$operation->operation_type.'/', $request->operacion)) checked @endif value="{{$operation->operation_type}}" type="checkbox" class="operacion"></li>
                                    @endif
                                @endforeach
                                <input type="hidden" @if(isset($request->operacion)) value="{{$request->operacion}}" @endif id="operacion" name="operacion">
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro10">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#property_type" aria-expanded="true" aria-controls="property_types">
                                    Tipo de Propiedades
                                </a>
                            </h4>
                        </div>
                        <div id="property_type" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro10">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($property_types as $property)
                                    <li><span class="color-azul">{{$property->type}} </span>
                                        <input @if(isset($request->property_type) && in_array($property->id, explode(',', $request->property_type))) checked @endif value="{{$property->id}}" type="checkbox" class="property_ty"></li>
                                @endforeach
                                <input type="hidden" @if(isset($request->property_type)) value="{{$request->property_type}}" @endif id="property_ty" name="property_type">
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro4">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Superficie" aria-expanded="true" aria-controls="Superficie">
                                    Superficie Total
                                </a>
                            </h4>
                        </div>
                        <div id="Superficie" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro4">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($total_surfaces as $total_surface)
                                    <li><span class="color-azul">{{$total_surface['range']}} </span>
                                        <input @if(isset($request->surfaces) && preg_match('/'.$total_surface['value'].'/', $request->surfaces)) checked @endif value="{{$total_surface['value']}}" type="checkbox" class="surfaces"></li>
                                @endforeach
                                <input type="hidden" @if(isset($request->surfaces)) value="{{$request->surfaces}}" @endif id="surfaces" name="surfaces">
                            </ul>
                        </div>
                    </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="Filtro5">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Ammenities" aria-expanded="true" aria-controls="Ammenities">
                                Información adicional
                            </a>
                        </h4>
                    </div>
                    <div id="Ammenities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro5">
                        <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                        <ul class="padding-left-15px scroll-y">
                            <li><span class="color-azul">Apto Crédito </span>
                                <input @if(isset($request->tags) && in_array('1528', explode(',', $request->tags))) checked @endif value="1528" type="checkbox" class="tags"></li>
                            <li><span class="color-azul">Apto profesional </span>
                                <input @if(isset($request->tags) && in_array('47', explode(',', $request->tags))) checked @endif value="47" type="checkbox" class="tags"></li>
                            <li><span class="color-azul">Venta Directa </span>
                                <input @if(isset($request->tags) && in_array('1529', explode(',', $request->tags))) checked @endif value="1529" type="checkbox" class="tags"></li>
                            @foreach ($tags as $tag)
<!--                                <li><span class="color-azul">{{$tag->tag_name}} </span>
                                    <input @if(isset($request->tags) && in_array($tag->tag_id, explode(',', $request->tags))) checked @endif value="{{$tag->tag_id}}" type="checkbox" class="tags"></li>-->
                            @endforeach
                            <input type="hidden" @if(isset($request->tags)) value="{{$request->tags}}" @endif id="tags" name="tags">
                        </ul>
                    </div>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro6">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Cochera" aria-expanded="true" aria-controls="Cochera">
                                    Cochera
                                </a>
                            </h4>
                        </div>
                        <div id="Cochera" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro6">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($parkings as $parking)
                                    @if($parking->amount==0)
                                        <li><span class="color-azul">Sin Cochera </span>
                                            <input @if(isset($request->parking_lot_amount) && preg_match('/'.$parking->amount.'/', $request->parking_lot_amount)) checked @endif value="{{$parking->amount}}" name="parking_lot_amount" type="radio" class="parking_lot_amount"></li>
                                    @else
                                        <li><span class="color-azul">{{$parking->amount}} Cocheras </span>
                                            <input @if(isset($request->parking_lot_amount) && preg_match('/'.$parking->amount.'/', $request->parking_lot_amount)) checked @endif value="{{$parking->amount}}" name="parking_lot_amount" type="radio" class="parking_lot_amount"></li>
                                    @endif
                                @endforeach
                                <input type="hidden" @if(isset($request->parking_lot_amount)) value="{{$request->parking_lot_amount}}" @endif id="parking_lot_amount" >
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro11">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Ambientes" aria-expanded="true" aria-controls="Ambiente">
                                    Ambientes
                                </a>
                            </h4>
                        </div>
                        <div id="Ambientes" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro11">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($room_amount as $r)
                                    @if($r->amount==0)
                                        <li><span class="color-azul">Sin Ambientes </span>
                                            <input @if(isset($request->room_amount) && preg_match('/'.$r->amount.'/', $request->room_amount)) checked @endif value="{{$r->amount}}" name="room_amount" type="radio" class="room_amount"></li>
                                    @else
                                        <li><span class="color-azul">{{$r->amount}} Ambientes </span>
                                            <input @if(isset($request->room_amount) && preg_match('/'.$r->amount.'/', $request->room_amount)) checked @endif value="{{$r->amount}}" name="room_amount" type="radio" class="room_amount"></li>
                                    @endif
                                @endforeach
                                <input type="hidden" @if(isset($request->room_amount)) value="{{$request->room_amount}}" @endif id="room_amount" >
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro12">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Dormitorios" aria-expanded="true" aria-controls="Dormitorio">
                                    Dormitorios
                                </a>
                            </h4>
                        </div>
                        <div id="Dormitorios" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro12">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($suite_amount as $r)
                                    @if($r->amount==0)
                                        <li><span class="color-azul">Sin dormitorios </span>
                                            <input @if(isset($request->suite_amount) && preg_match('/'.$r->amount.'/', $request->suite_amount)) checked @endif value="{{$r->amount}}" name="suite_amount" type="radio" class="suite_amount"></li>
                                    @else
                                        <li><span class="color-azul">{{$r->amount}} Dormitorios </span>
                                            <input @if(isset($request->suite_amount) && preg_match('/'.$r->amount.'/', $request->suite_amount)) checked @endif value="{{$r->amount}}" name="suite_amount" type="radio" class="suite_amount"></li>
                                    @endif
                                @endforeach
                                <input type="hidden" @if(isset($request->suite_amount)) value="{{$request->suite_amount}}" @endif id="suite_amount" >
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="Filtro13">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Anti" aria-expanded="true" aria-controls="Ant">
                                    Antiguedad
                                </a>
                            </h4>
                        </div>
                        <div id="Anti" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Filtro32">
                            <button type="submit" class="btn btn-danger btn-lg buscar">Aplicar filtro</button>
                            <ul class="padding-left-15px padding-right-15px scroll-y">
                                @foreach ($age as $r)
                                    @if($r->amount==0)
                                        <li><span class="color-azul">Actual </span>
                                            <input @if(isset($request->age) && preg_match('/'.$r->amount.'/', $request->age)) checked @endif value="{{$r->amount}}" name="age" type="radio" class="age"></li>
                                    @else
                                        <li><span class="color-azul">@if(strlen($r->amount)>3) Del año {{$r->amount}} @else {{$r->amount}} Años de antiguedad  @endif </span>
                                            <input @if(isset($request->age) && preg_match('/'.$r->amount.'/', $request->age)) checked @endif value="{{$r->amount}}" name="age" type="radio" class="age"></li>
                                    @endif
                                @endforeach
                                <input type="hidden" @if(isset($request->age)) value="{{$request->age}}" @endif id="age" >
                            </ul>
                        </div>
                    </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-danger btn-lg buscar">Buscar</button>
                </div>
            </div>
        </div>
    </form>
</section>


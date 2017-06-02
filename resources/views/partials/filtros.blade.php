<section id="Filtros">
    <h2><i class="fa fa-filter"></i> Filtros</h2>
    <section id="FiltrosSeleccionados">
        @if($request->all())
        <ul class="tags">
            @foreach($request->all() as $key => $value)
                @if($value!='')
                    @if($key!='operacion' && $key!='propiedad' && $key!='orden' && $key!='page' && $key!='ord')
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
                        @endif
                    @endif
                @endif
            @endforeach
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
                            <!--<li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>
                            <li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>
                            <li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>
                            <li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>
                            <li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>
                            <li><a href="#">Palermo (91)</a></li>
                            <li><a href="#">Lanús (91)</a></li>-->
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
                            <input type="number" class="form-control display-inline width-45 margin-right-4" name="preciodesde" placeholder="Desde">
                            <input type="number" class="form-control display-inline width-45 float-right" name="preciohasta" placeholder="Hasta">
                            <button type="submit" class="btn btn-framed btn-light-frame padding-5px width-100">Aplicar precio<i class="fa fa-search"></i></button>
                        </ul>
                    </div>
                </div>
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
                            <!--<li><a href="#">Venta (91)</a></li>
                            <li><a href="#">Alquiler (91)</a></li>-->
                        </ul>
                    </div>
                </div>
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
                            <!--<li><a href="#">Hasta 30 m2 (91)</a></li>
                            <li><a href="#">Desde 30 m2 hasta 50m2 (91)</a></li>-->
                        </ul>
                    </div>
                </div>
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
                            <!--<li><a href="#">Gimnasio (91)</a></li>
                            <li><a href="#">Piscina (91)</a></li>-->
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
                        <ul class="padding-left-15px padding-right-15px scroll-y">
                            <!--<li><a href="#">Cantidad (91)</a></li>
                            <li><a href="#">Cantidad (91)</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


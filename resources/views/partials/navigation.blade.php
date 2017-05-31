<header id="page-header">
    <nav>
        <div class="left">
            <a href="{{route('home')}}" class="brand"><img src="/assets/img/logo.png" alt=""></a>
        </div>
        <div class="right">
            <div class="primary-nav has-mega-menu">
                <ul class="navigation">
                    <li class="active"><a href="{{route('home')}}">Inicio</a></li>
                    <li><a href="{{route('inmobiliarias')}}">Inmobiliarias</a></li>
                    <li class="has-child"><a href="#nav-listing">Propiedades</a>
                        <div class="wrapper">
                            <div id="nav-listing" class="nav-wrapper">
                                <ul>
                                    <li><a href="{{route('search')}}?propiedad=1">Terreno</a></li>
                                    <li><a href="{{route('search')}}?propiedad=2">Departamento</a></li>
                                    <li><a href="{{route('search')}}?propiedad=3">Casa</a></li>
                                    <li><a href="{{route('search')}}?propiedad=4">Quinta</a></li>
                                    <li><a href="{{route('search')}}?propiedad=5">Oficina</a></li>
                                    <li><a href="{{route('search')}}?propiedad=6">Amarra</a></li>
                                    <li><a href="{{route('search')}}?propiedad=7">Local</a></li>
                                    <li><a href="{{route('search')}}?propiedad=8">Edificio Comercial</a></li>
                                    <li><a href="{{route('search')}}?propiedad=9">Campo</a></li>
                                    <li><a href="{{route('search')}}?propiedad=10">Cochera</a></li>
                                    <li><a href="{{route('search')}}?propiedad=11">Hotel</a></li>
                                    <li><a href="{{route('search')}}?propiedad=12">Nave Industrial</a></li>
                                    <li><a href="{{route('search')}}?propiedad=13">PH</a></li>
                                    <li><a href="{{route('search')}}?propiedad=14">Depósito</a></li>
                                    <li><a href="{{route('search')}}?propiedad=15">Fondo de Comercio</a></li>
                                    <li><a href="{{route('search')}}?propiedad=16">Baulera</a></li>
                                    <li><a href="{{route('search')}}?propiedad=17">Bodegas</a></li>
                                    <li><a href="{{route('search')}}?propiedad=18">Fincas</a></li>
                                    <li><a href="{{route('search')}}?propiedad=19">Chacra</a></li>
                                    <li><a href="{{route('search')}}?propiedad=20">Cama Nautica</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{route('search')}}" class="text-green xs-text-white">¡Apto crédito!</a></li>
                </ul>
            </div>
            @if(Auth::check())
                <div class="secondary-nav">
                    <a href="{{route('logout')}}">Cerrar sesión</a>
                </div>
            @else
                <div class="secondary-nav">
                    <a href="{{route('signin')}}">Iniciar sesión</a>
                    <a href="{{route('signup')}}" class="promoted">Registrate</a>
                </div>
            @endif
            @if(Auth::check())
            <a href="{{route('carrito')}}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing" ><i class="fa fa-shopping-cart"></i><span>Ver mi lista de propiedades</span></a>
            @endif
            <div class="nav-btn">
                <i></i>
                <i></i>
                <i></i>
            </div>
        </div>
    </nav>
</header>

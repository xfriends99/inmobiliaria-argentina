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
                                    <li><a href="{{route('search')}}?propiedad=3">Casa</a></li>
                                    <li><a href="{{route('search')}}?propiedad=10">Cochera</a></li>
                                    <li><a href="{{route('search')}}?propiedad=2">Departamento</a></li>
                                    <li><a href="{{route('search')}}?propiedad=7">Local</a></li>
                                    <li><a href="{{route('search')}}?propiedad=5">Oficina</a></li>
                                    <li><a href="{{route('search')}}?propiedad=1">Terreno</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{route('search')}}?tags=1528&" class="text-green xs-text-white">¡Apto crédito!</a></li>
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

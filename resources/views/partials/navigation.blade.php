<header id="page-header">
    <nav>
        <div class="left">
            <a href="{{route('home')}}" class="brand"><img src="assets/img/logo.png" alt=""></a>
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
                                    <li><a href="#">Emprendimientos</a></li>
                                    <li><a href="#">Casas</a>
                                    <li><a href="#">Departamentos</a>
                                    <li><a href="#">Cocheras</a>
                                    <li><a href="#">Locales</a>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="" class="text-green xs-text-white">¡Apto crédito!</a></li>
                </ul>
            </div>
            <div class="secondary-nav">
                <a href="{{route('signin')}}">Iniciar sesión</a>
                <a href="{{route('signup')}}" class="promoted">Registrate</a>
            </div>
            <a href="{{route('carrito')}}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing" ><i class="fa fa-shopping-cart"></i><span>Ver mi lista de propiedades</span></a>
            <div class="nav-btn">
                <i></i>
                <i></i>
                <i></i>
            </div>
        </div>
    </nav>
</header>

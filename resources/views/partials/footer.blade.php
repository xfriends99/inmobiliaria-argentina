<footer id="page-footer">
    <div class="footer-wrapper">
        <div class="block hidden-xs hidden-sm">
            <div class="container">
                <div class="vertical-aligned-elements">
                    <div class="element width-50">
                        <p>Club Inmueble es el primer buscador de propiedades que reúne a las más destacadas inmobiliarias de Buenos Aires.</p>
                    </div>
                    <div class="element width-50 text-align-right">
                        <a href="https://www.facebook.com/clubinmueble" target="_blank" class="circle-icon"><i class="social_facebook"></i></a>
                    </div>
                </div>
                <div class="background-wrapper">
                    <div class="bg-transfer opacity-50">
                        <img src="/assets/img/footer-bg.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-navigation">
            <div class="container">
                <div class="vertical-aligned-elements">
                    <div class="element col-sm-12">(C) 2017 Club Inmueble, Todos los derechos reservados. Desarrollado por <a href="http://www.coffeetalk.com.ar" target="_blank">CoffeeTalk Argentina</a></div>
                    <div class="element text-align-right">
                        <a href="{{route('home')}}">Inicio</a>
                        <a href="{{route('nosotros')}}">Nosotros</a>
                        <a href="{{route('inmobiliarias')}}">Inmobiliarias</a>
                        <a href="{{route('carrito')}}">Mi lista de propiedades</a>
                        @if(Auth::check())
                            <a href="{{route('logout')}}">Cerrar sesión</a>
                        @else
                            <a href="{{route('signin')}}">Iniciar sesión</a>
                            <a href="{{route('signup')}}">Registrate</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
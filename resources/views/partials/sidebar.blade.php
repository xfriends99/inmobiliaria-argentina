<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="image" class="img-circle" width="100" src="/assets/img/profile.png">
                    </div>
                    <div class="name"><strong>{{ Auth::user()->name }}</strong></div>
                </div>
            </li>
            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> Dashboard
                </a>
            </li>

            <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                <a href="{{ route('user.index') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Usuarios
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
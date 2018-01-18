<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand show" href="{{ url('/') }}">
                <img src="{{ url('img/logott.png') }}" alt="Logo TecTrain" class="img-responsive" style="max-width: 140px;">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if (!Auth::guest())
                    @role('admin')
                        <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                        <li><a href="{{ url('admin/criar-documento') }}">Novo Documento</a></li>
                    @endrole
                    <li><a href="{{ url('admin/lista-documento') }}">Listar Documentos</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/admin/login') }}">Login</a></li>
                    {{-- <li><a href="{{ url('/admin/register') }}">Register</a></li> --}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
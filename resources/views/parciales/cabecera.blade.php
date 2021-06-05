<nav id="cabecera" class="navbar navbar-expand-lg navbar-dark bg-info rounded">
    <a class="navbar-brand" href="/">Parroquia de Barciela-Sigüeiro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars10" aria-controls="navbars10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbars10">
        <ul class="navbar-nav ml-auto">
        	<li class="nav-item">
            	<a class="nav-link" href="{{ route('quienes') }}">Quiénes somos</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Secciones</a>
                <div class="dropdown-menu bg-info" aria-labelledby="dropdown09">
                    <a class="dropdown-item text-light" href="{{ route('seccion', 'Noticias') }}">Noticias</a>
                    <a class="dropdown-item text-light" href="{{ route('seccion', 'Catequesis') }}">Catequesis</a>
                    <a class="dropdown-item text-light" href="{{ route('seccion', 'Liturgia') }}">Liturgia</a>
                    <a class="dropdown-item text-light" href="{{ route('seccion', 'Cáritas') }}">Cáritas</a>
                </div>
            </li>
            
            <li class="nav-item">
            	<a class="nav-link" href="{{ route('contacto.crear') }}">Contacto</a>
            </li>
            
            <li class="nav-item">
 
                @guest
                <a class="nav-link" href="{{ route('login') }}">Admin</a>
                @else
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </li>
        </ul>
        <!--Formulario de búsqueda-->
        <form action="{{route('post.buscar')}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="busca" placeholder="Busca un post"> 
					<div class="input-group-append">
                        <button type="submit" class="btn btn-warning"></button>
                    </div>
            </div>
        </form>

    </div>
</nav>
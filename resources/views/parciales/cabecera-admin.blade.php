<nav id="cabecera" class="navbar navbar-expand-lg navbar-dark bg-info rounded">
    <a class="navbar-brand" href="/" target="new">Parroquia de Barciela-Sigüeiro</a>

        <ul class="navbar-nav ml-auto">        	         
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

</nav>
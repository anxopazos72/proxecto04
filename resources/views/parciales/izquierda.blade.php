<nav id="izquierda" class="col-sm-3 col-md-2 navbar-dark bg-info sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('home') }}">Administra posts</a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('register') }}">Nuevos admins</a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('user') }}">Edita usuario</a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('ver.comentario') }}">Comentarios</a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('ver.papelera') }}">Papelera</a>
        </li>
    </ul>
</nav>
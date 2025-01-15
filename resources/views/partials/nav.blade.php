<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <!-- Título o nombre del blog -->
        <a class="navbar-brand" href="{{ route('inicio') }}">Blog</a>

        <!-- Enlaces de navegación -->
        <ul class="flex-row navbar-nav">
            <li class="nav-item">
                <a class="nav-link px-2 {{ request()->routeIs('inicio') ? 'active' : '' }}" href="{{ route('inicio') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ request()->routeIs('posts_listado') ? 'active' : '' }}" href="{{ route('posts_listado') }}">Listado de posts</a>
            </li>
        </ul>
    </div>
</nav>

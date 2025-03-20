<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Logo/Nombre de la Aplicación -->
        <a class="navbar-brand">Cafeteria</a>
        
        <!-- Botón para móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu.dia') ? 'active' : '' }}" href="{{ route('menu.dia') }}">Menú del Día</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('productos') ? 'active' : '' }}" href="{{ route('productos') }}">Productos</a>
                    </li>
                    @if(auth()->user()->rol === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('gestion-productos') ? 'active' : '' }}" href="{{ route('gestion-productos') }}">Gestión Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.menu') ? 'active' : '' }}" href="{{ route('admin.menu') }}">Gestión Menús</a>
                        </li>
                    @endif
                @endauth
            </ul>

            <!-- Enlaces para Usuarios Autenticados -->
            @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nombre }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
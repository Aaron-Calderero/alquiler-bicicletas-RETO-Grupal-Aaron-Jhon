<header class="header">
    <div class="header__brand">
        <a href="{{ route('bikes.index') }}">
            <x-application-logo/>
        </a>
        <h1 class="header__title">Bill-Bike Rental</h1>
    </div>
    <div class="header__right">

        <div class="header__actions">
            <x-switch.button>🌙 Oscuro</x-switch.button>

            @auth
                <div class="user-menu">
                    <button type="button" id="user-menu-toggle" class="user-menu__toggle" aria-expanded="false" aria-controls="user-menu-panel">
                        <span class="user-menu__name">{{ Auth::user()->name }}</span>
                        <span class="user-menu__arrow" aria-hidden="true">▾</span>
                    </button>

                    <div id="user-menu-panel" class="user-menu__panel">
                        <a href="{{ route('profile.edit') }}" class="navbar__link">Perfil</a>

                        <form method="POST" action="{{ route('logout') }}" class="navbar__logout-form">
                            @csrf
                            <button type="submit" class="navbar__logout-button">Cerrar sesion</button>
                        </form>
                    </div>
                </div>
            @endauth

            <button type="button" id="burger-button" class="burger" aria-label="Abrir menú" aria-expanded="false" aria-controls="navbar-menu">
                <span class="burger__bar"></span>
                <span class="burger__bar"></span>
                <span class="burger__bar"></span>
            </button>
        </div>

        <nav class="navbar" id="navbar-menu">

            <div class="navbar__links">

                <a href="{{ route('bikes.index') }}" class="navbar__link">Bicicletas</a>

                @auth
                    <a href="{{ route('bookings.index') }}" class="navbar__link">Mis reservas</a>
                @endauth

                @guest
                    <a href="{{ route('register') }}" class="navbar__link" >Registro</a>
                    <a href="{{ route('login') }}" class="navbar__link" >Iniciar sesion</a>
                @endguest
            </div>
        </nav>
    </div>
</header>
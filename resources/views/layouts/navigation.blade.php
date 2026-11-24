<header class="header">
    <div class="header__brand">
        <a href="{{ route('bikes.index') }}">
            <x-application-logo style="width: 8rem;"/>
        </a>
        <h1 class="header__title">Bill-Bike Rental</h1>
    </div>
    <nav class="navbar">

        <div class="navbar__links">

            <x-switch.button>Cambiar tema</x-switch.button>

            <a href="{{ route('bikes.index') }}" class="navbar__link">Bikes</a>

            @auth
                <a href="{{ route('bookings.index') }}" class="navbar__link">Mis reservas</a>
                <a href="{{ route('profile.edit') }}" class="navbar__link">Profile</a>

                <span class="navbar-user" class="navbar__user" >{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}" class="navbar__logout-form">
                    @csrf
                    <button type="submit" class="navbar__logout-button">Log Out</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('register') }}" class="navbar__link" >Register</a>
                <a href="{{ route('login') }}" class="navbar__link" >Log In</a>
            @endguest
        </div>
    </nav>
</header>
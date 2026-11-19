<nav class="navbar">
    <a href="{{ route('bikes.index') }}" class="navbar-logo">
        <x-application-logo style="width: 40px; height: 40px;" />
    </a>

    <div class="navbar-links">
        <a href="{{ route('bikes.index') }}">Bikes</a>

        @auth
            <a href="{{ route('bookings.index') }}">Mis reservas</a>
            <a href="{{ route('profile.edit') }}">Profile</a>

            <span class="navbar-user">{{ Auth::user()->name }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}">Log In</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
    </div>
</nav>
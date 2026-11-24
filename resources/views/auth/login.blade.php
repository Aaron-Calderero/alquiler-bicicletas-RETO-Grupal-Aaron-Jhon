@extends('layouts.guest')

@section('title', 'Iniciar sesión')

@section('content')
    <section class="login">
        <div class="login__tabs">
            <a href="{{ route('register') }}" class="login__tab">Register</a>
            <a href="{{ route('login') }}" class="login__tab login__tab--active">login</a>
        </div>

        <div class="login__card">
            <h2 class="login__title">Login</h2>

            @if (session('status'))
                <p class="login__status">{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf

                <div class="login__group">
                    <label for="email" class="login__label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="login__input" required autofocus autocomplete="username">
                    @error('email')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group">
                    <label for="password" class="login__label">Contraseña</label>
                    <input id="password" type="password" name="password"
                           class="login__input" required autocomplete="current-password">
                    @error('password')
                        <span class="login__error">{{ $message }}</span>
                    @enderror

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login__link">¿Forgot your password?</a>
                    @endif
                </div>

                <label for="remember_me" class="login__remember">
                    <input id="remember_me" type="checkbox" name="remember">
                    Remember me
                </label>

                <button type="submit" class="login__button">login</button>
            </form>
        </div>
    </section>
@endsection
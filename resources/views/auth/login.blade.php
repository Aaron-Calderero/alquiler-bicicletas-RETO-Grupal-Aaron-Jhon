@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('content')
    <section class="login-register">
        <div class="login-register__tabs">
            <a href="{{ route('register') }}" class="login-register__tab">Registro</a>
            <a href="{{ route('login') }}" class="login-register__tab login-register__tab--active" aria-current="page">Inicio sesion</a>
        </div>

        <div class="login-register__card">
            <h2 class="login-register__title">Login</h2>

            @if (session('status'))
                <p class="login-register__status">{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-register__form">
                @csrf

                <div class="login-register__group">
                    <label for="email" class="login-register__label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="login-register__input @error('email') login-register__input--invalid @enderror"
                           required autofocus autocomplete="username">
                    @error('email')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login-register__group">
                    <label for="password" class="login-register__label">Contraseña</label>
                    <input id="password" type="password" name="password"
                           class="login-register__input @error('password') login-register__input--invalid @enderror"
                           required autocomplete="current-password">
                    @error('password')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login-register__link">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <label for="remember_me" class="login-register__remember">
                    <input id="remember_me" type="checkbox" name="remember">
                    Recordarme
                </label>

                <button type="submit" class="login-register__button">Iniciar sesion</button>
            </form>
        </div>
    </section>
@endsection
@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <section class="login-register">
        <div class="login-register__tabs">
            <a href="{{ route('register') }}" class="login-register__tab login-register__tab--active" aria-current="page">Registro</a>
            <a href="{{ route('login') }}" class="login-register__tab">Inicio sesion</a>
        </div>

        <div class="login-register__card">
            <h2 class="login-register__title">Registro</h2>

            <form method="POST" action="{{ route('register') }}" class="login-register__form">
                @csrf

                <div class="login-register__group">
                    <label for="name" class="login-register__label">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="login-register__input @error('name') login-register__input--invalid @enderror"
                           required autofocus autocomplete="name">
                    @error('name')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login-register__group">
                    <label for="email" class="login-register__label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="login-register__input @error('email') login-register__input--invalid @enderror"
                           required autocomplete="username">
                    @error('email')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login-register__group">
                    <label for="password" class="login-register__label">Contraseña</label>
                    <input id="password" type="password" name="password"
                           class="login-register__input @error('password') login-register__input--invalid @enderror"
                           required autocomplete="new-password">
                    @error('password')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login-register__group">
                    <label for="password_confirmation" class="login-register__label">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="login-register__input @error('password_confirmation') login-register__input--invalid @enderror"
                           required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="login-register__error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="login-register__button">Registrarse</button>
            </form>
        </div>
    </section>
@endsection
@extends('layouts.guest')

@section('title', 'Registro')

@section('content')    
    <section class="login">
        <div class="login__tabs">
            <a href="{{ route('register') }}" class="login__tab login__tab--active">Register</a>
            <a href="{{ route('login') }}" class="login__tab">Login</a>
        </div>

        <div class="login__card">
            <h2 class="login__title">Register</h2>

            <form method="POST" action="{{ route('register') }}" class="login__form">
                @csrf

                <div class="login__group">
                    <label for="name" class="login__label">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="login__input" required autofocus autocomplete="name">
                    @error('name')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group">
                    <label for="email" class="login__label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="login__input" required autocomplete="username">
                    @error('email')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group">
                    <label for="password" class="login__label">Contraseña</label>
                    <input id="password" type="password" name="password"
                           class="login__input" required autocomplete="new-password">
                    @error('password')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group">
                    <label for="password_confirmation" class="login__label">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="login__input" required autocomplete="new-password">
                </div>

                <button type="submit" class="login__button">Register</button>
            </form>
        </div>
    </section>
@endsection
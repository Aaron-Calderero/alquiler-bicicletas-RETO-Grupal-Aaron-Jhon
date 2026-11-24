<section class="profile__section">
    <header class="profile__header">
        <h2 class="profile__title">Cambiar contraseña</h2>
        <p class="profile__text">Usa una contraseña larga y aleatoria para mantener tu cuenta segura.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="profile__form">
        @csrf
        @method('put')

        <div class="profile__group">
            <label for="update_password_current_password" class="profile__label">Contraseña actual</label>
            <input id="update_password_current_password" name="current_password" type="password"
                   class="profile__input @error('current_password', 'updatePassword') profile__input--invalid @enderror"
                   autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <span class="profile__error">{{ $message }}</span>
            @enderror
        </div>

        <div class="profile__group">
            <label for="update_password_password" class="profile__label">Nueva contraseña</label>
            <input id="update_password_password" name="password" type="password"
                   class="profile__input @error('password', 'updatePassword') profile__input--invalid @enderror"
                   autocomplete="new-password">
            @error('password', 'updatePassword')
                <span class="profile__error">{{ $message }}</span>
            @enderror
        </div>

        <div class="profile__group">
            <label for="update_password_password_confirmation" class="profile__label">Confirmar contraseña</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="profile__input @error('password_confirmation', 'updatePassword') profile__input--invalid @enderror"
                   autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <span class="profile__error">{{ $message }}</span>
            @enderror
        </div>

        <div class="profile__actions">
            <button type="submit" class="profile__button">Guardar</button>

            @if (session('status') === 'password-updated')
                <p class="profile__saved">Guardado.</p>
            @endif
        </div>
    </form>
</section>
<section class="profile__section">
    <header class="profile__header">
        <h2 class="profile__title">Información del perfil</h2>
        <p class="profile__text">Actualiza tu nombre y tu dirección de email.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile__form">
        @csrf
        @method('patch')

        <div class="profile__group">
            <label for="name" class="profile__label">Nombre</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}"
                   class="profile__input @error('name') profile__input--invalid @enderror"
                   required autofocus autocomplete="name">
            @error('name')
                <span class="profile__error">{{ $message }}</span>
            @enderror
        </div>

        <div class="profile__group">
            <label for="email" class="profile__label">Email</label>
            <input id="email" name="email" type="email"
                   value="{{ old('email', $user->email) }}"
                   class="profile__input @error('email') profile__input--invalid @enderror"
                   required autocomplete="username">
            @error('email')
                <span class="profile__error">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="profile__text">
                    Tu email no está verificado.
                    <button form="send-verification" class="profile__link-button">
                        Pulsa aquí para reenviar el email de verificación.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="profile__saved">Te hemos enviado un nuevo enlace de verificación.</p>
                @endif
            @endif
        </div>

        <div class="profile__actions">
            <button type="submit" class="profile__button">Guardar</button>

            @if (session('status') === 'profile-updated')
                <p class="profile__saved">Guardado.</p>
            @endif
        </div>
    </form>
</section>
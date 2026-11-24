<section class="profile__section">
    <header class="profile__header">
        <h2 class="profile__title">Eliminar cuenta</h2>
        <p class="profile__text">
            Cuando elimines tu cuenta, todos tus datos se borrarán de forma permanente.
            Antes de continuar, descarga cualquier información que quieras conservar.
        </p>
    </header>

    <button type="button"
            class="profile__button profile__button--danger"
            onclick="document.getElementById('confirm-user-deletion').showModal()">
        Eliminar cuenta
    </button>

    <dialog id="confirm-user-deletion" class="profile__dialog">
        <form method="post" action="{{ route('profile.destroy') }}" class="profile__form">
            @csrf
            @method('delete')

            <h2 class="profile__title">¿Seguro que quieres eliminar tu cuenta?</h2>

            <p class="profile__text">
                Esta acción es permanente. Escribe tu contraseña para confirmar.
            </p>

            <div class="profile__group">
                <label for="delete_password" class="profile__label">Contraseña</label>
                <input id="delete_password" name="password" type="password"
                       class="profile__input @error('password', 'userDeletion') profile__input--invalid @enderror"
                       placeholder="Contraseña">
                @error('password', 'userDeletion')
                    <span class="profile__error">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile__actions profile__actions--end">
                <button type="button"
                        class="profile__button profile__button--secondary"
                        onclick="this.closest('dialog').close()">
                    Cancelar
                </button>

                <button type="submit" class="profile__button profile__button--danger">
                    Eliminar cuenta
                </button>
            </div>
        </form>
    </dialog>

    @if ($errors->userDeletion->isNotEmpty())
        <script>document.getElementById('confirm-user-deletion').showModal();</script>
    @endif
</section>
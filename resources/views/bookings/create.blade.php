@extends('layouts.app')

@section('title', 'Reservar ' . $bike->model)

@section('content')
    <section class="booking-form">
        <a href="{{ route('bikes.index') }}" class="booking-form__back">&larr; Volver al catálogo</a>

        <div class="booking-form__card">
            <h1 class="booking-form__title">Reserva</h1>

            <dl class="booking-form__summary">
                <div class="booking-form__summary-item">
                    <dt>Bicicleta</dt>
                    <dd>{{ $bike->model }}</dd>
                </div>
                <div class="booking-form__summary-item">
                    <dt>Nº de serie</dt>
                    <dd>{{ $bike->serial_number }}</dd>
                </div>
                <div class="booking-form__summary-item">
                    <dt>Precio por hora</dt>
                    <dd>{{ number_format($bike->price_per_hour, 2, ',', '.') }} €</dd>
                </div>
            </dl>

            @error('bike_id')
                <p class="booking-alert booking-alert--error">{{ $message }}</p>
            @enderror

            <form method="POST" action="{{ route('bookings.store') }}" class="booking-form__form">
                @csrf
                <input type="hidden" name="bike_id" value="{{ $bike->id }}">

                <div class="booking-form__group">
                    <label for="start_time" class="booking-form__label">Inicio</label>
                    <input type="datetime-local" name="start_time" id="start_time"
                           value="{{ old('start_time') }}"
                           min="{{ now()->format('Y-m-d\TH:i') }}"
                           class="booking-form__input @error('start_time') booking-form__input--invalid @enderror"
                           required>
                    @error('start_time')
                        <span class="booking-form__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="booking-form__group">
                    <label for="end_time" class="booking-form__label">Fin</label>
                    <input type="datetime-local" name="end_time" id="end_time"
                           value="{{ old('end_time') }}"
                           min="{{ now()->format('Y-m-d\TH:i') }}"
                           class="booking-form__input @error('end_time') booking-form__input--invalid @enderror"
                           required>
                    @error('end_time')
                        <span class="booking-form__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="booking-form__actions">
                    <a href="{{ route('bikes.index') }}" class="booking-button booking-button--secondary">Cancelar</a>
                    <button type="submit" class="booking-button">Reservar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@extends('layouts.app')

@section('title', 'Reserva #' . $booking->id)

@section('content')
    @php
        $statusLabels = [
            'pending'   => 'Pendiente',
            'active'    => 'Activa',
            'completed' => 'Finalizada',
            'cancelled' => 'Cancelada',
        ];
        $hours = max(1, (int) ceil($booking->start_time->diffInMinutes($booking->end_time) / 60));
    @endphp

    <section class="booking-detail">
        <nav class="booking-detail__nav">
            <a href="{{ route('bookings.index') }}" class="booking-link">&larr; Volver a mis reservas</a>
            <a href="{{ route('bikes.show', $booking->bike) }}" class="booking-link">Ver bicicleta</a>
        </nav>

        @if (session('success'))
            <p class="booking-alert booking-alert--success">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="booking-alert booking-alert--error">{{ session('error') }}</p>
        @endif

        <div class="booking-detail__card">
            <div class="booking-detail__header">
                <h1 class="booking-detail__title">Reserva #{{ $booking->id }}</h1>
                <span class="booking-status booking-status--{{ $booking->status }}">
                    {{ $statusLabels[$booking->status] ?? $booking->status }}
                </span>
            </div>

            <dl class="booking-detail__list">
                <div class="booking-detail__item">
                    <dt>Bicicleta</dt>
                    <dd>{{ $booking->bike->model }}</dd>
                </div>
                <div class="booking-detail__item">
                    <dt>Nº de serie</dt>
                    <dd>{{ $booking->bike->serial_number }}</dd>
                </div>
                <div class="booking-detail__item">
                    <dt>Inicio</dt>
                    <dd>{{ $booking->start_time->format('d/m/Y H:i') }}</dd>
                </div>
                <div class="booking-detail__item">
                    <dt>Fin</dt>
                    <dd>{{ $booking->end_time->format('d/m/Y H:i') }}</dd>
                </div>
                <div class="booking-detail__item">
                    <dt>Horas</dt>
                    <dd>{{ $hours }}</dd>
                </div>
                <div class="booking-detail__item">
                    <dt>Reservado el</dt>
                    <dd>{{ $booking->created_at->format('d/m/Y H:i') }}</dd>
                </div>
                <div class="booking-detail__item booking-detail__item--total">
                    <dt>Total</dt>
                    <dd>{{ number_format($booking->total_cost, 2, ',', '.') }} €</dd>
                </div>
            </dl>

            @if ($booking->status === 'pending')
                <form method="POST" action="{{ route('bookings.cancel', $booking) }}"
                      class="booking-detail__actions"
                      onsubmit="return confirm('¿Seguro que quieres cancelar esta reserva?');">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="booking-button booking-button--danger">Cancelar reserva</button>
                </form>
            @endif
        </div>
    </section>
@endsection
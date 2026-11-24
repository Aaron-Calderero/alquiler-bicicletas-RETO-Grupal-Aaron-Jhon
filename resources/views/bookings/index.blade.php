@extends('layouts.app')

@section('title', 'Mis reservas')

@section('content')
    @php
        $statusLabels = [
            'pending'   => 'Pendiente',
            'active'    => 'Activa',
            'completed' => 'Finalizada',
            'cancelled' => 'Cancelada',
        ];
    @endphp

    <section class="booking-list">
        <div class="booking-list__header">
            <h1 class="booking-list__title">Mis reservas</h1>
            <a href="{{ route('bikes.index') }}" class="booking-button">+ Nueva reserva</a>
        </div>

        @if (session('success'))
            <p class="booking-alert booking-alert--success">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="booking-alert booking-alert--error">{{ session('error') }}</p>
        @endif

        <div class="booking-list__wrapper">
            <table class="booking-list__table">
                <thead>
                    <tr>
                        <th>Bicicleta</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->bike->model }}</td>
                            <td>{{ $booking->start_time->format('d/m/Y H:i') }}</td>
                            <td>{{ $booking->end_time->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($booking->total_cost, 2, ',', '.') }} €</td>
                            <td>
                                <span class="booking-status booking-status--{{ $booking->status }}">
                                    {{ $statusLabels[$booking->status] ?? $booking->status }}
                                </span>
                            </td>
                            <td>
                                <div class="booking-list__actions">
                                    <a href="{{ route('bookings.show', $booking) }}"
                                       class="booking-button booking-button--secondary booking-button--small">Ver</a>

                                    @if ($booking->status === 'pending')
                                        <form method="POST" action="{{ route('bookings.cancel', $booking) }}"
                                              onsubmit="return confirm('¿Seguro que quieres cancelar esta reserva?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="booking-button booking-button--danger booking-button--small">
                                                Cancelar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="booking-list__empty">
                                Aún no tienes reservas.
                                <a href="{{ route('bikes.index') }}" class="booking-link">Ver catálogo</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($bookings instanceof \Illuminate\Pagination\AbstractPaginator && $bookings->hasPages())
            <div class="booking-list__pagination">
                {{ $bookings->links() }}
            </div>
        @endif
    </section>
@endsection
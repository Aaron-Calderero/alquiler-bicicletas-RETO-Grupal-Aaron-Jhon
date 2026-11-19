@extends('layouts.app')

@section('title', 'Detalle de la reserva #' . $booking->id)

@section('header')
    <h1>Detalle de la reserva - {{ config('app.name') }}</h1>
@endsection

@section('content')

    {{-- Mensajes flash --}}
    @if (session('success'))
        <div class="">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="">
            {{ session('error') }}
        </div>
    @endif

    @php
        $statusStyles = [
            'pending'   => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            'completed' => 'bg-gray-200 text-gray-700',
            'active'    => 'bg-blue-100 text-blue-800',
        ];
        $statusLabels = [
            'pending'   => 'Pendiente',
            'confirmed' => 'Confirmada',
            'cancelled' => 'Cancelada',
            'completed' => 'Finalizada',
            'active'    => 'Activa',
        ];
    @endphp

    @php
        $start = \Carbon\Carbon::parse($booking->start_time);
        $end   = \Carbon\Carbon::parse($booking->end_time);
    @endphp

    <div class="">
        <a href="{{ route('bookings.index') }}" class="">&larr; Volver a mis reservas</a>
        <a href="{{ route('bikes.index') }}" class="">Catálogo</a>
        <a href="{{ route('bikes.show', $booking->bike) }}" class="">Ver bicicleta</a>
    </div>

    <div class="">
        <div class="">
            <h1 class="">Reserva #{{ $booking->id }}</h1>
            <span class="">
                {{ $statusLabels[$booking->status] ?? $booking->status }}
            </span>
        </div>

        <dl class="">
            <div class="">
                <dt class="">Bicicleta</dt>
                <dd class="">{{ $booking->bike->model }}</dd>
            </div>
            <div class="">
                <dt class="">Nº de serie</dt>
                <dd>{{ $booking->bike->serial_number }}</dd>
            </div>
            <div class="">
                <dt class="">Inicio</dt>
                <dd>{{ $start->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="">
                <dt class="">Fin</dt>
                <dd>{{ $end->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="">
                <dt class="">Horas</dt>
                <dd>{{ (int) ceil($start->diffInMinutes($end) / 60) }}</dd>
            </div>
            <div class="">
                <dt class="">Total</dt>
                <dd class="">{{ number_format($booking->total_price, 2, ',', '.') }} €</dd>
            </div>
            <div class="">
                <dt class="">Reservado el</dt>
                <dd>{{ $booking->created_at->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>

        @if (!in_array($booking->status, ['cancelled', 'completed']))
            <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class=""
                    onsubmit="return confirm('¿Seguro que quieres cancelar esta reserva?');">
                @csrf
                @method('PATCH')
                <button type="submit" class="">
                    Cancelar reserva
                </button>
            </form>
        @endif
    </div>
@endsection


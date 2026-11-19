@extends('layouts.app')

@section('title', 'Mis reservas')  

@section('header')
    <h1>Reserva</h1>
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

    <div class="">
        <h1 class="">Mis reservas</h1>
        <a href="{{ route('bikes.index') }}" class="">+ Nueva reserva (ver catálogo)</a>
    </div>

    <div class="">
        <table class="">
            <thead class="">
                <tr>
                    <th class="">Bicicleta</th>
                    <th class="">Inicio</th>
                    <th class="">Fin</th>
                    <th class="">Total</th>
                    <th class="">Estado</th>
                    <th class="">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($bookings as $booking)
                    <tr>
                        <td class="">{{ $booking->bike->model }}</td>
                        <td class="">{{ \Carbon\Carbon::parse($booking->start_time)->format('d/m/Y H:i') }}</td>
                        <td class="">{{ \Carbon\Carbon::parse($booking->end_time)->format('d/m/Y H:i') }}</td>
                        <td class="">{{ number_format($booking->total_price, 2, ',', '.') }} €</td>
                        <td class="">
                            <span class="">
                                {{ $statusLabels[$booking->status] ?? $booking->status }}
                            </span>
                        </td>
                        <td class="">
                            <a href="{{ route('bookings.show', $booking) }}"
                                class="">Ver</a>

                            @if (!in_array($booking->status, ['cancelled', 'completed']))
                                <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class=""
                                        onsubmit="return confirm('¿Seguro que quieres cancelar esta reserva?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="">Cancelar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="">
                            Aún no tienes reservas.
                            <a href="{{ route('bikes.index') }}" class="">Ver catálogo</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($bookings instanceof \Illuminate\Pagination\AbstractPaginator && $bookings->hasPages())
        <div class="">
            {{ $bookings->links() }}
        </div>
    @endif
@endsection

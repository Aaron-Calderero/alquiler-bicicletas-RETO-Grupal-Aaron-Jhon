@extends('layouts.app')

@section('title', 'Bikes details')  

@section('header')
    <h1>Bicicletas</h1>
@endsection

@section('content')
    <section class="">
        
        @if($bike)
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Serial_number</th>
                        <th>Model</th>
                        <th>Price_per_hour</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{$bike->id}}</th>
                        <th>{{$bike->serial_number}}</th>
                        <th>{{$bike->model}}</th>
                        <th>{{$bike->price_per_hour}}</th>
                        <th>{{$bike->status}}</th>
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('bookings.create', $bike) }}">Reservar</a>

        @else
            <h2>No se pudo encontrar</h2>
        @endif

    </section>
@endsection


@extends('layouts.app')

@section('title', 'Bikes')  

@section('header')
    <h1>Bicicletas</h1>
@endsection

@section('content')
    <p>Bienvenido a la sección de bicicletas. Aquí puedes explorar nuestro catálogo de bicicletas disponibles para alquiler.</p>

    <section class="">
        <h2>Catalogo</h2>
        <nav>
            
        </nav>
        <table>

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Serial_number</th>
                    <th>Model</th>
                    <th>Price_per_hour</th>
                    <th>Status</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>

        @forelse($bikes as $bike)

                <tr>
                    <td>{{$bike->id}}</td>
                    <td>{{$bike->serial_number}}</td>
                    <td>{{$bike->model}}</td>
                    <td>{{$bike->price_per_hour}}</td>
                    <td>{{$bike->status}}</td>
                    <td><a href="{{ route('bikes.show', $bike) }}">Detalles</a></td>
                </tr>

        @empty
            <h3>No hay bicicletas en estos momentos</h3>
        @endforelse
            </tbody>
        </table>

    </section>
@endsection

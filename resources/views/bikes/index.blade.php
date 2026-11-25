@extends('layouts.app')

@section('title', 'Bikes')  

@section('content')
    <div class="carrousel">
        <img src="{{ asset('./images/carrousel/carrousel1.jpeg') }}" alt="Imagen de carrousel para presentar la pagina" class="carrousel__image">
    </div>

    <section class="bike-section" >
        <h2 class="bike-section__title" >Catalog</h2>

        <div class="bike-section__controls">
            <select name="filter-model" id="filter-model" class="bike-section__select">
                <option value="all">Todos los modelos</option>
                @foreach($bikes->pluck('model')->unique() as $model)
                    <option value="{{ strtolower($model) }}">{{ __($model) }}</option>
                @endforeach
             </select>
            <select name="sort-price" id="sort-price" class="bike-section__select">
                <option value="default">Orden por defecto</option>
                <option value="asc">Precio: menor a mayor</option>
                <option value="desc">Precio: mayor a menor</option>
            </select>
        </div>

        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <p id="no-results" class="bike-section__empty bike-section__empty--hidden">
            Ninguna bicicleta encontrada
        </p>

        <div id="bike-grid" class="bike-grid">
            @forelse($bikes as $bike)

            <x-bikes.card data-model="{{ strtolower($bike->model) }}" data-price="{{ $bike->price_per_hour }}">
                <img src="{{ asset('images/bikes/bike1.jpeg') }}" alt="Imagen de la bicicleta {{ $bike->serial_number }}" class="bike-card__image">
                <div class="bike-card__content">
                    <h3 class="bike-card__title">{{ $bike->serial_number }}</h3>
                    <p class="bike-card__model">{{ __($bike->model) }}</p>
                    <span class="bike-card__status {{ in_array($bike->status, ['retired', 'maintenance']) ? 'bg-danger' : '' }}">{{ $bike->status }}</span>
                    <p class="bike-card__price"> {{__('Precio')}} {{ $bike->price_per_hour }} euros</p>
                    <a href="{{ route('bikes.show', $bike) }}" class="bike-card__button" arial-label="Detalles de {{ $bike->serial_number }}">Detalles</a>
                </div>
            </x-bikes.card>

            @empty
                <h3>No hay bicicletas</h3>

            @endforelse            
        </div>

    </section>
@endsection

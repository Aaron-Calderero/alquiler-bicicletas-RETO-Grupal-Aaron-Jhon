@extends('layouts.app')

@section('title', 'Bikes')  

@section('content')
    <div class="carrousel">
        <img src="https://www.30diasenbici.com/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-05-at-09.50.47-e1680764757912.jpeg" alt="Imagen de carrousel para presentar la pagina" class="carrousel__image">
    </div>

    <section class="bike-section" >
        <h2 class="bike-section__title" >Catalog</h2>

        <div class="bike-section__controls">
            <select name="filter-model" id="filter-model" class="bike-section__select">
                <option value="all">All models</option>
                @foreach($bikes->pluck('model')->unique() as $model)
                    <option value="{{ strtolower($model) }}">{{ __($model) }}</option>
                @endforeach
             </select>
            <select name="sort-price" id="sort-price" class="bike-section__select">
                <option value="default">Default order</option>
                <option value="asc">Price: low to high</option>
                <option value="desc">Price: high to low</option>
            </select>
        </div>

        <p id="no-results" class="bike-section__empty bike-section__empty--hidden">
            No bicycles match the selected filters.
        </p>

        <div id="bike-grid" class="bike-grid">
            @forelse($bikes as $bike)

            <x-bikes.card data-model="{{ strtolower($bike->model) }}" data-price="{{ $bike->price_per_hour }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFZI2zKcRP0wDYg-riMT4KSMXaAhYfDIi86i38dUhAE49SPncAh8TLiCO3&s=10" alt="Imagen de una bicicleta" class="bike-card__image">
                <div class="bike-card__content">
                    <h3 class="bike-card__title">{{ $bike->serial_number }}</h3>
                    <p class="bike-card__model">{{ __($bike->model) }}</p>
                    <p class="bike-card__price"> {{__('Price')}} {{ $bike->price_per_hour }} euros</p>
                    <a href="{{ route('bikes.show', $bike) }}" class="bike-card__button">Details</a>
                </div>
            </x-bikes.card>

            @empty
                <h3>There are no bicycles</h3>

            @endforelse            
        </div>

    </section>
@endsection

@extends('layouts.app')

@section('title', 'Bikes details')  

@section('header')
    <h1>Bicicletas</h1>
@endsection

@section('content')

    <article class="product-detail">
        <div class="product-detail__media">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFZI2zKcRP0wDYg-riMT4KSMXaAhYfDIi86i38dUhAE49SPncAh8TLiCO3&s=10" alt="{{ $bike->serial_number }} imagen" class="product-detail__image">
            <div class="product-detail__booking">
                <p class="product-detail__price">Price: {{ $bike->price_per_hour }} Euros</p>
                <a href="{{ route('bookings.create', $bike) }}" class="product-detail__button">Book this bike</a>
            </div>
        </div>
        <div class="product-detail__info">
            <div class="product-detail__header">
                <h2 class="product-detail__title">{{ $bike->serial_number }}</h2>
                <span class="product-detail__badge">{{ $bike->model }}</span>
            </div>
            <div class="product-detail__specs">
                <h3 class="product-detail__specs-title">Specs</h3>
                <ul class="product-detail__specs-list">
                    <li class="product-detail__specs-item">Id: {{ $bike->id }}</li>
                    <li class="product-detail__specs-item">Serial number: {{ $bike->serial_number }}</li>
                    <li class="product-detail__specs-item">Model: {{ __($bike->model) }}</li>
                    <li class="product-detail__specs-item">Price per hour: {{ $bike->price_per_hour }}</li>
                    <li class="product-detail__specs-item">Status: {{ $bike->status }}</li>
                </ul>
            </div>
        </div>
    </article>
@endsection


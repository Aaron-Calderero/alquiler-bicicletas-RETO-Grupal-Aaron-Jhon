@extends('layouts.app')

@section('title', 'create')  

@section('header')
    <h1>Reserva</h1>
@endsection

@section('content')
    <a href="{{ route('bikes.index') }}">Volver al Catalogo</a>
    <form action="/booking">
        <label for="user_id">user_id</label>
        <input type="text" value="{{ auth()->id() }}" required disabled><br>
        <label for="serial_number">Serial_number</label>
        <input type="text" name="serial_number" id="serial_number" value="{{$bike->serial_number}}" required disabled><br>
        <label for="start_time">start_time</label>
        <input type="datetime-local" name="start_time" id="start_time" 
        value="{{ old('start_time') }}" min="{{ now()->format('Y-m-d\TH:i') }}" 
        class="" required><br>
        <label for="end_time">end_time</label>
        <input type="datetime-local" name="end_time" id="end_time" 
        value="{{ old('end_time') }}" min="{{ now()->format('Y-m-d\TH:i') }}" 
        class="" required><br>
        <input type="submit" value="Crear">
    </form>    
@endsection

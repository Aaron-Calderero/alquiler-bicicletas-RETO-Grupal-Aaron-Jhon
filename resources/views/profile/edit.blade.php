@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="profile">
        <h1 class="profile__page-title">Perfil</h1>
        <div class="profile__card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="profile__card">
            @include('profile.partials.update-password-form')
        </div>

        <div class="profile__card">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

@endsection
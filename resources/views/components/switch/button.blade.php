@props([
    'id' => 'switch-button',
])

<div>
    <button id="{{ $id }}" {{ $attributes->merge(['class' => 'switch-button']) }} >{{ $slot }}</button>
</div>
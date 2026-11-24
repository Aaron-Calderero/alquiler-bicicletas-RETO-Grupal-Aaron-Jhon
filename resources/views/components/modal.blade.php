@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => '400px',
    'md' => '500px',
    'lg' => '600px',
    'xl' => '700px',
    '2xl' => '800px',
][$maxWidth] ?? '800px';
@endphp

<div
    id="{{ $name }}"
    class="modal {{ $show ? 'modal-visible' : '' }}">
    <div
        class="modal-backdrop"
        onclick="document.getElementById('{{ $name }}').classList.remove('modal-visible')">
    </div>

    <div class="modal-container">
        <div class="modal-content" style="max-width: {{ $maxWidth }}">
            {{ $slot }}
        </div>
    </div>
</div>

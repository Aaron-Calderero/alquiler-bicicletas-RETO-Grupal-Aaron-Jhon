@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => ''
])

@php
    $alignment = match ($align) {
        'left' => 'dropdown-left',
        'top' => 'dropdown-top',
        default => 'dropdown-right',
    };

    $width = match ($width) {
        '48' => 'dropdown-width-48',
        default => $width,
    };
@endphp

<div class="dropdown" data-dropdown>
    <div class="dropdown-trigger" data-dropdown-trigger>
        {{ $trigger }}
    </div>

    <div class="dropdown-menu {{ $alignment }} {{ $width }} {{ $contentClasses }}"
         data-dropdown-menu
         hidden>
        {{ $content }}
    </div>
</div>

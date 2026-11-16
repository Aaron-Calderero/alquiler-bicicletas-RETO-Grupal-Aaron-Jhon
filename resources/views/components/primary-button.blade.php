<button {{ $attributes->merge(['type' => 'submit', 'primary-button']) }}>
    {{ $slot }}
</button>

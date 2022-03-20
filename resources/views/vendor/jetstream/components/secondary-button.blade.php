<x-button {{ $attributes->merge([
        'type' => 'button',
        'variant' => 'secondary'
    ]) }}>
    {{ $slot }}
</x-button>

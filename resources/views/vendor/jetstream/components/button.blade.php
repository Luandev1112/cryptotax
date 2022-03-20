<x-button type="submit" {{ $attributes->merge([
    'type' => 'submit',
    'variant' => 'primary'
    ]) }}>
    {{ $slot }}
</x-button>

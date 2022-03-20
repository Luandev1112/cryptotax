@props([
    'color' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
])

@php
    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        'w-6 h-6' => $size === 'md',
        'w-7 h-7' => $size === 'lg',
        'w-5 h-5' => $size === 'sm',
        'mr-1 -ml-2' => ($iconPosition === 'before') && ($size === 'md'),
        'mr-2 -ml-3' => ($iconPosition === 'before') && ($size === 'lg'),
        'mr-1 -ml-1.5' => ($iconPosition === 'before') && ($size === 'sm'),
        'ml-1 -mr-2' => ($iconPosition === 'after') && ($size === 'md'),
        'ml-2 -mr-3' => ($iconPosition === 'after') && ($size === 'lg'),
        'ml-1 -mr-1.5' => ($iconPosition === 'after') && ($size === 'sm'),
    ]);
@endphp


<x-button :tag="$tag" :variant="$color" :type="$type" {{ $attributes->merge([]) }}>
    @if ($icon && $iconPosition === 'before')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif

    <span>{{ $slot }}</span>

    @if ($icon && $iconPosition === 'after')
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    @endif
</x-button>

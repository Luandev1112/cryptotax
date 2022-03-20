@props(['active'])
@php
$classes = ($active ?? false)
            ? 'rounded-full px-4 py-2 text-xs xl:text-sm gap-1 xl:gap-2 bg-white text-primary inline-flex items-center font-bold'
            : 'rounded-full px-4 py-2 text-xs xl:text-sm gap-1 xl:gap-2 text-white inline-flex items-center hover:text-primary hover:bg-white font-bold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
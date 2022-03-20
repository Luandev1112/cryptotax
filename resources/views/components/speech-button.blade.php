@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border py-2 px-4 text-sm font-bold bg-primary hover:bg-primary text-white hover:text-white relative'
            : 'border py-2 px-4 text-sm font-bold bg-white hover:bg-primary text-primary hover:text-white relative';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if ($active)        
        <x-icon name="triangle" class="text-primary absolute rotate-45 w-8 h-8 top-6 left-1 z-0"/>
    @endif
</button>
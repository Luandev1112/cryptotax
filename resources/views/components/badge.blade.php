@props([
    'variant' => 'success',
    'size' => 'sm',
    'type' => 'rounded'
])

@php
    switch($variant) {
        case 'primary': $variantClasses = 'bg-primary'; break;
        case 'secondary': $variantClasses = 'bg-secondary'; break;
        case 'third': $variantClasses = 'bg-third'; break;
        case 'success': $variantClasses = 'bg-success'; break;
        case 'danger': $variantClasses = 'bg-danger'; break;
        case 'warning': $variantClasses = 'bg-warning'; break;
    }
    switch($size) {
        case 'sm': $sizeClass = 'px-3 py-2 text-xs font-bold'; break;
        case 'md': $sizeClass = 'px-5 py-3 text-lg font-bold'; break;
        case 'lg': $sizeClass = 'px-7 py-4 text-xl font-bold'; break;
        case 'xl': $sizeClass = 'px-9 py-5 text-2xl font-bold'; break;
    }
    switch($type) {
        case 'rounded': $typeClasses = 'rounded-full'; break;
        case 'square': $typeClasses = 'rounded-md'; break;
    }
    $att = $attributes->merge([
        'class' => 'inline-flex items-center justify-center leading-none text-white ' 
            . trim($sizeClass . ' ' . $variantClasses. ' ' . $typeClasses)
    ]); 
@endphp

<span {{ $att }}>
    {{ $slot }}
</span>
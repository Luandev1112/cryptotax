@props([
    'size' => "md",
    'variant' => "primary"
])

@php
    switch($variant) {
        case 'primary': $variantClasses = 'text-primary'; break;
        case 'secondary': $variantClasses = 'text-secondary'; break;
        case 'third': $variantClasses = 'text-third'; break;
        case 'success': $variantClasses = 'text-success'; break;
        case 'danger': $variantClasses = 'text-danger'; break;
        case 'warning': $variantClasses = 'text-warning'; break;
        case 'white': $variantClasses = 'text-white'; break;
    }
    switch($size) {
        case 'xs': $sizeClass = 'font-light text-xs'; break;
        case 'sm': $sizeClass = 'font-normal text-sm'; break;
        case 'md': $sizeClass = 'font-normal text-sm sm:text-md'; break;
        case 'lg': $sizeClass = 'font-normal text-md sm:text-lg'; break;
        case 'xl': $sizeClass = 'font-medium text-lg sm:text-xl'; break;
        case '2xl': $sizeClass = 'font-bold text-lg sm:text-2xl'; break;
        case '3xl': $sizeClass = 'font-semibold text-2xl text-3xl'; break;
        case '4xl': $sizeClass = 'font-semibold text-3xl sm:text-4xl'; break;
        case '5xl': $sizeClass = 'font-extrabold text-4xl sm:text-5xl'; break;
        case '6xl': $sizeClass = 'font-extrabold text-5xl sm:text-6xl'; break;
        case '7xl': $sizeClass = 'font-extrabold text-6xl sm:text-7xl'; break;
    }
    $att = $attributes->merge([
        'class' => 'py-1 ' . trim($sizeClass . ' ' . $variantClasses)
    ]); 
@endphp

<p {{ $att }}>
    {{ $slot }}
<p>
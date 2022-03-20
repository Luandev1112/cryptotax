@props([
    'progress' => 0,
    'height' => 'sm',
    'variant' => 'primary'
])

@php
    switch($height) {
        case 'sm': $heightClass = 'h-1.5'; break;
        case 'md': $heightClass = 'h-2'; break;
        case 'lg': $heightClass = 'h-2.5'; break;
        case 'xl': $heightClass = 'h-3'; break;
        case '2xl': $heightClass = 'h-3.5'; break;
    }
    switch($variant) {
        case 'primary': $variantClasses = 'bg-primary'; break;
        case 'secondary': $variantClasses = 'bg-secondary'; break;
        case 'third': $variantClasses = 'bg-third'; break;
        case 'success': $variantClasses = 'bg-success'; break;
        case 'danger': $variantClasses = 'bg-danger'; break;
        case 'warning': $variantClasses = 'bg-warning'; break;
    }
    $att = $attributes->merge([
        'class' => 'w-full bg-gray-200 rounded-full dark:bg-gray-700 mt-5 mb-7' .
            trim($heightClass)
    ]);

@endphp
<div {{ $att }}>
    <div class="{{ $variantClasses }} rounded-full {{ $heightClass }}" style="width: {{ $progress }}%"></div>
</div>    
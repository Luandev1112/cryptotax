@props([
    'tag' => 'button',          // for example: button|a
    'type' => '',               // for example: submit|button
    'icon' => '',               // You can use x-icon-names
    'variant' => 'primary',     // options: primary|secondary|third|success|danger|warning
    'size' => 'md',             // for example: xs|sm|md|lg|xl
    'iconRight' => false,       // icon on the right side of the button?
    'iconClass' => 'w-4 h-4 flex-shrink-0'
])
@php
    switch($variant) {
        case 'primary': $variantClasses = 'text-white bg-primary hover:bg-secondary active:bg-gray-900'; break;
        case 'secondary': $variantClasses = 'text-white bg-secondary hover:bg-primary active:bg-gray-900'; break;
        case 'third': $variantClasses = 'text-white bg-third hover:bg-secondary active:bg-gray-900'; break;
        case 'success': $variantClasses = 'text-white bg-success hover:bg-primary active:bg-gray-900'; break;
        case 'danger': $variantClasses = 'text-white bg-danger hover:bg-primary active:bg-gray-900'; break;
        case 'warning': $variantClasses = 'text-white bg-warning hover:bg-primary active:bg-gray-900'; break;
        case 'white': $variantClasses = 'text-primary hover:text-white bg-white hover:bg-primary active:bg-gray-900'; break;
    }
    switch($size) {
        case 'xs': $sizeClass = 'text-xs'; break;
        case 'sm': $sizeClass = 'text-sm'; break;
        case 'md': $sizeClass = 'text-md'; break;
        case 'lg': $sizeClass = 'text-lg'; break;
        case 'xl': $sizeClass = 'text-xl'; break;
    }
    $att = $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-3 border rounded-md tracking-widest focus:ring focus:ring-gray-300 disabled:opacity-25 transition focus:border-gray-900 focus:outline-none ' .
           trim($sizeClass . ' ' . $variantClasses),
        'type'  => $type
    ]);
@endphp

<{{ $tag }} {{ $att }}>
    @if($icon && !$iconRight)<x-icon :name="$icon" class="{{ $iconClass }} mr-2" />@endif
    {{ $slot }}
    @if($icon && $iconRight)<x-icon :name="$icon" class="{{ $iconClass }} ml-2" />@endif
</{{ $tag }}>

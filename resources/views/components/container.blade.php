
@php
    $att = $attributes->merge([
        'class' => 'mx-auto px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5'
    ]); 
@endphp

<div {{ $att }}>
    {{ $slot }}
</div>
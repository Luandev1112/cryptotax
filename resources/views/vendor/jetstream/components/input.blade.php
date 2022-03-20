@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-secondary-300 focus:ring focus:ring-secondary-200 focus:ring-opacity-50 py-4 rounded-sm shadow-md']) !!}>

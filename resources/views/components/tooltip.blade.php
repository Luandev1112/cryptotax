@props(['content' => ""])
<div class="relative flex flex-col items-center group">
    {{ $slot }}
    <div class="absolute top-8 flex-col items-center hidden group-hover:flex mr-5">
        <div class="z-50 bg-secondary shadow-sm rounded-md hidden items-center justify-center text-center p-2 sm:flex">
            <p class="text-sm text-white font-bold whitespace-nowrap">{{ $content }}</p>
        </div>
    </div>
</div>
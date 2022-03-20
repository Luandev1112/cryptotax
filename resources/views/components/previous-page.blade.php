<div class="pt-8 mx-auto px-1 xs:px-4 xl:max-w-screen-2xl lg:px-5">
    <a class="hover:text-primary cursor-pointer" href="{{ $href }}">
        <x-icon name="fas-chevron-left" class="w-2 mr-2 inline" />
        @if($slot->isEmpty())
            {{ __("Back to the previous page") }}
        @else
            {{ $slot }}
        @endif
    </a>
</div>

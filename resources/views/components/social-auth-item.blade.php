<a class="flex items-center border-0 rounded md:border py-5 px-4 w-full @if($size=="lg") md:px-18 @else md:px-4 @endif" href="{{ route('auth.' . $name) }}">
    <x-icon name="{{$icon}}" class="w-8 h-8 mr-3"/>
    <p class="block md:hidden text-md font-bold uppercase">{{ $name }}</p>
    <p class="hidden md:block text-md font-bold">{{ $slot }}</p>
</a>

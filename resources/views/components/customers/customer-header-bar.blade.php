@props(['icon'=>'', 'name'=>''])
<div>
    <div class="w-full border-b py-5">
        <div class="flex justify-between items-center flex-wrap">
            <div class="flex items-center justify-start space-x-3">
                <x-icon name="{{$icon}}" class="w-9 h-9"/>
                <h1 class="font-bold sm:text-xl lg:text-2xl text-primary">{{ __($name) }}</h1>
            </div>
            <div class="block md:flex justify-center items-center space-x-0 md:space-x-3">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

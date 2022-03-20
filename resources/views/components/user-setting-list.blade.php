@props(
    [
        'active' => null
    ]
)

@php
    $list = [
        [ 'name' => 'Profile settings', 'icon' => 'user', 'route' => 'profile' ],
        [ 'name' => 'Email address', 'icon' => 'inbox', 'route' => 'email' ],
        [ 'name' => 'Password', 'icon' => 'password', 'route' => 'password' ],
        [ 'name' => 'Notification', 'icon' => 'bell', 'route' => 'notification' ],
        [ 'name' => 'Security', 'icon' => 'security', 'route' => 'security' ],
        [ 'name' => 'Payment Information', 'icon' => 'payment', 'route' => 'payment' ],
        [ 'name' => 'Billing', 'icon' => 'bill', 'route' => 'billing' ],
        [ 'name' => 'Other', 'icon' => 'other', 'route' => 'other' ],
        [ 'name' => 'Request Exchange', 'icon' => 'exchange-2', 'route' => 'exchange' ],
        [ 'name' => 'Tax Settings', 'icon' => 'user-setting', 'route' => 'tax' ]
    ]
@endphp

<div class="divide-y hidden md:block">
    @foreach ($list as $item)
        <a href="{{ route('customer.user-setting', ['category' => $item['route']]) }}">
            <div class="flex items-center justify-between w-full text-left py-6 px-8 @if($active == $item['route']) bg-gray-100 @endif ">
                <div class="flex items-center">
                    <x-icon name="{{$item['icon']}}" class="w-6 h-auto mr-6"/>
                    {{ __($item['name']) }}
                </div>
                @if ($active == $item['route'])
                    <x-icon name="arrow-right" class="w-6"/>
                @endif
            </div>
        </a>
    @endforeach
</div>
<div class="block md:hidden">
    <div class="relative" x-data="{open:false}">
        <button
            @click="open = true"
            class="py-3 h-full w-full flex justify-start px-5 text-gray-600"
        >
            <x-icon name="list" class="h-8" />
        </button>
        <div
            class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none  overflow-auto"
            x-show="open" @click.away="open=false"
            x-transition:enter-start="transition ease-in duration-3000"
        >
            <div class="h-80">
                @foreach ($list as $item)
                    <a href="{{ route('customer.user-setting', ['category' => $item['route']]) }}">
                        <div class="flex items-center justify-between w-full text-left py-6 px-8 @if($active == $item['route']) bg-gray-100 @endif ">
                            <div class="flex items-center">
                                <x-icon name="{{$item['icon']}}" class="w-6 h-auto mr-6"/>
                                {{ __($item['name']) }}
                            </div>
                            @if ($active == $item['route'])
                                <x-icon name="arrow-right" class="w-6"/>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

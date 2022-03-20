@php($navItems = \App\Services\NavigationService::instance()->getTopLevelItems())
<nav class="bg-primary" x-data="{mobile:false}">
    <div class="mx-auto px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5">
        <div class="flex items-center justify-between py-2 lg:py-0 lg:h-20">
            {{-- Site Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ route("customer.dashboard") }}" class="flex items-center text-white group">
                    <img src="{{asset('/assets/img/logo.svg')}}" alt="Logo" class="w-9">
                    <span class="ml-2 text-sm xl:text-xl font-bold">myCrypto Tax</span>
                </a>
            </div>

            <div class="hidden lg:flex items-center flex-1 justify-center px-5 2xl:px-20">
                <div class="flex items-baseline flex-1 justify-start gap-3">
                    @foreach($navItems as $navItem)
                        <x-jet-nav-link href="{{ route($navItem['route']) }}" :active="request()->routeIs($navItem['route'])">
                            <x-icon :name="$navItem['icon']" class="w-6 h-6 mr-1"/>
                            {{ $navItem["label"] }}
                        </x-jet-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="ml-auto mr-5 flex items-center gap-4">
                <div class="flex items-center gap-4">
                    {{-- Message Button --}}
                    <button type="button" title="Message"
                            class="rounded-full text-white hover:text-gray-300 focus:outline-none outline-none ">
                        <span class="sr-only">{{__('Message')}}</span>
                        <x-icon name="message" class="w-6 h-6 mr-2"/>
                    </button>

                    {{-- Notification --}}
                    <div class="relative lg:block" x-data="{open:false}">
                        <button type="button" title="Notification"
                                class="rounded-full text-white hover:text-gray-300 focus:outline-none outline-none relative"
                                @click="open = true">
                            <span class="sr-only">{{ __("View notifications") }}</span>
                            <x-icon name="bell" class="w-6 h-6 mr-2 mt-1"/>
                            <span class="rounded-full bg-white text-primary px-1 inline-flex text-xs absolute -top-1 -right-1">2</span>
                        </button>

                        <div
                            class="origin-top-right absolute right-0 mt-2 w-70 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            x-show="open" @click.away="open=false" x-cloak
                            x-transition:enter-start="transition ease-in duration-3000">
                            <x-jet-dropdown-link href="{{ route('customer.taxes') }}">
                                <x-icon name="fas-file-alt"  class="w-3 sm:inline mr-2" />
                                {{ __("New tax report available") }}
                                <small class="sm:block text-2xs mt-1 ml-6 text-gray-400">2021-11-30 03:04 pm</small>
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>

                            <x-jet-dropdown-link href="{{ route('customer.account') }}">
                                <x-icon name="fas-plus-square" class="w-3 sm:inline mr-2" />
                                {{ __('New wallet added') }}
                                <small class="sm:block text-2xs mt-1 ml-6 text-gray-400">2021-11-30 03:04 pm</small>
                            </x-jet-dropdown-link>
                        </div>
                    </div>
                </div>

                {{-- User dropdown --}}
                <x-customers.user-dropdown />
            </div>

            <x-customers.main-navi-mobile />
        </div>
    </div>

    <div class="lg:hidden" id="mobile-menu" x-show="mobile" @click.away="mobile=false" x-cloak
         x-transition:enter-start="transition ease-in duration-3000">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between">
            @foreach($navItems as $navItem)
                <x-jet-nav-link href="{{ route($navItem['route']) }}" :active="request()->routeIs($navItem['route'])">
                    <x-icon :name="$navItem['icon']" class="w-6 h-6 mr-2"/>
                    {{ $navItem["label"] }}
                </x-jet-nav-link>
            @endforeach
        </div>
        <div
            class="pt-4 pb-3 border-t border-white border-opacity-30 flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0 ring-4 ring-white rounded-full overflow-hidden">
                    <img class="rounded-full w-10 h-10"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                </div>
                <div class="ml-3 space-y-2">
                    <div class="text-base font-medium leading-none text-white">{{ __(auth()->user()->name) }}</div>
                    <div class="text-sm font-light leading-none text-gray-200 hidden">tom@example.com</div>
                </div>
            </div>
            <!-- Dropdown -->
            <div class="mt-3 md:mt-0 px-2 space-y-1 md:space-y-0 flex flex-col md:flex-row md:gap-2">
                {{-- <a href="#" class="block px-3 py-2 rounded text-base font-light text-gray-200 hover:text-primary hover:bg-white">
                    {{ __('Your Profile') }}
                </a> --}}
                <a href="{{ route('customer.user-setting') }}" class="block px-3 py-2 rounded text-base font-light text-gray-200 hover:text-primary hover:bg-white">{{ __('Settings') }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</nav>

{{-- Subnavi --}}
<x-customers.sub-navi />

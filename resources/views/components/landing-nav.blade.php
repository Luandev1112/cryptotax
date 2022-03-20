@props([
    'for' => 'customer',
    'logo' => 'primary',
    'textColor' => 'text-white'
])

@php
    $links = [];
    switch ($for) {
        case 'customer':
            $links = [
                [ 'name' => 'Home', 'route' => 'index' ],
                [ 'name' => 'Account', 'route' => 'accounts' ],
                [ 'name' => 'Portfolio', 'route' => 'portfolios' ],
                [ 'name' => 'Taxes', 'route' => 'tax' ],
            ];
            break;
        case 'affiliate':
            $links = [
                [ 'name' => 'Home', 'route' => 'index' ],
                [ 'name' => 'How it Works', 'route' => 'index' ],
                [ 'name' => 'Testimonials', 'route' => 'index' ],
                [ 'name' => "FAQ's", 'route' => 'index' ],
            ];
            break;
        default:
            break;
    }
    $att = $attributes->merge([
        'class' => 'w-full z-10 bg-primary lg:bg-transparent'
    ]);
@endphp

<nav {{ $att }} x-data="{mobile:false}">
    <div class="mx-auto px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5">
        <div class="flex items-center justify-between py-2 lg:py-0 lg:h-20">
            <div class="flex-shrink-0">
                <a href="{{ route("index") }}" class="flex items-center text-white group">
                    @switch($for)
                        @case('customer')                            
                            @if ($logo == "primary")
                                <img src="{{asset('/assets/img/logo_primary.svg')}}" alt="Logo" class="w-9">
                                <span class="ml-2 text-md lg:text-xl font-semibold text-primary">MyCrypto Tax</span>
                            @else 
                                <img src="{{asset('/assets/img/logo.svg')}}" alt="Logo" class="w-9">
                                <span class="ml-2 text-md lg:text-xl font-semibold text-white">MyCrypto Tax</span>
                            @endif
                            @break
                        @case('affiliate')                            
                            <img src="{{asset('/assets/img/logo.svg')}}" alt="Logo" class="w-9">
                            <span class="ml-2 text-md lg:text-xl font-bold text-white">MyCrypto Tax</span>
                            <span class="ml-2 text-md lg:text-xl font-bold text-secondary italic">Affiliate</span>
                            @break
                        @default                            
                    @endswitch
                </a>
            </div>

            {{-- Desktop View --}}
            <div class="ml-auto mr-5 items-center gap-6 lg:flex hidden">
                <div class="flex items-center gap-10">
                    @foreach ($links as $link)                
                        @if (\Request::route() && \Request::route()->getName() === $link['route'])
                            <a href="{{ route($link['route']) }}" class="{{ $textColor }} font-semibold border-b-2 border-secondary">{{ __($link['name']) }}</a>
                        @else
                            <a href="{{ route($link['route']) }}" class="{{ $textColor }} font-semibold">{{ __($link['name']) }}</a>
                        @endif        
                    @endforeach
                </div>
                @if (auth()->user())                    
                    <a href="{{ route('logout') }}" class="font-bold text-white px-8 py-2 rounded bg-secondary hover:bg-primary">{{ __('Sign out') }}</a>
                @else
                    <a href="{{ route('login') }}" class="bg-transparent font-bold {{ $textColor }} hover:text-white hover:bg-secondary px-8 py-2 border rounded">{{ __('Sign in') }}</a>
                    <a href="{{ route('register') }}" class="font-bold text-white px-8 py-2 rounded bg-secondary hover:bg-primary">{{ __('Sign Up') }}</a>
                @endif
            </div>

            {{-- Mobile View --}}
            <div class="ml-auto mr-5 lg:hidden block" x-data="{open:false}">
                <button class="text-white px-3 py-2 border border-white rounded-sm" @click="open = true">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" :class="{'hidden':mobile, '':!mobile}">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div
                    class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-primary ring-1 ring-black ring-opacity-5 focus:outline-none py-8 px-5"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    x-show="open" @click.away="open=false" x-cloak
                    x-transition:enter-start="transition ease-in duration-3000"
                >
                    @foreach ($links as $link)  
                        <div class="py-4">                        
                            <a href="{{ route( $link['route'] ) }}" class="text-white hover:text-secondary font-bold w-full">{{ $link['name'] }}</a>
                        </div>
                    @endforeach
                   
                    <div class="border-t pt-4 flex items-center space-x-5">
                        @if (auth()->user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        @else
                            <div>
                                <a href="{{ route('login') }}" class="text-secondary underline font-bold">{{ __('Sign in') }}</a>
                            </div>  
                            <div>
                                <a href="{{ route('register') }}" class="text-secondary underline font-bold">{{ __('Sign Up') }}</a>
                            </div>                          
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
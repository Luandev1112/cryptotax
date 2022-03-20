<x-guest-layout>
    <div class="w-full bg-white">
        <div class="relative">
            <div class="w-full h-full absolute right-0 top-0">
                <img src="{{ asset("assets/img/portfolio_landing/portfolio_banner.svg") }}" class="w-full h-full object-cover hidden lg:block"/>
            </div>
            <x-landing-nav for="customer" logo="white" class="relative"/>
            <x-container class="relative">
                {{-- Hero section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 py-26 xl:py-48">
                    <div class=" flex items-center justify-start order-2 sm:order-1">
                        <div class="my-auto relative">
                            <h5 class="text-primary lg:text-white text-xl">{{ __('Get Fully Control') }}</h5>
                            <h2 class="text-primary lg:text-white xl:text-5xl lg:text-4xl md:text-3xl text-2xl font-bold mt-7">{{ __('Of Your Portfolio') }}</p>
                            <h5 class="text-primary lg:text-white text-lg mt-6">{{ __('Use our cryptocurrency tax software to easily track your trades, see your profits, and never overpay on your crypto taxes again.') }}</h5>
                            <x-button variant="secondary" size="lg" class="mt-6 border-0 tracking-tight font-bold">{{ __('View Portfolio') }}</x-button>
                        </div>
                    </div>
                    <div class="order-1 sm:order-2">
                        <img src="{{ asset('assets/img/portfolio_landing/portfolio_hero.svg') }}" class="w-full" />
                    </div>
                </div>
            </x-container>
        </div>
        <x-container>
            {{--  --}}
            <div class="text-center">
                <p class="text-secondary font-semibold">{{ __('Features') }}</p>
                <h3 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('With all the Features You Need') }}</h3>
                <p class="mt-5">{{ __('Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend, porta ') }}</p>
                <p class="mt-2">{{ __('est non, feugiat metus. Cras ante massa, tincidunt nec lobortis quis ') }}</p>
                <img src="{{ asset('assets/img/portfolio_landing/portfolio_all_feature.svg') }}" class="w-full h-auto mt-14" />
            </div>

             {{--  --}}
             <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5 mt-10 sm:mt-21">
                <div class="flex items-center">
                     <div class="my-auto">
                         <p class="text-secondary font-semibold">{{ __('Analytics') }}</p>
                         <h2 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('Advanced Analytics, Understand Business') }}</h2>
                         <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                         <p class="mt-5 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design.") }}</p>
                     </div>
                 </div>
                <div class="flex items-center">
                    <img src="{{asset('assets/img/portfolio_landing/portfolio_3.svg')}}" class="w-full"/>
                </div>
            </div>

            {{--  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5  mt-10 sm:mt-21">
                <div class="">
                    <img src="{{asset('assets/img/portfolio_landing/portfolio_2.svg')}}" class="w-full"/>
                </div>
                <div class="flex items-center">
                    <div class="my-auto">
                        <p class="text-secondary font-semibold">{{ __('Coin Allocation') }}</p>
                        <h2 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('Portfolio Allocation') }}</h2>
                        <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                        <p class="mt-5 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design.") }}</p>
                    </div>
                </div>
            </div>

            {{--  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5 mt-10 sm:mt-21">
                <div class="flex items-center">
                     <div class="my-auto">
                         <p class="text-secondary font-semibold">{{ __('portfolio') }}</p>
                         <h2 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('My Crypto Portfolio') }}</h2>
                         <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                         <p class="mt-5 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design.") }}</p>
                     </div>
                 </div>
                <div class="flex items-center">
                    <img src="{{asset('assets/img/portfolio_landing/portfolio_4.svg')}}" class="w-full"/>
                </div>
            </div>

        </x-container>
        <x-footer-get-start/>
    </div>
    <x-footer/>
</x-guest-layout>
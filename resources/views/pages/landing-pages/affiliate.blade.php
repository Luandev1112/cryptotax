<x-guest-layout>
    <div class="w-full bg-white">
        <div class="relative">
            <div class="w-full absolute right-0 top-0">
                <img src="{{ asset("assets/img/affiliate_landing/affiliate_banner.svg") }}" class="w-full h-full object-cover"/>
            </div>
            <x-landing-nav for="affiliate" class="relative"/>
            <x-container class="relative py-16">    
                {{-- hero section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class=" flex items-center justify-start order-2 sm:order-1">
                        <div class="my-auto relative">
                            <img src="{{ asset('assets/img/affiliate_landing/affiliate_pattern_2.svg') }}" class="w-full -mt-16 hidden sm:absolute"/>
                            <h2 class="text-primary sm:text-white xl:text-5xl lg:text-4xl md:text-3xl text-2xl font-bold">{{ __('Make Money By Becoming') }}</p>
                            <h3 class="text-primary sm:text-white xl:text-5xl lg:text-4xl md:text-3xl text-2xl mt-5 font-md">{{ __("a myCrypto Tax") }} <span class="italic text-secondary">{{ _('Affiliate') }}</span></h3>
                            <h5 class="text-primary sm:text-white text-lg mt-6">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.') }}</h5>
                            <x-button variant="secondary" size="lg" class="mt-6 border-0 tracking-tight font-bold">{{ __('Start Earning Now') }}</x-button>
                        </div>
                    </div>
                    <div class="order-1 sm:order-2">
                        <img src="{{ asset('assets/img/affiliate_landing/affiliate_hero.svg') }}" class="w-full" />
                    </div>
                </div>
            </x-container>
        </div>
        {{-- How it works --}}
        <x-container>
            <div class="text-center relative">
                <img src="{{ asset('assets/img/affiliate_landing/landing_logo_bg.svg') }}" class="max-w-md h-auto absolute left-1/2 -translate-x-1/2"/>
                <div class="sm:py-20 py-10 relative">
                    <h3 class="xl:text-4xl lg:tet-3xl text-2xl text-primary font-bold">{{ __('How It Works') }}</h3>
                    <p class="mt-6 px-2 sm:px-10 leading-loose">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ') }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="">
                        <img src="{{asset('assets/img/affiliate_landing/affiliate_1.svg')}}" class="w-full"/>
                    </div>
                    <div class="flex items-center">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <x-icon name="sign-up" class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Sign up') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <div class="flex justify-start sm:mt-8 mt-5">
                                <x-button size="xl" class="font-bold px-10">{{__('Sign up')}}</x-button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="flex items-center order-2 md:order-1">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <x-icon name="referral" class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Referral') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <div class="flex justify-start sm:mt-8 mt-5">
                                <x-button size="xl" class="font-bold px-10">{{__('Referral')}}</x-button>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="{{asset('assets/img/affiliate_landing/affiliate_2.svg')}}" class="w-full"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="">
                        <img src="{{asset('assets/img/affiliate_landing/affiliate_3.svg')}}" class="w-full"/>
                    </div>
                    <div class="flex items-center">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <x-icon name="money" class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Earn') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <div class="flex justify-start sm:mt-8 mt-5">
                                <x-button size="xl" class="font-bold px-10">{{__('Earn')}}</x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>

    <div class="w-full">
        <x-container>
            {{-- Textmonial --}}
            @livewire('affiliate.landing-page.testmonial')
        </x-container>
    </div>

    <div class="w-full bg-white py-12">
        <x-container class="relative">
            {{-- FAQs --}}
            @livewire('affiliate.landing-page.faqs')
        </x-container>
    </div>
    <x-footer/>
</x-guest-layout>
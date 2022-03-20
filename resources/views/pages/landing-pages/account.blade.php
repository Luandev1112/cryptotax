<x-guest-layout>
    <div class="w-full bg-white">
        <div class="relative">
            <div class="w-full absolute right-0 top-0">
                <img src="{{ asset("assets/img/account_landing/account_hero_bg.svg") }}" class="w-full object-cover lg:block hidden"/>
            </div>
            <x-landing-nav for="customer" logo="white" class="relative"/>
            <x-container class="py-10 sm:py-28 relative">
                {{-- Hero section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class=" flex items-center justify-start order-2 sm:order-1">
                        <div class="my-auto relative">
                            <h5 class="text-primary lg:text-white text-xl">{{ __('Duis consectetur feugiat auctor') }}</h5>
                            <h2 class="text-primary lg:text-white xl:text-5xl lg:text-4xl md:text-3xl text-2xl font-bold mt-7">{{ __('Add Your Accounts') }}</p>
                            <h5 class="text-primary lg:text-white text-lg mt-6">{{ __('Use our cryptocurrency tax software to easily track your trades, see your profits, and never overpay on your crypto taxes again.') }}</h5>
                            <x-button variant="secondary" size="lg" class="mt-6 border-0 tracking-tight font-bold">{{ __('Add Accounts') }}</x-button>
                        </div>
                    </div>
                    <div class="order-1 sm:order-2 py-10 sm:py-0">
                        <img src="{{ asset('assets/img/account_landing/account_hero.svg') }}" class="w-full" />
                    </div>
                </div>
            </x-container>
        </div>
        <x-container>    
            {{--  --}}
            <div class="text-center sm:mt-10 mt-8">
                <p class="text-secondary font-semibold">{{ __('Add Account') }}</p>
                <h3 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('Simple and Easy, Add Your Account') }}</h3>
                <p class="mt-5">{{ __('Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend, porta ') }}</p>
                <p class="mt-2">{{ __('est non, feugiat metus. Cras ante massa, tincidunt nec lobortis quis ') }}</p>
                <img src="{{ asset('assets/img/account_landing/account_new_account.svg') }}" class="w-full h-auto mt-14" />
            </div>

            {{--  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                <div class="">
                    <img src="{{asset('assets/img/account_landing/account_make_transaction.svg')}}" class="w-full"/>
                </div>
                <div class="flex items-center">
                    <div class="my-auto">
                        <p class="text-secondary font-semibold">{{ __('First Transactions') }}</p>
                        <h2 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('Make your Transaction') }}</h2>
                        <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                        <p class="mt-5 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design.") }}</p>
                        <div class="flex justify-end">
                            <img src="{{asset('assets/img/account_landing/account-bg_pattern.svg')}}" class=""/>
                        </div>
                    </div>
                </div>
            </div>

            {{--  --}}
            <div class="text-center mt-10 sm:mt-24">
                <p class="text-secondary font-semibold">{{ __("Transaction") }}</p>
                <h3 class="font-bold text-xl md:text-3xl lg:text-4xl xl:text-5xl mt-4">{{ __('Transaction History') }}</h3>
                <p class="mt-5">{{ __('Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend, porta') }}</p>
                <p class="mt-2">{{ __('est non, feugiat metus. Cras ante massa, tincidunt nec lobortis quis') }}</p>
                <img src="{{ asset('assets/img/account_landing/account_transaction_history.svg') }}" class="w-full mt-8"/>
            </div>
        </x-container>
       <x-footer-get-start/>
    </div>
    <x-footer/>
</x-guest-layout>
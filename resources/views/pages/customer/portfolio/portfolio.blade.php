<x-app-layout>
    @if(auth()->user()->isCustomerAccount())
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5 bg-white rounded-sm shadow">
        <x-customers.customer-header-bar icon="portfolio" name="Portfolio">
            <x-button variant="white" class="w-full justify-between">
                <x-icon name="calendar" class="w-5 h-5 mr-3"/>
                <span class="mr-2">{{ __('Today') }}</span>
                <svg class="w-4 trnstsn transform " fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': open}">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </x-button>
            <x-jet-dropdown>
                <x-slot name="trigger">
                    <x-button variant="white" class="whitespace-nowrap justify-between text-primary hover:text-white w-full">
                        <span class="mr-2">{{ __('Past day') }}</span>
                        <svg class="w-4 trnstsn transform " fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': open}">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </x-button>
                </x-slot>
                <x-slot name="content">
                    <div class="p-5">

                    </div>
                </x-slot>
            </x-jet-dropdown>
            <x-jet-dropdown>
                <x-slot name="trigger">
                    <x-button class="justify-between tracking-tight whitespace-nowrap w-full" variant="secondary">
                        <span class="mr-2">{{ __('Total performanace') }}</span>
                        <svg class="w-4 trnstsn transform " fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': open}">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </x-button>
                </x-slot>
                <x-slot name="content">
                    <div class="p-5">

                    </div>
                </x-slot>
            </x-jet-dropdown>
        </x-customers.customer-header-bar>
        
        @livewire('customer.portfolio.overview')
        @livewire('customer.portfolio.line-chart')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-4 py-4">
            <div class="col-span-1 space-y-5 h-full">
                <div class="border rounded-lg p-5">
                    @livewire('customer.portfolio.allocation')
                </div>
                <div class="border rounded-lg p-5 bg-gray-100 relative">
                    @livewire('customer.portfolio.invite')
                    <img src="{{asset('assets/img/svg/portfolio_invite.svg')}}" class="absolute bottom-0 right-0 w-40 h-22"/>
                </div>
            </div>
            <div class="col-span-2 border rounded-lg p-5">
                @livewire('customer.portfolio.crypto-portfolio')
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
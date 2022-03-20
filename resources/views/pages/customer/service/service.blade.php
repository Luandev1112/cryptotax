<x-app-layout>
    <div class="bg-bgcolor1 py-16">
        <div class="mx-auto px-3 xs:px-4 xl:max-w-screen-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-5">
                <div class="">
                    <p class="text-lg">{{ __('COUPON') }}</p>
                    <h2 class="text-6xl font-bold mt-3">{{ __('Big new year offer') }}</h2>
                    <div class="mt-3 py-4 flex mx-auto">
                        <h4 class="text-5xl text-secondary">{{ __('UPTO') }} <span class="font-bold">65%</span> OFF</h4>
                    </div>
                    <p class="mt-3">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua') }}</p>
                    <x-button size="xl" class="mt-5 font-extrabold  py-6 px-10">{{ __('Refer and Earn') }}</x-button>
                </div>
                <div>
                    <img src="{{ asset('assets/img/svg/service.svg') }}" class="w-full h-full"/>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-24">
        <div class="mx-auto px-3 xs:px-4 xl:max-w-screen-2xl">
           @livewire('customer.service.service-list')
        </div>
    </div>
</x-app-layout>
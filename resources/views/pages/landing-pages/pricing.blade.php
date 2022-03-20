<x-guest-layout>
    <x-sub-page-hero icon="terms" subtitle="" title="Pricing and plans"></x-sub-page-hero>
    <div class="relative bg-white py-10">
        <x-container>
            @livewire('landing-page.membership-plan')
            <div class="mt-10 sm:mt-26 text-center">
                <h4 class="text-xl sm:text-3xl font-bold">{{ __("Compare myCrypto Tax pricing and plans") }}</h4>
                <p class="mt-5 text-gray-400">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et') }}</p>
                <p class="mt-3 text-gray-400">{{ __('dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation') }}</p>
                <div class="mt-5">
                    @livewire('sub-pages.pricing.plan-table')
                </div>
                <div class="mt-10 bg-primary rounded-md p-5 md:p-14">
                    <div class="grid grid-cols-1 md:grid-cols-12 items-center">
                        <div class="col-span-10 text-left text-white">
                            <h2 class="text-xl md:text-3xl font-bold">{{ __('Looking for a custom plan?') }}</h2>
                            <p class="mt-3">{{ __('We offer unlimited transactions and custom features for the most power users.') }}</p>
                        </div>
                        <div class="col-span-2 py-3">
                            <x-button variant="secondary" class="font-bold tracking-tight">{{ __('Contact Us') }}</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>
    <div class="bg-white">
        <x-footer-get-start/>
    </div>
    <x-footer/>
</x-guest-layout>
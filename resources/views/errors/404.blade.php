<x-guest-layout>
    <div class="bg-white flex items-center justify-center h-screen relative">
        <x-landing-nav for="customer" logo="primary" textColor="text-primary" class="absolute top-0"></x-landing-nav>
        <div class="my-auto">
            <x-container>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
                    <div class="flex items-center">
                        <div class="my-auto">
                            <h2 class="text-3xl sm:text-6xl font-bold">{{ __('Ooops!') }}</h2>
                            <h4 class="text-2xl font-bold my-5">{{ __('Something Went Wrong') }}</h4>
                            <h5 class="text-xl font-semibold">{{ __('Sorry, we were unable to find the page') }}</h5>
                            <p class="py-3">{{ __('Please use main menu to back to your page.') }}</p>
                            <x-button tag="a" href="{{ route('index') }}" variant="secondary" class="tracking-tight">{{ __("Back to Home Page") }}</x-button>
                        </div>
                    </div>
                    <div class="p-5">
                        <img src="{{ asset('assets/img/404.svg') }}"/>
                    </div>
                </div>
            </x-container>
        </div>
    </div>
</x-guest-layout>
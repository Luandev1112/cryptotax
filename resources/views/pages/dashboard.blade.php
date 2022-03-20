<x-app-layout>
    @if(auth()->user()->isCustomerAccount())
        <div class="mx-auto xl:max-w-screen-2xl px-3 xs:px-4 lg:px-5 py-6">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-x-0 md:gap-x-6 gap-y-6 md:gap-y-0">
                <div class="col-span-7 h-full">
                    @livewire('customer.dashboard.about')
                    @livewire('customer.dashboard.performance')
                </div>
                <div class="col-span-5">
                    @livewire('customer.dashboard.balance')
                    @livewire('customer.dashboard.taxes')
                </div>
            </div>
            <div class="my-6">
                @livewire('customer.dashboard.portfolio')
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 md:gap-x-5 gap-x-0 gap-y-5 md:gap-y-0">
                <div class="col-span-5">
                    @livewire('customer.dashboard.transaction')
                </div>
                <div class="col-span-7">
                    @livewire('customer.dashboard.news')
                </div>
            </div>
        </div>
    @elseif(auth()->user()->isAdminAccount())
        <x-page icon="fas-home" :title="__('Admin Dashboard')">
            <p class="block mb-8">This is the Admin Dashboard</p>
        </x-page>
    @elseif(auth()->user()->isTaxAdvisorAccount())
        <x-page icon="fas-home" :title="__('Tax Advisor Dashboard')">
            <p class="block mb-8">This is the Tax Advisor-Dashboard.</p>
        </x-page>
    @elseif(auth()->user()->isEditorAccount())
        <x-page icon="fas-home" :title="__('Editor Dashboard')">
            <p class="block mb-8">This is the Editor Dashboard</p>
        </x-page>
    @elseif(auth()->user()->isSupportAccount())
        <x-page icon="fas-home" :title="__('Support Dashboard')">
            <p class="block mb-8">This is the Support-Dashboard.</p>
        </x-page>
    @endif
</x-app-layout>

<x-app-layout>
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5 bg-white rounded-sm shadow">
        <x-customers.customer-header-bar icon="tax-1" name="2021 Taxes">
            <x-button class="">
                <x-icon name="advisor" class="w-5 h-5 text-white mr-3"/>
                <p class="text-white font-semibold">Add tax professional</p>
            </x-button>
        </x-customers.customer-header-bar>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-6 mt-5">
            <div class="col-span-7 space-y-5">
                @livewire('customer.taxes.gains')
                @livewire('customer.taxes.income')
            </div>
            <div class="col-span-5">
                @livewire('customer.taxes.history')
                @livewire('customer.taxes.check-list')
                @livewire('customer.taxes.report')
            </div>
        </div>
    </div>
</x-app-layout>

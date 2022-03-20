@php(\App\Services\NavigationService::instance()->overwriteSubnavi([
    ["label" => "Accounts", "icon" => "wallet", "route" => "customer.account"],
    ["label" => "Transactions", "icon" => "transaction-2", "route" => "customer.transactions"],
    ["label" => "Add New Account", "icon" => "new-wallet", "route" => "customer.account.new"],
], [
    ["label" => "Invite a Friend", "icon" => "invite", "route" => "customer.invite", "color" => "text-white bg-primary"],
]))

<x-app-layout>
    <div class="mx-auto my-5 xl:max-w-screen-2xl px-3 xs:px-4 lg:px-6 py-5 bg-white rounded-sm shadow">

        <x-customers.customer-header-bar icon="new-wallet" name="Add New Account">
            <x-button class="justify-center tracking-tight" tag="a" href="{{ route('customer.account.new') }}">
                {{ __('Complete Import') }}
            </x-button>
        </x-customers.customer-header-bar>

        <div class="py-6 px-3">
            <h5 class="font-bold text-xl">{{ __("Import transactions") }}</h5>
            <div class="grid grid-cols-1 md:grid-cols-7 mt-7">
                <div class="col-span-2 flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-center items-center relative">
                        <x-icon name="bi-arrow" class="w-7 h-7"/>
                        <div class="bg-primary rounded-full w-5 h-5 absolute top-0 right-0 flex items-center justify-center">
                            <p class="text-white text-sm font-bold">1</p>
                        </div>
                    </div>
                    <p class="w-3/4">{{ __('Select your Exchanges from the list.') }}</p>
                </div>
                <div class="col-span-5 flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex justify-center items-center relative">
                        <x-icon name="book" class="w-7 h-7"/>
                        <div class="bg-primary rounded-full w-5 h-5 absolute top-0 right-0 flex items-center justify-center">
                            <p class="text-white text-sm font-bold">2</p>
                        </div>
                    </div>
                    <p class="w-3/4">{{ __("Follow the instructions to upload your data with CSV files or the exchange's API.") }}</p>
                </div>
            </div>
        </div>

        <div class="mt-9 px-3">
            @livewire('customer.account.account-new')
        </div>

    </div>
</x-app-layout>

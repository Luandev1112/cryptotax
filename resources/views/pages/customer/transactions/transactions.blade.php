@php(\App\Services\NavigationService::instance()->overwriteSubnavi([
    ["label" => "Accounts", "icon" => "wallet", "route" => "customer.account"],
    ["label" => "Transactions", "icon" => "transaction-2", "route" => "customer.transactions"],
    ["label" => "Add New Account", "icon" => "new-wallet", "route" => "customer.account.new"],
], [
    ["label" => "Invite a Friend", "icon" => "invite", "route" => "customer.invite", "color" => "text-white bg-primary"],
]))

<x-app-layout>
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5 bg-white rounded-sm shadow">
        <x-customers.customer-header-bar icon="transaction-1" name="Transactions">
            <x-button variant="white" class="border-primary">{{ __('Download CSV') }}</x-button>
            <x-button variant="white" class="border-primary">{{ __('Add transaction') }}</x-button>
            <x-button tag="a" href="{{ route('customer.account.new') }}">
                <x-icon name="wallet-1" class="w-5 h-5 mr-2"/>
                {{ __('Add Account') }}
            </x-button>
        </x-customers.customer-header-bar>
        
        <div class="my-9">
            @livewire('customer.transaction.overview')
        </div>
        @livewire('customer.transaction.transaction-list')
    </div>
</x-app-layout>

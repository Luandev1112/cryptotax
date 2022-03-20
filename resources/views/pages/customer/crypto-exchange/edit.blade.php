<x-app-layout>
    <x-page icon="fas-wallet" :title="__('Edit :name Transactions', ['name' => $name])">
        <div class="pb-8 flex flex-col md:flex-row -mx-2 lg:-mx-5 space-y-10 md:space-y-0">
            <!-- Left Panel -->
            <div class="px-2 lg:px-5 md:w-2/5">
                <x-card :title="__('Edit Credentials')">
                    <div class="p-6">
                        <livewire:crypto-exchange-accounts.kucoin-form :account="$exchangeAccount" />
                    </div>
                </x-card>
            </div>

            <!-- Right Panel -->
            <div class="px-4 lg:px-5 md:w-3/5 pt-4">
            </div>
        </div>
    </x-page>
</x-app-layout>

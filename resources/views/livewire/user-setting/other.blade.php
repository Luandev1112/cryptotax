<div>
    <div class="bg-gray-100 w-full px-10 py-6 rounded">
        <span class="text-xl font-extrabold">{{ __('Other') }}</span>
    </div>
    <div class="px-10 py-10 divide-y">
        <div class="block md:flex justify-between items-center py-6">
            <p>{{ __('Close your zenledger account and delete all the data asscociated with it.') }}</p>
            <x-button>{{ __('Close') }}</x-button>
        </div>
        <div class="block md:flex justify-between items-center py-6">
            <p>{{ __('Recalculate Missing Fair Market Price.') }}</p>
            <x-button>{{ __('Resync Prices') }}</x-button>
        </div>
        <div class="block md:flex justify-between items-center py-6">
            <p>{{ __('Reset Self Transfer.') }}</p>
            <x-button>{{ __('Reset Self Transfer') }}</x-button>
        </div>
        <div class="block md:flex justify-between items-center py-6">
            <p>{{ __('Reset and Delete All Transaction Update Histories.') }}</p>
            <x-button>{{ __('Cleanup Updated Data History') }}</x-button>
        </div>
        <div class="block md:flex justify-between items-center py-6">
            <p>{{ __('Resync Portfolio Graph.') }}</p>
            <x-button>{{ __('Resync Portfolio') }}</x-button>
        </div>
    </div>
</div>


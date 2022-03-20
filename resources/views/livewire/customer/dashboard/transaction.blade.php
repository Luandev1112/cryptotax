@php
    $transactios = [
        [
            'name' => 'Binance Coin', 'type' => 'Buy', 'balance' => '$2356', 'time' => 'Today 13,59 pm', 'icon' => 'bitcoin'
        ],
        [
            'name' => 'Lite Coin', 'type' => 'Sell', 'balance' => '$2356', 'time' => 'Today 13,59 pm', 'icon' => 'litecoin'
        ],
        [
            'name' => 'Tether', 'type' => 'Buy', 'balance' => '$2356', 'time' => 'Today 13,59 pm', 'icon' => 'tether'
        ],
    ]
@endphp
<div class="bg-white shadow-md rounded-md p-5 h-full">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <x-icon name="transaction" class="w-10 h-10"/>
            <p class="mr-3 text-lg font-semibold">{{ __('Recent Transaction') }}</p>
        </div>
        <x-button variant="primary" tag="a" href="{{ route('customer.transactions') }}">{{ __('View all') }}</x-button>
    </div>
    <div class="overflow-auto mt-7">
        <div class="space-y-4 min-w-cmd">
            @foreach ($transactios as $item)
                <div class="flex items-center justify-between border p-5 rounded-lg {{ $item['type'] == 'Buy'?'bg-lightgreen':' bg-lightpink' }}">
                    <div class="flex items-center justify-between space-x-6">
                        <div class="w-12 h-12 rounded-lg">
                            <x-icon name="{{ $item['icon'] }}" class="h-full w-full"/>
                        </div>
                        <div>
                            <p class="text-lg font-bold">{{ $item['name'] }} </p>
                            <x-badge type="square" class="mt-2">{{ $item['type'] }}</x-badge>
                        </div>
                    </div>
                    <div>
                        <p>{{ $item['balance'] }}</p>
                        <p>{{ $item['time'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

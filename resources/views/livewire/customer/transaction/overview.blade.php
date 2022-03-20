@php
$overview_data = [
    [
        'type' => 'Deposit',
        'amount' => '1056',
        'icon' => 'deposit-1',
    ],
    [
        'type' => 'Withdrawal',
        'amount' => '263',
        'icon' => 'withdrawal',
    ],
    [
        'type' => 'Trades',
        'amount' => '1056',
        'icon' => 'trade',
    ],
    [
        'type' => 'Needs Review',
        'amount' => '09',
        'icon' => 'review',
    ],
    [
        'type' => 'Exchanges',
        'amount' => '11',
        'icon' => 'exchange',
    ],
]    
@endphp


<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-0 sm:gap-x-4 gap-y-4 sm:gap-y-0">
    @foreach ($overview_data as $item)
        <div class="w-full border rounded-lg p-8 flex justify-between items-start">
            <div>
                <p> {{ $item['type'] }}</p>
                <p class="text-3xl font-bold mt-1">{{ $item['amount'] }}</p>
            </div>
            <x-icon name="{{ $item['icon'] }}" class="w-14 h-14" />
        </div>
    @endforeach
</div>

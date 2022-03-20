@php
    $lastweek= [
        'first_row' => [
            [ 'icon' => 'level-1', 'amount' => '10', 'category' => 'First-level Invitee' ],
            [ 'icon' => 'level-2', 'amount' => '10', 'category' => 'Second-level Invitee' ],
            [ 'icon' => 'level-top', 'amount' => '0', 'category' => 'Total - Invitee' ]
        ],
        'second_row' => [
            [ 'icon' => 'level-1', 'amount' => '1.29', 'category' => 'First-level commission' ],
            [ 'icon' => 'level-2', 'amount' => '10', 'category' => 'Second-level commission' ],
            [ 'icon' => 'money-2', 'amount' => '1.29', 'category' => 'Total commission' ]
        ]
    ];

    $total= [
        'first_row' => [
            [ 'icon' => 'level-1', 'amount' => '122', 'category' => 'First-level Invitee' ],
            [ 'icon' => 'level-2', 'amount' => '10', 'category' => 'Second-level Invitee' ],
            [ 'icon' => 'level-top', 'amount' => '122', 'category' => 'Total - Invitee' ]
        ],
        'second_row' => [
            [ 'icon' => 'level-1', 'amount' => '1.29', 'category' => 'First-level commission' ],
            [ 'icon' => 'level-2', 'amount' => '10', 'category' => 'Second-level commission' ],
            [ 'icon' => 'money-2', 'amount' => '1.29', 'category' => 'Total commission' ]
        ]
    ];
@endphp

<div>
    <P class="text-3xl font-semibold">Overview</P>
    <div class="mt-7 border bg-white rounded-md px-3 sm:px-12 py-8">
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="col-span-4 flex items-center space-x-5">
                <div class="w-16 h-14 bg-secondary rounded-lg flex items-center justify-center">
                    <x-icon name="money" class="w-10 h-10 text-white"/>
                </div>
                <p class="text-2xl font-bold">Commissions Last Week</p>
            </div>
            <div class="col-span-8 flex items-center space-x-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-y-2 gap-x-0 md:gap-x-5">
                    <x-button size="md" variant="secondary" class="col-span-3">First-level:40%</x-button>
                    <x-button size="md" class="col-span-3">Second-level : 5%</x-button>
                    <x-button size="md" class="bg-gray-400 col-span-6">Referral relationship : 365 Day(s)</x-button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 mt-12 gap-x-0 md:gap-x-6">
            <div class="col-span-5 grid grid-cols-1 xl:grid-cols-3 gap-x-0 xl:gap-x-6">
                @foreach ($lastweek['first_row'] as $item)                    
                    <div class="bg-bgcolor rounded-lg border p-3">
                        <div class="flex items-center space-x-6">
                            <x-icon name="{{ $item['icon'] }}" class="w-8 h-10 text-secondary"/>
                            <p class="text-4xl font-bold">{{ $item['amount'] }}</p>
                        </div>
                        <p class="text-sm text-gray-600 mt-4 text-center">{{ $item['category'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="col-span-7 grid grid-cols-1 xl:grid-cols-3 gap-x-0 xl:gap-x-6">
                @foreach ($lastweek['second_row'] as $item)                    
                    <div class="bg-bgcolor rounded-lg border p-3">
                        <div class="flex items-center space-x-6">
                            <x-icon name="{{ $item['icon'] }}" class="w-8 h-10 text-secondary"/>
                            <p class="text-4xl font-bold">{{ $item['amount'] }} <span class="text-lg">USDT</span></p>
                        </div>
                        <p class="text-sm text-gray-600 mt-4 text-center">{{ $item['category'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-6 border bg-white rounded-md px-3 sm:px-12 py-8">
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="col-span-4 flex items-center space-x-5">
                <div class="w-16 h-14 bg-primary rounded-lg flex items-center justify-center">
                    <x-icon name="money" class="w-10 h-10 text-white"/>
                </div>
                <p class="text-2xl font-bold">Total Commissions</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 mt-12 gap-x-0 md:gap-x-6">
            <div class="col-span-5 grid grid-cols-1 xl:grid-cols-3 gap-x-0 xl:gap-x-6">
                @foreach ($total['first_row'] as $item)                    
                    <div class="bg-bgcolor rounded-lg border p-3">
                        <div class="flex items-center space-x-6">
                            <x-icon name="{{ $item['icon'] }}" class="w-8 h-10 text-secondary"/>
                            <p class="text-4xl font-bold">{{ $item['amount'] }}</p>
                        </div>
                        <p class="text-sm text-gray-600 mt-4 text-center">{{ $item['category'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="col-span-7 grid grid-cols-1 xl:grid-cols-3 gap-x-0 xl:gap-x-6">
                @foreach ($total['second_row'] as $item)                    
                    <div class="bg-bgcolor rounded-lg border p-3">
                        <div class="flex items-center space-x-6">
                            <x-icon name="{{ $item['icon'] }}" class="w-8 h-10 text-secondary"/>
                            <p class="text-4xl font-bold">{{ $item['amount'] }} <span class="text-lg">USDT</span></p>
                        </div>
                        <p class="text-sm text-gray-600 mt-4 text-center">{{ $item['category'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <p class="mt-9 text-sm text-gray-700">* Commissions between 11/28 - 12/40 will be distributed on 12/07. Next distribution. 12/14(UTC+8) </p>
</div>

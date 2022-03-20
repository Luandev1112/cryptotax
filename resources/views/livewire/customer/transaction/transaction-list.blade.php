@php
    $transactions = [
        [
            'icon' => '',
            'name' => 'Bitpanda BTC wallet',
            'amount' => '- 0.003321456 BTC',
            'balance' => '0.001311 BTC',
            'date' => 'FEB 26, 2009  00:12.39',
            'zone' => 'UTC Transfer',
            'type' => 'send'
        ],
        [
            'icon' => '',
            'name' => 'Bitpanda BTC wallet',
            'amount' => '- 0.003321456 BTC',
            'balance' => '0.001311 BTC',
            'date' => 'FEB 26, 2009  00:12.39',
            'zone' => 'UTC Transfer',
            'type' => 'send'
        ],
        [
            'icon' => '',
            'name' => 'Bitpanda BTC wallet',
            'amount' => '- 0.003321456 BTC',
            'balance' => '0.001311 BTC',
            'date' => 'FEB 26, 2009  00:12.39',
            'zone' => 'UTC Transfer',
            'type' => 'send'
        ],
        [
            'icon' => '',
            'name' => 'Bitpanda BTC wallet',
            'amount' => '- 0.003321456 BTC',
            'balance' => '0.001311 BTC',
            'date' => 'FEB 26, 2009  00:12.39',
            'zone' => 'UTC Transfer',
            'type' => 'send'
        ],
        [
            'icon' => '',
            'name' => 'Bitpanda BTC wallet',
            'amount' => '- 0.003321456 BTC',
            'balance' => '0.001311 BTC',
            'date' => 'FEB 26, 2009  00:12.39',
            'zone' => 'UTC Transfer',
            'type' => 'send'
        ],
    ]
@endphp
<div>
    <div class="bg-gray-100 border rounded-sm p-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-0 md:gap-x-2 gap-y-2 md:gap-y-0">
            <div class="col-span-1 md:col-span-4 bg-white px-6 py-4 rounded-md">
                <div class="w-full relative">
                    <input class="border-0 outline-none w-full" placeholder="Filter transactions">
                    <div class="absolute right-0 top-1 border-l-2 pl-4">
                        <button>
                            <x-icon name="fas-search" class="w-4 h-4"></x-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-2">
                <div class="grid grid-cols-6 h-full gap-x-3">
                    <div class="col-span-2">
                        <button class="rounded-md w-full h-full text-white bg-primary hover:bg-secondary-400">
                            {{ __('All') }}
                        </button>
                    </div>
                    <div class="col-span-4 w-full h-full">
                        <select class="w-full h-full bg-white rounded-md">
                            <option value="" disabled selected hidden>{{ __('Order By') }}</option>
                            <option>{{ __('date') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <select class="h-full bg-white rounded-md col-span-1 md:col-span-2">
                <option value="" disabled selected hidden class="text-gray-100">{{ __('Transaction type') }}</option>
                <option value="">{{ __('Sell') }}</option>
                <option value="">{{ __('Buy') }}</option>
            </select>
            <div class="col-span-1 md:col-span-3">
                <div class="grid grid-cols-7 h-full gap-x-3">
                    <select class="col-span-3 h-full w-full bg-white rounded-md">
                        <option value="" disabled selected hidden>{{ __('') }}</option>
                        <option>{{ __('') }}</option>
                    </select>
                    <select class="col-span-4 h-full w-full bg-white rounded-md">
                        <option value="" disabled selected hidden>{{ __('Category') }}</option>
                        <option value="">{{ __('Exchange') }}</option>
                        <option value="">{{ __('Blockchains') }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10 rounded-sm overflow-auto">
        @foreach ($exchange_transactions as $transaction)
            <div class="grid grid-cols-3 p-9 border min-w-max">
                <div class="flex justify-start items-center">
                    <input type="checkbox">
                    <x-icon name="kucoin-token" class="w-18 h-18 ml-7"/>
                    <div class="w-full ml-7 space-y-1">
                        <p class="text-gray-500">{{ $transaction->id }} </p>
                        <p class="font-bold text-lg"> </p>
                        <p class="text-gray-500">View Transactions</p>
                        <p class="text-gray-500"> </p>
                    </div>
                </div>
                <div class="flex justify-start items-center">
                    <div class="px-2 py-4 bg-gray-100 border rounded-lg">
                        <x-icon name="fas-arrow-right" class="w-8 h-5 text-primary"/>
                    </div>
                    <div class="w-full ml-7 space-y-1">
                        <p class="font-bold text-lg"></p>
                        <p class="text-gray-500"></p>
                        <x-badge variant="danger" type="square"></x-badge>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <x-icon name="kucoin-token" class="w-18 h-18 ml-7"/>
                    <div class="w-full ml-7 space-y-1">
                        <p class="text-gray-500"> </p>
                        <p class="font-bold text-lg"> </p>
                    </div>
                    <div>
                        <button class="rounded-full w-6 h-6 bg-gray-100 border flex justify-center items-center">
                            <x-icon name="fas-chevron-down" class="w-4 h-4"/>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <div class="max-w-8xl mx-auto container py-10">
            <ul class="flex justify-center items-center">
                <li>
                    <span tabindex="0" aria-label="backward" role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary p-1 flex rounded transition duration-150 ease-in-out text-base leading-tight font-bold text-gray-500 hover:text-primary focus:outline-none mr-1 sm:mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="15 6 9 12 15 18" />
                        </svg>
                    </span>
                </li>
                <li>
                    <span tabindex="0" class="focus:bg-primary focus:text-white flex text-primary bg-white hover:bg-primary hover:text-white text-base leading-tight font-bold cursor-pointer shadow transition duration-150 ease-in-out mx-2 sm:mx-4 rounded px-4 py-2 focus:outline-none">1</span>
                </li>
                <li>
                    <span tabindex="0" class="focus:bg-primary focus:text-white flex text-primary bg-white hover:bg-primary hover:text-white text-base leading-tight font-bold cursor-pointer shadow transition duration-150 ease-in-out mx-2 sm:mx-4 rounded px-4 py-2 focus:outline-none">2</span>
                </li>
                <li>
                    <span tabindex="0" class="focus:bg-primary focus:text-white flex text-primary bg-white hover:bg-primary hover:text-white rounded transition duration-150 ease-in-out text-base leading-tight font-bold shadow px-4 py-2 focus:outline-none">...</span>
                </li>
                <li>
                    <span tabindex="0" class="focus:bg-primary focus:text-white flex text-primary bg-white hover:bg-primary hover:text-white text-base leading-tight font-bold cursor-pointer transition shadow duration-150 ease-in-out mx-2 sm:mx-4 rounded px-4 py-2 focus:outline-none">6</span>
                </li>
                <li>
                    <span tabindex="0" class="focus:bg-primary focus:text-white flex text-primary bg-white hover:bg-primary hover:text-white text-base leading-tight font-bold cursor-pointer transition shadow duration-150 ease-in-out mx-2 sm:mx-4 rounded px-4 py-2 focus:outline-none">7</span>
                </li>
                <li>
                    <span tabindex="0" aria-label="forward" role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary flex rounded transition duration-150 ease-in-out text-base leading-tight font-bold text-gray-500 hover:text-primary p-1 focus:outline-none ml-1 sm:ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="9 6 15 12 9 18" />
                        </svg>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>

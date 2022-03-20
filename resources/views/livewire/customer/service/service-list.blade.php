@php
    $list = [
        [ 'icon' => 'kucoin-token' ],
        [ 'icon' => 'celo' ],
        [ 'icon' => 'bitcoin-cash' ],
        [ 'icon' => 'c-eth' ],
        [ 'icon' => 'cosmos'  ],
        [ 'icon' => 'kucoin-token' ],
        [ 'icon' => 'kucoin-token' ],
        [ 'icon' => 'celo' ],
        [ 'icon' => 'bitcoin-cash' ],
        [ 'icon' => 'c-eth' ],
        [ 'icon' => 'cosmos'  ],
        [ 'icon' => 'kucoin-token' ],
    ]
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-7 gap-y-7">
    @foreach ($list as $item)        
        <div class="w-full grid grid-cols-1 xl:grid-cols-5 border rounded-md py-9 px-6 bg-white hover:bg-bgcolor">
            <div class="col-span-2 border-r border-dashed flex items-center justify-center relative">
                <x-icon name="{{ $item['icon'] }}" class="w-32 h-32"/>
                <x-icon name="scissors" class="text-gray-400 w-6 h-6 absolute -right-3 top-8"/>
            </div>
            <div class="col-span-3 xl:pl-10">
                <div class="flex justify-between items-end">
                    <p class="text-secondary text-5xl font-bold">80% <span class="text-2xl">offer</span></p>
                    <div>
                        <button class="bg-secondary rounded-md">
                            <div class="bg-primary hover:bg-secondary py-4 px-6 rounded-t-md rounded-bl-md rounded-br-3xl text-lg text-white font-bold">SHOW COUPON</div>
                        </button>
                        <p class="text-sm mt-2 ml-2">Expries <span class="text-secondary ml-2">12 Dec 2021</span></p>
                    </div>
                </div>
                <div class="mt-7">
                    <p class="font-bold">Get 30% off ZALANDO, Unlimited and  ZALANDO Family !</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

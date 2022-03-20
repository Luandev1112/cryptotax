 {{-- supported_country --}}
 <div class="w-full">
    <div class="mx-auto px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5">
        <div class="text-center py-12">
            <p  class="text-2xl lg:text-3xl xl:text-4xl font-bold">{{ __('Supported Countries') }}</p>
            <img src="{{ asset('assets/img/landing/landing_supported_country.svg') }}" class="p-5 md:p-16 w-full max-w-7xl m-auto h-auto"/>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-0 sm:gap-4 lg:gap-10 px-2 lg:px-10">
                @php
                    $items = [
                        [ 'icon' => 'level-top', 'amount' => '20M +', 'term' => 'Happy Users' ],
                        [ 'icon' => 'transaction-1', 'amount' => '70M / Year', 'term' => 'Transactions' ],
                        [ 'icon' => 'solid_land', 'amount' => '15K +', 'term' => 'Recently Sold Lands' ],
                        [ 'icon' => 'chains', 'amount' => '8K +', 'term' => 'Supported Coins' ],
                    ]
                @endphp
                @foreach ($items as $item)                        
                    <div class="flex items-center justify-end space-x-4">
                        <div class="w-1/4 p-0 xl:p-3">
                            <x-icon name="{{ $item['icon'] }}" class="w-full h-full" />
                        </div>
                        <div class="text-left w-3/4">
                            <p class="text-xl font-extrabold">{{ __($item['amount']) }}</p>
                            <p class="text-gray-400">{{ __($item['term']) }}</p>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

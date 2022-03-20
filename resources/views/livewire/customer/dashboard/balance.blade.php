@php
    $situation = [
        [ 'category' => 'Total Balance', 'amount' => '$ 124, 563, 000', 'percent' => '30'],
        [ 'category' => 'Your Tax', 'amount' => '$ 124, 563, 000', 'percent' => '94'],
    ]
@endphp

<div class="bg-white p-5 rounded-md shadow-md" x-data="{ view: 'tile' }" >
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2 py-5">
            <x-icon name="coin" class="w-8 h-8"/>
            <p class="mr-3 font-semibold text-lg">{{ __("My Balance") }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <button 
                class="border rounded-lg px-3 py-2 hover:text-white bg-white hover:bg-primary" 
                x-bind:class="view === 'tile' ? 'bg-primary text-white' : 'bg-white text-primary'" 
                x-on:click="view = 'tile'"
            >
                <x-icon name="tile" class="w-6 h-6"/>
            </button>
            <button 
                class="border rounded-lg px-3 py-2 hover:text-white  hover:bg-primary" 
                x-bind:class="view === 'list' ? 'bg-primary text-white' : 'bg-white text-primary'" 
                x-on:click="view = 'list'"
            >
                <x-icon name="list" class="w-6 h-6"/>
            </button>
        </div>
    </div>

    <div class=" lg:px-4 sm:px-3 px-2 py-4">
        <img src="{{asset('assets/img/svg/Credit Card.svg')}}" class=" w-9/12 mx-auto"/>
    </div>

    <div x-show="view == 'tile'" x-transition class="mt-3">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-0 md:gap-4">
            
            @foreach ($situation as $item)            
                <div>
                    <p class="text-sm text-secondary">{{ __( $item['category'] ) }}</p>
                    <p class="text-2xl text-primary font-semibold pt-2">{{ __( $item['amount'] ) }}</p>
                    <x-progressbar height="sm" variant="primary" progress="{{ $item['percent'] }}"></x-progressbar>
                </div>
            @endforeach
    
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-0 xl:gap-2 mt-8 mb-5">
            <x-button variant="primary" class="p-2 flex items-center space-x-3" tag="a" href="{{ route('customer.account.new') }}">
                <div class="p-1 rounded-lg bg-white">
                    <x-icon name="wallet-1" class="w-5 h-5 text-primary"/>
                </div>
                <span class="text-sm font-bold tracking-tighter">{{ __('Add Account') }}</span>
            </x-button>
            <x-button variant="third" class="p-2 flex items-center space-x-3" tag="a" href="{{ route('customer.taxes') }}">
                <div class="p-1 bg-white rounded-lg">
                    <x-icon name="tax-1" class="w-5 h-5 text-third"/>
                </div>
                <span class="text-sm font-bold tracking-tighter">{{ __('Tax Calculation') }}</span>
            </x-button>
            <x-button variant="secondary" class="p-2 flex items-center space-x-3" tag="a" href="{{ route('customer.taxes') }}">
                <div class="p-1 bg-white rounded-lg">
                    <x-icon name="professional" class="w-5 h-5 text-secondary"/>
                </div>
                <span class="text-sm font-bold tracking-tighter">{{ __('Get Tax Pro') }}</span>
            </x-button>
        </div>
    </div>

    <div class="mt-4 space-y-5" x-show="view == 'list'" x-transition>
        <div class="flex items-center justify-between px-6 py-4 bg-primary rounded-xl">
            <img src="{{ asset('assets/img/svg/mastercard.svg') }}"/>
            <div class="text-right text-white">
                <p class="text-sm">****    ****   *****   1569</p>
                <p class="mt-2">Balance <span class="ml-5 text-lg font-bold">$ 673, 146.369</span></p>
            </div>
        </div>
        <div class="flex items-center justify-between px-6 py-4 bg-success rounded-xl">
            <img src="{{ asset('assets/img/svg/visa.svg') }}"/>
            <div class="text-right text-white">
                <p class="text-sm">****    ****   *****   1569</p>
                <p class="mt-2">Balance <span class="ml-5 text-lg font-bold">$ 673, 146.369</span></p>
            </div>
        </div>
    </div>
</div>

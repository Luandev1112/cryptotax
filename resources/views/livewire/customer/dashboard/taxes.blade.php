@php
    $table = [
        [ 'year' => '2021', 'gains' => '+ $2,456.00', 'income' => '$1659.00' ],
        [ 'year' => '2020', 'gains' => '+ $2,456.00', 'income' => '$1659.00' ],
        [ 'year' => '2019', 'gains' => '+ $2,456.00', 'income' => '$1659.00' ],
    ]
@endphp

<div class="bg-white shadow-md rounded-md p-5 mt-6">
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <x-icon name="tax" class="w-8 h-7"/>
            <p class="text-lg mr-3 font-semibold">{{ __('Crypto Taxes') }}</p>
        </div>
        <div>
            <x-button variant="primary" class="font-normal" tag="a" href="{{ route('customer.taxes') }}">{{__('See details')}}</x-button>
        </div>
    </div>
    <table class="w-full text-center mt-5 text-primary text-base">
        <thead class="border bg-gray-100">
            <tr>
                <th class="py-5 font-bold">{{ __('Tax year') }}</th>
                <th class="py-5 font-bold">{{ __('Gains') }}</th>
                <th class="py-5 font-bold">{{ __('Income') }}</th>
            </tr>
        </thead>
        <tbody class="border space-y-5">
            @foreach ($table as $item)                
                <tr class="border">
                    <td class="py-5 flex items-center space-x-2 justify-center">
                        <p>{{ $item['year'] }}</p> 
                        <x-icon name="info" class="w-3 h-3 text-gray-400"/> 
                </td>
                    <td class="py-5">{{ $item['gains'] }}</td>
                    <td class="py-5">{{ $item['income'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
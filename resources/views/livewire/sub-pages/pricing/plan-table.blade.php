<div class="overflow-auto">
    <div class="grid grid-cols-3 min-w-clg">
        <div class="col-span-1">
    
        </div>
        <div class="col-span-2 grid grid-cols-3">
            @php
                $plans = [
                    [ 'name' => 'Freemium', 'cost' => '0.0', 'recommended' => false ],
                    [ 'name' => 'PRO', 'cost' => '80.0', 'recommended' => true ],
                    [ 'name' => 'Business', 'cost' => '16.0', 'recommended' => false ],
                ]
            @endphp
            @foreach ($plans as $plan)                
                <div class="text-center">
                    @if ($plan['recommended'])                        
                        <div class="w-full p-1 bg-secondary text-white">{{ __('Recommended') }}</div>
                    @else
                        <div class="w-full p-1 bg-white text-white">{{ __('Recommended') }}</div>
                    @endif
                    <div class="py-3 md:py-9 border">
                        <p class="text-gray-300 font-extrabold text-xs sm:text-base">{{ __($plan['name']) }}</p>
                        <h2 class="font-extrabold flex items-start justify-center text-xl sm:text-4xl"><span class="text-lg font-normal">$</span>{{ $plan['cost'] }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-3 mt-6  min-w-clg">
        @php
            $properties = [
                [ 'name' => 'Secure Online Payments', 'status' => [true, false, true] ],
                [ 'name' => 'Sharable link tables', 'status' => [false, true, true] ],
                [ 'name' => 'Export to image', 'status' => [true, false, true] ],
                [ 'name' => 'Remove Common Ninja logo', 'status' => [true, false, true] ],
                [ 'name' => 'Secure Online Payments', 'status' => [true, true, true] ],
                [ 'name' => 'Sharable link tables', 'status' => [true, false, true] ],
                [ 'name' => 'Secure Online Payments', 'status' => [false, false, true] ],
                [ 'name' => 'Remove Common Ninja logo', 'status' => [true, false, true] ],
            ]
        @endphp
        @foreach ($properties as $property)            
            <div class="col-span-1 border flex justify-start items-center px-3 py-4 sm:px-10">
                <p>{{ __($property['name']) }}</p>
            </div>
            <div class="col-span-2 grid grid-cols-3">
                @foreach ($property['status'] as $item)                    
                    <div class="flex justify-center items-center border">
                        @if ($item)                            
                            <x-icon name="check" class="w-4 h-4 rounded-full"/>
                        @else
                            <x-icon name="close" class="w-4 h-4 rounded-full text-gray-400"/>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

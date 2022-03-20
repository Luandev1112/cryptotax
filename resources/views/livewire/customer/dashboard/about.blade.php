<div class=" bg-bgcolor1 rounded-md text-white w-full px-5 md:px-8 xl:px-11 py-5 md:py-8 xl:py-12 relative">
    <img src="{{asset($selected['image'])}}" class="w-1/2 h-full absolute -bottom-6 right-2"/>
    <div class="max-w-lg z-10 relative">
        <h2 class="text-primary text-3xl font-semibold">{{ __('Hello ' . auth()->user()->name) }}</h2>
        <p class="text-primary text-base">{{ __('Thanks for signing up.') }}</p>
        <div class="flex flex-wrap items-center space-x-3 mt-8">
            <div class="bg-white rounded-xl p-3">
                <x-icon name="{{ $selected['icon'] }}" class="w-8 h-8 text-secondary"></x-icon>
            </div>
            <h5 class="text-lg font-bold text-primary">{{$selected['id']}}. {{ __($selected['label']) }}</h5>
            <a href="{{ route('customer.account.new') }}" class="font-bold text-sm bg-primary hover:bg-secondary rounded py-2 px-3 my-2">{{ __($selected['button']) }}</a>
        </div>
        <p class="text-primary mt-6">{{ __($selected['description']) }}</p>
        
        {{-- stepper --}}
        <nav aria-label="Progress" class="mt-11">
            <ol class="flex items-center">
                @foreach ($steps as $step)
                    @switch($step['status'])
                        @case(1)
                            <x-tooltip content="{{$step['label']}}">                                
                                <li class="relative pr-6 sm:pr-7"  data-tooltip-target="tooltip-default">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="h-0.5 w-full bg-secondary"></div>
                                    </div>
                                    <button class="relative w-6 h-6 flex items-center justify-center bg-secondary rounded-full hover:bg-indigo-900" wire:click="get_selected_step({{$step['id']}})">
                                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">{{ __($step['label']) }}</span>
                                    </button>
                                </li>
                            </x-tooltip>
                            @break
                        @case(2)
                            <x-tooltip content="{{$step['label']}}"> 
                                <li class="relative pr-6 sm:pr-7">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="h-0.5 w-full bg-gray-200"></div>
                                    </div>
                                    <button class="relative w-6 h-6 flex items-center justify-center bg-white border-2 border-secondary rounded-full" aria-current="step" wire:click="get_selected_step({{$step['id']}})">
                                        <span class="h-2.5 w-2.5 bg-secondary rounded-full" aria-hidden="true"></span>
                                        <span class="sr-only">{{ __($step['label']) }}</span>
                                    </button>
                                </li>
                            </x-tooltip>
                            @break
                        @case(3)
                            <x-tooltip content="{{$step['label']}}">
                                <li class="relative pr-6 sm:pr-7">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="h-0.5 w-full bg-gray-200"></div>
                                    </div>
                                    <button class="group relative w-6 h-6 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full hover:border-gray-400" wire:click="get_selected_step({{$step['id']}})">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300" aria-hidden="true"></span>
                                        <span class="sr-only">{{ __($step['label']) }}</span>
                                    </button>
                                </li>
                            </x-tooltip>
                            @break
                        @case(4)
                            <x-tooltip content="{{$step['label']}}">
                                <li class="relative">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="h-0.5 w-full bg-gray-200"></div>
                                    </div>
                                    <button class="group relative w-6 h-6 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full hover:border-gray-400" wire:click="get_selected_step({{$step['id']}})">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300" aria-hidden="true"></span>
                                        <span class="sr-only">{{ __($step['label']) }}</span>
                                    </button>
                                </li>
                            </x-tooltip>
                            @break
                        @default
                            @break
                    @endswitch
                @endforeach
            </ol>
        </nav>
    </div>
</div>

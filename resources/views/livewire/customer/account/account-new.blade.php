<div class="grid grid-cols-1 md:grid-cols-6 gap-0 md:gap-6" x-data="{category:''}">
    <div class="col-span-1 py-8 space-y-5">
        @foreach ($buttons as $button)
            <button 
                class="w-full flex items-center justify-between hover:bg-primary hover:text-white border-1 rounded-lg py-4 px-5" 
                wire:click="get_selected_item({{ $button['id'] }})"
                x-on:click="category = {{$button['id']}}"
                x-bind:class="category == {{$button['id']}}?'bg-primary text-white':'bg-gray-100'"
            >
                <div class="inline-flex items-center">
                    <x-icon name="{{ $button['icon'] }}" class="w-8 h-8 mr-2"/>
                    <span class="text-xl font-semibold tracking-tight">{{ __( $button['name']) }}</span>
                </div>
                <x-icon name="arrow-right" class="w-5 text-white" x-show="category == {{$button['id']}}"/>
            </button>
        @endforeach
    </div>
    <div class="col-span-5 border rounded-md p-7" x-data="{selected_item:''}">
        <div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10">
                <div class="flex items-center border rounded-lg px-4 py-2">
                    <x-icon name="fas-search" class="w-4"/>
                    <input 
                        type="text" 
                        class="border-0 ring-0 outline-none rounded-lg w-full focus:ring-0" 
                        placeholder="Search for an exchange" 
                        wire:model="search" 
                    >
                </div>
                <div class="flex items-center space-x-3 justify-end">
                    <p>{{ __('A service is missing?') }}</p>
                    <x-button>{{ _('Make a request') }}</x-button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 mt-8">
                {{-- Left panel --}}
                <div class="overflow-auto h-full border rounded-md">
                    <div class="h-110">
                        @if (!$selected)                            
                            @foreach ($exchanges_array as $account)
                                <x-new-account-row :category="1" :selected="$newAccountId == $account['id']" :name="$account['name']" 
                                    wire:click="get_new_exchange_id({{ $account['id'] }})"
                                />
                            @endforeach
                            @foreach ($blockchains as $account)
                                <x-new-account-row :category="3" :selected="$newBlockchainId == $account['id']" :name="$account['name']"
                                    wire:click="get_new_blockchain_id({{ $account['id'] }})"
                                />
                            @endforeach
                        @else
                            @if ($selected == 1)                                
                                @foreach ($exchanges_array as $account)
                                    <x-new-account-row :category="1" :selected="$newAccountId == $account['id']" :name="$account['name']"
                                        wire:click="get_new_exchange_id({{ $account['id'] }})"
                                    />
                                @endforeach
                            @endif
                            @if ($selected == 3)                                
                                @foreach ($blockchains as $account)
                                    <x-new-account-row :category="3" :selected="$newBlockchainId == $account['id']" :name="$account['name']"
                                        wire:click="get_new_blockchain_id({{ $account['id'] }})"
                                    />
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            
                {{-- Right panel --}}
                <div class="border border-dashed rounded-md">
                    <div class="h-full w-full p-5">
                        @if ($exchange_account)
                            <x-icon name="{{$exchange_account->getName()}}" class="h-10 w-auto flex m-auto"/>
                            <p class="text-xl font-bold text-center mt-3">{{ __($exchange_account->getName() . ' API integration')}}</p>
                            <form wire:submit.prevent="save_exchange">
                                <div class="p-4">
                                    {{ $this->form }}
                                    <div class="text-center mt-4">
                                        <x-button type="submit">{{ __("Save") }}</x-button>
                                    </div>
                                </div>
                            </form>
                        @elseif($newBlockchainId)
                            <p class="text-xl font-bold text-center mt-3"><span x-text="selected_item" class="uppercase"></span> {{ __(' API integration') }} </p> 
                            <div class="flex justify-center mt-10">
                                <div>
                                    <p class="text-gray-600">Address<span class="text-danger">*</span></p>
                                    <div class="mt-1">
                                        <input class=" h-10 transition duration-75 px-3 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 border border-primary-300" name="address" wire:model.defer="newBlockchainAddress" placeholder="Address" />
                                        <x-button wire:click="add_blockchain">Add</x-button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center w-full h-full flex justify-center items-center">
                                <div>
                                    <div class="bg-primary flex justify-center items-center rounded-full mx-auto w-30 h-30">
                                        <x-icon name="book-info" class="w-16 h-16 text-white"/>
                                    </div>
                                    <p class="text-xl font-bold mt-3">{{ __('Instructions for API or CSV') }}</p>
                                    <p>{{ __('Please select an Exchange to see import instructions.') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>



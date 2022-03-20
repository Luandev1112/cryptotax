<div class="w-full">
    <x-card :title="__('Blockchains')">
        @if($blockchainAccounts->count())
            <div class="p-4">
                <ul>
                    @foreach($blockchainAccounts as $row)
                        <li class="@if(!$loop->last)mb-8 @endif">
                            {{ $row->getName() }}
                            <small>({{ moneyFormat($row->getBalanceSum()) }} USD)</small>

                            <div class="float-right">
                                <x-button :disabled="$row->fetching_scheduled_at" size="sm" wire:click="fetch({{ $row->id }})">{{ __("Fetch") }}</x-button>
                                <x-button variant="danger" :disabled="$row->fetching_scheduled_at" size="sm" wire:click="delete({{ $row->id }})">{{ __("Delete") }}</x-button>
                            </div>
                            <p class="text-xs">
                                {{ __("Last fetched") }}: {{ $row->fetched_at ? $row->fetched_at->format("Y-m-d H:i") : __("never") }}

                                @if($row->fetching_scheduled_at)
                                    <br>{{ __("Fetching is scheduled") }}
                                @endif
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="p-4">
            <h2 class="text-lg mb-2"> {{ __("Add new blockchain") }}</h2>
            <div class="mt-1">
                <select wire:model.defer="newBlockchainId" class="rounded-lg">
                    <option></option>
                    @foreach($blockchains as $blockchain)
                        <option value="{{ $blockchain->id }}">{{ $blockchain->getName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-1">
                <input class=" h-10 transition duration-75 px-3 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 border border-primary-300" name="address" wire:model.defer="newBlockchainAddress" placeholder="Address" />
                <x-button wire:click="add">Add</x-button>
            </div>
        </div>
    </x-card>
</div>

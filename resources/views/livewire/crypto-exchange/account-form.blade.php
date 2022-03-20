<div class="pb-8 flex flex-col md:flex-row -mx-2 lg:-mx-5 space-y-10 md:space-y-0">
    <!-- Left Panel -->
    <div class="px-2 lg:px-5 md:w-1/2">
        <x-card :title="__('Exchanges')">
            @if($cryptoExchangeAccounts->count())
                <div class="p-4">
                    <ul>
                        @foreach($cryptoExchangeAccounts as $row)
                            <li class="@if(!$loop->last)mb-8 @endif">
                                {{ $row->getName() }}
                                <small>({{ moneyFormat($row->getBalanceSum()) }} USD)</small>

                                <div class="float-right">
                                    @if($row->hasAllCredentials())<x-button :disabled="$row->fetching_scheduled_at" size="sm" wire:click="fetch({{ $row->id }})">{{ __("Fetch") }}</x-button>@endif
{{--                                    <x-button size="sm" wire:click="fetch({{ $row->id }})">{{ __("Fetch2") }}</x-button>--}}
                                    <x-button size="sm" wire:click="edit({{ $row->id }})" :disabled="$row->fetching_scheduled_at">{{ __("Edit") }}</x-button>
                                    <x-button variant="danger" :disabled="$row->fetching_scheduled_at" size="sm" wire:click="delete({{ $row->id }})">{{ __("Delete") }}</x-button>
                                </div>
                                <p class="text-xs">
                                    @if($row->hasAllCredentials())
                                        {{ __("Last fetched") }}: {{ $row->fetched_at ? $row->fetched_at->format("Y-m-d H:i") : __("never") }}
                                    @else
                                        <span class="text-danger">{{ __("Missing credentials") }}</span>
                                    @endif
                                    @if($row->fetching_scheduled_at)
                                        <br>{{ __("Fetching is scheduled") }}
                                    @endif
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($exchanges->count())
                <div class="p-4">
                    <h2 class="text-lg mb-2"> {{ __("Add new exchange") }}</h2>
                    <select wire:model.defer="newAccountId" class="rounded-lg">
                        <option></option>
                        @foreach($exchanges as $exchange)
                            <option value="{{ $exchange->id }}">{{ $exchange->getName() }}</option>
                        @endforeach
                    </select>

                    <x-button wire:click="add">Add</x-button>
                </div>
            @endif
        </x-card>
    </div>

    <!-- Right Panel -->
    @if($account)
        <div class="px-4 lg:px-5 md:w-1/2">
            <x-card :title="$account->getName()">
                @if($account->fetching_scheduled_at)
                    <p class="p-4">{{ __("Fetching is currently scheduled. You can't modify credentials until fetching is finished.") }}</p>
                @else
                    <form wire:submit.prevent="save">
                        <div class="p-4">
                            {{ $this->form }}

                            <div class="text-center mt-4">
                                <x-button type="submit">{{ __("Save") }}</x-button>
                            </div>
                        </div>
                    </form>
                @endif
            </x-card>
        </div>
    @endif
</div>

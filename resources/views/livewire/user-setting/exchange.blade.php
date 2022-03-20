<div>
    <div class="bg-gray-100 w-full px-10 py-6 rounded">
        <span class="text-xl font-extrabold">{{ __('Request Exchange') }}</span>
    </div>
    <div class="px-5 py-5 md:px-10 md:py-10">
        <div>
            <x-jet-label>{{ __('Exchange Type') }}</x-jet-label>
            <select class="w-full mt-4 py-4 border border-gray-300 rounded-sm shadow" id="type" wire:model="type">
                <option value="1" selected>{{ __('CSV') }}</option>
                <option value="2">{{ __('API') }}</option>
                <option value="3">{{ __('Blockchain') }}</option>
            </select>
        </div>
        <div class="mt-7">
            @switch($type)
                @case(1)
                    @livewire('user-setting.exchange-csv')
                    @break
                @case(2)
                    @livewire('user-setting.exchange-api')
                    @break
                @case(3)
                    @livewire('user-setting.exchange-blockchain')
                    @break
                @default

            @endswitch
        </div>
    </div>
</div>

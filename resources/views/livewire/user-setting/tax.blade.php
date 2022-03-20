<div>
    <div class="bg-gray-100 w-full px-10 py-6 rounded">
        <span class="text-xl font-extrabold">{{ __('Tax Settings') }}</span>
    </div>
    <div class="px-5 py-5 md:px-10 md:py-10">
        <div>
            <x-jet-label>{{ __('Default Transaction Time Zone') }}</x-jet-label>
            <div class="border shadow flex items-center rounded-sm mt-4 px-5">
                <x-icon name="clock" class="w-9 h-9"/>
                <select class="h-full border-0 py-4 w-full outline-none ring-0 focus:outline-none focus:ring-0" id="timezone_id" wire:model.defer="timezone_id">
                    <option value="0" disabled selected>{{ __('Timezone') }}</option>
                    @foreach ($timezone as $zone)                        
                        <option value="{{ $zone->id }}" @if($timezone_id == $zone->id) selected @endif>{{ $zone->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-10">
            <p>{{ __('Tax Jurisdiction') }}</p>
            <x-jet-label>{{ __('Note: All the set net worth amount would be cleared after switching to another jurisdiction.') }}</x-jet-label>
            <div class="border shadow flex items-center rounded-sm mt-4 px-5">
                <x-icon name="{{ 'tax_country_' . $tax_country_id }}" class="w-9 h-9"/>
                <select class="h-full border-0 py-4 w-full outline-none ring-0 focus:outline-none focus:ring-0" id="tax_country_id" wire:model.defer="tax_country_id">
                    <option value="0" disabled selected>{{ __('Tax Jurisdiction') }}</option>
                    @foreach ($tax_countries as $country)                        
                        <option value="{{ $country->id }}" @if($tax_country_id == $country->id) selected @endif>{{ __($country->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-10">
            <p>{{ __('Base Currency') }}</p>
            <div class="border shadow flex items-center rounded-sm mt-4 px-5">
                <x-icon name="{{ 'tax_country_' . $tax_currency_id }}" class="w-9 h-9"/>
                <select class="h-full border-0 py-4 w-full outline-none ring-0 focus:outline-none focus:ring-0" id="tax_currency_id" wire:model.defer="tax_currency_id">
                    <option value="0" disabled selected>{{ __('Base Currency') }}</option>
                    @foreach ($basic_currency as $currency)                        
                        <option value="{{ $currency->id }}" @if($tax_currency_id  == $currency->id) selected @endif>{{ __($currency->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-10">
            <p>{{ __('Cost Basis Method') }}</p>
            <div class="border shadow flex items-center rounded-sm mt-4 px-5">
                <x-icon name="money-1" class="w-9 h-9"/>
                <select class="h-full border-0 py-4 w-full outline-none ring-0 focus:outline-none focus:ring-0" id="tax_cost_model_id" wire:model.defer="tax_cost_model_id">
                    <option value="0" disabled selected>{{ __('Cost Basis Method') }}</option>
                    @foreach ($basic_cost_method as $method)
                        <option value="{{ $method->id }}" @if($tax_cost_model_id == $method->id) selected @endif>{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <x-jet-label class="mt-10">{{ __('Note: You can change these settings anytime by clicking your profile at the top right,') }}</x-jet-label>
        <x-jet-label class="mt-3">{{ __('then selecting Settings > Tax Settings.') }}</x-jet-label>
        <label for="email_update" class="flex items-center my-8">
            <x-jet-checkbox id="email_update" name="email_receive" />
            <span class="ml-2 text-sm text-gray-600">{{ __('I agree to the United States of America Tax Disclaimer.') }}</span>
        </label>
        <x-jet-button class="px-10" wire:click="save_tax_setting_data">{{ __('Save') }}</x-jet-button>
    </div>
</div>

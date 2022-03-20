<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="">
            <x-jet-label>{{ __('Exchange Name') }}</x-jet-label>
            <x-jet-input type="text" class="w-full mt-4" placeholder="Exchange Name"/>
        </div>
        <div class="">
            <x-jet-label>{{ __('Exchange Url') }}</x-jet-label>
            <x-jet-input type="text" class="w-full mt-4" placeholder="http://exchangeurl.com"/>
        </div>
    </div>
    <div class="mt-7">
        <x-jet-label>{{ __('Country') }}</x-jet-label>
        <select class="w-full mt-4 py-4 border border-gray-300 rounded-sm shadow" id="type">
            <option value="1" selected>{{ __('Europe') }}</option>
            <option value="2">{{ __('United State') }}</option>
        </select>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Upload csv/xlsx files.') }}</p>
        <x-jet-label class="py-4">{{ __('Export all the trades and transfers from the exchange and upload them here') }}</x-jet-label>
        <x-button>
            <x-icon name="csv" class="w-7 h-8 mr-4"/>
            {{ __('Choose File') }}
        </x-button>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Upload screenshots (Optional)') }}</p>
        <x-jet-label class="py-4">{{ __('Screenshots are very helpful. Capture few web pages screenshots from the exchange with your data.') }}</x-jet-label>
        <x-button>
            <x-icon name="upload" class="w-7 h-8 mr-4"/>
            {{ __('Choose File') }}
        </x-button>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Your email address.') }}</p>
        <x-jet-label class="py-3">{{ __('We will let you know when the integration is ready or we need more details on it.') }}</x-jet-label>
        <x-jet-input type="email" class="w-full mt-4" placeholder="email@gmail.com"/>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Comments') }}</p>
        <x-jet-label class="py-3">{{ __('Please add any more information that may be helpful.') }}</x-jet-label>
        <textarea rows="6" class="w-full border shadow rounded-sm border-gray-300"></textarea>
    </div>
    <x-jet-button class="mt-7">{{ __('Submit') }}</x-jet-button>
</div>

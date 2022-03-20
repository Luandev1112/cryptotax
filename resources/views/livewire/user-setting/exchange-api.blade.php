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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-7">
        <div class="">
            <x-jet-label>{{ __('Api Key :') }}</x-jet-label>
            <x-jet-input type="text" class="w-full mt-4" placeholder="API Key"/>
        </div>
        <div class="">
            <x-jet-label>{{ __('Api Secret :') }}</x-jet-label>
            <x-jet-input type="text" class="w-full mt-4" placeholder="API Secret"/>
        </div>
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
    <x-jet-label>{{ __('Note : Your data security is top priority. Please make sure you generate read-only access API keys so that 
        we can import your transactions to build the API support.') }}</x-jet-label>
    <x-jet-button class="mt-7">{{ __('Submit') }}</x-jet-button>
</div>

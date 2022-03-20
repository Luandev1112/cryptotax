<div>
    <div class="mt-7">
        <x-jet-label>{{ __('Coin Name') }}</x-jet-label>
        <x-jet-input type="text" class="w-full mt-4" placeholder="Bitcoin(BTC )"/>
    </div>
    <div class="mt-7">
        <x-jet-label>{{ __('Wallet Address') }}</x-jet-label>
        <x-jet-input type="text" class="w-full mt-4" placeholder="19rxWcjug44Xft1T1Ai11ptDZr94wEdRTz"/>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Your email address.') }}</p>
        <x-jet-label class="py-3">{{ __('We will let you know when the integration is ready or we need more details on it.') }}</x-jet-label>
        <x-jet-input type="email" class="w-full mt-4" placeholder="email@example.com"/>
    </div>
    <div class="mt-7">
        <p class="text-primary">{{ __('Comments') }}</p>
        <x-jet-label class="py-3">{{ __('Please add any more information that may be helpful.') }}</x-jet-label>
        <textarea rows="6" class="w-full border shadow rounded-sm border-gray-300"></textarea>
    </div>
    <x-jet-button class="mt-7">{{ __('Submit') }}</x-jet-button>
</div>
</div>

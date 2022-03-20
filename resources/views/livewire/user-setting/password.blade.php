<div>
    <div class="bg-gray-100 w-full px-10 py-6 rounded">
        <span class="text-xl font-extrabold">{{ __('Change your password') }}</span>
    </div>
    <div class="px-10 py-10">
        <div class=" max-w-lg mt-6">
            <x-jet-label>{{ __('Old Password') }}</x-jet-label>
            <x-jet-input type="password" class="w-full mt-5"></x-jet-input>
        </div>
        <div class=" max-w-lg mt-6">
            <x-jet-label>{{ __('New Password') }}</x-jet-label>
            <x-jet-input type="password" class="w-full mt-5"></x-jet-input>
        </div>
        <div class=" max-w-lg mt-6">
            <x-jet-label>{{ __('Confirm Password') }}</x-jet-label>
            <x-jet-input type="password" class="w-full mt-5"></x-jet-input>
        </div>
        <x-jet-button class="mt-12 px-16">{{ __('Save') }}</x-jet-button>
    </div>
</div>

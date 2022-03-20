<div>
    <div class="bg-gray-100 w-full px-10 py-6 rounded">
        <span class="text-xl font-extrabold">{{ __('Notifications') }}</span>
    </div>
    <div class="px-10 py-10">
        <label for="email_update" class="flex items-center">
            <x-jet-checkbox id="email_update" name="email_receive" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Notify when to handle tax issues') }}</span>
        </label>
        <label for="email_update" class="flex items-center mt-8">
            <x-jet-checkbox id="email_update" name="email_receive" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Marketing emails') }}</span>
        </label>
    </div>
</div>

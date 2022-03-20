<div>
    <div class="flex items-center space-x-4">
        <x-icon name='blank-user'/>
        <div>
            <h5 class="text-lg font-semibold">{{ __('Mike Newton') }}</h5>
            <p class="text-gray-400">{{ __('February 1, 2021') }}</p>
        </div>
    </div>
    <p class="mt-5 text-primary">{{ __('Leos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. ') }}</p>
    <div x-data="{ishide: false}">
        <button class="font-bold py-4" x-on:click="ishide = !ishide">{{ __("Reply") }}</button>
        <div class="flex items-center border rounded max-w-2xl" x-show="ishide" x-cloak x-transition:enter-start="transition ease-in duration-3000">
            <input type="text" class="border-none rounded outline-none ring-0 py-4 px-5 focus:ring-0 w-full" placeholder="Reply to the post"/>
            <button><x-icon name="reply" class="w-8 h-8 mr-5 text-gray-300"/></button>
        </div>
    </div>
</div>
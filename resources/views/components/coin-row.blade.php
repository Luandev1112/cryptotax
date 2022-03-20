<div class="flex justify-between p-3 md:p-6 items-center">
    <x-coin :name="$name" />
    <div class="flex gap-2 sm:gap-4 items-center text-right">
        <!-- Coin Price -->
        <div class="space-y-1">
            <p class="text-sm sm:text-base xl:text-xl text-gray-700 font-semibold">${{ moneyFormat($price, 2) }}</p>
            <p class="text-gray-400 text-xs xl:text-md">{{ moneyFormat($amount, 5) }} {{ strtoupper($name) }}</p>
        </div>
        <!-- View Transaction button -->
        <button type="button" class="inline-flex items-center justify-center gap-2 p-1 sm:p-2 xl:px-4 font-medium tracking-wide text-primary hover:text-secondary rounded-full hover:bg-primary-1  focus:outline-none outline-none border border-primary-400 hover:border-secondary-400 text-sm">
            <span class="hidden xl:inline-flex">{{ __("View Transaction") }}</span>
            <svg class="h-6 w-6 xl:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
</div>

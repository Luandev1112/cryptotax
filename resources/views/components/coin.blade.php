<div class="flex gap-2 sm:gap-4 items-center">
    <x-icon :name="$icon" class="w-9 sm:w-12 xl:w-14" :style="'color: #' . $color "></x-icon>
    <div class="space-y-1">
        <h3 class="text-sm sm:text-base xl:text-xl font-semibold text-gray-700 ">{{ $label }}</h3>
        @if($caption)<p class="text-gray-400 text-xs xl:text-md">{{ $caption }}</p>@endif
    </div>
</div>

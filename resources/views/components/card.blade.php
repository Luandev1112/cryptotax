<div {{ $attributes->merge(["class" => "bg-white border border-gray-300 rounded overflow-hidden"]) }}>
    {{-- Heading --}}
    <div class="rounded-t bg-primary-2 flex justify-between py-2 lg:py-4 px-4 lg:px-6 items-center border-b border-gray-300">
        <div class="sm:space-y-1">
            <h3 class="sm:text-xl uppercase text-gray-700 font-bold">{{ $title }}</h3>
            @if(isset($subtitle)) <p class="text-gray-400 text-md">{{ $subtitle }}</p> @endif
        </div>
        @if(isset($right)) <div class="sm:text-xl text-gray-700 font-semibold">{{ $right }}</div> @endif
    </div>

    {{-- Body --}}
    <div class="flex flex-col divide-y divide-gray-300 scrollbar overflow-auto max-h-100">
        {{ $slot }}
    </div>
</div>

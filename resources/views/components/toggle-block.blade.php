@props(["opened" => false, "label"])
<div class="border border-gray-100 rounded" x-data="{opened:{{ $opened ? 'true' : 'false' }}}">
    <button 
        aria-current="true"
        type="button"
        class="border-0 text-left py-3 lg:py-6 px-4 lg:px-8 font-semibold sm:text-xl md:text-base lg:text-lg xl:text-xl bg-gray-50  w-full text-gray-700  focus:outline-none cursor-pointer flex justify-between items-center rounded"
        x-on:click="opened = !opened; selected='';"
    >
        <span>{{ $label }}</span>
        <svg class="w-4 trnstsn transform " fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': opened}">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div class=" max-h-0 overflow-hidden trnstsn" x-ref="container0" x-bind:style="opened ? 'max-height: ' + $refs.container0.scrollHeight + 'px' : ''">
        <div class="flex flex-col divide-y divide-gray-300 scrollbar overflow-auto max-h-100">
            {{ $slot }}
        </div>
    </div>
</div>

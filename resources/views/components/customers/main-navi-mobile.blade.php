<div class="flex lg:hidden">
    {{-- Mobile menu button --}}
    <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md
                         text-primary-3 hover:bg-primary-2 focus:outline-none outline-none"
            aria-controls="mobile-menu"
            aria-expanded="false" @click="mobile = true">
        <span class="sr-only">{{ __('Open main menu') }}</span>
        {{--
            Heroicon name: outline/menu
            Menu open: "hidden ", Menu closed: "block "
        --}}
        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"
             :class="{'hidden':mobile, '':!mobile}">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        {{--
          Heroicon name: outline/x
          Menu open: "block ", Menu closed: "hidden "
        --}}
        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             aria-hidden="true" :class="{'':mobile, 'hidden':!mobile}">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

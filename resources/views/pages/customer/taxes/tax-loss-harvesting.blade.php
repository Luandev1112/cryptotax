<x-app-layout>
    <x-page icon="fas-chart-area" :title="__('Tax-Loss Harvesting')" :border="false">
        <div class="pb-8 flex flex-col md:flex-row -mx-2 lg:-mx-5 space-y-10 md:space-y-0">
            <!-- Left Panel -->
            <div class="px-2 lg:px-5 md:w-3/5">
                <img src="{{asset('/examples/tax-loss-harvesting.jpg')}}" alt="Dummy" class="w-full">
            </div>

            <!-- Right Panel -->
            <div class="px-4 lg:px-5 md:w-2/5 pt-4">
                <h2 class="font-bold mb-4 text-xl">Save up to <span class="text-primary">2536.00USD</span> in taxes</h2>
                <p class="mb-2 font-bold">Get a Pro portfolio subscription to unlock <span class="text-primary">tax-loss harvesting</span>.</p>
                <ul class="my-6">
                    <li>
                        <x-icon name="fas-check-circle" class="w-4 text-primary inline absolute mt-1" />
                        <p class="ml-6 mb-4">Optimize your 2021 taxes by claming lossess</p>
                    </li>
                    <li>
                        <x-icon name="fas-check-circle" class="w-4 text-primary inline absolute mt-1" />
                        <p class="ml-6 mb-4">Offset non-crypto capital gains</p>
                    </li>
                    <li>
                        <x-icon name="fas-check-circle" class="w-4 text-primary inline absolute mt-1" />
                        <p class="ml-6 mb-4">Rollover capital lossess to future years</p>
                    </li>
                    <li>
                        <x-icon name="fas-check-circle" class="w-4 text-primary inline absolute mt-1" />
                        <p class="ml-6 mb-4">Maximize performance & build wealth</p>
                    </li>
                </ul>

                <x-jet-button class="px-6">{{ __("UPGRADE NOW") }}</x-jet-button>
            </div>
        </div>
    </x-page>
</x-app-layout>

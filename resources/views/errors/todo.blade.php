<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl text-center">Not implemented yet</h1>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl text-center mb-6">Cheat Sheet</h1>

                <div>
                    <h2 class="text-xl text-center mb-4">Buttons</h2>

                    <x-button type="submit">{{ __("Save") }}</x-button>
                    <x-button variant="danger">{{ __("Save") }}</x-button>
                    <x-button variant="success">{{ __("Save") }}</x-button>
                    <x-button size="lg">{{ __("Save") }}</x-button>
                    <x-button size="xs">{{ __("Save") }}</x-button>
                    <x-button size="xs" variant="secondary">{{ __("Save") }}</x-button>
                    <x-button size="xs" variant="secondary" type="button">{{ __("Save") }}</x-button>
                    <x-button size="xs" variant="secondary" tag="a" icon="fas-users" iconRight="true">{{ __("Save") }}</x-button>
                    <x-button icon="fas-users">Test</x-button>
                    <x-button icon="fas-users" iconRight="true">Test</x-button>
                    <x-button tag="a" class="italic" target="_blank" href="https://www.google.com">
                        Link
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

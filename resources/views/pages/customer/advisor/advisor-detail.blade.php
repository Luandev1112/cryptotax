<x-app-layout>
    @livewire('customer.advisor.advisor-detail-banner')
    <div class="bg-white">
        <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5">
            @livewire('customer.advisor.advisor-detail-about')
        </div>
    </div>
    @livewire('customer.advisor.advisor-detail-review')
</x-app-layout>
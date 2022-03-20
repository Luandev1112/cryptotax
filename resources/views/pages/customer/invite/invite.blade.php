<x-app-layout>
    <div class="bg-white">
        <div class="mx-auto xl:max-w-screen-2xl px-3 xs:px-4 lg:px-5 py-6">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-5">
                <div class="col-span-5 py-10 md:py-30">
                    <p class="text-primary  text-3xl md:text-4xl xl:text-6xl">Refer Your Friend</p>
                    <p class="text-primary mt-5  text-3xl md:text-4xl xl:text-6xl">and get rewarded</p>
                    <p class="text-base mt-4 text-primary">Invite friends to trade on mycrypto tax to get 40% off the trading  fees as commission. Once Your friend  becomes  mycrypto tax affiliate, you can enjoy second -level commission.
                    </p>
                </div>
                <div class="col-span-7 p-5">
                    <img src="{{asset('assets/img/svg/invite.svg')}}" class="w-full h-full"/>
                </div>
            </div>
        </div>
        <div id="overview" class="bg-bgcolor w-full border-t border-b">
            <div class="mx-auto xl:max-w-screen-2xl px-3 xs:px-4 lg:px-5 py-12">
                @livewire('customer.invite.invite-overview')
            </div>
        </div>
        <div class="mx-auto xl:max-w-screen-2xl px-3 xs:px-4 lg:px-5 py-6">
            @livewire('customer.invite.invite-referral')
            @livewire('customer.invite.invite-list')
        </div>
    </div>
</x-app-layout>
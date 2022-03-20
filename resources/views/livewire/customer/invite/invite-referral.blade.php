<div x-data="{'isModalOpen': false}">
    <p class="text-3xl font-semibold">Referral Link</p>
    <div class="mt-10 border py-5 px-10 bg-secondary-200 grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-6">
        <div>
            <p class="text-base font-bold">Default referral link</p>
            <div  class="mt-7 grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-6">
                <div class="col-span-5 bg-white rounded-lg py-1 text-center">
                    <p class="text-base">Default referral Code</p>
                    <div class="flex justify-center items-center space-x-5 py-2">
                        <p class="text-3xl font-bold">dQhR75</p>
                        <button><x-icon name="copy" class="w-8 h-10"/></button>
                    </div>
                    {{-- <div class="absolute bg-bgcolor1 rounded-full h-10 w-10 top-6 -left-5"/> --}}
                </div>
                <div class="col-span-7">
                    <p class="text-base">Default referral Link</p>
                    <div type='text' class="py-0 rounded-md bg-secondary-400 mt-2 flex items-center justify-between border-0">
                        <input value="https://www.mycryptotax.com/r/dQhR75" class="bg-secondary-400 focus:outline-none hover:outline-none truncate"/>
                        <button><x-icon name="copy" class="w-8 h-10"/></button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="text-base font-bold">Remark</p>
            <div class="mt-7 grid grid-cols-1 md:grid-cols-3 gap-x-0 md:gap-x-7">
                <div class="bg-white border rounded-lg h-full py-2 px-6">
                    <div class="flex items-center space-x-5">
                        <img src="{{ asset('assets/img/svg/avatar.svg') }}" class="w-11 h-11"/>
                        <p class="text-xl font-bold">40%</p>
                    </div>
                    <p class="text-sm mt-2">Your Commission rate</p>
                </div>
                <div class="bg-white border rounded-lg h-full py-2 px-6"">
                    <div class="flex items-center space-x-5">
                        <img src="{{ asset('assets/img/svg/users.svg') }}" class="w-11 h-11"/>
                        <p class="text-xl font-bold">0%</p>
                    </div>
                    <p class="text-sm mt-2">Friend's fee discount</p>
                </div>
                <button class="bg-primary hover:bg-secondary border rounded-lg h-full flex items-center space-x-3 py-2 px-6" x-on:click="isModalOpen = true">
                    <x-icon name="share" class="w-10 h-10 text-white"></x-icon>
                    <p class="font-bold text-basic text-white">SHARE NOW</p>
                </button>
                @livewire('customer.invite.invite-share-link-modal')
            </div>
        </div>
    </div>

    <div class="mt-8 border py-5 px-10 bg-bgcolor grid grid-cols-1 md:grid-cols-12 gap-x-0 md:gap-y-6">
        <div class="col-span-5">
            <div class="flex space-x-8">
                <p class="text-base font-bold">Create referral link</p>
                <x-badge type="square" variant="secondary">Available links : 28</x-badge>
            </div>
            <p class="mt-4 text-sm">Set friend's fee discount</p>
            <div class="mt-5 grid grid-cols-3 md:grid-cols-5 gap-x-5">
                <button class="text-lg focus:text-2xl border rounded-md py-2 bg-white hover:bg-primary hover:text-white hover:font-bold focus:text-white focus:bg-primary focus:font-bold">0%</button>
                <button class="text-lg focus:text-2xl border rounded-md py-2 bg-white hover:bg-primary hover:text-white hover:font-bold focus:text-white focus:bg-primary focus:font-bold">5%</button>
                <button class="text-lg focus:text-2xl border rounded-md py-2 bg-white hover:bg-primary hover:text-white hover:font-bold focus:text-white focus:bg-primary focus:font-bold">10%</button>
                <button class="text-lg focus:text-2xl border rounded-md py-2 bg-white hover:bg-primary hover:text-white hover:font-bold focus:text-white focus:bg-primary focus:font-bold">15%</button>
                <button class="text-lg focus:text-2xl border rounded-md py-2 bg-white hover:bg-primary hover:text-white hover:font-bold focus:text-white focus:bg-primary focus:font-bold">20%</button>
            </div>
            <div class="mt-7">
                <p>Your Commission rate    <span class="font-bold underline mr-5">40%</span> Friend's fee discount  <span class="font-bold underline text-secondary">0%</span></p>
            </div>
        </div>
        <div class="col-span-7 flex justify-end">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-x-0 xl:gap-x-6 my-auto">
                <div class="col-span-2">
                    <p class="text-bold">Remarks</p>
                    <input class="mt-3 py-4 px-6 rounded-md w-full" value="0-40 Characters"/>
                    <div class="mt-4 relative flex items-start">
                        <div class="flex items-center h-5">
                            <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded-sm">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="comments" class="font-medium text-gray-700">Set as default link</label>
                        </div>
                    </div>
                </div>
                <div class="py-5 flex justify-end col-span-1">
                    <button class="bg-secondary hover:bg-primary w-full px-8 py-6 flex items-center rounded-lg my-auto">
                        <x-icon name="masic" class="w-10 h-10 text-white"></x-icon>
                        <p class="font-bold text-basic text-white ml-3">CREATE NOW</p>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 overflow-auto">
        <table class="w-full min-w-clg text-center border">
            <thead class="bg-bgcolor">
                <tr>
                    <th class="py-6">Referral code</th>
                    <th>Your commission rate/Friend's fee discount</th>
                    <th>Total Invitee</th>
                    <th>Avg.Commission (USDT)</th>
                    <th class="text-left">Remarks</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-6">QBSSSSPLB</td>
                    <td>30% / 10%</td>
                    <td>0</td>
                    <td>0</td>
                    <td><x-icon name="edit" class="w-4 h-4 text-secondary"/></td>
                    <td class="text-secondary">Set as Default</td>
                </tr>
                <tr>
                    <td class="py-6">
                        <div class="flex justify-center items-center space-x-3">
                            <p>dQhR75</p>
                            <x-badge variant="secondary" type="square">Default</x-badge>
                        </div>
                    </td>
                    <td>30% / 10%</td>
                    <td>122</td>
                    <td>0</td>
                    <td><x-icon name="edit" class="w-4 h-4 text-secondary"/></td>
                    <td class="text-secondary">Set as Default</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

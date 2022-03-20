<div 
    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"  
    x-show="isModalOpen"
    x-on:click.away="isModalOpen = false"
    x-cloak
    x-transition
>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="block sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-0 pt-5 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="flex justify-end px-4">
                    <button x-on:click="isModalOpen = false">
                        <x-icon name='fas-times-circle' class="w-4 h-4 text-gray-600"/>
                    </button>
                </div>
                <div class="text-center px-4">
                    <p class="text-lg font-bold">Find the next Crypto gem on Mycrypto tax</p>
                    <p class="text-xs mt-5">For every <span class="text-secondary font-bold">4 Crypto holders</span> in the world<br/> there's 1 from Mycryptotax Cryptocurrency exchange</p>
                    <img src="{{ asset('assets/img/svg/invite_share.svg') }}" class="w-full px-4"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-7 mt-9 px-4 gap-x-0 md:gap-x-4 items-end">
                    <div class="col-span-2 relative">
                        <div class="block md:absolute  -bottom-20 left-5">
                            <div class="bg-white flex justify-center items-center p-5 rounded-xl">
                                <img src="{{ asset('assets/img/svg/qr_code.svg') }}"/>
                            </div>
                            <p class="text-primary md:text-white text-center font-bold mt-3">SHARE NOW</p>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <p class="text-sm">Default referral Link</p>
                        <div class="flex items-center rounded-md bg-secondary-300 px-3">
                            <input type="text" class="border-0 focus:outline-none focus:ring-0 py-3 bg-secondary-300 rounded-md text-sm w-full truncate" value="https://www.mycryptotax.com/r/dQhR75"/>
                            <button>
                                <x-icon name="copy" class="w-6 h-10"/>
                            </button>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <x-button class="w-full">
                            <x-icon name="download" class="w-8 h-8 text-primary"/>
                            <p class="text-sm ml-2">Download now</p>
                        </x-button>
                    </div>
                </div>
                <div class="bg-primary py-9 flex justify-center space-x-4 mt-5 flex-wrap">
                   <x-icon name="facebook" class="my-2"/>
                   <x-icon name="twitter" class="my-2"/>
                   <x-icon name="youtube" class="my-2"/>
                   <x-icon name="instagram" class="my-2"/>
                   <x-icon name="linkedin" class="my-2"/>
                   <x-icon name="whatsapp" class="my-2"/>
                   <x-icon name="telegram" class="my-2"/>
                   <x-icon name="line" class="my-2"/>
                </div>
            </div>
        </div>
    </div>
</div>

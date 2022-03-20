<footer class="bg-primary pt-10 md:pt-20">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <x-container>
        <div class="flex flex-col lg:flex-row">
            <!-- Footer Intro section -->
            <div class="lg:w-1/3 space-y-4 lg:space-y-10 pr-5 xl:pr-20 items-center lg:items-start flex justify-center lg:justify-start flex-col text-center lg:text-left">
                <div class="flex-shrink-0 ">
                    <a href="{{ route("customer.dashboard") }}" class="flex items-center text-white group">
                        <img src="{{asset('/assets/img/logo.svg')}}" alt="Logo" class="w-9">
                        <span class="ml-2 text-xl font-bold">myCrypto Tax</span>
                    </a>
                </div>

                <p class="text-white text-opacity-30 text-sm sm:text-base leading-loose">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, quos!
                </p>
            </div>
            <!-- Footer Menus -->
            <div class="grid grid-cols-2 gap-2 xl:gap-8 lg:w-3/4 mt-8 lg:mt-0">
                <div class="md:grid md:grid-cols-2 gap-2 xl:gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-white tracking-wider space-y-2">
                            <span>About</span>
                            <hr class="w-7 h-1 border-blue-500">
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    About us
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Help Center
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-lg font-semibold text-white tracking-wider space-y-2">
                            <span>Product</span>
                            <hr class="w-7 h-1 border-blue-500">
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Compare
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('pricing') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Pricing
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('faqs') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 gap-2 xl:gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-white tracking-wider space-y-2">
                            <span>Legal</span>
                            <hr class="w-7 h-1 border-blue-500">
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Imprint 
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('terms') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Terms of Service
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('policy') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Privacy Polity
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Risk and Disclaimer
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-lg font-semibold text-white tracking-wider space-y-2">
                            <span>Other</span>
                            <hr class="w-7 h-1 border-blue-500">
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="javascript:void(0)" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Tax Advisor
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('affiliate') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Affiliate Partner 
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('blog') }}" class="text-sm sm:text-base text-white text-opacity-30 hover:text-opacity-100">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <p class="py-8 text-md text-white text-opacity-10 md:mt-0 md:order-1 text-center">
                Copyright &copy; CryptoTax Inc. Designed & Developed by <a href="http://bsbv.net" target="_blank" class="text-primary-200 hover:text-white"> BSBV Inc</a>.
            </p>
        </div>
    </x-container>
</footer>
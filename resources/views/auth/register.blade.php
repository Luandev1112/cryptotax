<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-30 px-3">
            <div class="py-10">
                <img src="{{asset('assets/img/svg/password.svg')}}" class="w-full"/>
                <div class="mt-10 space-y-4">
                    <div class="flex">
                        <div class="w-4 h-4 mr-3">
                            <x-icon name="check" class="w-4 h-4"/>
                        </div>
                        <p>{{ __('Super fast and easy to connect with your exchanges and wallets.') }}</p>
                    </div>
                    <div class="flex">
                        <div class="w-4 h-4 mr-3">
                            <x-icon name="check" class="w-4 h-4"/>
                        </div>
                        <p>{{ __('Over 300+ exchanges, 3000+ tokens, and 30+ blockchains supported for importing transactions, the most of any crypto tax software!') }}</p>
                    </div>
                    <div class="inline-flex">
                        <div class="w-4 h-4 mr-3">
                            <x-icon name="check" class="w-4 h-4"/>
                        </div>
                        <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu') }}</p>
                    </div>
                </div>
                <x-button tag="a" href="{{route('login')}}" size="md" class="font-bold justify-center mt-6 py-5">{{ __('Already registered?  Log In') }}</x-button>
            </div>
            <div>
                <div class="flex justify-center">
                    <x-jet-authentication-card-logo />
                </div>
                <h1 class="text-3xl font-extrabold mt-5">{{ __('Sign Up') }}</h1>
                <p class="py-4 text-lg font-bold">{{ __('Free sign up') }}</p>
                <div class="grid grid-cols-2 gap-x-3">
                    <x-social-auth-item  size="md" name="google" icon="google-circle">{{ __("Signup with Google") }}</x-social-auth-item>
                    <x-social-auth-item  size="md" name="facebook" icon="facebook-circle">{{ __("Signup with Facebook") }}</x-social-auth-item>
                </div>
                <div class="my-7 flex">
                    <div class="mx-auto w-12 h-12 bg-primary rounded-full text-white text-lg font-bold flex justify-center items-center">
                        <p>OR</p>
                    </div>
                </div>
                <x-jet-validation-errors class="mb-2" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4 relative" x-data="{ishide: true}">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password" x-bind:type="ishide?'password':'text'"/>
                        <button class="absolute top-10 right-3" type="button" x-on:click="ishide=!ishide">
                            <x-icon name="fas-eye" class="w-8 text-gray-400" x-show="ishide"/>
                            <x-icon name="fas-eye-slash" class="w-8 text-gray-400" x-show="!ishide"/>
                        </button>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="data_center" value="{{ __('Data Location') }}" />
                        <select name="data_center" id="data_center" class="border border-gray-300 py-4 w-full rounded-sm shadow-md mt-1">
                            <option value="2">{{__("United States")}}</option>
                            <option value="1">{{__('Europe')}}</option>
                        </select>
                    </div>
                    <label for="email_update" class="flex items-center my-10">
                        <x-jet-checkbox id="email_update" name="email_receive" value="1" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('I agree to receive email updates from myCryptoTax') }}</span>
                    </label>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                    <x-jet-button class="w-full text-lg font-bold flex justify-center">
                        {{ __('SIGN UP') }}
                    </x-jet-button>
                </form>
            </div>
        </div>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

    </x-jet-authentication-card>
</x-guest-layout>

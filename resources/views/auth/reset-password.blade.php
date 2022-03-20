<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-30 px-3 py-5">
            <div>
                <img src="{{ asset('assets/img/svg/reset_password.svg') }}" class="w-auto h-auto"/>
            </div>
            <div>
                <x-jet-authentication-card-logo />
                <x-jet-validation-errors class="mb-4" />
                <h2 class="text-3xl font-extrabold my-6">{{ __('Reset Password') }}</h2>
                <p class="mb-6">{{ __('Please choose your new password must be different from previous used passwords') }}</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
        
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                    <div class="block">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            {{ __('Reset Password') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>

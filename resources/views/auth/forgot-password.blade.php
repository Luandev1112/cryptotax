<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-30 px-3 py-5">
            <div>
                <img src="{{ asset('assets/img/svg/forgot_password.svg') }}" class="w-auto h-auto"/>
            </div>
            <div class="flex">
                <div class="m-auto">
                    <x-jet-authentication-card-logo />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-jet-validation-errors class="mb-4" />
                    <h2 class="text-3xl font-extrabold my-6">{{ __('Forgot Password?') }}</h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <div class="block">
                            <x-jet-label for="email" value="{{ __('Enter the email address you used to register with myCrypto Tax') }}" />
                            <x-jet-input id="email" class="block mt-3 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="flex items-center justify-start mt-6">
                            <x-jet-button>
                                {{ __('Send me Instructions') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>

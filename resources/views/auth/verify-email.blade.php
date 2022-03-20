<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div  class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-30 px-3 py-5">
            <div>
                <img src="{{ asset('assets/img/svg/email_verify.svg') }}" class="w-auto h-auto"/>
            </div>
            <div class="flex">
                <div class="m-auto">
                    <x-jet-authentication-card-logo />
                    <h2 class="text-3xl font-extrabold my-6">{{ __('Thank you for your Registration') }}</h2>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('We have send you an confirmation email to ' . auth()->user()->email . '. please confirm your email address to active your account.') }}
                    </div>
            
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
            
                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
            
                            <div>
                                <x-jet-button type="submit">
                                    {{ __('Resend confirmation mail') }}
                                </x-jet-button>
                            </div>
                        </form>
            
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
            
                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

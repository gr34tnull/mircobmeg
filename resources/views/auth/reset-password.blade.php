<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" placeholder="{{ __('Email') }}" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

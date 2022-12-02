<x-guest-layout>

    @php
    $action = isset($guard) ? url($guard.'/login') : route('login');
    @endphp

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ $action }}">
            @csrf

            {{-- <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div> --}}

            <div>
                <x-jet-label for="identity" value="{{ __('Document ID or Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="identity" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-jet-button class="hover:bg-blue-700" style="background-color: #003876;">
                    {{ __('Log in') }}
                </x-jet-button>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('register'))
                    <span class="text-sm text-gray-600">{{ __('Don\'t have an account yet?') }}</span>
                    &nbsp;
                    <a class="underline text-sm color-primary font-semibold hover:text-blue-900" href="{{ route('register') }}">
                         {{ __('Sign Up') }}
                    </a>
                @endif
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>

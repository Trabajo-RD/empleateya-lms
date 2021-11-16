<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register', app()->getLocale() ) }}">
            @csrf

            <div>
                <x-jet-label for="document_type" value="{{ __('Document type') }}" />
                <select name="document_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="CED">{{ __('Identification_Card') }}</option>
                    <option value="PAS" @if (old('document_type') == "PAS") selected @endif >{{ __('Passport') }}</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="document_id" value="{{ __('Document ID') }}" />
                <x-jet-input id="document_id" class="block mt-1 w-full" type="text" name="document_id" :value="old('document_id')" required autofocus autocomplete="document_id" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Firstname') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <select name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="M">{{ __('Male') }}</option>
                    <option value="F" @if (old('document_type') == "F") selected @endif >{{ __('Female') }}</option>
                    <option value="O" @if (old('document_type') == "O") selected @endif >{{ __('Other') }}</option>
                    <option value="NS" @if (old('document_type') == "NS") selected @endif >{{ __('Not Specified') }}</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <p class="text-xs text-gray-500">{{ __('In order to contact you and receive notifications about courses, workshops and other offers, it will be necessary to register your email') }}</p>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show', app()->getLocale() ).'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show', app()->getLocale() ).'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login', app()->getLocale() ) }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4 bg-blue-600 hover:bg-blue-700">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

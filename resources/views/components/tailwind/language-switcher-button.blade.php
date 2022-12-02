{{-- language switcher text --}}

<x-jet-dropdown align="left" width="48">
    <x-slot name="trigger">
        <a class="btn text-sm text-gray-400 border-2 border-gray-400 hover:text-gray-100 hover:border-gray-100 font-bold rounded focus:outline-none cursor-pointer">

            <!-- flag icon -->
            <img class="inline mr-1" style="max-width: 21px;" src="{{ asset('images/flags/1x1/' . (LaravelLocalization::getCurrentLocale() === 'en' ? 'us' : LaravelLocalization::getCurrentLocale() ) . '.svg') }}">

                <!-- current locale name -->
                <span class="hidden ml-1 sm:hidden lg:inline">
                    {{ __(LaravelLocalization::getCurrentLocaleName()) }}
                </span>
        </a>
    </x-slot>
    <x-slot name="content">


            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <x-jet-dropdown-link href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img class="inline mr-1" style="max-width: 21px;" src="{{ asset('images/flags/1x1/' . ($localeCode === 'en' ? 'us' : $localeCode ) . '.svg') }}">
                    {{ __($properties['native']) }}
                </x-jet-dropdown-link>

            @endforeach


    </x-slot>
</x-jet-dropdown>


{{-- language switcher --}}

<x-jet-dropdown width="60 text-gray-500">
    <x-slot name="trigger">
        <a class="nav-link text-gray-500 hidden sm:hidden lg:inline-flex mr-5" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

            <!-- flag icon -->
            <img class="inline mr-1" style="max-width: 21px;" src="{{ asset('images/flags/1x1/' . (LaravelLocalization::getCurrentLocale() === 'en' ? 'us' : LaravelLocalization::getCurrentLocale() ) . '.svg') }}">

                <!-- current locale key -->
                <span class="hidden ml-1 sm:hidden lg:inline">
                    {{ strtoupper(LaravelLocalization::getCurrentLocale()) }}
                </span>

        </a>
    </x-slot>
    <x-slot name="content">
        <div class="w-40 hidden md:inline-block">

            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <x-jet-dropdown-link href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img class="inline mr-1" style="max-width: 21px;" src="{{ asset('images/flags/1x1/' . ($localeCode === 'en' ? 'us' : $localeCode ) . '.svg') }}">
                    {{ __($properties['native']) }}
                </x-jet-dropdown-link>

            @endforeach

        </div>
    </x-slot>
</x-jet-dropdown>


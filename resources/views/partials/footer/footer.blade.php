 <!-- Page Footer -->
 <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex justify-center">
    <img class="h-24 w-auto" src="{{ asset('images/home/footer/rd-trabaja_footer.svg') }}">
 </div>

 <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">

        <!-- About website column  -->
        <div class="col-span-2 sm:col-span-2 md:col-span-3 lg:col-span-2">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ str_replace('i', 'í', config('app.name')) }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    El Ministerio de Trabajo desarrolla el programa RD-Trabaja, compuesto por un sistema de capacitación para el empleo conforme a las necesidades de todos los sectores económicos del país.
                </li>
            </ul>
        </div>

        <!-- Navigation columns -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 ">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Navigations') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    <a target="_top" href="{{ route('home', app()->getLocale() ) }}" class="text-sm hover:text-gray-100">{{ __('Home') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('courses.index', app()->getLocale() ) }}" class="text-sm hover:text-gray-100">{{ __('Courses') }}</a>
                </li>
                {{-- <li class="mt-1">
                    <a target="_top" href="" class="text-sm hover:text-gray-100">{{ __('Another') }}</a>
                </li> --}}
            </ul>
        </div>

        <!-- Pages colums -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 ">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Pages') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    <a target="_top" href="{{ route('pages.about', app()->getLocale()) }}" class="text-sm hover:text-gray-100">{{ __('About us') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{route('contact-us', app()->getLocale()) }}" class="text-sm hover:text-gray-100">{{ __('Contact us') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('pages.glosary', app()->getLocale()) }}" class="text-sm hover:text-gray-100">{{ __('Glossary of terms') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('terms.show', app()->getLocale() ) }}" class="text-sm hover:text-gray-100">{{ __('Terms of Service') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('policy.show', app()->getLocale() ) }}" class="text-sm hover:text-gray-100">{{ __('Privacy Policy') }}</a>
                </li>
            </ul>
        </div>



        <!-- Follow us column -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Follow us') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">

                <li class="grid justify-items-center sm:justify-items-start">
                    @livewire('link.social-media')
                </li>
                <li class="mt-6">


                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="btn text-sm text-gray-400 border-2 border-gray-400 hover:text-gray-100 hover:border-gray-100 font-bold rounded focus:outline-none">
                                <i class="fas fa-globe mr-2"></i>{{ (app()->getLocale() == 'es') ? 'Español' : 'English' }}
                            </button>

                        </x-slot>

                        <x-slot name="content">

                            <x-jet-dropdown-link href="{{ route('set.locale', 'es' ) }}">
                                {{ __('Spanish') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('set.locale', 'en' ) }}">
                                {{ __('English') }}
                            </x-jet-dropdown-link>

                        </x-slot>
                    </x-jet-dropdown>


                    {{-- <select>

                        <option value="es" {{ Route::currentRouteName() == 'es' ? 'selected ' : ' ' }}>
                            <a href="{{  route('set.locale', 'es') }}" class="btn text-sm text-white border-2 border-white font-bold rounded">
                                <i class="fas fa-globe mr-2"></i>
                                {{ __('Spanish') }}
                            </a>
                        </option>
                        <option value="en" {{ Route::currentRouteName() == 'en' ? 'selected ' : ' ' }}>
                            <a href="{{  route('set.locale', 'en') }}" class="btn text-sm text-white border-2 border-white font-bold rounded">
                                <i class="fas fa-globe mr-2"></i>
                                {{ __('English') }}
                            </a>
                        </option>

                      </select> --}}

                      {{-- Route::currentRouteName(), 'en' --}}

                    {{-- <a href="{{  route('set.locale', 'en') }}" class="btn text-sm text-white border-2 border-white font-bold rounded">
                        <i class="fas fa-globe mr-2"></i>
                        Español
                    </a> --}}
                </li>
            </ul>
        </div>
    </div>


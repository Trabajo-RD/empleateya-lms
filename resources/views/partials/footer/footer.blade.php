 <!-- Page Footer -->

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">

        <div class="col-span-2">
            <ul>
                <li>
                    <h3 class="font-bold text-white">CAPACITATE</h3>
                    <p class="text-white">{{ __('Learning Management System') }}</p>
                </li>
                <li>
                    @livewire('link.social-media')
                </li>
                <li class="mt-6">


                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="btn text-sm text-white border-2 border-white font-bold rounded focus:outline-none">
                                <i class="fas fa-global mr-2"></i>{{ (app()->getLocale() == 'es') ? 'Español' : 'English' }}
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
        <div class="col-span-1">
            <ul>
                <li>
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">{{ __('About us') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">{{ __('Contact') }}</a>',
                </li>
                <li class="mt-1">
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">{{ __('Glossary of terms') }}</a>',
                </li>
            </ul>
        </div>
        <div class="col-span-1">
            <ul>
                <li>
                    <a target="_top" href="{{ route('terms.show', app()->getLocale() ) }}" class="text-sm text-gray-200 hover:text-gray-100">{{ __('Terms of Service') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('policy.show', app()->getLocale() ) }}" class="text-sm text-gray-200 hover:text-gray-100">{{ __('Privacy Policy') }}</a>',
                </li>
            </ul>
        </div>
        <div class="col-span-1">
            <ul>
                <li>
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">{{ __('Course catalog') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">Destacados</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="" class="text-sm text-gray-200 hover:text-gray-100">Cursos presenciales</a>',
                </li>
            </ul>
        </div>
    </div>


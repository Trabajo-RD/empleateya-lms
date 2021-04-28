@php

    $nav_links = [
        [
            'name' => 'Home',
            'route' => route('home', app()->getLocale()), // routes/web.php dashboard route
            'active' => request()->routeIs('home') // bool: verify is active route dashboard
        ],
        // [
        //     'name' => 'Courses',
        //     'route' => route('courses.index', app()->getLocale()), // routes/web.php dashboard route
        //     'active' => request()->routeIs('courses.*'), // bool: verify is active route dashboard
        // ],
        // [
        //     'name' => 'Categories',
        //     'route' => route('courses.category', [app()->getLocale(), $category]), // routes/web.php dashboard route
        //     'active' => request()->routeIs('courses.*'), // bool: verify is active route dashboard
        // ],
    ];

@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home', app()->getLocale()) }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center">

                    {{-- @foreach ($nav_links as $nav_link)
                        <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']" class="items-center px-1 pt-1 text-md font-medium leading-5 hover:text-gray-700 block py-2 text-gray-500">

                            {{ __($nav_link['name']) }}

                        </x-jet-nav-link>
                    @endforeach --}}

                    <x-jet-nav-link href="{{ route('home', [app()->getLocale()] ) }}" :active="request()->routeIs('home')" class="hidden md:inline-block">
                        <i class="fas fa-home mr-2"></i>{{ __('Home') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('courses.index', [app()->getLocale()] ) }}" :active="request()->routeIs('home')" class="hidden md:inline-block">
                        <i class="fas fa-laptop mr-2"></i>{{ __('Courses') }}
                    </x-jet-nav-link>

                    <x-jet-dropdown align="left" width="60" :active="request()->routeIs('courses.modality.*')">
                        <x-slot name="trigger">
                            <a class="nav-link text-gray-500" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-laptop-house  mr-2"></i>{{ __('Modalities') }}
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <div class="w-80">
                                @if(count($modalities))
                                    @foreach($modalities as $modality)
                                    <x-jet-dropdown-link href="{{ route('courses.modality', [app()->getLocale(), $modality] ) }}" :active="request()->routeIs('courses.modality.*')">
                                        {{ __($modality->name) }}
                                    </x-jet-dropdown-link>
                                    @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-jet-dropdown>

                    <x-jet-dropdown align="left" width="60" :active="request()->routeIs('courses.category.*')">
                        <x-slot name="trigger">
                            <a class="nav-link text-gray-500" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tags mr-2"></i>{{ __('Categories') }}
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <div class="w-80">
                                @if(count($categories))
                                    @foreach($categories as $category)
                                    <x-jet-dropdown-link href="{{ route('courses.category', [app()->getLocale(), $category] ) }}" :active="request()->routeIs('courses.category.*')">
                                        {{ __($category->name) }}
                                    </x-jet-dropdown-link>
                                    @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-jet-dropdown>

                    {{-- TODO: Link Dashboard --}}
                    {{-- <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link> --}}


                    <!-- TODO: Admin menu items -->
                    {{-- @foreach ($menuItems as $item)
                        <x-jet-nav-link href="{{ route($item->link) }}">
                            {{ $item->name }}
                        </x-jet-nav-link>
                    @endforeach --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Right Side Of Navbar -->
                {{-- <ul class="navbar-nav ml-auto">
                    @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                            href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </ul> --}}

                @if(count(config('app.languages')) > 1)
                    <x-jet-dropdown width="60 text-gray-500">
                                <x-slot name="trigger">
                                    <a class="nav-link text-gray-500 hidden md:inline-block" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-globe mr-2"></i>{{ strtoupper(app()->getLocale()) }}
                                    </a>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-40 hidden md:inline-block">
                                        @foreach(config('app.languages') as $langLocale => $langName)
                                        <x-jet-dropdown-link href="{{ route('set.locale', $langLocale) }}">
                                            {{ $langName }}
                                        </x-jet-dropdown-link>
                                            {{-- <a class="dropdown-item px-4 py-24" href="{{ route('set.locale', $langLocale) }}">{{ $langName }}</a><br> --}}
                                            {{-- <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a> --}}
                                        @endforeach
                                    </div>
                                </x-slot>
                    </x-jet-dropdown>
                @endif

                @auth
                    <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->current_team_id)
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
                @endauth

                <!-- Settings Dropdown -->
                <div class="ml-3 relative flex items-center">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show', app()->getLocale() ) }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @can ('LMS Ver Dashboard')
                                    <x-jet-dropdown-link href="{{ route('admin.cpanel', app()->getLocale() ) }}">
                                        {{ __('Administrator') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <!-- TODO: Create permission LMS Crear contenido -->
                                @can ('LMS Crear contenido')
                                    <x-jet-dropdown-link href="{{ route('creator.courses.index', app()->getLocale() ) }}">
                                        {{ __('Manage Courses') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <!-- TODO: Create permission LMS Crear contenido -->
                                @can ('LMS Administrar ajustes')
                                    <x-jet-dropdown-link href="{{ route('creator.dashboard', app()->getLocale()) }}">
                                        {{ __('Settings') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can ('LMS Calificar item')
                                    <x-jet-dropdown-link href="{{ route('instructor.courses.index', app()->getLocale() ) }}">
                                        {{ __('Instructor') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout', app()->getLocale() ) }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout', app()->getLocale() ) }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <a href="{{ route('login', app()->getLocale() ) }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-gray-400 hover:border-gray-600 rounded-md shadow-sm text-base font-medium text-gray-400 hover:text-gray-600 bg-white-100 hover:bg-gray-100">{{ __('Sign In') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register', app()->getLocale() ) }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
                <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    {{ $nav_link['name'] }}
                </x-jet-responsive-nav-link>
            @endforeach
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-dropdown width="60" align="left">
                <x-slot name="trigger">
                    <a class="nav-link text-gray-500 ml-4 flex justify-left items-center" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ __('Modalities') }}
                        <i class="fas fa-caret-down ml-4"></i>
                    </a>
                </x-slot>
                <x-slot name="content">
                    <div class="w-64 bg-gray-100">
                        @if(count($modalities))
                            @foreach($modalities as $modality)
                            <x-jet-dropdown-link href="{{ route('courses.modality', [app()->getLocale(), $modality] ) }}" :active="request()->routeIs('courses.modality.*')">
                                {{ __($modality->name) }}
                            </x-jet-dropdown-link>
                            @endforeach
                        @endif
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-dropdown width="60" align="left">
                <x-slot name="trigger">
                    <a class="nav-link text-gray-500 ml-4 flex justify-left items-center" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ __('Categories') }}
                        <i class="fas fa-caret-down ml-4"></i>
                    </a>
                </x-slot>
                <x-slot name="content">
                    <div class="w-64 bg-gray-100">
                        @if(count($categories))
                            @foreach($categories as $category)
                            <x-jet-dropdown-link href="{{ route('courses.category', [app()->getLocale(), $category] ) }}" :active="request()->routeIs('courses.category.*')">
                                {{ __($category->name) }}
                            </x-jet-dropdown-link>
                            @endforeach
                        @endif
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>


        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show', app()->getLocale() ) }}" :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </x-jet-responsive-nav-link>

                    @can('LMS Ver Dashboard')
                        <x-jet-responsive-nav-link href="{{ route('admin.cpanel', app()->getLocale() ) }}" :active="request()->routeIs('admin.cpanel', app()->getLocale() )">
                            {{ __('Administrador') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <!-- TODO: Create permission LMS Crear contenido -->
                    @can('LMS Crear contenido')
                        <x-jet-responsive-nav-link href="{{ route('creator.courses.index', app()->getLocale()) }}" :active="request()->routeIs('creator.courses.index', app()->getLocale())">
                            {{ __('Administrar cursos') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    @can('LMS Calificar item')
                        <x-jet-responsive-nav-link href="{{ route('instructor.courses.index', app()->getLocale() ) }}" :active="request()->routeIs('instructor.courses.index', app()->getLocale())">
                            {{ __('Instructor') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout', app()->getLocale() ) }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout', app()->getLocale() ) }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Auth::check() && Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->current_team_id)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @else
            <div class="py-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login', app()->getLocale() ) }}" :active="request()->routeIs('login')">
                    Login
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register', app()->getLocale() ) }}" :active="request()->routeIs('register')">
                    Register
                </x-jet-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>

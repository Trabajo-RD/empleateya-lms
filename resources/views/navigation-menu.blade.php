@php
    /**
     * Navigation links
     */
    $nav_links = [
        [
            'name' => 'Home',
            'route' => route('home'), // routes/web.php dashboard route
            'active' => request()->routeIs('home'), // bool: verify is active route dashboard
            'icon' => 'fas fa-home'
        ],
        [
            'name' => 'Categories',
            'route' => '#!', // routes/web.php dashboard route
            'active' => request()->routeIs('courses.categories.*'), // bool: verify is active route dashboard
            'icon' => 'fas fa-tags'
        ],
        [
            'name' => 'Catalog',
            'route' => route('courses.index'), // routes/web.php dashboard route
            'active' => request()->routeIs('courses.*'), // bool: verify is active route dashboard
            'icon' => 'fas fa-laptop'
        ],
        [
            'name' => 'Workshops',
            'route' => route('workshops.index'), // routes/web.php dashboard route
            'active' => request()->routeIs('workshops.*'), // bool: verify is active route dashboard
            'icon' => 'fas fa-chalkboard-teacher'
        ],
        [
            'name' => 'Paths',
            'route' => route('learning-paths.index'), // routes/web.php dashboard route
            'active' => request()->routeIs('learning-paths.*'), // bool: verify is active route dashboard
            'icon' => 'fas fa-map-marked-alt'
        ],
        [
            'name' => 'My Learning',
            'route' => route('student.courses.index'), // routes/web.php dashboard route
            'active' => request()->routeIs('student.courses.*'), // bool: verify is active route dashboard
            'icon' => 'fas fa-chalkboard'
        ],
        // [
        //     'name' => 'Modalities',
        //     'route' => '#!', // routes/web.php dashboard route
        //     'active' => request()->routeIs('courses.modalities.*'), // bool: verify is active route dashboard
        //     'icon' => 'fas fa-laptop-house'
        // ],

    ];

@endphp

<nav x-data="{ open: false }" class="w-full mx-auto grid grid-cols-12 gap-6 px-10 md:px-16 bg-white border-b border-gray-100 z-50 shadow">

    <!-- Primary Navigation Menu -->
    <div class="w-full col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12 2xl:col-span-12 mx-auto">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div> --}}

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center divide-x">
                    <a href="https://mt.gob.do/">
                        <x-jet-application-logo class="block h-9 w-auto" />
                    </a>
                    <a href="{{ route('home') }}" class="pl-2 pt-3">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex items-center">

                    {{-- @foreach ($nav_links as $nav_link)
                        <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']" class="items-center px-1 pt-1 text-md font-medium leading-5 hover:text-gray-700 block py-2 text-gray-500">

                            {{ __($nav_link['name']) }}

                        </x-jet-nav-link>
                    @endforeach --}}

                    <!-- Home -->

                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home') ? 'active' : '' " class="hidden sm:hidden md:inline-block">
                        {{-- <i class="fas fa-home mr-2"></i> --}}
                        <span class="hidden sm:hidden lg:inline-block">{{ __('Home') }}</span>
                    </x-jet-nav-link>

                    <!-- Categories nav links -->

                    <x-tailwind.navs.mega-menu text="link" align="center" width="max" :active="request()->routeIs('categories.*') ? 'active' : '' ">
                        <x-slot name="trigger">

                                {{ __('Categories') }}

                                <svg  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                </svg>

                        </x-slot>

                        <x-slot name="content">
                            <div class="px-6 lg:px-8 py-5">
                                <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-6">
                                  {{-- <div class="bg-white text-gray-600"> --}}

                                    @if(isset($categories_list))
                                        @for($i = 0; $i < 30; $i++)
                                            @if($i % 8 === 0)
                                                <div class="bg-white text-gray-600">
                                                    {{-- {{ count($categories) }} --}}
                                                    @for($j = $i; $j < $i+8; $j++)
                                                        @if($j >= 30)
                                                            @break
                                                        @endif
                                                        <a href="{{ route('categories.show', $categories_list[$j]) }}" aria-current="{{ request()->routeIs('categories.*') }}" class="flex items-center justify-between px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">
                                                        {{-- <a href="{{ route('courses.category', ['category' => $categories[$j]] ) }}" aria-current="{{ request()->routeIs('courses.category.*') }}" class="flex items-center justify-between px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out"> --}}
                                                            {{ __($categories_list[$j]->name) }}

                                                            {{-- @if(count($categories[$j]->publishedCourses) <= 99)
                                                            <x-tailwind.badges.inline-badge color="gray" class="ml-1">
                                                                    {{ count($categories[$j]->publishedCourses) }}
                                                            </x-tailwind.badges.inline-badge>
                                                            @else
                                                                <x-tailwind.badges.inline-badge color="gray" class="ml-1">
                                                                        {{ __('99+') }}
                                                                </x-tailwind.badges.inline-badge>
                                                            @endif --}}
                                                        </a>
                                                    @endfor
                                                </div>
                                            @endif
                                      @endfor
                                    @endif
                                </div>
                                <div class="flex justify-end">
                                    <x-tailwind.links.view-all-link link="{{ route('categories.index') }}" text="Show all categories"/>
                                  </div>
                              </div>
                        </x-slot>
                    </x-tailwind.navs.mega-menu>


                    <!-- Courses catalog nav link -->

                    <x-jet-nav-link href="{{ route('courses.index' ) }}" :active="routeIsActive('courses.*')" class="hidden sm:hidden md:inline-block">
                        {{-- <i class="fas fa-laptop mr-2"></i> --}}
                        <span class="hidden sm:hidden lg:inline-block">{{ __('Catalog') }}</span>
                    </x-jet-nav-link>

                    <!-- Workshops nav link -->

                    <x-jet-nav-link href="{{ route('workshops.index') }}" :active="routeIsActive('workshops.*')" class="hidden sm:hidden md:inline-block">
                        {{-- <i class="fas fa-chalkboard-teacher mr-2"></i> --}}
                        <span class="hidden sm:hidden lg:inline-block">{{ __('Workshops') }}</span>
                    </x-jet-nav-link>

                    <!-- Learning Paths nav link -->

                    <x-jet-nav-link href="{{ route('learning-paths.index') }}" :active="routeIsActive('learning-paths.*')" class="hidden sm:hidden md:inline-block">
                        {{-- <i class="fas fa-chalkboard-teacher mr-2"></i> --}}
                        <span class="hidden sm:hidden lg:inline-block">{{ __('Paths') }}</span>
                    </x-jet-nav-link>

                    <!-- Student Courses -->

                    @auth
                        <x-jet-nav-link href="{{ route('student.courses.index') }}" :active="routeIsActive('student.courses.*')" class="hidden sm:hidden md:inline-block">
                            {{-- <i class="fas fa-chalkboard-teacher mr-2"></i> --}}
                            <span class="hidden sm:hidden lg:inline-block">{{ __('My Learning') }}</span>
                        </x-jet-nav-link>
                    @endauth

                    <!-- Modalities nav link -->

                    {{-- <x-jet-dropdown align="left" width="60" :active="request()->routeIs('courses.modality.*')">
                        <x-slot name="trigger">
                            <a class="nav-link text-gray-500 hidden sm:hidden md:inline-block" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="hidden sm:hidden lg:inline-block">{{ __('Modalities') }}</span>
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <div class="w-80">
                                @if(count($modalities))
                                    @foreach($modalities as $modality)
                                    <x-jet-dropdown-link href="{{ route('courses.modality.show', ['modality' => $modality] ) }}" :active="request()->routeIs('courses.modality.*')">
                                        {{ __($modality->name) }}
                                    </x-jet-dropdown-link>
                                    @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-jet-dropdown> --}}



                    {{-- <x-jet-dropdown align="left" width="60" :active="request()->routeIs('courses.category.*')">
                        <x-slot name="trigger">
                            <a class="nav-link text-gray-500 hidden sm:hidden md:inline-block" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tags mr-2"></i><span class="hidden sm:hidden lg:inline-block">{{ __('Categories') }}</span>
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <div class="w-80">
                                @if(count($categories))
                                    @foreach($categories as $category)
                                    <x-jet-dropdown-link href="{{ route('courses.category', ['category' => $category] ) }}" :active="request()->routeIs('courses.category.*')">
                                        {{ __($category->name) }}
                                    </x-jet-dropdown-link>
                                    @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-jet-dropdown> --}}

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



                {{-- @auth
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
                @endauth --}}

                <!-- Settings Dropdown -->
                <div class="ml-3 relative flex items-center">

                    <!-- language switcher type "icon" or "text" -->

                    <x-tailwind.language-switcher />

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
                                            {{-- TODO: Fix show user role {{ Auth::user()->roles()->name }} --}}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account -->
                                <div class="block px-4 py-2 text-md font-bold text-gray-900">
                                    {{ __('Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show' ) }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Management -->
                                <div class="block px-4 py-2 text-md font-bold text-gray-900">
                                    {{ __('Manage') }}
                                </div>

                                <!-- Admin and Manager dashboard -->
                                @can ('view-dashboard')
                                    <x-jet-dropdown-link href="{{ route('dashboard.index' ) }}" :active="request()->routeIs('dashboard.index')">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>
                                @endcan


                                {{-- @can ('create-course')
                                    <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                                        {{ __('Courses') }}
                                    </x-jet-dropdown-link>
                                @endcan


                                @can ('create-course')
                                    <x-jet-dropdown-link href="{{ route('instructor.learning-paths.index') }}" :active="request()->routeIs('instructor.learning-paths.index')">
                                        {{ __('Learning Paths') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can ('create-course')
                                    <x-jet-dropdown-link href="{{ route('instructor.workshops.index') }}" :active="request()->routeIs('instructor.workshops.index')">
                                        {{ __('Workshops') }}
                                    </x-jet-dropdown-link>
                                @endcan
 --}}


                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Management -->
                                <div class="block px-4 py-2 text-md font-bold text-gray-900">
                                    {{ __('Help Center') }}
                                </div>

                                <!-- responsive help center and documentation -->
                                <x-jet-dropdown-link href="{{ route('pages.docs.overview') }}" :active="request()->routeIs('pages.docs.overview')">
                                    {{ __('Documentation') }}
                                </x-jet-dropdown-link>


                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else

                    <!-- Register button -->
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent bg-gray-100 rounded-md shadow-sm text-sm max-w-prose font-medium text-blue-900 hover:bg-gray-200  hover:shadow" >{{ __('Register') }}</a>
                        @endif

                        <!-- Login button -->
                        <a href="{{ route('login') }}" class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm max-w-prose font-medium text-white hover:shadow" style="background-color: #003876;">{{ __('Sign In') }}</a>


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
                <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']" :icon="$nav_link['icon']">
                    {{ __($nav_link['name']) }}
                </x-jet-responsive-nav-link>
            @endforeach

            {{-- <x-jet-responsive-nav-link href="{{ route('home', [app()->getLocale()] ) }}" :active="request()->routeIs('home')" class="hidden md:inline-block">
                <i class="fas fa-home mr-2"></i>{{ __('Home') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('courses.index', [app()->getLocale()] ) }}" :active="request()->routeIs('home')" class="hidden md:inline-block">
                <i class="fas fa-laptop mr-2"></i>{{ __('Courses') }}
            </x-jet-responsive-nav-link> --}}

        </div>

        {{-- <div class="pt-2 pb-3 space-y-1">
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
                            <x-jet-dropdown-link href="{{ route('courses.modality.show', ['modality' => $modality] ) }}" :active="request()->routeIs('courses.modality.*')">
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
                        @if(isset($categories))
                            @foreach($categories as $category)
                            <x-jet-dropdown-link href="{{ route('courses.category', ['category' => $category] ) }}" :active="request()->routeIs('courses.category.*')">
                                {{ __($category->name) }}
                            </x-jet-dropdown-link>
                            @endforeach
                        @endif
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div> --}}


        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4 pb-4">
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

                <div class="border-t border-gray-100"></div>

                <div class="mt-3 space-y-1">

                    <!-- Account -->
                    <div class="block px-4 py-2 text-md font-bold text-gray-900">
                        {{ __('Account') }}
                    </div>

                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Management -->
                    <div class="block px-4 py-2 text-md font-bold text-gray-900">
                        {{ __('Manage') }}
                    </div>

                    <!-- Admin and Manager responsive dashboard -->
                    @can('view-dashboard')
                        <x-jet-responsive-nav-link href="{{ route('dashboard.index' ) }}" :active="request()->routeIs('dashboard.index' )">
                            {{ __('Dashboard') }}
                        </x-jet-responsive-nav-link>
                    @endcan




                    <!-- instructor and course creator responsive dashboard -->
                    {{-- @can('create-course')
                        <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                            {{ __('Courses') }}
                        </x-jet-responsive-nav-link>
                    @endcan --}}




                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Management -->
                    <div class="block px-4 py-2 text-md font-bold text-gray-900">
                        {{ __('Help Center') }}
                    </div>

                    <!-- responsive help center and documentation -->
                    <x-jet-responsive-nav-link href="{{ route('pages.docs.overview') }}" :active="request()->routeIs('pages.docs.overview')">
                        {{ __('Documentation') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    {{-- @if (Auth::check() && Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->current_team_id)
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
                    @endif --}}
                </div>
            </div>
        @else
            <div class="py-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-jet-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>

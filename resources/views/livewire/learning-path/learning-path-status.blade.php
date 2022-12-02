<div>
    <!-- header -->
    <x-slot name="header">
        <div class="container flex items-center justify-between">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center divide-x">
                    <a href="https://mt.gob.do/">
                        <x-jet-application-logo class="block h-9 w-auto" />
                    </a>
                    <a href="{{ route('home') }}" class="pl-2 pt-3">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <div class="ml-12 hidden lg:block">
                    <a href="{{ route('workshops.index') }}">
                        <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($path->type->name) }}</span>
                    </a>
                    <!-- title -->
                    <x-tailwind.headings.h6>
                        {{ $path->title }}
                    </x-tailwind.headings.h6>
                </div>
            </div>
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
                                <x-jet-dropdown-link href="{{ route('admin.cpanel', App::getLocale() ) }}" :active="request()->routeIs('admin.cpanel')">
                                    {{ __('Control Panel') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <!-- course moderator dashboard -->
                            @can ('moderate-course')
                                <x-jet-dropdown-link href="{{ route('course-moderator.dashboard.index', App::getLocale() ) }}" :active="request()->routeIs('course-moderator.dashboard.index')">
                                    {{ __('Control Panel') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <!-- instructor and course creator dashboard -->
                            @can ('create-course')
                                <x-jet-dropdown-link href="{{ route('instructor.dashboard.index') }}" :active="request()->routeIs('instructor.dashboard.index')">
                                    {{ __('Management') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <!-- content moderator dashboard -->
                            @can ('moderate-content')
                                <x-jet-dropdown-link href="{{ route('content-moderator.dashboard.index' ) }}" :active="request()->routeIs('content-moderator.dashboard.index')">
                                    {{ __('Control Panel') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <!-- content creator dashboard -->
                            @can ('create-post')
                                <x-jet-dropdown-link href="{{ route('content-creator.dashboard.index') }}" :active="request()->routeIs('content-creator.dashboard.index')">
                                    {{ __('Management') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <!-- student dashboard -->
                            @can ('enroll')
                                <x-jet-dropdown-link href="{{ route('student.dashboard.index') }}" :active="request()->routeIs('student.dashboard.index')">
                                    {{ __('Learning') }}
                                </x-jet-dropdown-link>
                            @endcan

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
    </x-slot>

    <!-- hero -->
    <section class="bg-cover h-64 text-center" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ Storage::url( $path->image->url ) }})">
    </section>


    <div class="container grid grid-cols-1 -mt-32 py-8">

        <div class="card">
            <!-- path content -->
            <div class="card-header p-8">
                <div class="col-span-1 lg:col-span-2">

                    <header class="mb-12">
                        <a href="{{ route('learning-paths.index') }}">
                            <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($path->type->name) }}</span>
                        </a>

                        <x-tailwind.headings.h4>
                            {{ $path->title }}
                        </x-tailwind.headings.h4>
                    </header>

                    <!-- embed content -->
                    @if($current->iframe)
                        <div class="relative h-max overflow-hidden max-w-full w-full p-4 lg:px-24 bg-gray-700" >
                            <div class="embed-responsive">
                                {!! $current->iframe !!}
                            </div>
                        </div>
                    @endif

                    <x-tailwind.text.paragraph>
                        {{ __($path->summary) }}
                    </x-tailwind.text.paragraph>


                    <!-- lesson title -->
                    {{-- @if($this->index)
                    <h2 class="text-bold text-3xl mb-2">
                        {{ $this->index + 1 }} - {{ $current->name }}
                    </h2>
                    @endif  --}}

                    @if( $path->description )
                        <div class="text-gray-600 mb-8">
                            {{ $path->description->name }}
                        </div>
                    @endif

                    {{-- @if($path->url)
                    <a href="{{ $path->url }}" title="{{ $path->name }}" target="_blank">
                        <div class="mb-8 flex justify-center">
                            <button type="button" class="btn btn-cta btn-primary hover:bg-blue-700 text-md py-2 px-4 leading-none flex items-center focus:outline-none">
                                {{ __('Watch on') }} {{ $path->platform->name }}
                            </button>
                        </div>
                    </a>
                    @endif --}}

                    <!-- complete lesson button -->
                    <div class="flex justify-between">
                        {{-- <div class="flex items-center cursor-pointer" wire:click="completed">
                            @if ($path->completed)
                                <i class="fas fa-toggle-on text-2xl text-blue-400 mr-2"></i>

                            @else
                                <i class="fas fa-toggle-off text-2xl text-gray-400 mr-2"></i>
                            @endif
                                <p class="text-base text-gray-700">{{ __('Mark this unit as finished.') }}</p>
                        </div> --}}
                        <!-- resources -->
                        @if( $path->resource )
                            <div class="flex items-center cursor-pointer bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 py-2 px-4 rounded shadow " wire:click="download">
                                <i class="fas fa-download text-lg"></i>
                                <p class="ml-2">{{ __('Download resource') }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- <div class="card mt-3">
                        <div class="card-body flex">
                            @if($this->previous) <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer text-gray-400 hover:text-gray-700"><i class="fas fa-arrow-left mr-2"></i>Lección anterior</a> @endif
                            @if($this->next) <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer text-gray-400 hover:text-gray-700">Lección siguiente<i class="fas fa-arrow-right ml-2"></i></a> @endif
                        </div>
                    </div> --}}

                </div>
            </div>

            <div class="card-body">
                <section id="path-modules" >
                    <x-tailwind.text.paragraph>
                        {{ __('This learning path contains') }} {{ $path->modules_count }} {{ Str::plural( __('module'), $path->modules_count ) }}:
                    </x-tailwind.text.paragraph>
                    <!-- modules -->
                    <x-tailwind.layouts.grid-cols-4>
                        @foreach ( $path->modules as $module )
                            <div class="col-span-1">
                                <x-module-card :module="$module" />
                            </div>
                        @endforeach
                    </x-tailwind.layouts.grid-cols-4>
                </section>
            </div>
        </div>

    </div><!-- container -->
</div>

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
                    <a href="{{ route('modules.index') }}">
                        <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($module->type->name) }}</span>
                    </a>
                    <!-- title -->
                    <x-tailwind.headings.h6>
                        {{ $module->title }}
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

    <!-- title responsive -->
    <div class="py-2 bg-white lg:hidden shadow">
        <x-tailwind.layouts.container>
            <a href="{{ route('modules.index') }}">
                <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($module->type->name) }}</span>
            </a>
            <!-- title -->
            <x-tailwind.headings.h6>
                {{ $module->title }}
            </x-tailwind.headings.h6>
        </x-tailwind.layouts.container>
    </div>

    <!-- content -->
    <div class="grid grid-cols-6">

        <!-- course content -->
        <div class="col-span-6 lg:col-span-4">

            {{-- {{ $current }} --}}

             <!-- embed content -->
             @if( isset($current->iframe) )
                <div class="relative h-max overflow-hidden max-w-full w-full p-4 lg:px-24 bg-gray-700" >
                    <div class="embed-responsive">
                        {!! $current->iframe !!}
                    </div>
                </div>
             @endif

            <div class="container py-4">
                {{-- TODO: Display topic name --}}
                @if($module->topic)
                <div class="mr-2 text-blue-500 text-sm p-1 rounded  leading-none flex items-center uppercase mb-4">
                    {{ __($module->topic->name) }}
                </div>
                @endif

                <!-- lesson title -->
                @if($this->index || $this->index == 0)
                <p class="uppercase">{{ __('Unit') }} {{ $this->index + 1 }}</p>
                <h6 class="text-bold text-2xl mb-2">
                    {{ $current->title }}
                </h6>
                @endif

                @if( $current->summary )
                    <div class="text-gray-600 mb-8">
                        {{ $current->summary }}
                    </div>
                @endif

                @if($module->level)
                <div class="flex mb-8">
                    <button type="button" class="mr-2 bg-gray-300 text-gray text-sm py-2 px-4 leading-none flex items-center focus:outline-none">
                        {{ __($module->level->name) }}
                    </button>
                </div>
                @endif


                <div class="flex justify-between">

                    <!-- complete lesson toggle button -->
                    <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-400 mr-2"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-400 mr-2"></i>
                    @endif
                        <p class="text-base text-gray-700">{{ __('Mark this unit as complete') }}</p>
                    </div>
                    <!-- /complete lesson toggle button -->

                    <!-- resources -->
                    @if( $current->resource )
                        <div class="flex items-center cursor-pointer bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 py-2 px-4 rounded shadow " wire:click="download">
                            <i class="fas fa-download text-lg"></i>
                            <p class="ml-2">{{ __('Download resource') }}</p>
                        </div>
                    @endif
                    <!-- /resources -->

                </div>


                <div class="mt-3">
                    <div class="flex @if($this->index == 0) justify-end @else justify-between  @endif  space-x-4">

                        <!-- previous unit -->
                        @if($this->previous)
                            <div class="card w-1/2 pb-2">
                                <div class="card-body flex flex-col justify-between">
                                    <x-tailwind.headings.h6>{{ $this->previous->title }}</x-tailwind.headings.h6>
                                    <a wire:click="changeUnit({{$this->previous}})" class="cursor-pointer text-gray-400 hover:text-gray-700">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        {{ __('Previous unit') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- next unit -->
                        @if($this->next)
                            <div class="card w-1/2 pb-2">
                                <div class="card-body flex flex-col justify-between">
                                    <x-tailwind.headings.h6>{{ $this->next->title }}</x-tailwind.headings.h6>
                                    <a wire:click="changeUnit({{$this->next}})" class="ml-auto cursor-pointer text-gray-400 hover:text-gray-700">
                                        {{ __('Next unit') }}
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        <!-- sidebar -->
        <div class="card col-span-6 lg:col-span-2 bg-white divide-y">

            <div class="card-header">
                <div class="bg-white z-50 px-6 py-4 flex items-center justify-between">
                    <h5 class="font-semibold">{{ __('Content') }}</h5>
                    <x-icons.close classes="cursor-pointer"/>
                </div>

                <!-- progress bar -->
                <div class="px-6 py-4 bg-white" x-data="{ width: '{{ $this->progress }}' }" x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })" >
                    <!-- Start Regular with text version -->
                    <div class="bg-gray-200 rounded h-6 pt-1 pr-2 overflow-hidden" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100" >
                        <div  class="bg-blue-400 rounded h-4 ml-1 text-center text-white text-sm transition" :style="`width: ${width}%; transition: width 2s;`" x-text="`${width}%`" ></div>
                    </div>
                    <!-- End Regular with text version -->
                </div>
                <!-- /progress bar -->


                    <header class="bg-white px-6 py-8">
                        <!-- course title -->
                        <h5 class="font-semibold text-xl leading-8 text-gray-600">{{ $module->title }}</h5>

                        <small class="text-gray-600 block">{{ __('This module is part of the learning path') }}
                            <a href="{{ route('learning-paths.show', $module->learning_path ) }}" class="text-blue-600">
                                {{ $module->learning_path->title }}
                            </a>
                        </small>
                        <!-- CTA button  -->
                        <div class="flex justify-center mt-6">
                            <x-tailwind.buttons.cta-button bgColor="blue" :link="$current->module->url" target="_blank">
                                {{ __('Watch on') }} {{ $current->module->learning_path->program->name }}
                            </x-tailwind.buttons.cta-button>
                        </div>

                    </header>
            </div>

            <div class="card-body">
                <x-tailwind.layouts.scrollbar class="h-screen">

                    <div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($module->units as $unit)
                            <button id="unit-{{ $unit->id }}" wire:click="$emit('change-unit', {{ $unit }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b {{ $unit->completed ? 'bg-blue-100 text-blue-700 border-white' : 'bg-white border-gray-200' }} hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                @if( $unit->completed )
                                    @if( $current->id == $unit->id )
                                        <span class="inline-block w-4 h-4 border-2 border-blue-400 rounded-full mr-2 mt-1"></span>
                                        <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                                    @else
                                        <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                                        <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                                    @endif
                                @else
                                    @if( $current->id == $unit->id )
                                        <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                                        <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                                    @else
                                        <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                                        <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                                    @endif
                                @endif

                                @php
                                    $unitTitle = trim($unit->title)
                                @endphp

                                <p class="text-left ...">{{ $unitTitle }}</p>
                            </button>
                        @endforeach

                    </div>

                </x-tailwind.layouts.scrollbar>
            </div>

            <!-- Legend -->
            <div class="card-footer">
                <div class="flex justify-center px-4 py-6">
                    <div class="flex items-center mr-4">
                        <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                        <small class="text-gray-500">
                            {{ __('Completed') }}
                        </small>
                    </div>
                    <div class="flex items-center mr-4">
                        <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                        <small class="text-gray-500">
                            {{ __('Current') }}
                        </small>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                        <small class="text-gray-500">
                            {{ __('Not started') }}
                        </small>
                    </div>
                </div>
            </div>

        </div>
        <!-- /sidebar -->

    </div>

</div>
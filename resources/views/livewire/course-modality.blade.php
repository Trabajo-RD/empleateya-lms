<div>

    <div class="mb-12 z-0 divide-y divide-gray-300">
        @if (Auth::check())
            @if(count($user_courses))
                <!-- Student courses in this category -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
                    <h2 class="text-center md:text-left font-display font-semibold text-gray-600 text-xl sm:text-2xl md:text-3xl mb-6">{{ __('Your courses in this modality') }}</h2>
                    <!-- courses -->
                    <div class="px-4 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 mt-12">
                        @foreach ( $user_courses as $course )
                            <x-user-course :course="$course" />
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        <!-- Featured course in this category -->
        @if(count($featured_courses))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
                <h2 class="text-center md:text-left font-display font-semibold text-gray-600 text-xl sm:text-2xl md:text-3xl">{{ __('Featured courses in this modality') }}</h2>

                <p>
                    {{ __('These are the featured courses in this modality.') }}
                </p>

                <!-- courses -->
                <div class="px-4 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 mt-12">
                    @foreach ( $featured_courses as $course )
                        <x-featured-course :course="$course" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Topics in this modality -->
        @if(count($topics))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
                <h2 class="text-center md:text-left font-display font-semibold text-gray-600 text-xl sm:text-2xl md:text-3xl" >{{ __('Topics in') }} <span class="font-bold">{{ __($modality->name) }}</span></h2>

                <p>{{ __('These are the themes we have available in this modality.') }}</p>

                <!-- This is the tags container -->
                <div class='mt-12 flex flex-wrap justify-center -m-1'>
                    @foreach ($topics as $topic)
                        <a href="{{ route('courses.topic', [$topic->category, $topic]) }}" class="cursor-pointer mb-8 text-normal">
                            <x-tailwind.tag :id="'topic-'.$topic->id" :text="$topic->name" color="gray" :icon="$topic->icon" />
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- All courses with this category -->

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h2 class="text-center md:text-left font-display font-semibold text-gray-600 text-xl sm:text-2xl md:text-3xl mb-6">{{ __('Courses in this modality') }}</h2>

                <!-- options -->
                <div class="mt-12 flex justify-between">

                    <!-- options left -->
                    <div class="flex">
                        <button class="h-12 px-4 border border-blue-700 text-blue-700 rounded font-semibold mr-4" >
                            <i class="fas fa-sliders-h mr-2"></i>{{ __('Filters') }}
                        </button>

                        <!-- dropdown filters -->
                        {{-- <div class="relative mr-4" x-data="{ open: false }">
                            <button class="block bg-white shadow h-12 px-4 rounded text-gray-700 overflow-hidden focus:outline-none" x-on:click="open = true">
                                <i class="fas fa-tags text-2xl md:text-sm md:mr-2"></i><span class="hidden md:inline">{{ __('Category') }}<i class="fas fa-caret-down text-sm ml-2"></i></span>
                            </button>
                            <!-- dropdown body -->
                            <div class="absolute left-0 w-40 mt-2 py-2 bg-white rounded shadow z-50" x-show="open" x-on:click.away="open = false">

                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="" x-on:click="open = false">
                                        {{ __('Highest rated') }}
                                    </a>

                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="" x-on:click="open = false">
                                        {{ __('Most popular') }}
                                    </a>

                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="" x-on:click="open = false">
                                        {{ __('Newest') }}
                                    </a>

                            </div>
                        </div> --}}
                    </div>

                    <!-- Options right -->
                    <div class="flex flex-1 justify-between items-center">
                        <span class="ml-4">{{ count($courses) }} {{ count($courses) > 1 ? __('courses') : 'course' }}</span>
                        {{-- <div class="flex">
                            <button class="h-12 px-4 border text-xl font-semibold mr-4 focus:outline-none {{ $layout == 'course-card' ? 'text-blue-500' : 'text-gray-500'}}" wire:click="$set('layout', 'course-card' )" x-on:click="open = true">
                                <i class="fas fa-th"></i>
                            </button>
                            <button class="h-12 px-4 border text-xl text-gray-500 font-semibold mr-4 focus:outline-none {{ $layout == 'course-list' ? 'text-blue-500' : 'text-gray-500'}}" wire:click="$set('layout', 'course-list' )" x-on:click="open = true">
                                <i class="fas fa-th-list"></i>
                            </button>
                        </div> --}}
                    </div>

                </div>


                <div class="mt-12 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-x-6 gap-y-8">

                    <div class="col-span-4 sm:col-span-4 md:col-span-4 lg:col-span-1">
                        {{-- {{ __('Ratings') }} --}}

                        <!-- dropdown type -->
                        <div class="relative mt-4 sm:col-span-2" x-data="{ open: false }">
                            <button class="bg-white shadow w-full h-12 px-4 rounded text-gray-700 overflow-hidden focus:outline-none flex justify-between items-center" x-on:click="open = true">
                                <span><i class="fas fa-tags text-2xl md:text-sm md:mr-2"></i><span class="">{{ __('Type') }}</span></span><i class="fas fa-caret-down text-sm ml-2"></i>
                            </button>
                            <!-- dropdown body -->
                            <div class="absolute left-0 w-full mt-2 py-2 bg-white rounded shadow z-50" x-show="open" x-on:click.away="open = false">
                                @foreach ($types as $type)
                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="$set('type_id', {{$type->id}} )" x-on:click="open = false">
                                        {{ __($type->name) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- dropdown topics -->
                        <div class="relative mt-4 sm:col-span-2" x-data="{ open: false }">
                            <button class="bg-white shadow w-full h-12 px-4 rounded text-gray-700 overflow-hidden focus:outline-none flex justify-between items-center" x-on:click="open = true">
                                <span><i class="fas fa-tags text-2xl md:text-sm md:mr-2"></i><span class="">{{ __('Topic') }}</span></span><i class="fas fa-caret-down text-sm ml-2"></i>
                            </button>
                            <!-- dropdown body -->
                            <div class="absolute left-0 w-full mt-2 py-2 bg-white rounded shadow z-50" x-show="open" x-on:click.away="open = false">
                                @foreach ($topics as $topic)
                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="$set('topic_id', {{$topic->id}} )" x-on:click="open = false">
                                        {{ __($topic->name) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- dropdown levels -->
                        <div class="relative mt-4 sm:col-span-2" x-data="{ open: false }">
                            <button class="bg-white shadow w-full h-12 px-4 rounded text-gray-700 overflow-hidden focus:outline-none flex justify-between items-center" x-on:click="open = true">
                                <span><i class="fas fa-tags text-2xl md:text-sm md:mr-2"></i><span class="">{{ __('Level') }}</span></span><i class="fas fa-caret-down text-sm ml-2"></i>
                            </button>
                            <!-- dropdown body -->
                            <div class="absolute left-0 w-full mt-2 py-2 bg-white rounded shadow z-50" x-show="open" x-on:click.away="open = false">
                                @foreach ($levels as $level)
                                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-blue-600 hover:text-white" wire:click="$set('level_id', {{$level->id}} )" x-on:click="open = false">
                                        {{ __($level->name) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Clear filters -->
                        <button class="h-12 px-4 border border-blue-700 text-blue-700 rounded font-semibold mt-4 w-full" wire:click="resetFilters">
                            <i class="fas fa-eraser text-2xl md:text-sm md:mr-2"></i><span class="hidden md:inline">{{ __('Clear filters') }}</span>
                        </button>

                    </div>


                    <div class="col-span-4">
                        {{-- @if($layout == 'course-card' ) --}}
                        <!-- courses -->
                        <div class="sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                            @forelse ( $courses as $course )
                                <x-course-card :course="$course" />
                            @empty
                                <div class="grid sm:grid-cols-1 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 text-center" role="alert">
                                    <p class="font-bold">{{ __('No hemos encontrado cursos que coincidan con tu búsqueda') }}</p>
                                    <p class="text-sm">{{ __('Intenta elegir otra opción.') }}</p>
                                    <!-- Clear filters -->
                                    <button class="h-12 px-4 border border-blue-700 text-blue-700 rounded font-semibold mt-4 w-full" wire:click="resetFilters">
                                        <i class="fas fa-eraser text-2xl md:text-sm md:mr-2"></i><span class="hidden md:inline">{{ __('Clear filters') }}</span>
                                    </button>
                                </div>
                            @endforelse
                        </div>

                        {{-- @else --}}

                        {{-- <!-- courses -->
                        <div class="px-4 sm:px-6 lg:px-8 grid sm:grid-cols-1 gap-x-6 gap-y-8">
                            @forelse ( $courses as $course )
                                <x-course-list :course="$course" />
                            @empty
                                <div class="grid sm:grid-cols-1 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 text-center" role="alert">
                                    <p class="font-bold">{{ __('No hemos encontrado cursos que coincidan con tu búsqueda') }}</p>
                                    <p class="text-sm">{{ __('Intenta elegir otra opción.') }}</p>
                                    <!-- Clear filters -->
                                    <button class="h-12 px-4 border border-blue-700 text-blue-700 rounded font-semibold mt-4 w-full" wire:click="resetFilters">
                                        <i class="fas fa-eraser text-2xl md:text-sm md:mr-2"></i><span class="hidden md:inline">{{ __('Clear filters') }}</span>
                                    </button>
                                </div>
                            @endforelse
                        </div>

                        @endif --}}

                        <!-- Pagination -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-8">
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

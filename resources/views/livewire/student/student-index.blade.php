<div>
    <x-tailwind.layouts.container>






        <div class="mx-auto grid grid-cols-4 gap-x-6 pb-12">

            <!-- Sidebar -->
            <aside class="col-span-1 divide-y">
                <div class="mb-6 flex items-center">
                    <i class="fas fa-sliders-h text-gray-400 fa-2x mr-2"></i>
                    <x-tailwind.text.caption class="text-2xl">{{ __('Filter') }}</x-tailwind.text.caption>
                </div>


                <!-- modalities filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Modality') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($modalities as $modality)
                            <a class="uppercase cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('modality_id', {{ $modality->id }})" x-on:click="open = false">
                                {{ __($modality->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- program filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Program or Platform') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($programs as $program)
                            <a class="uppercase cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('program_id', {{ $program->id }})" x-on:click="open = false">
                                {{ $program->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

               <!-- levels filter -->
               <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Levels') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($levels as $level)
                            <a class="uppercase cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('level_id', {{ $level->id }})" x-on:click="open = false">
                                {{ __($level->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- languages filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Language') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($languages as $language)
                            <a class="uppercase cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('language_id', {{ $language->id }})" x-on:click="open = false">
                                {{ __($language->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>


                <!-- prices filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Price') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($prices as $price)
                            <a class="uppercase cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('price_id', {{ $price->id }})" x-on:click="open = false">
                                {{ __($price->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
{{--
                Price: {{ $price_id }} --}}


                <!-- word filter -->
               {{-- <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Word') }}</x-tailwind.text.caption>
                </div>
                <div class="h-max">
                        <x-tailwind.inputs.base-input id="word-filter" placeholder="Busca una palabra" wire:change="$set('text', s)" />
                </div> --}}

                <!-- rating filter -->
               {{-- <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Rating') }}</x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($ratings as $rating)
                        <div class="flex items-center mb-4">
                            <input wire:model.prevent type="radio" class="mr-2" id="rating-{{ $rating }}" value="{{ $rating }},5" autocomplete="off" wire:model="rating_id">
                            <label for="rating-{{ $rating }}" class="cursor-pointer">
                                @for($i=0; $i<$rating; $i++)
                                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                                @endfor
                                @for($i=5; $i>$rating; $i--)
                                    <i class="fas fa-star fa-sm text-gray-400"></i>
                                    @endfor
                            </label>
                        </div>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar> --}}

                <!-- filter buttons -->
                <div class="flex items-center justify-end py-8 gap-x-4">
                    <a class="btn bg-gray-200 text-gray-800 cursor-pointer uppercase" wire:click="resetFilters">
                        {{ __('Reset') }}
                    </a>
                    {{-- <a class="btn bg-blue-900 text-blue-50">{{ __('Filter') }}</a> --}}
                </div>

            </aside><!-- .Sidebar -->

            <!-- TAB -->

            <div x-data="{tab: window.location.hash ? window.location.hash : '#courses' }" class="col-span-3">
                <div class="mb-4 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myLearningTab" data-tabs-toggle="#myLearningTabContent" role="tablist">
                        <li :class="{ 'tab-active' : tab === '#courses' }" class="mr-2" role="presentation">
                            <button x-on:click.prevent="tab = '#courses'" class="inline-block p-4 focus:outline-none  border-transparent hover:text-red-600 dark:hover:text-gray-300" id="courses-tab" data-tabs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="false">
                                {{ __('Courses') }}
                                <x-tailwind.badges.pill-badge color="{{ $courses->count() >= 1 ? 'red' : 'gray'  }}">
                                    {{ $courses->count() >= 100 ? '+99' : $courses->count() }}
                                </x-tailwind.badges.pill-badge>
                            </button>
                        </li>
                        <li :class="{ 'tab-active' : tab === '#modules' }" class="mr-2" role="presentation">
                            <button x-on:click.prevent="tab = '#modules'" class="inline-block p-4 focus:outline-none  border-transparent hover:text-red-600 dark:hover:text-gray-300" id="modules-tab" data-tabs-target="#modules" type="button" role="tab" aria-controls="modules" aria-selected="false">
                                {{ __('Modules') }}
                                <x-tailwind.badges.pill-badge color="{{ $modules->count() >= 1 ? 'red' : 'gray'  }}">
                                    {{ $modules->count() >= 100 ? '+99' : $modules->count() }}
                                </x-tailwind.badges.pill-badge>
                            </button>
                        </li>
                        <li :class="{ 'tab-active' : tab === '#workshops' }" class="mr-2" role="presentation">
                            <button x-on:click.prevent="tab = '#workshops'" class="inline-block p-4 focus:outline-none  border-transparent hover:text-red-600  dark:hover:text-gray-300" id="workshops-tab" data-tabs-target="#workshops" type="button" role="tab" aria-controls="workshops" aria-selected="false">
                                {{ __('Workshops') }}
                                <x-tailwind.badges.pill-badge color="{{ $workshops->count() >= 1 ? 'red' : 'gray'  }}">
                                    {{ $workshops->count() >= 100 ? '+99' : $workshops->count() }}
                                </x-tailwind.badges.pill-badge>
                            </button>
                        </li>
                        <li :class="{ 'tab-active' : tab === '#paths' }" class="mr-2" role="presentation">
                            <button x-on:click.prevent="tab = '#paths'" class="inline-block p-4 focus:outline-none  border-transparent hover:text-red-600 dark:hover:text-gray-300" id="paths-tab" data-tabs-target="#paths" type="button" role="tab" aria-controls="paths" aria-selected="false">
                                {{ __('Paths') }}
                                <x-tailwind.badges.pill-badge color="{{ $learningPaths->count() >= 1 ? 'red' : 'gray'  }}">
                                    {{ $learningPaths->count() >= 100 ? '+99' : $learningPaths->count() }}
                                </x-tailwind.badges.pill-badge>
                            </button>
                        </li>

                    </ul>
                </div>

                <div id="myLearningTabContent" >

                    @if( count($courses) >= 1 )
                        <div x-show="tab == '#courses'" class="py-4">
                            <!-- titulo -->
                            <div class="mb-4">
                                <x-tailwind.headings.h3 color="black">
                                    {{ __('Courses') }}
                                </x-tailwind.headings.h3>
                            </div>
                            <div  class="m-mx-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-x-3 gap-y-3" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <!-- COURSES -->



                                {{-- @livewire('search.course-search') --}}

                                {{-- <template x-for="course in courses">
                                    <div class="col-span-1" >
                                        <x-course-card x-show="course" />
                                    </div>
                                </template> --}}

                                @foreach ( $courses as  $course )
                                <div class="col-span-1" >
                                    <x-course-card :course="$course" />
                                </div>
                                @endforeach

                            </div>
                        </div>
                    @else
                        <div x-show="tab == '#courses'" class="py-4">
                            <x-tailwind.alert.content.info classes="danger">
                                <x-slot name="title">
                                    {{ __('Course list') }}
                                </x-slot>

                                    Por el momento no estas inscrito en uno de nuestros cursos.

                            </x-tailwind.alert.content.info>
                        </div>
                    @endif

                    @if( count($modules) >= 1 )
                        <div x-show="tab == '#modules'" class="py-4">
                            <!-- titulo -->
                            <div class="mb-4">
                                <x-tailwind.headings.h3 color="black">
                                    {{ __('Modules') }}
                                </x-tailwind.headings.h3>
                            </div>
                            <div class="m-mx-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-x-3 gap-y-3" id="modules" role="tabpanel" aria-labelledby="modules-tab">

                                <!-- WORKSHOPS -->

                                @foreach ( $modules as  $module )
                                    <div class="col-span-1" >
                                        <x-module-card :module="$module" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- WORKSHOPS -->
                    @if( count( $workshops ) >= 1 )
                        <div x-show="tab == '#workshops'" class="py-4">
                            <!-- titulo -->
                            <div class="mb-4">
                                <x-tailwind.headings.h3 color="black">
                                    {{ __('Workshops') }}
                                </x-tailwind.headings.h3>
                            </div>
                            <div class="m-mx-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-x-3 gap-y-3" id="workshops" role="tabpanel" aria-labelledby="workshops-tab">
                                @foreach ( $workshops as $workshop )
                                    <div class="col-span-3">
                                        <x-tailwind.cards.workshop-horizontal-card :workshop="$workshop" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div x-show="tab == '#paths'" class="py-4">
                        <!-- titulo -->
                        <div class="mb-4">
                            <x-tailwind.headings.h3 color="black">
                                {{ __('Paths') }}
                            </x-tailwind.headings.h3>
                        </div>
                        <div class="m-mx-4 flex flex-wrap" id="paths" role="tabpanel" aria-labelledby="paths-tab">
                            <!-- PATHS -->

                            @foreach ( $learningPaths as $learningPath )
                                <div class="w-full p-4 sm:w-1/2 lg:w-1/2">
                                    <x-tailwind.path-card :path="$learningPath" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{-- <footer class="col-span-4 mt-4">
                {{ $courses->links() }}
            </footer> --}}

        </div>
    </x-tailwind.layouts.container>
</div>

<div>
    <!-- header -->

    <!-- title responsive -->
    <div class="py-2 bg-white lg:hidden shadow">
        <x-tailwind.layouts.container>
            @if ($course->type)
                <a href="{{ route('courses.index') }}">
                    <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($course->type->name) }}</span>
                </a>
            @endif
            <!-- title -->
            <x-tailwind.headings.h6>
                {{ $course->title }}
            </x-tailwind.headings.h6>
        </x-tailwind.layouts.container>
    </div>

    <!-- content -->
    <div class="grid grid-cols-6">

        <!-- course content -->
        <div class="col-span-6 lg:col-span-4">

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
                @if(!is_null($course->topic_id))
                <div class="mr-2 text-blue-500 text-sm p-1 rounded  leading-none flex items-center uppercase mb-4">
                    {{ __($course->topic->name) }}
                </div>
                @endif

                <!-- lesson title -->

                @if (count($course->lessons))
                    @if( $this->index || $this->index == 0 )
                    <p class="uppercase">{{ __('Lesson') }} {{ $this->index + 1 }}</p>
                    <h6 class="text-bold text-2xl mb-2">
                        {{ $current->name }}
                    </h6>
                    @endif

                    @if( $current->description )
                        <div class="text-gray-600 mb-8">
                            {{ $current->description->name }}
                        </div>
                    @endif
                @endif

                @if($course->level)
                <div class="flex mb-8">
                    <button type="button" class="mr-2 bg-gray-300 text-gray text-sm py-2 px-4 leading-none flex items-center focus:outline-none">
                        {{ __($course->level->name) }}
                    </button>
                </div>
                @endif

                <!-- complete lesson button -->
                @if (count($course->lessons))
                    <div class="flex justify-between">
                        <div class="flex items-center cursor-pointer" wire:click="completed">
                            @if ($current->completed)
                                <i class="fas fa-toggle-on text-2xl text-blue-400 mr-2"></i>

                            @else
                                <i class="fas fa-toggle-off text-2xl text-gray-400 mr-2"></i>
                            @endif
                                <p class="text-base text-gray-700">{{ __('Mark this lesson as finished.') }}</p>
                        </div>
                        <!-- resources -->
                        @if( $current->resource )
                            <div class="flex items-center cursor-pointer bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 py-2 px-4 rounded shadow " wire:click="download">
                                <i class="fas fa-download text-lg"></i>
                                <p class="ml-2">{{ __('Download resource') }}</p>
                            </div>
                        @endif
                    </div>
                @endif

                @if (count($course->lessons) > 0)
                    <div class="mt-3">
                        <div class="flex @if($this->index == 0) justify-end @else justify-between  @endif  space-x-4">
                            @if( $this->previous )
                                <div class="card w-1/2 pb-2">
                                    <div class="card-body flex flex-col justify-between">
                                        <x-tailwind.headings.h6>{{ $this->previous->name }}</x-tailwind.headings.h6>
                                        <button wire:click="changeLesson( {{ $this->previous }} )" class="cursor-pointer text-gray-400 hover:text-gray-700"><i class="fas fa-arrow-left mr-2"></i>{{ __('Previous lesson') }}</button>
                                    </div>
                                </div>
                            @endif

                            @if( $this->next )
                                <div class="card w-1/2 pb-2">
                                    <div class="card-body flex flex-col justify-between">
                                        <x-tailwind.headings.h6>{{ $this->next->name }}</x-tailwind.headings.h6>
                                        <button wire:click="changeLesson( {{ $this->next }} )" class="ml-auto cursor-pointer text-gray-400 hover:text-gray-700">{{ __('Next lesson') }}<i class="fas fa-arrow-right ml-2"></i></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>

        <!-- sidebar -->
        <div class="col-span-6 lg:col-span-2 bg-white divide-y">

            <div class="bg-white z-50 px-6 py-4 flex items-center justify-between">
                <h5 class="font-semibold">{{ __('Content') }}</h5>
                <x-icons.close classes="cursor-pointer"/>
            </div>

            <!-- progress bar -->
            @if (count($course->lessons))
                <div class="px-6 py-4 bg-white" x-data="{ width: '{{$this->progress}}' }" x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })" >
                    <!-- Start Regular with text version -->
                    <div class="bg-gray-200 rounded h-6 pt-1 pr-2 overflow-hidden" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100" >
                        <div  class="bg-blue-400 rounded h-4 ml-1 text-center text-white text-sm transition" :style="`width: ${width}%; transition: width 2s;`" x-text="`${width}%`" ></div>
                    </div>
                    <!-- End Regular with text version -->
                </div>
            @endif
            <!-- /progress bar -->


            <header class="bg-white px-6 py-8">
                <!-- course title -->
                <h5 class="font-semibold text-xl leading-8 text-gray-600">{{ $course->title }}</h5>

                @if (count($course->lessons))
                    @if($current->url)
                    <small class="text-gray-600 block">{{ __('The content of this course is owned by') }} {{ $course->program->organization->name }}</small>
                        <!-- CTA button  -->
                        <div class="flex justify-center mt-6">
                            <x-tailwind.buttons.cta-button bgColor="blue" :link="$current->url" target="_blank">
                                {{ __('Watch on') }} {{ $current->platform->name }}
                            </x-tailwind.buttons.cta-button>
                        </div>
                    @endif
                @endif
            </header>

                {{-- @livewire('course.course-lesson-list', ['course' => $course]) --}}

            @if (count($course->sections))

                <x-tailwind.layouts.scrollbar class="h-screen">

                    @if (count($course->sections))
                        <div id="accordion-open" data-accordion="open">
                            @foreach($course->sections as $section)
                                <h2 id="accordion-open-heading-1">
                                    <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                        <span class="flex items-center">
                                        {{ $section->title }}
                                        </span>
                                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                </h2>

                                {{-- {{ $section->scorms }} --}}

                                <!-- sections scorm content -->
                                @if(count($section->scorms))

                                    <div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                        @foreach($section->scorms as $scorm)

                                            <a href="/player.php?data={{ $scorm->data }}" target="_blank" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">

                                                <x-icons.video classes="mr-2" key="icon-{{ $scorm->id }}"></x-icons.video>

                                                    <p class="text-left ...">{{ $scorm->title }}</p>
                                            </a>
                                        @endforeach
                                    </div>

                                @else

                                    @if (count($course->lessons))
                                        <div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            @foreach($section->lessons as $lesson)
                                                <button wire:click="$emit('change-lesson', {{ $lesson }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                                    @if( $lesson->completed )
                                                        @if( $current->id == $lesson->id )
                                                            <span class="inline-block w-4 h-4 border-2 border-blue-400 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @else
                                                        @if( $current->id == $lesson->id )
                                                            <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @endif

                                                    <x-icons.video classes="mr-2" key="icon-{{ $lesson->id }}"></x-icons.video>

                                                        <p class="text-left ...">{{ $lesson->title }}</p>
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif

                                @endif

                            @endforeach
                        </div>
                    @endif



                </x-tailwind.layouts.scrollbar>

            @endif

            <!-- Legend -->
            @if(count($course->lessons))
                <div class="flex justify-center px-4 pt-6">
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
            @endif

        </div>
        <!-- /sidebar -->
    </div>

    <x-slot name="js">

    </x-slot>
</div>

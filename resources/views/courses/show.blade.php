<x-app-layout>

    <section name="header">
        <div class="bg-primary sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 gap-6 items-center px-6">
            <div class="text-sm flex items-center text-blue-50 py-4">
                <!-- topic -->
                @if($course->topic)
                    <a href="" data-tooltip-target="{{ $course->id }}-category-tooltip" data-tooltip-placement="top">
                        <!-- tag -->
                        {{ __($course->topic->category->name) }}
                    </a>
                    <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('topic.show', $course->topic) }}" data-tooltip-target="{{ $course->id }}-topic-tooltip" data-tooltip-placement="top" class="mr-2 ">
                        <!-- tag -->
                        {{ __($course->topic->name) }}
                    </a>
                    <!-- tooltip -->
                    <x-tooltip :id="$course->id . '-topic'" text="{{ __('Topic') }}"/>
                @endif
            </div>
        </div>
    </section>

    <section class="pb-6 ">
        <div class="bg-primary p-6 sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

            <div class="relative flex items-center overflow-hidden h-80">
            <!-- card image -->
                @isset( $course->image )
                    <img src="{{ Storage::url( $course->image->url ) }}" alt="" class="h-80 w-11/12 object-cover shadow" />
                @else
                    <!-- badge icon -->
                    <img :key="{{ 'badge-' . $course->id }}" class="h-44 absolute inset-x-0 m-auto z-10 transition duration-300 transform hover:scale-125" src="{{ asset('images/badges/courses.svg') }}" alt="{{ __('Courses') }}" >
                    <img id="picture" class="w-auto object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                @endisset
            </div>
            <div>
                <div class="flex items-center">
                    <button type="button" class="bg-opacity-25 hover:bg-opacity-50 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none uppercase">
                        {{ __($course->type->name) }}
                    </button>
                    <div class="flex whitespace-nowrap items-center">
                        @if($course->program)
                        <button type="button" class="bg-opacity-25 hover:bg-opacity-50 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none uppercase">
                            {{ $course->program->name }}
                        </button>
                        @endif
                    </div>
                </div>

                <!-- course title -->
                <x-tailwind.headings.h3 color="white">
                    {{ $course->title }}
                </x-tailwind.headings.h3>

                <!-- course subtitle -->
                <x-tailwind.text.paragraph color="white">
                    {{ $course->subtitle }}
                </x-tailwind.text.paragraph>


                <div class="flex items-center">
                    <!-- rating star component -->
                    <div class="flex items-center mb-4">
                        <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />
                        <span class="text-md text-white ml-6"><i class="fas fa-comments mr-2"></i>{{ $course->reviews_count }} {{ Str::plural( __('review'), $course->reviews_count) }}</span>
                        <span class="text-md text-white ml-6"><i class="fas fa-eye mr-2"></i>{{ $course->views }} {{ Str::plural( __('view'), $course->views ) }}</span>
                    </div>
                </div>

                <div class="flex items-center">
                    <!-- Author info -->
                    <div class="flex items-center">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->editor->profile_photo_url }}" alt="Foto de perfil de {{ $course->editor->name }}"/>
                        </figure>
                        <div class="ml-4">
                            <span class="font-semibold text-lg text-white">{{ $course->editor->name . ' ' . $course->editor->lastname }}</span>
                            <br>
                            <a class="text-sm" href="mailto:{{ $course->editor->email }}" target="_blank"><span class="lowercase text-white">{{ $course->editor->email }}</span></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16">

        <!-- content -->
        <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1 mb-12">

            <!-- section description -->
            <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('Description') }}
                </x-tailwind.text.title>
                <x-tailwind.text.paragraph>
                    {!! $course->summary !!}
                </x-tailwind.text.paragraph>
            </section>

            <!-- section requirements  -->
            <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('Requirements') }}
                </x-tailwind.text.title>

                <ul class="list-disc list-inside mt-4">

                    @forelse ($course->requirements as $requirement )
                        <li class="text-gray-600 text-base">
                            {{ $requirement->name }}
                        </li>
                    @empty
                        <p class="text-gray-600 text-base">
                            No tiene requisitos previos
                        </p>
                    @endforelse

                </ul>
            </section>

            <!-- section goals -->
            <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('What you will learn') }}
                </x-tailwind.text.title>

                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 mt-4">

                    @foreach ( $course->goals as $goal )

                        <li class="text-gray-600 text-base flex justify-start">
                            <i class="fas fa-check text-sm text-gray-500 mr-3 pt-1 clear-left"></i>
                            {{ $goal->name }}
                        </li>

                    @endforeach

                </ul>

            </section>

            <!-- section subjects -->
            <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('Course content') }}
                </x-tailwind.text.title>

                <!-- sections count statics -->
                @if($course->sections_count >= 1)
                    <span class="text-md text-gray-600 text-center">
                        {{ __('This course contains') }}
                        {{ $course->sections_count }} {{ ($course->sections_count > 1 ) ? __('sections') : __('section') }}
                    </span>
                @endif



                @foreach($course->sections as $section)
                <div id="accordion-open" @if( $loop->first) x-data="{ open: true}"  @else x-data="{ open: false}" @endif class="mt-4">
                    <h2 id="accordion-open-heading-1" class="text-lg">
                        <button type="button" class="flex justify-between items-center p-5 w-full text-left text-gray-900 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 font-semibold" x-on:click=" open = !open ">
                            <span class="flex items-center">
                              <span class="uppercase mr-1">{{ __('Section') }}</span> {{ $loop->iteration }} : {{ $section->title }}
                            </span>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                      </h2>

                      <div class="w-full text-gray-500 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white" x-show=" open " x-transition:enter="transition ease-in-out duration-500" x-transition.delay.0.5s>
                         @if(count($section->scorms) > 0)
                            @foreach($section->scorms as $scorm)
                                <button wire:click="$emit('change-lesson', {{ $scorm }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200  focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white cursor-auto">

                                    <x-icons.video classes="mr-2" key="icon-{{ $scorm->id }}" color="#BDBDBD"></x-icons.video>

                                    @php
                                        $scormTitle = trim($scorm->title)
                                    @endphp

                                    <p class="text-left ...">{{ $scormTitle }}</p>
                                </button>
                            @endforeach
                         @else
                            @foreach($section->lessons as $lesson)
                                <button wire:click="$emit('change-lesson', {{ $lesson }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200  focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white cursor-auto">

                                    <x-icons.video classes="mr-2" key="icon-{{ $lesson->id }}" color="#BDBDBD"></x-icons.video>

                                    @php
                                        $lessonTitle = trim($lesson->title)
                                    @endphp

                                    <p class="text-left ...">{{ $lessonTitle }}</p>
                                </button>
                            @endforeach

                         @endif

                      </div>
                    </div>
                    @endforeach

            </section>

            <!-- tag component -->
            @isset($course->tags)
                <div class="w-full pb-12 flex">
                    @foreach ($course->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}" class="cursor-pointer mb-8 mr-2 text-normal">
                            <x-tailwind.tag :id="'tag-'.$tag->id" :text="$tag->name" color="gray" :icon="$tag->icon" />
                        </a>
                    @endforeach
                </div>
            @endisset

            <!-- rating star component -->
            <div class="flex justify-center">
                <x-tailwind.cards.reviews-card :model="$course"></x-tailwind.cards.reviews-card>
            </div>

            {{-- @livewire('courses-reviews', $course) --}}

        </div>

        <!-- aside -->
        <div class="order-1  md:order-2 lg:order-2 px-4 md:px-0">

            <!-- enrollment card -->
            <section class="card my-8">
                <div class="card-body p-8 bg-primary shadow-md">

                    @can( 'enrolled', $course )

                        @can('completeCourse', $course)
                            <a href="" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Ver certificado') }}</a>
                        @else
                            <i class="fas fa-info-circle mr-2 text-blue-50"></i><span class="text-blue-50 font-semibold">{{ __('You are already enrolled in this course.') }}</span>
                            <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white mt-4" bgColor="white" color="blue" :link="route('courses.status', $course)" >
                                {{ __('Continue course') }}
                            </x-tailwind.buttons.cta-button>
                        @endcan
                    @else
                        @if( $course->price->value == 0 )
                            @empty($course->start_date)
                                <span class="text-blue-50 font-semibold">{{ __('Start whenever you want') }}</span>
                            @else
                                <span class="text-blue-50 font-semibold">{{ __('This course starts on') }} {{ $course->getCourseStartDateAttribute() }}</span>
                            @endempty
                            <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">{{ __('Free') }}</p>
                            <div class="mt-4">
                                <!-- users enrolled -->
                                <p class="text-blue-50 sm:text-sm md:text-md lg:mx-0">
                                    {{ __('Start learning today! We offer you the flexibility to learn at your own pace, but remember, the more skill points you accumulate, the more opportunities you will have.') }}
                                </p>
                            </div>
                            <!-- CTA button  -->
                            <div class="mt-6">
                                <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('courses.enrollment', $course)" >
                                    {{ __('Make enrollement') }}
                                </x-tailwind.buttons.cta-button>
                            </div>
                        @else
                            <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">
                                US$ {{ $course->price->value }}
                            </p>
                            <!-- CTA button  -->
                            <div class="mt-6">
                                <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('payment.checkout', $course )" >
                                    {{ __('Buy this course') }}
                                </x-tailwind.buttons.cta-button>
                            </div>
                        @endif
                    @endcan
                    <!-- /enrollment card -->

                </div>
            </section>

            <!-- course info -->
            <section class="mb-12">
                <div class="grid grid-cols-6">
                    <div class="col-span-2 px-2">
                        <div class="flex flex-col text-center">
                            {{-- <span class="text-gray-500 text-xs">{{ __('Level') }}</span> --}}
                            <img class="h-20 w-auto" src={{ asset($course->getLevelBadge()) }}>
                            <span class="text-gray-800 font-semibold text-xs">{{ $course->level->name }}</span>
                        </div>
                    </div>
                    <div class="col-span-2 border-l-2 px-2">
                        <div class="flex flex-col justify-between">
                            <span class="text-gray-500 text-xs">{{ __('Duration') }}</span>
                            <div class="flex flex-1 flex-col mt-4">
                                <span class="text-2xl font-semibold">{{ $course->hours }}</span>
                                <span class="text-gray-800 font-semibold text-xs">{{ __('You can spend') }} {{ $course->getLearningTimePerWeek() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 border-l-2 px-2">
                        <div class="flex flex-col justify-between">
                            <span class="text-gray-500 text-xs">{{ __('Students') }}</span>
                            <div class="flex flex-1 flex-col mt-4">
                                <span class="text-2xl font-semibold">{{ $course->users_count }}</span>
                                <span class="text-gray-800 font-semibold text-xs">{{ __('Enrolled in this course') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- related course -->
            <aside class="hidden md:block divide-y divide-gray-300">

                @if(count($related_courses))
                    <h2 class="font-bold text-2xl text-gray-600 mb-12">{{ __('Related courses') }}</h2>

                    @foreach ( $related_courses as $course )

                        <article class="py-3 grid md:grid-cols-1 lg:grid-cols-3 items-center">
                            <!-- related course image -->
                            @isset( $course->image )
                                <img src="{{ Storage::url( $course->image->url ) }}" alt="{{ $course->name }}" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" />
                            @else
                                <img id="picture" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $course->name }}" >
                            @endisset

                            <div class="ml-3 md:col-span-1 lg:col-span-2">
                                <h3>
                                    <a class="font-bold text-gray-600 mb-3" title="{{ $course->title }}" href="{{ route('courses.show', $course ) }}">{{ Str::limit( $course->title, 40 ) }}</a>
                                </h3>
                                <div class="flex items-center mb-4">
                                    <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $course->editor->profile_photo_url }}" alt="" />
                                    <p class="font-bold text-sm text-gray-500 ml-2"> {{ $course->editor->name . ' ' . $course->editor->lastname }} </p>
                                </div>
                                <div class="flex items-center">
                                    <!-- rating -->
                                    <p class="text-yellow-400 font-extrabold text-md mr-4">
                                        {{ $course->rating }}<i class="fas fa-star text-yellow-300 ml-2"></i>
                                    </p>
                                    <!-- users enrolled -->
                                    <p class="text-gray-600 text-sm">
                                        <i class="fas fa-users text-sm mr-2"></i>{{ $course->users_count }}
                                    </p>
                                    <!-- course price -->
                                    <p class="text-md text-gray-700 font-bold ml-auto">
                                        {{ $course->price->value > 0 ? $course->price->value : __('Free') }}
                                    </p>
                                </div>
                            </div>
                        </article>

                    @endforeach

                @endif

                @if($course->topic)
                <div class="w-full pt-4">
                    <a class="text-blue-500" href="{{ route('topic.show', $course->topic) }}">{{ __('More courses in') }} {{ $course->topic->name }}</a>
                </div>
                @endif

                {{-- TODO: Encuesta de satisfaccion --}}
                {{-- <h2 class="font-bold text-2xl text-gray-600 my-12">Encuesta de Satisfacción</h2>
                <article>
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </article> --}}

            </aside>

        </div>

    </div>

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/student/courses/review.js') }}"></script>

    </x-slot>

</x-app-layout>

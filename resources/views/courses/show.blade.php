<x-app-layout>

    <section name="header" class="bg-blue-900">
        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 gap-6 items-center">
            <x-tailwind.breadcrumb :current="$course" color="gray"/>
            </div>
    </section>

    <section class="bg-blue-900 pb-12">
        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

            <figure>
            <!-- card image -->
                @isset( $course->image )
                    <img src="{{ Storage::url( $course->image->url ) }}" alt="" class="h-80 w-11/12 object-cover shadow" />
                @else
                    <img id="picture" class="h-80 w-11/12 object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                @endisset
            </figure>
            <div>
                <button type="button" class="bg-opacity-25 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none">
                    {{ __($course->type->name) }}
                </button>
                <h1 class="text-white font-extrabold text-2xl sm:text-3xl md:text-4xl">{{ $course->title }}</h1>
                <h2 class="text-white mt-3 sm:mt-5 sm:text-lg md:mt-5 md:text-xl lg:mx-0 mb-4">{{ $course->subtitle }}</h2>

                <!-- category -->
                <a href="{{ route('courses.category', ['category' => $course->category]) }}" data-tooltip-target="{{ $course->id }}-category-tooltip" data-tooltip-placement="top" class="mr-2 ">
                    <!-- tag -->
                    <x-tailwind.tag :id="'course-category-'.$course->category->id" text="{{ __($course->category->name) }}" color="gray" :icon="$course->category->icon" />
                </a>
                <!-- tooltip -->
                <x-tooltip :id="$course->id . '-category'" text="{{ __('Category') }}"/>

                <!-- topic -->
                <a href="{{ route('courses.topic', ['category' => $course->category, 'topic' => $course->topic]) }}" data-tooltip-target="{{ $course->id }}-topic-tooltip" data-tooltip-placement="top" class="mr-2 ">
                    <!-- tag -->
                    <x-tailwind.tag :id="'course-topic-'.$course->topic->id" text="{{ __($course->topic->name) }}" color="gray" :icon="$course->topic->icon" />
                </a>
                <!-- tooltip -->
                <x-tooltip :id="$course->id . '-topic'" text="{{ __('Topic') }}"/>



                <p class="text-white sm:text-md md:text-lg lg:mx-0 mb-2"><span class="text-gray-400"><i class="fas fa-layer-group text-sm mr-2"></i>{{ __('Level') }}:&nbsp;</span>{{ __($course->level->name) }}</p>

                <!-- rating star component -->
                <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />

                <div class="flex mb-4">
                    <!-- users enrolled -->
                    <p class="text-white sm:text-md md:text-lg lg:mx-0">
                        <i class="fas fa-users text-sm mr-2"></i>{{ $course->participants_count }} {{ $course->participants_count > 1 || $course->participants_count == 0 ? __('Users') : __('User') }}
                    </p>
                </div>
            </div>

        </div>
    </section>


    <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16 py-12">

        <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

            <!-- section description -->
            <section class="mb-12">
                <h2 class="font-bold text-2xl text-gray-600">{{ __('Description') }}</h2>
                <div class="text-gray-600 text-base mt-4">
                    {!! $course->summary !!}
                </div>
            </section>

            <!-- section requirements  -->
            <section class="mb-12">
                <h2 class="font-bold text-2xl text-gray-600">{{ __('Requirements') }}</h2>

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

                <h2 class="font-bold text-2xl mb-2 text-gray-600">{{ __('What you will learn') }}</h2>
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
                <h2 class="font-bold text-2xl text-gray-600">{{ __('Course content') }}</h2>

                @foreach ( $course->sections as $section )

                    <article class="mt-4 shadow" @if( $loop->first) x-data="{ open: true}"  @else x-data="{ open: false}" @endif>
                        <header class="border border-gray-200 px-4 pt-2 cursor-pointer bg-gray-100 bg-opacity-25 flex justify-between items-center" x-on:click=" open = !open ">
                            <h3 class="text-xl mb-2 text-gray-600">
                                <span class="font-bold">{{ __('Section') }} {{ ($loop->index + 1) }} :</span> <span class="font-semibold text-left">{{ $section->name }}</span>
                            </h3>
                            <i class="fas fa-chevron-down ml-2 text-gray-400" x-show=" !open "></i>
                            <i class="fas fa-chevron-right ml-2 text-gray-400" x-show=" open "></i>
                        </header>
                        <div class="bg-white py-2 px-4" x-show=" open " x-transition:enter="transition ease-in-out duration-500" x-transition.delay.0.5s>
                            <ul class="grid grid-cols-1 gap-x-3 divide-y">

                                @foreach ($section->lessons as $lesson )

                                    <li class="text-gray-600 text-base"><i class="far fa-play-circle text-lg text-gray-500 mr-4 py-2"></i>{{ $lesson->name }}</li>

                                @endforeach
                            </ul>
                        </div>
                    </article>

                @endforeach

            </section>

            <!-- tag component -->
            <div class="w-full pb-12 flex">
                @foreach ($course->tags as $tag)
                    <a href="{{ route('courses.tag', $tag) }}" class="cursor-pointer mb-8 text-normal">
                        <x-tailwind.tag :id="'tag-'.$tag->id" :text="$tag->name" color="gray" :icon="$tag->icon" />
                    </a>
                @endforeach
            </div>

            @livewire('courses-reviews', ['course' => $course])

        </div>

        <div class="order-1  md:order-2 lg:order-2">
            <section class="card mb-12">
                <div class="card-body">
                    <!-- Author info -->
                    <div class="flex items-center">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->editor->profile_photo_url }}" alt="Foto de perfil de {{ $course->editor->name }}"/>
                        </figure>
                        <div class="ml-4">
                            <p class="font-bold text-lg text-gray-600">{{ $course->editor->name . ' ' . $course->editor->lastname }}</p>
                                @foreach($course->editor->roles as $role)
                                    @if($role->name == 'Creator')
                                        <p class="text-md text-gray-600 mr-2">Analista de Empleo</p>
                                    @endif
                                    @if($role->name == 'Instructor')
                                        <p class="text-md text-gray-600 mr-2">Instructor</p>
                                    @endif
                                @endforeach
                            <a class="text-gray-400 hover:text-gray-600 text-sm font-bold" href="mailto:{{ $course->editor->email }}" target="_blank"><i class="far fa-envelope fa-lg"></i></a>
                        </div>
                    </div>



                    {{-- @if( auth()->check() && !(Auth::user()->hasRole(['Administrator', 'Manager', 'Creator', 'Instructor']) )) --}}

                    {{-- @can('view-course') --}}

                        @can( 'enrolled', $course )

                        <!-- TODO: Condition if course last lesson platform is Microsoft or Linkedin -->
                        {{-- {{$course->url}}               --}}

                            {{-- @if( $course->url != '' )

                                <!-- CTA button : user enrolled -->
                                <a href="{{ $course->url }}" class="btn-cta btn-success btn-block mt-4 hover:shadow">Continuar con el curso</a>

                            @else

                                <!-- CTA button : user enrolled -->
                                <a href="{{ route('courses.status', $course ) }}" class="btn-cta btn-success btn-block mt-4 hover:shadow">Continuar con el curso</a>

                            @endif --}}
                            @if($course->completed && !is_null($course->completed))
                                <a href="" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Ver certificado') }}</a>
                            @else

                                <!-- CTA button : user enrolled -->
                                <a href="{{ route('courses.status', ['course' => $course] ) }}" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Continue with the course') }}</a>
                            @endif
                        @else

                            {{-- @if( $course->url != '' )

                                <!-- CTA button : user enrolled -->
                                <a href="{{ $course->url }}" class="btn-cta btn-accent btn-block mt-4 hover:shadow">Iniciar este curso</a>

                                <!-- TODO: Register user clicks -->

                            @else

                                <!-- CTA button -->
                                <form action="{{ route('courses.enrolled', $course ) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-cta btn-accent btn-block mt-4 hover:shadow">Iniciar este curso</button>
                                </form>
                            @endif --}}

                            {{-- @if( $course->participants_count < $course->audiences->name  ) --}}
                                @if( $course->price->value == 0 )
                                    <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">{{ __('Free') }}</p>
                                    <form action="{{ route('courses.enrolled', ['course' => $course] ) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-cta btn-accent btn-block mt-4 hover:shadow">{{ __('Start this course') }}</button>
                                    </form>
                                @else
                                    <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                                    <a href="{{ route('payment.checkout', $course ) }}" class="btn-cta btn-accent btn-block hover:shadow">{{ __('Buy this course') }}</a>
                                @endif
                            {{-- @else
                                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                    <p>Por el momento no tenemos cupo disponible para este curso.</p>
                                </div>
                            @endif --}}


                        @endcan
                    {{-- @endcannot --}}

                </div>
            </section>

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
                                    <a class="font-bold text-gray-600 mb-3" title="{{ $course->title }}" href="{{ route('course.show', [app()->getLocale(), $course] ) }}">{{ Str::limit( $course->title, 40 ) }}</a>
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
                                        <i class="fas fa-users text-sm mr-2"></i>{{ $course->participants_count }}
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

                <div class="w-full pt-4">
                    <a class="text-blue-500" href="{{ route('courses.category', [app()->getLocale(), $course->category]) }}">{{ __('More courses in') }} {{ $course->category->name }}</a>
                </div>

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

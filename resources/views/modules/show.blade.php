<x-app-layout>

    <section name="header">
        <div class="bg-primary sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 gap-6 items-center px-6">
            <div class="text-sm flex items-center text-blue-50 py-4">
                <!-- topic -->
                @if($module->topic)
                    <a href="" data-tooltip-target="{{ $module->id }}-category-tooltip" data-tooltip-placement="top">
                        <!-- tag -->
                        {{ __($module->topic->category->name) }}
                    </a>
                    <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('topic.show', $module->topic) }}" data-tooltip-target="{{ $module->id }}-topic-tooltip" data-tooltip-placement="top" class="mr-2 ">
                        <!-- tag -->
                        {{ __($module->topic->name) }}
                    </a>
                    <!-- tooltip -->
                    <x-tooltip :id="$module->id . '-topic'" text="{{ __('Topic') }}"/>
                @endif
            </div>
        </div>
    </section>

    <section class="pb-6 mb-8">
        <div class="bg-primary p-6 sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

            <figure>
            <!-- card image -->
                @isset( $module->image )
                    <img src="{{ Storage::url( $module->image->url ) }}" alt="" class="h-80 w-11/12 object-cover shadow" />
                @else
                    <img id="picture" class="h-80 w-11/12 object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                @endisset
            </figure>
            <div>
                <div class="flex items-center">
                    <button type="button" class="bg-opacity-25 hover:bg-opacity-50 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none uppercase">
                        {{ __($module->type->name) }}
                    </button>
                    <div class="flex whitespace-nowrap items-center">
                        @if($module->program)
                        <button type="button" class="bg-opacity-25 hover:bg-opacity-50 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none uppercase">
                            {{ $module->program->name }}
                        </button>
                        @endif
                    </div>
                </div>

                <!-- course title -->
                <x-tailwind.headings.h3 color="white">
                    {{ $module->title }}
                </x-tailwind.headings.h3>

                <!-- course subtitle -->
                <x-tailwind.text.paragraph color="white">
                    {{ $module->subtitle }}
                </x-tailwind.text.paragraph>


                <div class="flex items-center">
                    <!-- rating star component -->
                    <div class="flex items-center mb-4">
                        <x-tailwind.rating-star :rating="$module->rating" icon="star" color="yellow" />
                        <span class="text-md text-white ml-6"><i class="fas fa-comments mr-2"></i>{{ $module->reviews_count }} {{ Str::plural( __('review'), $module->reviews_count) }}</span>
                        <span class="text-md text-white ml-6"><i class="fas fa-eye mr-2"></i>{{ $module->views }} {{ Str::plural( __('view'), $module->views ) }}</span>
                    </div>
                </div>

                <div class="flex items-center">
                    <!-- Author info -->
                    <div class="flex items-center">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $module->instructor->profile_photo_url }}" alt="Foto de perfil de {{ $module->instructor->name }}"/>
                        </figure>
                        <div class="ml-4">
                            <span class="font-semibold text-lg text-white">{{ $module->instructor->name }}</span>
                            <br>
                            <a class="text-sm" href="mailto:{{ $module->instructor->email }}" target="_blank"><span class="lowercase text-white">{{ '@' . $module->instructor->name }}</span></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16">

        <!-- content -->
        <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

            <!-- learning path info -->

            <x-tailwind.alert.content.info classes="info" :link="route('learning-paths.show', $module->learning_path)">
                <x-slot name="title">
                    Este módulo es parte de una ruta de aprendizaje
                </x-slot>

                    Este módulo pertenece a la ruta de aprendizaje <span class="font-semibold">{{ $module->learning_path->title }}</span>. Podrás ver más información acerca de esta ruta en el siguiente enlace, y si deseas completar la misma, solo tienes que realizar cada uno de los módulos que la componen.

            </x-tailwind.alert.content.info>


            <!-- section description -->
            <section>
                <x-tailwind.text.title color="black">
                    {{ __('Description') }}
                </x-tailwind.text.title>
                <x-tailwind.text.paragraph>
                    {!! $module->summary !!}
                </x-tailwind.text.paragraph>
            </section>

            <!-- section requirements  -->
            {{-- <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('Requirements') }}
                </x-tailwind.text.title>

                <ul class="list-disc list-inside mt-4">

                    @forelse ($module->requirements as $requirement )
                        <li class="text-gray-600 text-base">
                            {{ $requirement->name }}
                        </li>
                    @empty
                        <p class="text-gray-600 text-base">
                            No tiene requisitos previos
                        </p>
                    @endforelse

                </ul>
            </section> --}}

            <!-- section goals -->
            {{-- <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('What you will learn') }}
                </x-tailwind.text.title>

                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 mt-4">

                    @foreach ( $module->goals as $goal )

                        <li class="text-gray-600 text-base flex justify-start">
                            <i class="fas fa-check text-sm text-gray-500 mr-3 pt-1 clear-left"></i>
                            {{ $goal->name }}
                        </li>

                    @endforeach

                </ul>

            </section> --}}

            <!-- section subjects -->
            <section class="mb-12">
                <x-tailwind.text.title color="black">
                    {{ __('Content') }}
                </x-tailwind.text.title>

                <!-- sections count statics -->
                @if($module->units_count >= 1)
                    <span class="text-md text-gray-600 text-center">
                        {{ __('This module contains') }}
                        {{ $module->units_count }} {{ ($module->units_count > 1 ) ? __('units') : __('unit') }}
                    </span>
                @endif

                <article class="mt-4 shadow">
                    <header class="border border-gray-200 px-4 pt-2  bg-gray-100 bg-opacity-25 flex justify-between items-center">
                        <h3 class="text-xl mb-2 text-gray-600">
                            <span class="font-bold">{{ __('Units') }}:</span>
                        </h3>
                    </header>


                    <div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($module->units as $unit)
                            <button id="unit-{{ $unit->id }}" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white focus:outline-none cursor-auto" disabled>
                                <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}" color="#BDBDBD"></x-icons.video>

                                @php
                                    $unitTitle = trim($unit->title)
                                @endphp

                                <p class="text-left ...">{{ $unitTitle }}</p>
                            </button>
                        @endforeach
                    </div>


                </article>

            </section>

            <!-- tag component -->
            @isset($module->tags)
                <div class="w-full pb-12 flex">
                    @foreach ($module->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}" class="cursor-pointer mb-8 mr-2 text-normal">
                            <x-tailwind.tag :id="'tag-'.$tag->id" :text="$tag->name" color="gray" :icon="$tag->icon" />
                        </a>
                    @endforeach
                </div>
            @endisset

            <!-- rating star component -->
            <div class="flex justify-center">
                <x-tailwind.cards.reviews-card :model="$module"></x-tailwind.cards.reviews-card>
            </div>

            {{-- @livewire('courses-reviews', $course) --}}

        </div>

        <!-- aside -->
        <aside class="order-1  md:order-2 lg:order-2 px-4 md:px-0">

            <!-- enrollment card -->
            <section class="card mb-8">
                <div class="card-body p-8 bg-primary shadow-md">

                    @can( 'moduleEnrolled', $module )

                        @can('completeModule', $module)
                            <a href="" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Ver certificado') }}</a>
                        @else
                            <i class="fas fa-info-circle mr-2 text-blue-50"></i><span class="text-blue-50 font-semibold">{{ __('You are already enrolled in this module') }}</span>
                            <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white mt-4" bgColor="white" color="blue" :link="route('modules.status', $module)" >
                                {{ __('Continue module') }}
                            </x-tailwind.buttons.cta-button>
                        @endcan
                    @else
                        @if( $module->price->value == 0 )

                            <span class="text-blue-50 font-semibold">{{ __('Start whenever you want') }}</span>

                            <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">{{ __('Free') }}</p>
                            <div class="mt-4">
                                <!-- users enrolled -->
                                <p class="text-blue-50 sm:text-sm md:text-md lg:mx-0">
                                    {{ __('Start learning today! We offer you the flexibility to learn at your own pace, but remember, the more skill points you accumulate, the more opportunities you will have.') }}
                                </p>
                            </div>
                            <!-- CTA button  -->
                            <div class="mt-6">
                                <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('modules.enrollment', $module)" >
                                    {{ __('Make enrollement') }}
                                </x-tailwind.buttons.cta-button>
                            </div>
                        @else
                            <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">
                                US$ {{ $module->price->value }}
                            </p>
                            <!-- CTA button  -->
                            <div class="mt-6">
                                <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('payment.checkout', $module )" >
                                    {{ __('Buy this module') }}
                                </x-tailwind.buttons.cta-button>
                            </div>
                        @endif
                    @endcan
                    <!-- /enrollment card -->

                </div>
            </section>

            <!-- module info -->
            <section class="mb-12">
                <div class="grid grid-cols-6">
                    <div class="col-span-2 px-2">
                        <div class="flex flex-col text-center">
                            {{-- <span class="text-gray-500 text-xs">{{ __('Level') }}</span> --}}
                            <img class="h-20 w-auto" src={{ asset($module->getLevelBadge()) }}>
                            <span class="text-gray-800 font-semibold text-xs">{{ $module->level->name }}</span>
                        </div>
                    </div>
                    <div class="col-span-2 border-l-2 px-2">
                        <div class="flex flex-col justify-between">
                            <span class="text-gray-500 text-xs">{{ __('Duration') }}</span>
                            <div class="flex flex-1 flex-col mt-4">
                                <span class="text-2xl font-semibold">{{ $module->hours }}</span>
                                <span class="text-gray-800 font-semibold text-xs">{{ __('You can spend') }} {{ $module->getLearningTimePerWeek() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 border-l-2 px-2">
                        <div class="flex flex-col justify-between">
                            <span class="text-gray-500 text-xs">{{ __('Students') }}</span>
                            <div class="flex flex-1 flex-col mt-4">
                                <span class="text-2xl font-semibold">{{ $module->users_count }}</span>
                                <span class="text-gray-800 font-semibold text-xs">{{ __('Enrolled in this module') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- related moduls -->
            <section class="hidden md:block divide-y divide-gray-300">

                @if(count($related_modules))
                    <h2 class="font-bold text-2xl text-gray-600 mb-12">{{ __('Related courses') }}</h2>

                    @foreach ( $related_modules as $module )

                        <article class="py-3 grid md:grid-cols-1 lg:grid-cols-3 items-center">
                            <!-- related course image -->
                            @isset( $module->image )
                                <img src="{{ Storage::url( $module->image->url ) }}" alt="{{ $module->title }}" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" />
                            @else
                                <img id="picture" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $module->title }}" >
                            @endisset

                            <div class="ml-3 md:col-span-1 lg:col-span-2">
                                <h3>
                                    <a class="font-bold text-gray-600 mb-3" title="{{ $module->title }}" href="{{ route('modules.show', $module ) }}">{{ Str::limit( $module->title, 40 ) }}</a>
                                </h3>
                                <div class="flex items-center mb-4">
                                    <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $module->instructor->profile_photo_url }}" alt="" />
                                    <p class="font-bold text-sm text-gray-500 ml-2"> {{ $module->instructor->name . ' ' . $module->instructor->lastname }} </p>
                                </div>
                                <div class="flex items-center">
                                    <!-- rating -->
                                    <p class="text-yellow-400 font-extrabold text-md mr-4">
                                        {{ $module->rating }}<i class="fas fa-star text-yellow-300 ml-2"></i>
                                    </p>
                                    <!-- users enrolled -->
                                    <p class="text-gray-600 text-sm">
                                        <i class="fas fa-users text-sm mr-2"></i>{{ $module->users_count }}
                                    </p>
                                    <!-- course price -->
                                    <p class="text-md text-gray-700 font-bold ml-auto">
                                        {{ $module->price->value > 0 ? $module->price->value : __('Free') }}
                                    </p>
                                </div>
                            </div>
                        </article>

                    @endforeach

                @endif

                @if($module->topic)
                <div class="w-full pt-4 mb-8">
                    <a class="text-blue-500" href="{{ route('topic.show', $module->topic) }}">{{ __('More modules in') }} {{ $module->topic->name }}</a>
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

            </section>

        </aside>

    </div>

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/student/courses/review.js') }}"></script>

    </x-slot>

</x-app-layout>

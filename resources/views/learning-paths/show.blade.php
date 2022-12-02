<x-app-layout>

    <section name="header" class="bg-blue-900">
        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 gap-6 items-center">
            {{-- <x-tailwind.breadcrumb :current="$path" color="gray"/>
            </div> --}}
    </section>

    <x-tailwind.layouts.container>
        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16 pb-12">

            <div class="order-1 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

                 <!-- header -->
                <section class="py-12">

                        <div>
                            <div class="flex items-center mb-6">
                                <!-- badge icon -->
                                <img :key="{{ 'badge-' . $path->id }}" class="h-32 w-32 min-w-max" src="{{ asset('images/badges/paths.svg') }}" alt="{{ __('Paths') }}" >
                                <div class="text-left ml-6">
                                    <button type="button" class="bg-opacity-25 uppercase mr-2 bg-blue-300 text-blue-900 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none">
                                        {{ __($path->type->name) }}
                                    </button>
                                    <x-tailwind.headings.h3 color="blue">
                                        {{ $path->title }}
                                    </x-tailwind.headings.h3>

                                    <div class="flex items-center">
                                        <!-- rating star component -->
                                        <div class="flex items-center mb-4">
                                            <x-tailwind.rating-star :rating="$path->rating" icon="star" color="yellow" />
                                            <span class="text-md text-gray-600 ml-6"><i class="fas fa-comments mr-2"></i>{{ $path->reviews_count }} {{ Str::plural( __('review'), $path->reviews_count) }}</span>
                                            <span class="text-md text-gray-600 ml-6"><i class="fas fa-eye mr-2"></i>{{ $path->views }} {{ Str::plural( __('view'), $path->views ) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="flex items-center">
                                <!-- Author info -->
                                <div class="flex items-center">
                                    <figure>
                                        <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $path->instructor->profile_photo_url }}" alt="Foto de perfil de {{ $path->instructor->name }}"/>
                                    </figure>
                                    <div class="ml-4">
                                        <span class="font-semibold text-lg text-gray-600">{{ $path->instructor->name }}</span>
                                        <br>
                                        <a class="text-sm" href="mailto:{{ $path->instructor->email }}" target="_blank"><span class="lowercase text-gray-600">{{ $path->instructor->email }}</span></a>
                                    </div>

                                </div>
                            </div>
                        </div>

                </section>

                <!-- section description -->
                <section class="mb-12">
                    <x-tailwind.text.title color="black">
                        {{ __('Description') }}
                    </x-tailwind.text.title>
                    <x-tailwind.text.paragraph>
                        {!! $path->summary !!}
                    </x-tailwind.text.paragraph>
                </section>

                <div class="text-center overflow-hidden h-96">
                    <figure>
                        <!-- card image -->
                        @isset( $path->image )
                            <img src="{{ Storage::url( $path->image->url ) }}" alt="" class="h-80 w-full object-cover shadow" />
                        @else
                            <img id="picture" class="h-80 w-full object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                        @endisset
                    </figure>
                </div>




                <!-- tag component -->
                @isset($path->tags)
                    <div class="w-full pb-12 flex">
                        @foreach ($path->tags as $tag)
                            <a href="{{ route('tags.show', $tag) }}" class="cursor-pointer mb-8 text-normal">
                                <x-tailwind.tag :id="'tag-'.$tag->id" :text="$tag->name" color="gray" :icon="$tag->icon" />
                            </a>
                        @endforeach
                    </div>
                @endisset

                <!-- rating star component -->
                <div class="flex justify-center">
                        <x-tailwind.cards.reviews-card :model="$path"></x-tailwind.cards.reviews-card>
                </div>


                {{-- @livewire('courses-reviews', ['course' => $workshop]) --}}

            </div>

            <div class="order-2  md:order-2 lg:order-2">

                <div class="block">

                    <!-- enrollment card -->
                    <section class="card my-12">
                        <div class="card-body p-8 bg-primary shadow-md">

                            @can( 'learningPathEnrolled', $path )

                                @can('completeLearningPath', $path)
                                    <a href="" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Ver certificado') }}</a>
                                @else
                                    <!-- CTA button : user enrolled -->
                                    <i class="fas fa-info-circle mr-2 text-blue-50"></i><span class="text-blue-50 font-semibold">{{ __('You are already enrolled in this path.') }}</span>
                                    <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white mt-4" bgColor="white" color="blue" :link="route('learning-paths.status', $path)" >
                                        {{ __('Continue path') }}
                                    </x-tailwind.buttons.cta-button>
                                @endcan
                            @else
                                @if( $path->price->value == 0 )

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
                                        <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('learning-paths.enrollment', $path)" >
                                            {{ __('Make enrollement') }}
                                        </x-tailwind.buttons.cta-button>
                                    </div>
                                @else
                                    <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">
                                        US$ {{ $path->price->value }}
                                    </p>
                                    <!-- CTA button  -->
                                    <div class="mt-6">
                                        <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('payment.checkout', $path )" >
                                            {{ __('Buy this path') }}
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
                                    <img class="h-20 w-auto" src={{ asset($path->getLevelBadge()) }}>
                                    <span class="text-gray-800 font-semibold text-xs">{{ $path->level->name }}</span>
                                </div>
                            </div>
                            <div class="col-span-2 border-l-2 px-2">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 text-xs">{{ __('Duration') }}</span>
                                    <span class="text-2xl font-semibold">{{ $path->hours }}</span>
                                    <span class="text-gray-800 font-semibold text-xs">{{ __('You can spend') }} {{ $path->getLearningTimePerWeek() }}</span>
                                </div>
                            </div>
                            <div class="col-span-2 border-l-2 px-2">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 text-xs">{{ __('Students') }}</span>
                                    <span class="text-2xl font-semibold">{{ $path->users_count }}</span>
                                    <span class="text-gray-800 font-semibold text-xs">{{ __('Enrolled in this path') }}</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- learning path modules -->
                    <section class="mb-12">
                        <x-tailwind.text.title color="black">
                            {{ __('Modules') }}
                        </x-tailwind.text.title>

                        <!-- modules count statics -->
                        @if($path->modules_count >= 1)
                            <span class="text-md text-gray-600 text-center">
                                {{ __('This path contains') }}
                                {{ $path->modules_count }} {{ ($path->modules_count > 1 ) ? __('modules') : __('module') }}
                            </span>
                        @endif

                        @foreach ( $path->modules as $module )

                            <article class="mt-4 shadow" @if( $loop->first && ($module->units_count >= 1) ) x-data="{ open: true}"  @else x-data="{ open: false}" @endif>
                                <header class="border border-gray-200 px-4 pt-2 cursor-pointer bg-gray-100 bg-opacity-25 flex justify-between items-center" @if($module->units_count >= 1) x-on:click=" open = !open " @endif>
                                    <h3 class="text-xl mb-2 text-gray-600">
                                        <span class="font-bold">{{ __('Module') }} {{ ($loop->index + 1) }} :</span> <span class="font-semibold text-left">{{ $module->title }}</span>
                                    </h3>
                                    @if($module->units_count >= 1)
                                        <i class="fas fa-chevron-down ml-2 text-gray-400" x-show=" !open "></i>
                                        <i class="fas fa-chevron-right ml-2 text-gray-400" x-show=" open "></i>
                                    @endif
                                </header>
                                <div class="bg-white py-2 px-4" x-show=" open " x-transition:enter="transition ease-in-out duration-500" x-transition.delay.0.5s>
                                    <ul class="grid grid-cols-1 gap-x-3 divide-y">

                                        @foreach ($module->units as $unit )

                                            <li class="text-gray-600 text-base"><i class="far fa-play-circle text-lg text-gray-500 mr-4 py-2"></i>{{ $unit->title }}</li>

                                        @endforeach
                                    </ul>
                                </div>
                            </article>

                        @endforeach

                    </section>

                    <!-- Related Learning Paths -->
                    <aside class="hidden md:block divide-y divide-gray-300">

                        @if(count($relatedLearningPaths))
                            <h2 class="font-bold text-2xl text-gray-600 mb-12">{{ __('Related Learning Paths') }}</h2>

                            @foreach ( $relatedLearningPaths as $path )

                                <article class="py-3 grid md:grid-cols-1 lg:grid-cols-3 items-center">
                                    <!-- related path image -->
                                    @isset( $path->image )
                                        <img src="{{ Storage::url( $path->image->url ) }}" alt="{{ $path->title }}" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" />
                                    @else
                                        <img id="picture" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $path->title }}" >
                                    @endisset

                                    <div class="ml-3 md:col-span-1 lg:col-span-2">
                                        <h3>
                                            <a class="font-bold text-gray-600 mb-3" title="{{ $path->title }}" href="{{ route('learning-paths.show', $path ) }}">{{ Str::limit( $path->title, 40 ) }}</a>
                                        </h3>
                                        <div class="flex items-center mb-4">
                                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $path->instructor->profile_photo_url }}" alt="" />
                                            <p class="font-bold text-sm text-gray-500 ml-2"> {{ $path->instructor->name . ' ' . $path->instructor->lastname }} </p>
                                        </div>
                                        <div class="flex items-center">
                                            <!-- rating -->
                                            <p class="text-yellow-400 font-extrabold text-md mr-4">
                                                {{ $path->rating }}<i class="fas fa-star text-yellow-300 ml-2"></i>
                                            </p>
                                            <!-- users enrolled -->
                                            <p class="text-gray-600 text-sm">
                                                <i class="fas fa-users text-sm mr-2"></i>{{ $path->users_count }}
                                            </p>
                                            <!-- path price -->
                                            <p class="text-md text-gray-700 font-bold ml-auto">
                                                {{ $path->price->value > 0 ? $path->price->value : __('Free') }}
                                            </p>
                                        </div>
                                    </div>
                                </article>

                            @endforeach

                        @endif

                        @if($path->topic)
                        <div class="w-full pt-4">
                            <a class="text-blue-500" href="{{ route('topic.show', $path->topic) }}">{{ __('More paths in') }} {{ $path->topic->name }}</a>
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

        </div>
    </x-tailwind.layouts.container>

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/student/courses/review.js') }}"></script>

    </x-slot>

</x-app-layout>

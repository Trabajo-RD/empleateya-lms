<x-app-layout>

        <section class="pb-6">
            <div class="bg-primary p-6 sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

                <div class="relative flex items-center overflow-hidden h-80">

                    <!-- card image -->
                    @isset( $workshop->image )
                        <img src="{{ Storage::url( $workshop->image->url ) }}" alt="" class="h-80 w-11/12 object-cover shadow" />
                    @else
                        <!-- badge icon -->
                        <img :key="{{ 'badge-' . $workshop->id }}" class="h-44 absolute inset-x-0 m-auto z-10 transition duration-300 transform hover:scale-125" src="{{ asset('images/badges/workshops.svg') }}" alt="{{ __('Workshops') }}" >
                        <img id="picture" class="w-auto object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                    @endisset

                </div>
                <div>
                    <button type="button" class="bg-opacity-25 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none">
                        {{ __($workshop->type->name) }}
                    </button>
                    <x-tailwind.headings.h3 color="white">
                        {{ $workshop->title }}
                    </x-tailwind.headings.h3>

                    <!-- workshop subtitle -->
                    <x-tailwind.text.paragraph color="white">
                        {{ $workshop->subtitle }}
                    </x-tailwind.text.paragraph>

                    <div class="flex items-center">
                        <!-- rating star component -->
                        <div class="flex items-center mb-4">
                            <x-tailwind.rating-star :rating="$workshop->rating" icon="star" color="yellow" />
                            <span class="text-md text-white ml-6"><i class="fas fa-comments mr-2"></i>{{ $workshop->reviews_count }} {{ Str::plural( __('review'), $workshop->reviews_count) }}</span>
                            <span class="text-md text-white ml-6"><i class="fas fa-eye mr-2"></i>{{ $workshop->views }} {{ Str::plural( __('view'), $workshop->views ) }}</span>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <!-- Author info -->
                        <div class="flex items-center">
                            <figure>
                                <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $workshop->owner->profile_photo_url }}" alt="Foto de perfil de {{ $workshop->owner->name }}"/>
                            </figure>
                            <div class="ml-4">
                                <span class="font-semibold text-lg text-white">{{ $workshop->owner->name }}</span>
                                <br>
                                <a class="text-sm" href="mailto:{{ $workshop->owner->email }}" target="_blank"><span class="lowercase text-white">{{ '@'. $workshop->owner->name }}</span></a>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </section>


        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16">

            <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

                <!-- section description -->
                <section class="mb-12">
                    <x-tailwind.text.title color="black">
                        {{ __('Description') }}
                    </x-tailwind.text.title>
                    <x-tailwind.text.paragraph>
                        {!! $workshop->summary !!}
                    </x-tailwind.text.paragraph>
                </section>

                <!-- attitudes  -->

                @if($workshop->attitudes)
                    <section class="mb-12">
                        <x-tailwind.text.title color="black">
                            {{ __('Required attitudes') }}
                        </x-tailwind.text.title>

                        <ul class="list-disc list-inside mt-4">

                            @foreach ($workshop->attitudes as $attitude )
                                <li class="text-gray-600 text-base">
                                    {{ $attitude->name }}
                                </li>
                            @endforeach

                        </ul>
                    </section>
                @endif

                <!-- abilities  -->
                <section class="mb-12">
                    <x-tailwind.text.title color="black">
                        {{ __('Skills to develop') }}
                    </x-tailwind.text.title>

                    <ul class="list-disc list-inside mt-4">

                        @forelse ($workshop->abilities as $ability )
                            <li class="text-gray-600 text-base">
                                {{ $ability->name }}
                            </li>
                        @empty
                            <p class="text-gray-600 text-base">
                                Por el momento este taller no tiene habilidades asignadas.
                            </p>
                        @endforelse

                    </ul>
                </section>


                <!-- section subjects -->
                <section class="mb-12">
                    <x-tailwind.text.title color="black">
                        {{ __('Workshop content') }}
                    </x-tailwind.text.title>

                    @foreach ( $workshop->activities as $activity )

                        <article class="mt-4 shadow" @if( $loop->first) x-data="{ open: true}"  @else x-data="{ open: false}" @endif>
                            <header class="border border-gray-200 px-4 pt-2 cursor-pointer bg-gray-100 bg-opacity-25 flex justify-between items-center" x-on:click=" open = !open ">
                                <h3 class="text-xl mb-2 text-gray-600">
                                    <span class="font-bold">{{ __('Activity') }} {{ ($loop->index + 1) }} :</span> <span class="font-semibold text-left">{{ $activity->name }}</span>
                                </h3>
                                <i class="fas fa-chevron-down ml-2 text-gray-400" x-show=" !open "></i>
                                <i class="fas fa-chevron-right ml-2 text-gray-400" x-show=" open "></i>
                            </header>
                            <div class="bg-white py-2 px-4" x-show=" open " x-transition:enter="transition ease-in-out duration-500" x-transition.delay.0.5s>
                                <ul class="grid grid-cols-1 gap-x-3 divide-y">

                                    @foreach ($activity->tasks as $task )

                                        <li class="text-gray-600 text-base"><i class="far fa-play-circle text-lg text-gray-500 mr-4 py-2"></i>{{ $task->name }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        </article>

                    @endforeach

                </section>

                <!-- tag component -->
                @isset($workshop->tags)
                    <div class="w-full pb-12 flex">
                        @foreach ($workshop->tags as $tag)
                            <a href="{{ route('tags.show', $tag) }}" class="cursor-pointer mb-8 text-normal">
                                <x-tailwind.tag :id="'tag-'.$tag->id" :text="$tag->name" color="gray" :icon="$tag->icon" />
                            </a>
                        @endforeach
                    </div>
                @endisset

                <!-- rating star component -->
                <div class="flex justify-center">
                    <x-tailwind.cards.reviews-card :model="$workshop"></x-tailwind.cards.reviews-card>
                </div>

                {{-- @livewire('courses-reviews', $course) --}}

            </div>

            <div class="order-1  md:order-2 lg:order-2">
                <!-- enrollment card -->
                <section class="card my-8">
                    <div class="card-body p-8 bg-primary shadow-md">

                        @can( 'workshopEnrolled', $workshop )

                            @can('completeWorkshop', $workshop)
                                <a href="" class="btn-cta btn-success btn-block mt-4 hover:shadow">{{ __('Ver certificado') }}</a>
                            @else
                                <i class="fas fa-info-circle mr-2 text-blue-50"></i><span class="text-blue-50 font-semibold">{{ __('You are already enrolled in this workshop.') }}</span>
                                <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white mt-4" bgColor="white" color="blue" :link="route('workshops.status', $workshop)" >
                                    {{ __('Continue workshop') }}
                                </x-tailwind.buttons.cta-button>
                            @endcan
                        @else
                            @if( $workshop->price->value == 0 )

                                @empty($workshop->start_date)
                                    <span class="text-blue-50 font-semibold">{{ __('Start whenever you want') }}</span>
                                @else
                                    @if($workshop->started)
                                        <span class="text-blue-50 font-semibold">{{ __('This workshop started') }} {{ $workshop->getWorkshopStartDateAttribute() }}</span>
                                    @else
                                        <span class="text-blue-50 font-semibold">{{ __('This workshop starts on') }} {{ $workshop->getWorkshopStartDateAttribute() }}</span>
                                    @endif
                                @endempty

                                @can('workshopStarted', $workshop)
                                    <!-- CTA button  -->
                                    <div class="mt-6">
                                        <x-tailwind.buttons.cta-button class="block uppercase  hover:text-blue-50 focus:outline-none" bgColor="blue" color="white" link="javascript:void(0)">
                                            {{ __('Workshop in progress') }}
                                        </x-tailwind.buttons.cta-button>
                                    </div>
                                    <div class="mt-4">
                                        <!-- users enrolled -->
                                        <p class="text-blue-50 sm:text-sm md:text-md lg:mx-0">
                                            {{ __('The registration date for this workshop has expired. Stay tuned for our upcoming workshops.') }}
                                        </p>
                                    </div>
                                @else
                                    <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">{{ __('Free') }}</p>
                                    <div class="mt-4">
                                        <!-- users enrolled -->
                                        <p class="text-blue-50 sm:text-sm md:text-md lg:mx-0">
                                            {{ __('Start learning today! We offer you the flexibility to learn at your own pace, but remember, the more skill points you accumulate, the more opportunities you will have.') }}
                                        </p>
                                    </div>

                                    <!-- CTA button  -->
                                    <div class="mt-6">
                                        <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('workshops.enrollment', $workshop)" >
                                            {{ __('Make enrollement') }}
                                        </x-tailwind.buttons.cta-button>
                                    </div>
                                @endcan
                            @else
                                <p class="text-3xl font-bold text-blue-50 mt-3 mb-2">
                                    US$ {{ $workshop->price->value }}
                                </p>
                                <!-- CTA button  -->
                                <div class="mt-6">
                                    <x-tailwind.buttons.cta-button class="block uppercase hover:bg-red-500 hover:text-white" bgColor="white" color="blue" :link="route('payment.checkout', $workshop )" >
                                        {{ __('Buy this workshop') }}
                                    </x-tailwind.buttons.cta-button>
                                </div>
                            @endif
                        @endcan
                        <!-- /enrollment card -->

                    </div>
                </section>

                <section class="hidden md:block divide-y divide-gray-300">

                    <!-- workshops timeline -->
                    <div class="mt-12 lg:mt-0 pl-4 overflow-hidden col-span-1" style="height: 600px;">
                        <div class="mb-8">
                            <x-tailwind.headings.h6>{{ __('Timeline') }}</x-tailwind.headings.h6>
                            <span>{{ __('Upcoming workshops') }}:</span>
                        </div>
                        <x-tailwind.layouts.scrollbar class="h-full">
                            <x-tailwind.timeline.workshop-timeline :workshops="$workshops_timeline"></x-tailwind.timeline.workshop-timeline>
                        </x-tailwind.layouts.scrollbar>
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

                </section>



                 <!-- Related Workshops -->
                 <aside class="hidden md:block divide-y divide-gray-300">

                    @if(count($relatedWorkshops))
                        <h2 class="font-bold text-2xl text-gray-600 mb-12">{{ __('Related Workshops') }}</h2>

                        @foreach ( $relatedWorkshops as $workshop )

                            <article class="py-3 grid md:grid-cols-1 lg:grid-cols-3 items-center">
                                <!-- related path image -->
                                @isset( $workshop->image )
                                    <img src="{{ Storage::url( $workshop->image->url ) }}" alt="{{ $workshop->title }}" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" />
                                @else
                                    <img id="picture" class="h-28 md:w-full lg:w-32 object-cover md:col-span-1 lg:col-span-1" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $workshop->title }}" >
                                @endisset

                                <div class="ml-3 md:col-span-1 lg:col-span-2">
                                    <h3>
                                        <a class="font-bold text-gray-600 mb-3" title="{{ $workshop->title }}" href="{{ route('workshops.show', $workshop ) }}">{{ Str::limit( $workshop->title, 40 ) }}</a>
                                    </h3>
                                    <div class="flex items-center mb-4">
                                        <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $workshop->owner->profile_photo_url }}" alt="" />
                                        <p class="font-bold text-sm text-gray-500 ml-2"> {{ $workshop->owner->name . ' ' . $workshop->owner->lastname }} </p>
                                    </div>
                                    <div class="flex items-center">
                                        <!-- rating -->
                                        <p class="text-yellow-400 font-extrabold text-md mr-4">
                                            {{ $workshop->rating }}<i class="fas fa-star text-yellow-300 ml-2"></i>
                                        </p>
                                        <!-- users enrolled -->
                                        <p class="text-gray-600 text-sm">
                                            <i class="fas fa-users text-sm mr-2"></i>{{ $workshop->users_count }}
                                        </p>
                                        <!-- path price -->
                                        <p class="text-md text-gray-700 font-bold ml-auto">
                                            {{ $workshop->price->value > 0 ? $workshop->price->value : __('Free') }}
                                        </p>
                                    </div>
                                </div>
                            </article>

                        @endforeach

                    @endif

                    @isset($workshop->topic)
                    <div class="w-full pt-4">
                        <a class="text-blue-500" href="{{ route('topic.show', $workshop->topic) }}">{{ __('More workshops in') }} {{ $workshop->topic->name }}</a>
                    </div>
                    @endisset

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

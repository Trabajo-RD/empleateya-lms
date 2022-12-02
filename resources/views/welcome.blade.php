<x-app-layout><!-- Component app/view/components/applayout -->

    <section class="bg-white">
        <x-tailwind.layouts.container>
            <!-- Buscador -->
            @livewire('search')
        </x-tailwind.layouts.container>
    </section>

    <!-- Slider -->

    @if(count( $publish_slides ))

    {{ $publish_slides }}

        <div class="slide-one-item home-slider owl-carousel">

            @foreach( $publish_slides as $item)

                <div class="site-blocks-cover" style="background-image: url('{{ Storage::url( $item->image->url ) }}'); background-repeat: no-repeat; background-size: 100vw;" data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 h-32 md:h-96 flex items-center py-20 ">
                        <div class="w-full md:w-3/4 lg:w-1/2 px-8 py-8 {{ ($item->background_color != '' && $item->background_color != 'bg-white' ) ? $item->background_color . '-' . $item->background_color_saturation : 'bg-white'}} {{ ($item->background_color_opacity != '') ? $item->background_color_opacity : 'bg-opacity-25'}} ">

                            <!-- titulo -->
                            <h1 class="{{ ($item->title_color != '' && $item->title_color != 'text-white' ) ? $item->title_color . '-' . $item->title_color_saturation : 'text-white' }} font-extrabold text-4xl sm:text-5xl md:text-6xl">{{ __($item->title) }}</h1>
                            <!-- parrafo -->
                            <p class="{{ ($item->content_color != '' && $item->content_color != 'text-white') ? $item->content_color . '-' . $item->content_color_saturation : 'text-white' }} mt-3 sm:mt-5 sm:text-lg sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __($item->content) }}</p>
                            <!-- Buscador -->

                            @if( !is_null($item->information ) )
                                <p class="text-sm mb-6 {{ ($item->content_color != '' && $item->content_color != 'text-white') ? $item->content_color . '-' . $item->content_color_saturation : 'text-white' }}">{{ $item->information }}</p>
                            @endif

                            @if( !is_null($item->link) )
                                <a href="{{ $item->link }}" target="{{ $item->target }}" class=" {{ $item->link_type }} {{ ($item->link_bg_color != '' && $item->link_bg_color != 'bg-white') ? $item->link_bg_color . '-' . $item->link_bg_color_saturation : 'bg-white' }} hover:{{ $item->link_bg_color . '-' . (((int)$item->link_bg_color_saturation) < 900 ? (int)$item->link_bg_color_saturation + 100 : $item->link_bg_color_saturation) }} hover:shadow {{ ($item->link_color != '' && $item->link_color != 'text-white') ? $item->link_color . '-' . $item->link_color_saturation : 'text-white' }}">
                                    {{ !is_null($item->link_text) ? __($item->link_text) : ''  }}
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    @else
        <!-- hero -->
        <section class="bg-cover" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/home/slider/hero2.jpg' ) }})">
            <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-10 sm:px-6 lg:px-8 py-20">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <!-- titulo -->
                    <x-tailwind.headings.h2 color="white">
                        {{ __('Free courses') }}
                    </x-tailwind.headings.h2>
                    <!-- parrafo -->
                    <x-tailwind.text.lead color="white">
                        {{ __('In our Learning Management System you will find courses and articles from different areas that will help you in your professional development')}}
                    </x-tailwind.text.lead>
                    <!-- Buscador -->
                    @livewire('search')
                </div>
            </div>
        </section>
    @endif


    <!-- CTA Section -->

    <section class="bg-primary py-4">
        <x-tailwind.layouts.container>
            <!-- title -->
            <x-tailwind.headings.h3 color="white" align="center" class="font-extrabold" >
            {{ __('Not sure what to choose?') }}
            </x-tailwind.headings.h3>

            <x-tailwind.text.lead align="center" size="md" color="white">
                {{ __('Visit our course catalog where you will find the right course for you') }}
            </x-tailwind.text.lead>
            <!-- CTA button  -->
            <div class="flex justify-center mt-2">
                <x-tailwind.buttons.cta-button bgColor="red" :link="route( 'courses.index')" >
                    {{ __('See course catalog') }}
                </x-tailwind.buttons.cta-button>
            </div>
        </x-tailwind.layouts.container>
    </section>

    <div class="divide-y divide-gray-300">

        <!-- User courses -->

        @if (Auth::check())
            @if(count($user_courses))
            {{-- {{ $user_courses }} --}}
            <section class="py-12">
                <!-- Student courses in this category -->
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h5 color="blue" align="left">
                        {{ __('Welcome') }} {{ auth()->user()->name }}!
                    </x-tailwind.headings.h5>

                    <x-tailwind.layouts.text-wrapper>
                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph>
                                {{ __('These are the last courses in which you have enrolled') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('student.courses.index')"></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>
                    <!-- courses -->
                    <div class="sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-8 mt-12">
                        @foreach ( $user_courses as $course )
                            <x-user-course :course="$course" />
                        @endforeach
                    </div>
                </x-tailwind.layouts.container>
            </section>
            @endif
        @endif

        <!-- Top rated courses -->

        @isset($top_rated_courses)
            @if( count( $top_rated_courses ) >= 4 )
                <section class="py-12">
                    <x-tailwind.layouts.container>
                        <x-tailwind.headings.h5 color="blue" align="left">
                            {{ __('Top Rated') }}
                        </x-tailwind.headings.h5>
                        <!-- text with read more -->
                        <x-tailwind.layouts.text-wrapper>
                            <div class="block md:flex items-center md:justify-between">
                                <x-tailwind.text.paragraph>
                                    {{ __('These are the courses with the best user ratings') }}
                                </x-tailwind.text.paragraph>
                                <x-tailwind.links.view-all-link :link="route('courses.index')"></x-tailwind.links.view-all-link>
                            </div>
                        </x-tailwind.layouts.text-wrapper>
                    </x-tailwind.layouts.container>

                        <!-- courses -->
                        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-20 sm:px-6 md:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-4 gap-y-8 owl-carousel top-rated-course-owl-carousel owl-theme">
                            @foreach ( $top_rated_courses as $top_rated_course )
                            <div class="item">
                                <x-tailwind.cards.top-rated :course="$top_rated_course" />
                            </div>
                            @endforeach
                        </div>
                </section>
            @endif
        @endisset

        <!-- latest courses -->

        @if( count( $latest_courses ) >= 1 )
            <section class="py-12">
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h3 color="blue" align="left">
                        {{ __('Courses') }}
                    </x-tailwind.headings.h3>
                    <!-- text with read more -->
                    <x-tailwind.layouts.text-wrapper>
                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph>
                                {{ __('These are the last courses that we have published for you') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('courses.index')"></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>

                    <!-- courses -->
                    <x-tailwind.layouts.grid-cols-4>
                        @foreach ( $latest_courses as $course )
                        <div class="col-span-1">
                            <x-course-card :course="$course" />
                        </div>
                        @endforeach
                    </x-tailwind.layouts.grid-cols-4>
                </x-tailwind.layouts.container>


            </section>
        @endif

        <!-- Latest Workshops section -->

        @if( count($workshops) >= 1 )
            <x-tailwind.layouts.section>
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h3 color="blue" align="left">
                        {{  __('Workshops') }}
                    </x-tailwind.headings.h3>
                    <x-tailwind.layouts.text-wrapper>

                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph align="left" size="lg" color="gray">
                                {{ __('List of workshops that have recently been published') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('workshops.index')"></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-8">
                        <div class="col-span-1 lg:col-span-2">
                            <x-tailwind.headings.h6>{{ __('Recently published') }}</x-tailwind.headings.h6>
                            <x-tailwind.layouts.grid-cols-1>
                                @foreach ( $workshops as $workshop )
                                    @can('workshopStarted', $workshop)
                                        <div class="col-span-1 lg:col-span-2">
                                            <x-tailwind.cards.workshop-horizontal-card :workshop="$workshop" />
                                        </div>
                                    @endcan
                                @endforeach
                            </x-tailwind.layouts.grid-cols-1>
                        </div>

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

                    </div>
                </x-tailwind.layouts.container>
            </x-tailwind.layouts.section>
        @endif

        {{-- Latest Learning Paths section --}}

        {{ count($learning_paths) }}

        @if( count( $learning_paths ) >= 1 )
            <section class="py-12">
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h3 color="blue" align="left">
                        {{  __('Learning Paths') }}
                    </x-tailwind.headings.h3>

                    <x-tailwind.layouts.text-wrapper>
                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph align="left" size="lg" color="gray">
                                {{ __('These are the latest learning paths that have been published') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('learning-paths.index')"></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>
                    {{-- <div class="flex flex-wrap gap-x-6"> --}}

                        <x-tailwind.layouts.grid-cols-3 class="owl-carousel specific-learning-paths-owl-carowsel owl-theme"><!-- DON'T MOVE -->
                            @foreach ( $learning_paths as $path )
                                <div>

                                    <x-tailwind.path-card :path="$path" />

                                </div>
                            @endforeach
                        </x-tailwind.layouts.grid-cols-3>

                    {{-- </div> --}}
                </x-tailwind.layouts.container>
            </section>
        @endif

        {{-- Categories section  --}}

        @if(isset($categories) && count($categories) >= 1)
            <section class="py-12">
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h3 color="blue" align="left">
                        {{  __('Categories') }}
                    </x-tailwind.headings.h3>
                    <!-- text with read more -->
                    <x-tailwind.layouts.text-wrapper>
                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph align="left" size="lg" color="gray">
                                {{ __('This is the list of the most requested categories.') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('categories.index')" ></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>
                    <!-- categories cloud -->
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7 gap-x-6 gap-y-8 owl-carousel categories-owl-carousel owl-theme">
                        @foreach ( $categories as $category )
                            <div class="item">
                                <x-tailwind.clouds.rdtrabaja-categories-cloud :category="$category" />
                            </div>
                        @endforeach
                    </div>
                </x-tailwind.layouts.container>
            </section>
        @endif

        <!-- partnerships -->
        @if( count( $partners) >= 1 )
            <section class="pt-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-6 gap-y-8 ">
                    <h2 class="text-center font-display font-semibold text-gray-600 text-2xl sm:text-3xl md:text-4xl mb-6">{{ __('Agreements with recognized institutions and companies') }}</h2>
                    <p class="text-center text-gray-500 text-md mb-6">{{ __('In order to offer you optimal training, and that you can join the labor market') }}</p>
                    @foreach ( $partners as $partner )
                        <figure>
                            @isset( $partner->image )
                                <img id="picture" class="img-fluid px-10" src="{{ Storage::url($partner->image->url) }}" title="{{ $partner->name }}" alt="{{ $partner->name }}" style="max-height: 100px;">
                            @else
                                <img id="picture" class="img-fluid px-10" src="{{ asset('images/courses/logo-cloud.png') }}" title="{{ $partner->name }}" alt="{{ $partner->name }}" style="max-height: 100px;" >
                            @endisset
                        </figure>
                        {{-- <x-course-card :course="$course" /> --}}
                    @endforeach
                </div>
                <hr class="mt-24">
            </section>
        @endif
    </div>

    <x-slot name="js">
        {{-- <script>
            window.onscroll = function(e) {
                if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight){
                    alert("Has llegado al final");
                }
            };
        </script> --}}
    </x-slot>

</x-app-layout>



<x-app-layout>

    <x-tailwind.layouts.container>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                <div class="p-8">
                <x-tailwind.headings.h3 color="blue">
                    {{ __('Categories') }}
                </x-tailwind.headings.h3>
                <x-tailwind.text.paragraph>
                    {{ __('The learning paths are made up of a sequence of modules that will help you develop certain skills. Each student can choose the best guided teaching option that best suits their needs. The route you choose will be a different path, but you will receive the same knowledge.') }}
                </x-tailwind.text.paragraph>
                </div>
            </div>
        </div>


        {{-- <div class="slide-one-item home-slider owl-carousel">

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

        </div> --}}

        {{-- Categories section  --}}

        @if(isset($categories) && count($categories) >= 1)
            <section class="py-12">
                <x-tailwind.layouts.container>
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

        <div class="divide-y divide-gray-300">
            @foreach($categories as $category)
                <x-tailwind.headings.h5>{{ __('Courses in') }} {{ __($category->name) }}</x-tailwind.headings.h5>
                <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-20 sm:px-6 md:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-4 gap-y-8 owl-carousel top-rated-course-owl-carousel owl-theme">
                    @foreach($category->courses as $course)
                        <!-- courses -->
                        <div class="item">
                            <x-course-card :course="$course" />
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        @livewire('category.category-index')

    </x-tailwind.layouts.container>



</x-app-layout>

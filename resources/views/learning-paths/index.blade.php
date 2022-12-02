<x-app-layout>

    <x-tailwind.layouts.container>
        <div class="mt-8 mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                <div class="p-8">
                <x-tailwind.headings.h3 color="blue">
                    {{ __('Learning Paths') }}
                </x-tailwind.headings.h3>
                <x-tailwind.text.paragraph>
                    {{ __('The learning paths are made up of a sequence of modules that will help you develop certain skills. Each student can choose the best guided teaching option that best suits their needs. The route you choose will be a different path, but you will receive the same knowledge.') }}
                </x-tailwind.text.paragraph>
                </div>
            </div>
        </div>       

        <main>
            @livewire('learning-path.learning-path-index')
        </main>

        {{-- Latest Learning Paths section --}}

        {{-- @if( count( $published_learning_paths ) >= 1 )
            <section class="py-12">
                <x-tailwind.layouts.container>
                    <x-tailwind.headings.h5 color="blue" align="left">
                        {{  __('Latest Learning Paths') }}
                    </x-tailwind.headings.h5>

                    <x-tailwind.layouts.text-wrapper>
                        <div class="block md:flex items-center md:justify-between">
                            <x-tailwind.text.paragraph align="left" size="lg" color="gray">
                                {{ __('These are the latest learning paths that have been published') }}
                            </x-tailwind.text.paragraph>
                            <x-tailwind.links.view-all-link :link="route('learning-paths.index')"></x-tailwind.links.view-all-link>
                        </div>
                    </x-tailwind.layouts.text-wrapper>

                            @foreach ( $published_learning_paths as $learning_path )

                                    <x-tailwind.headings.h6 class="py-12">
                                        {{ $learning_path->title }}
                                    </x-tailwind.headings.h6>
                                    <x-tailwind.layouts.grid-cols-3 class="owl-carousel specific-learning-paths-owl-carowsel owl-theme">
                                            @foreach($learning_path->children as $path)
                                                <div class="item">
                                                    <x-tailwind.path-card :path="$path" />
                                                </div>
                                            @endforeach
                                    </x-tailwind.layouts.grid-cols-3>

                            @endforeach
                </x-tailwind.layouts.container>
            </section>
        @endif --}}
    </x-tailwind.layouts.container>

</x-app-layout>

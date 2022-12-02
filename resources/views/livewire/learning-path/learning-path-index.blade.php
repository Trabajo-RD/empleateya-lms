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
                        <a class="cursor-pointer uppercase transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('modality_id', {{ $modality->id }})" x-on:click="open = false">
                            {{ __($modality->name) }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- programs filter -->
            <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md whitespace-nowrap" x-on:click="open = true">
                    {{ __('Program or Platform') }}
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                    @foreach($programs as $program)
                        <a class="cursor-pointer uppercase transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('program_id', {{ $program->id }})" x-on:click="open = false">
                            {{ __($program->name) }}
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
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200 uppercase" wire:click="$set('level_id', {{ $level->id }})" x-on:click="open = false">
                            {{ __($level->name) }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- language filter -->
            <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                    {{ __('Language') }}
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                    @foreach($languages as $language)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('language_id', {{ $language->id }})" x-on:click="open = false">
                            {{ $language->name }}
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
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('price_id', {{ $price->id }})" x-on:click="open = false">
                            {{ $price->name }}
                        </a>
                    @endforeach
                </div>
            </div>

                <!-- filter buttons -->
                <div class="flex items-center justify-end py-8 gap-x-4">
                    <a class="btn bg-gray-200 text-gray-800 cursor-pointer uppercase" wire:click="resetFilters">
                        {{ __('Reset') }}
                    </a>
                    {{-- <a class="btn bg-blue-900 text-blue-50">{{ __('Filter') }}</a> --}}
                </div>

            </aside>
            <!-- /Sidebar -->

            <!-- Content -->
            <main class="col-span-3">

                <!-- sortBy -->
                {{-- TODO: Create order by dropdown --}}
                {{-- <div class="col-span-1">
                    <select class="" aria-label="{{ __('Sort By') }}" wire:model="orderSelect">
                        <option value='{"key":"created_at", "direction":"desc"}' selected>{{ __('Sort By') }}</option>
                        <option value='{"key":"title", "direction":"asc"}' >{{ __('A-Z') }}</option>
                        <option value='{"key":"rating", "direction":"desc"}' >{{ __('Best Rating') }}</option>
                        <option value='{"key":"price", "direction":"asc"}' >{{ __('Low to High Price') }}</option>
                        <option value='{"key":"price", "direction":"desc"}' >{{ __('High to Low Price') }}</option>
                    </select>
                </div> --}}

                <!-- learning paths search -->
                @livewire('search.learning-path-search')

                @if( count( $learningPaths ) >= 1 )
                        <!-- text with read more -->
                        {{-- <x-tailwind.layouts.text-wrapper>
                            <div class="block md:flex items-center md:justify-between">
                                <x-tailwind.text.paragraph>
                                    {{ $totalLearningPaths }} {{ $totalLearningPaths != 1 ? __('Published courses') : __('Published course') }}
                                </x-tailwind.text.paragraph>
                            </div>
                        </x-tailwind.layouts.text-wrapper> --}}

                        <!-- courses -->
                        <div class="m-mx-4 flex flex-wrap">
                            @foreach ( $learningPaths as $learningPath )
                            <div class="w-full p-4 sm:w-1/2 lg:w-1/2">
                            <x-tailwind.path-card :path="$learningPath" />
                            </div>
                            @endforeach
                        </div>

                @else
                <p>Sin resultados</p>
                @endif
            </main>
            <!-- /Content -->

            <footer class="col-span-4">
                <!-- navigation links -->
                {{ $learningPaths->links() }}
            </footer>

        </div>
    </x-tailwind.layouts.container>
</div>

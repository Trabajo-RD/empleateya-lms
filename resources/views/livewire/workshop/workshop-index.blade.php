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
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200 uppercase" wire:click="$set('modality_id', {{ $modality->id }})" x-on:click="open = false">
                                {{ __($modality->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>


                <!-- platform filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Program or Platform') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($programs as $program)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200" wire:click="$set('program_id', {{ $program->id }})" x-on:click="open = false">
                                {{ $program->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- languages filter -->
                <div class="mb-6 block items-center justify-between" x-data="{ open: false }">
                    <button class=" mb-2 w-full flex justify-between px-6 py-2.5 font-medium text-md leading-normal uppercase rounded shadow-md" x-on:click="open = true">
                        {{ __('Language') }}
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <div class="relative w-full mt-2 bg-white z-40 border rounded shadow-xl" x-show.transition.duration.500ms.scale.0="open" x-on:click.away="open = false">
                        @foreach($languages as $language)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-4 text-normal hover:bg-gray-200 uppercase" wire:click="$set('language_id', {{ $language->id }})" x-on:click="open = false">
                                {{ __($language->name) }}
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
                                {{ __($price->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
               
                <!-- rating filter -->
               {{-- <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Rating') }}</x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($reviews as $review)
                            <x-tailwind.inputs.checkbox id="prices-filter">
                                <x-tailwind.rating-star :rating="$review" />
                            </x-tailwind.inputs.checkbox>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar> --}}

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

                <!-- workshops search -->                
                @livewire('search.workshop-search')

                @if( count( $workshops ) >= 1 )                      
                        <!-- courses -->
                        <x-tailwind.layouts.grid-cols-1>
                            @foreach ( $workshops as $workshop )
                                <div class="col-span-1">
                                    <x-tailwind.cards.workshop-horizontal-card :workshop="$workshop" />
                                </div>
                            @endforeach
                        </x-tailwind.layouts.grid-cols-1>
                @endif
            </main>
            <!-- /Content -->

            <footer class="col-span-4">
                <!-- navigation links -->
                {{ $workshops->links() }}
            </footer>

        </div>
    </x-tailwind.layouts.container>
</div>

<div>
    <x-tailwind.layouts.container>
        <div class="mx-auto grid grid-cols-4 gap-x-6 pb-12">

            <!-- Sidebar -->
            <aside class="col-span-1 divide-y">
                <div class="mb-6">
                    <x-tailwind.headings.h4>{{ __('Filter') }}</x-tailwind.headings.h4>
                </div>

                <x-tailwind.inputs.checkbox id="select-all" checked="checked">
                    {{ __('Select all') }}
                </x-tailwind.inputs.checkbox>

                <!-- categories filter -->
                {{-- <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Categories') }}</x-tailwind.text.caption>
                </div>
               <x-tailwind.layouts.scrollbar>
                <div class="h-56">
                    @foreach($categories as $category)
                        <x-tailwind.inputs.checkbox id="categories-filter" :value="$category->id">{{ $category->name }}</x-tailwind.inputs.checkbox>
                    @endforeach
                </div>
               </x-tailwind.layouts.scrollbar> --}}

               {{-- {{ ('category')  }} {{ $category_id }} --}}

               <!-- levels filter -->
               <div class="mb-6">
                    <x-tailwind.text.caption>
                        {{ __('Levels') }}
                        {{-- @if(count($filters['level']) > 0)
                            <a wire:click="clearFilter('levels')" class="text-blue-600 cursor-pointer">{{ __('Clear') }}</a>
                        @endif --}}
                    </x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($filterOptions['levels'] as $level)
                            {{-- <x-tailwind.inputs.checkbox id="{{ $level }}" value="{{ $level }}" label="{{ $level }}" model="filters.level">{{ $level }}</x-tailwind.inputs.checkbox> --}}
                            <div class="flex items-center mb-4">
                                <input value="{{ $level }}" id="{{ $level }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model="filters.level">
                                <label for="{{ $level }}" class="font-gotham light ml-3 text-md text-gray-800 dark:text-gray-300">
                                    {{ $level }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar>

                <!-- platform filter -->
               <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Platforms') }}</x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($filterOptions['platforms'] as $platform)
                        <div class="flex items-center mb-4">
                            <input value="{{ $platform }}" id="{{ $platform }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model="filters.platform">
                            <label for="{{ $platform }}" class="font-gotham light ml-3 text-md text-gray-800 dark:text-gray-300">
                                {{ $platform }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar>

                <!-- prices filter -->
               <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Prices') }}</x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($filterOptions['prices'] as $price)
                        <div class="flex items-center mb-4">
                            <input value="{{ $price }}" id="{{ $price }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model="filters.price">
                            <label for="{{ $price }}" class="font-gotham light ml-3 text-md text-gray-800 dark:text-gray-300">
                                {{ $price }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar>

                <!-- word filter -->
               <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Word') }}</x-tailwind.text.caption>
                </div>
                <div class="h-max">
                        <x-tailwind.inputs.base-input id="word-filter" placeholder="Busca una palabra" />
                </div>

                <!-- rating filter -->
               <div class="mb-6">
                    <x-tailwind.text.caption>{{ __('Rating') }}</x-tailwind.text.caption>
                </div>
                <x-tailwind.layouts.scrollbar>
                    <div class="h-max">
                        @foreach($filterOptions['ratings'] as $rating)
                            <input type="radio" id="rating-{{ $rating }}" value="{{ $rating }},5" autocomplete="off" wire:model="filters.rating">
                            <label for="rating-{{ $rating }}" class="cursor-pointer {{ (in_array($rating, $filters['rating'])) ? 'text-blue-500' : '' }}">
                                @for($i=0; $i<$rating; $i++)
                                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                                @endfor
                                @for($i=5; $i>$rating; $i--)
                                    <i class="fas fa-star fa-sm text-gray-400"></i>
                                @endfor
                            </label>
                        @endforeach
                    </div>
                </x-tailwind.layouts.scrollbar>

                <!-- filter buttons -->
                <div class="flex items-center justify-end py-8 gap-x-4">
                    <a href="" class="btn bg-gray-200 text-gray-800">{{ __('Clear') }}</a>
                    <a href="" class="btn bg-blue-900 text-blue-50">{{ __('Filter') }}</a>
                </div>

            </aside>
            <!-- /Sidebar -->

            <!-- Content -->
            <main class="col-span-3">
                <!-- sortBy -->
                {{-- <div class="col-span-1">
                    <select class="" aria-label="{{ __('Sort By') }}" wire:model="orderSelect">
                        <option value='{"key":"created_at", "direction":"desc"}' selected>{{ __('Sort By') }}</option>
                        <option value='{"key":"rating", "direction":"desc"}' >{{ __('Best Rating') }}</option>
                        <option value='{"key":"price", "direction":"asc"}' >{{ __('Low to High Price') }}</option>
                        <option value='{"key":"price", "direction":"desc"}' >{{ __('High to Low Price') }}</option>
                    </select>
                </div> --}}
                @if( count( $courses ) >= 1 )
                        <!-- text with read more -->
                        <x-tailwind.layouts.text-wrapper>
                            <div class="block md:flex items-center md:justify-between">
                                <x-tailwind.text.paragraph>
                                    {{ count($courses) }} {{ (count($courses) != 1) ? __('Published courses') : __('Published course') }}
                                </x-tailwind.text.paragraph>
                            </div>
                        </x-tailwind.layouts.text-wrapper>

                        <!-- courses -->
                        <div class="m-mx-4 flex flex-wrap">
                            @forelse ( $courses as $course )
                            <div class="w-full p-4 sm:w-1/2 lg:w-1/3">
                                <x-course-card :course="$course" />
                            </div>
                            @empty
                                <div class="w-full p-4">
                                    {{ __('Sorry, no courses found for the selected filters') }}
                                </div>
                            @endforelse
                        </div>
                @endif
            </main>
            <!-- /Content -->

            <footer class="col-span-4">
                <!-- navigation links -->
                {{ $courses->links() }}
            </footer>

        </div>
    </x-tailwind.layouts.container>
</div>

@props([
    'workshop'
])

<a href="{{ route('workshops.show', $workshop) }}" class="h-80 bg-white rounded-lg border shadow-sm hover:border-gray-200  hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 overflow-hidden grid grid-cols-3 relative">



    <div class="hidden h-80 col-span-1 overflow-hidden relative md:flex items-center">

        <div class="absolute z-30 left-0 top-0 p-4 uppercase">
            <!-- badge -->
            <x-tailwind.badge :id="'workshop-type-'.$workshop->type->id" text="{{ __($workshop->type->name) }}" color="gray" size="sm" class="bg-opacity-50"/>
        </div>

        @isset($workshop->image)
            <img :key="{{ 'workshop-img-'.$workshop->id }}" class="object-cover h-80 w-96 rounded-t-lg md:rounded-none md:rounded-l-lg transition duration-300 transform hover:scale-125" src="{{ Storage::url($workshop->image->url) }}" alt="">
        @else
            <!-- badge icon -->
            <img :key="{{ 'badge-' . $workshop->id }}" class="h-28 absolute inset-x-0 m-auto z-10 transition duration-300 transform hover:scale-125" src="{{ asset('images/badges/workshops.svg') }}" alt="{{ __('Workshops') }}" >
            <img :key="{{ 'workshop-img-' . $workshop->id }}" class="object-cover h-80 rounded-t-lg md:rounded-none md:rounded-l-lg transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $workshop->title }}" >
        @endif
    </div>
    <div class="relative flex flex-col justify-between col-span-3 md:col-span-2 ">


            <div class="flex items-center absolute right-0 top-0 p-6">
                <p class="text-sm text-gray-500 text-right">
                    {{ __('Published on') }} {{$workshop->updated_at->format('d-m-Y')}}
                </p>
            </div>

            <div class="p-6 mt-8">
                <div class="flex items-center mb-4">
                    @if($workshop->created_at->format('Y-m-d') ==  \Carbon\Carbon::today()->format('Y-m-d') )
                    <x-tailwind.badges.inline-badge class="mr-2">
                        {{ __('New') }}
                    </x-tailwind.badges.inline-badge>
                    @endif
                    <span class="text-sm text-gray-500 mr-2 uppercase cursor-pointer">@if($workshop->type){{ __($workshop->type->name) }}@endif @if($workshop->modality){{ __($workshop->modality->name) }}@endif</span>
                </div>

                <h5 class="mb-2 sm:text-sm lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __($workshop->title) }}</h5>
                @if($workshop->description)<p class="hidden md:block mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $workshop->description }}</p>@endif

                    <div class="pt-3 mb-8 text-xs">
                        <!-- date -->
                        @if($workshop->start_date)
                            <div class="flex items-center mb-2">
                                <i class="fas fa-calendar-day text-gray-500 mr-2"></i>
                                <div class="overflow-y-hidden">
                                    <span class="text-md text-gray-800 dark:text-gray-400">{{ date('j F Y', strtotime($workshop->start_date)) }}</span>
                                </div>
                            </div>
                        @endif
                        <!-- time -->
                        {{-- @if($workshop->start_time)
                            <div class="flex items-center mb-2">
                                <i class="fas fa-clock text-gray-500 mr-2"></i>
                                <div class="overflow-y-hidden">
                                    <span class="text-md text-gray-800 dark:text-gray-400">{{ date('h:i A', strtotime($workshop->start_time)) }}</span>
                                </div>
                            </div>
                        @endif --}}
                        <!-- location -->
                        @if($workshop->location)
                            <div class="flex">
                                <i class='fas fa-map-marker-alt text-gray-500 mr-2 pt-1'></i>
                                <div class="overflow-y-hidden">
                                    <span class="text-md text-gray-800 dark:text-gray-400">{{ $workshop->location }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

            </div>

        <div class="flex items-center absolute left-0 bottom-0 p-6">
            <span class="text-xs text-gray-500"><i class="fas fa-comments mr-2"></i>{{ $workshop->reviews_count }} {{ Str::plural( __('review'), $workshop->reviews_count ) }}</span>
            <span class="text-xs text-gray-500 ml-6"><i class="fas fa-eye mr-2"></i>{{ $workshop->views }} {{ Str::plural( __('view'), $workshop->views ) }}</span>
        </div>
    </div>

</a>



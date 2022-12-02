@props([
    'workshop'
])

<div class="card w-full bg-white rounded-lg overflow-hidden border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('workshops.show', $workshop) }}">
        <div class="h-36 overflow-hidden relative">
            @isset($workshop->image)
                <img class="rounded-t-lg h-36 w-full object-cover transition duration-300 transform hover:scale-125" src="{{ Storage::url($workshop->image->url) }}" alt="" />
            @else
                <img class="rounded-t-lg h-36 w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="" />
            @endisset
        </div>
    </a>
    <div class="p-5 h-64 flex flex-col justify-between">
        <div>
            <!-- resource type -->
            <div class="mb-4">
                <a href="{{ route('workshops.index') }}">
                    <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($workshop->type->name) }}</span>
                </a>
                <a href="{{ route('workshops.show', $workshop) }}">
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ $workshop->title }}</h5>
                </a>
            </div>
            <div class="flex items-center">
                <span class="text-gray-400 mr-2">
                    {{ __('Start date') }}:
                </span>
                <div class="overflow-y-hidden">
                    <span class="mb-3 text-md text-gray-800 dark:text-gray-400">{{ date('d-m-Y', strtotime($workshop->start_date)) }}</span>
                </div>
            </div>
        </div>
        <!-- Read more link -->
        <div class="pt-4">
            <x-tailwind.links.read-more-link :link="route('workshops.show', $workshop)" />
        </div>
    </div>
</div>

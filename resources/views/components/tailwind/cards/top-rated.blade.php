@props([
    'course'
])

<div class="max-w-sm rounded-md bg-white shadow-md dark:bg-gray-800 dark:border-gray-700">
    {{-- <a href="#">
        <img class="p-8 rounded-t-lg" src="{{ Storage::url($course->image) }}" alt="" />
    </a> --}}

    <div class="px-5 pt-5 flex mb-4">
        @if($course->topic)
            <a href="{{ route('topic.show', $course->topic) }}" class="mr-2">
                <span class="text-sm text-gray-500 mb-2 cursor-pointer whitespace-nowrap">{{ __($course->topic->name) }}</span>
            </a>
        @endif

        @if($course->created_at->format('Y-m-d') ==  \Carbon\Carbon::today()->format('Y-m-d') )
            <x-tailwind.badges.inline-badge>
                {{ __('New') }}
            </x-tailwind.badges.inline-badge>
        @endif
    </div>
    <div class="px-5 pt-5 pb-5 h-56 flex flex-col justify-between">
        <div>
            <a href="{{ route('courses.show', $course) }}">
                <h4 class="text-md font-semibold tracking-tight text-gray-900 dark:text-white">{{ \Illuminate\Support\Str::limit($course->title, 100, $end = '...') }}</h4>
            </a>
            <div class="flex whitespace-nowrap items-center">
                @if($course->program)
                    <span class="text-gray-400 uppercase mr-1 text-xs">{{ __('by') }}</span> <small class="text-gray-500 uppercase">{{ $course->program->name }}</small>
                @endif
            </div>
            <!-- rating star component -->
            <div class="flex items-center mb-4">
                <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />
                <span class="text-xs text-gray-500 ml-2">{{ $course->reviews_count }} {{ ($course->reviews_count != 1) ? 'reviews' : 'review' }}</span>
            </div>
        </div>
        <div class="flex justify-end items-center">
            {{-- <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $course->price->name }}</span> --}}
            <!-- Read more link -->
            <x-tailwind.links.read-more-link :link="route('courses.show', $course)" />
        </div>
    </div>
</div>

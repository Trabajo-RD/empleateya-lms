@props(['course'])


<!-- Card -->

<div class="card w-full" :key="{{ 'course-card-' . $course->id }}">

    <div class="absolute z-30 p-4 uppercase">
        <a href="{{ route('courses.index') }}" data-tooltip-target="{{ $course->id }}-type-tooltip" data-tooltip-placement="top" class="mr-2 ">
            <!-- badge -->
            <x-tailwind.badge :id="'course-type-'.$course->type->id" text="{{ __($course->type->name) }}" color="gray" size="sm" class="bg-opacity-50"/>
        </a>
    </div>

    <!-- card image -->
    <div class="h-36 overflow-hidden relative flex items-center">

        @if($course->user_id === Auth::id())

            @can('create-course')
                <div class="absolute z-50 right-2 top-2">
                    <a href="{{ route('instructor.dashboard.courses.edit', ['course' => $course]) }}" data-tooltip-target="{{ $course->id }}-edit-tooltip" data-tooltip-placement="bottom" class="text-white cursor-pointer z-50"><i class="fas fa-edit"></i></a>
                </div>
                <x-tooltip :id="$course->id . '-edit'" text="Edit this course"/>
            @endcan
        @endif

        @isset( $course->image )
            <img :key="{{ 'image-' . $course->id }}" src="{{ Storage::url( $course->image->url ) }}" alt="{{ $course->title }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" />
        @else
            <!-- badge icon -->
            <img :key="{{ 'badge-' . $course->id }}" class="h-28 absolute inset-x-0 m-auto z-10 transition duration-300 transform hover:scale-125" src="{{ asset('images/badges/courses.svg') }}" alt="{{ __('Courses') }}" >
            <!-- course background img -->
            <img :key="{{ 'image-' . $course->id }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $course->title }}" >
        @endisset
    </div>

    <!-- card body -->
    <div class="card-body flex flex-col justify-between h-60 overflow-hidden bg-white">
        <div>

            <div class="flex mb-4">
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

            <!-- course title -->
            <div class="h-12 overflow-y-hidden">
                <a href="{{ route( 'courses.show', $course ) }}">
                    <h6 class="font-medium">{{ Str::limit( $course->title, 100 ) }}</h6>
                </a>
            </div>
            <div class="flex whitespace-nowrap items-center">
                @if($course->program)
                    <span class="text-gray-400 uppercase mr-1 text-xs">{{ __('By') }}</span> <small class="text-gray-500 uppercase">{{ $course->program->name }}</small>
                @endif
            </div>

            <!-- rating star component -->
            <div class="flex items-center mb-4">
                <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />
                <span class="text-xs text-gray-500 ml-2"><i class="fas fa-comments mr-2"></i>{{ $course->reviews_count }} {{ Str::plural( __('review'), $course->reviews_count) }}</span>
            </div>

            <!-- rating star component -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <span class="text-xs text-gray-500 ml-2"><i class="fas fa-user-friends mr-2">
                        </i>{{ ($course->users_count >= 1) ? $course->users_count : '0' }} / {{ $course->audience }} {{ Str::plural(__('student'), $course->audience) }}
                    </span>
                </div>
                <div class="flex">
                    <p class="text-lg text-gray-700 font-semibold">
                        @if ( $course->price->value > 0)
                            US$ {{ $course->price->value }}
                        @else
                            {{ __('Free') }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

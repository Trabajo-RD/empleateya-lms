@props(['course'])


<!-- Card -->
<article class="card flex flex-col" :key="{{ 'course-card-' . $course->id }}">

    <!-- card image -->
    <div class="h-36 overflow-hidden relative">

        @if($course->user_id === Auth::id())

            @can('create-course')
                <div class="absolute z-50 right-2 top-2">
                    <a href="{{ route('instructor.courses.edit', ['course' => $course]) }}" data-tooltip-target="{{ $course->id }}-edit-tooltip" data-tooltip-placement="bottom" class="text-white cursor-pointer z-50"><i class="fas fa-edit"></i></a>
                </div>
                <x-tooltip :id="$course->id . '-edit'" text="Edit this course"/>
            @endcan
        @endif

        @isset( $course->image )
            <img :key="{{ 'image-' . $course->id }}" src="{{ Storage::url( $course->image->url ) }}" alt="{{ $course->title }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" />
        @else
            <img :key="{{ 'image-' . $course->id }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $course->title }}" >
        @endisset
    </div>

    <!-- card body -->
    <div class="card-body flex-1 flex flex-col">
        <!-- resource type -->
        <p class="text-sm text-gray-500 mb-2">{{ __($course->type->name) }}</p>
        <!-- course title -->
        <a href="{{ route( 'course.show', ['course' => $course] ) }}">
            <h2 class="card-title">{{ Str::limit( $course->title, 55 ) }}</h2>
        </a>
        {{-- <p class="text-gray-500 text-sm mb-2 mt-auto">{{ $course->editor->name}}</p> --}}

        {{-- <div class="flex mb-4 items-center">
            <!-- rating value -->
            <span class="text-xl font-bold text-{{ $course->rating > 3 ? 'yellow' : 'gray' }}-300">{{ $course->rating }}</span> --}}

            <!-- rating star component -->
            <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />
            {{-- <ul class="flex text-sm ml-2">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-300"></i></li>
            </ul> --}}
            <!-- users enrolled -->
            {{-- <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->participants_count }})
            </p>
        </div> --}}
        <div class="flex mb-2">
            <p class="text-lg text-gray-700 font-semibold">
                @if ( $course->price->value > 0)
                    US$ {{ $course->price->value }}
                @else
                    {{ __('Free') }}
                @endif
            </p>
        </div>
        <div class="flex mb-2">

            <!-- category -->
            <a href="{{ route('courses.category', ['category' => $course->category]) }}" data-tooltip-target="{{ $course->id }}-category-tooltip" data-tooltip-placement="top" class="mr-2 ">
                <!-- badge -->
                <x-tailwind.badge :id="'course-category-'.$course->category->id" text="{{ __($course->category->name) }}" color="gray" size="sm" :icon="$course->category->icon"/>
            </a>
            <!-- tooltip -->
            <x-tooltip :id="$course->id . '-category'" text="{{ __('Category') }}"/>

        </div>

    </div>
</article>

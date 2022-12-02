@props(['course'])


<!-- Card -->
<article class="card flex flex-col">

    <!-- card image -->
    @isset( $course->image )
        <img src="{{ Storage::url( $course->image ) }}" alt="" class="h-36 w-full object-cover" />
    @else
        <img id="picture" class="h-36 w-full object-cover" src="{{ asset('images/courses/default.jpg') }}" alt="" >
    @endisset

    <!-- card body -->
    <div class="card-body flex-1 flex flex-col">
        <!-- resource type -->
        <p class="text-sm text-gray-500 mb-2 uppercase">{{ __($course->type) }}</p>
        <!-- course title -->
        <a href="{{ route( 'courses.show', ['course' => $course->slug] ) }}">
            <h2 class="card-title">{{ Str::limit( $course->title, 55 ) }}</h2>
        </a>
        <p class="text-gray-500 text-sm mb-2 mt-auto">{{ $course->name}}</p>

        <!-- rating star component -->
        <x-tailwind.rating-star :rating="$course->rating" icon="star" color="yellow" />

        <div class="flex mb-2">
            <p class="text-lg text-gray-700 font-semibold">
                @if ( $course->value > 0)
                    US$ {{ $course->price }}
                @else
                    {{ __('Free') }}
                @endif
            </p>
        </div>

        {{-- <div class="flex mb-2">
            <!-- category -->
            <a href="{{ route('topic.show', str_replace(' ', '', $course->topic)) }}" class="mr-2 ">
                <!-- badge -->
                <x-tailwind.badge id="course-topic-{{ $course->topic }}" text="{{ __($course->topic) }}" color="blue" size="sm" icon="fas fa-tag"/>
            </a>
        </div> --}}

        {{-- <div class="flex justify-end">
            <span class="text-gray-500 text-xs" title="Modalidad">{{ $course->modality }}</span>
        </div> --}}
    </div>
</article>

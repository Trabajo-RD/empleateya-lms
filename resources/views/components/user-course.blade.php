@props(['course'])

<!-- Card -->
<article class="card flex">
    <!-- card image -->
    <div class="bg-indigo-300 h-32 w-32 grid place-items-center " style="position: relative;">
        <a href="{{ route( 'courses.show', ['course' => $course] ) }}"  style="position:absolute; z-index: 9999;" class="grid place-items-center">
            <span class="animate-ping absolute inline-flex h-14 w-14 rounded-full bg-white opacity-75"></span>
            <x-icons.play classes="relative cursor-pointer h-20 w-20 transition duration-300 transform hover:scale-125" key="icon-{{ $course->id }}"></x-icons.play>
        </a>
        @isset( $course->image )
            <img src="{{ Storage::url( $course->image->url ) }}" alt="{{ $course->image->title }}" class="object-cover h-32 w-auto" />
        @else
            <img id="picture" class="object-cover h-32 w-auto"  src="{{ asset('images/courses/default.jpg') }}" alt="" style="position:relative;">
        @endisset
    </div>
    <!-- card body -->
    <div class="card-body flex-1 flex flex-col">
        <!-- resource type -->
        @isset($course->topic)
        <p class="text-gray-500 mb-2">{{ __($course->topic->name) }}</p>
        @endisset
        <!-- course title -->
        <a href="{{ route( 'courses.show', ['course' => $course->slug] ) }}">
            <h3 class="text-sm color-primary font-semibold">{{ Str::limit( $course->title, 55 ) }}</h3>
        </a>
        <div class="flex align-items-center justify-between mt-auto">
            <p class="text-gray-500 text-sm ">{{ $course->program->name}}</p>
            <a class="text-white bg-primary hover:bg-blue-900 shadow focus:outline-none focus:ring-4 focus:ring-gray-300  rounded-full text-xs px-3 py-1 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" href="{{ route( 'courses.show', ['course' => $course->slug] ) }}">
                {{ __('Continue') }}
            </a>
        </div>
    </div>
</article>

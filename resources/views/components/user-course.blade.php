@props(['course'])


<!-- Card -->
<article class="card flex">

    <!-- card image -->
    @isset( $course->image )
        <img src="{{ Storage::url( $course->image ) }}" alt="" class="h-auto w-36 object-cover" />
    @else
        <img id="picture" class="h-auto w-36 object-cover" src="{{ asset('images/courses/default.jpg') }}" alt="" >
    @endisset

    <!-- card body -->
    <div class="card-body flex-1 flex flex-col">
        <!-- resource type -->
        <p class="text-gray-500 mb-2">{{ __($course->category) }}</p>
        <!-- course title -->
        <a href="{{ route( 'courses.show', [app()->getLocale(), $course->slug] ) }}">
            <p class="font-semibold">{{ Str::limit( $course->title, 55 ) }}</p>
        </a>
        <p class="text-gray-500 text-sm mt-auto">{{ $course->name}}</p>
    </div>


    {{-- <div class="flex flex-col justify-between mr-auto pt-4 pr-4">
        <div class="flex justify-end pb-4">
            <span class="text-gray-500 text-xs" title="Modalidad">{{ $course->modality->name }}</span>
        </div>
    </div> --}}


</article>

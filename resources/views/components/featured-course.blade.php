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
        <p class="text-sm text-gray-500 mb-2">{{ __($course->type) }}</p>
        <!-- course title -->
        <a href="{{ route( 'courses.show', [app()->getLocale(), $course->slug] ) }}">
            <h2 class="card-title">{{ Str::limit( $course->title, 55 ) }}</h2>
        </a>
        <p class="text-gray-500 text-sm mb-2 mt-auto">{{ $course->name}}</p>
        <div class="flex mb-4">
            <!-- rating -->
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-300"></i></li>
            </ul>
            <!-- users enrolled -->
            {{-- <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p> --}}
        </div>
        <div class="flex mb-2">
            <p class="text-lg text-gray-700 font-semibold">
                @if ( $course->value > 0)
                    US$ {{ $course->price }}
                @else
                    {{ __('Free') }}
                @endif
            </p>
        </div>
        <div class="flex mb-2">
            <a href="" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="{{ __('Category') }}">
                {{ __($course->category) }}
            </a>
            <button type="button" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Nivel">
                {{ __($course->level) }}
            </button>
            {{-- <button type="button" data-toggle="tooltip" data-placement="top" class=" bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Modalidad">
                {{ $course->modality->name }}
            </button> --}}
        </div>
        <div class="flex justify-end">
            <span class="text-gray-500 text-xs" title="Modalidad">{{ $course->modality }}</span>
        </div>
    </div>
</article>

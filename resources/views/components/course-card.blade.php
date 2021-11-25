@props(['course'])


<!-- Card -->
<article class="card flex flex-col" :key="{{ 'course-card-' . $course->id }}">

    <!-- card image -->
    <div class="h-36 overflow-hidden relative">

        @if($course->user_id === Auth::id())
            @hasrole('Creator')
                <div class="absolute z-50 right-2 top-2">
                    <a href="{{ route('creator.courses.edit', [app()->getLocale(), $course]) }}" class="text-white cursor-pointer z-50"><i class="fas fa-edit"></i></a>
                </div>
            @endhasrole

            @hasrole('Instructor')
                <div class="absolute z-50 right-2 top-2">
                    <a href="{{ route('instructor.courses.edit', [app()->getLocale(), $course]) }}" class="text-white cursor-pointer z-50"><i class="fas fa-edit"></i></a>
                </div>
            @endhasrole
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
        <a href="{{ route( 'courses.show', [app()->getLocale(), $course] ) }}">
            <h2 class="card-title">{{ Str::limit( $course->title, 55 ) }}</h2>
        </a>
        {{-- <p class="text-gray-500 text-sm mb-2 mt-auto">{{ $course->editor->name}}</p> --}}
        <div class="flex mb-4 items-center">
            <!-- rating value -->
            <span class="text-xl font-bold text-{{ $course->rating > 3 ? 'yellow' : 'gray' }}-300">{{ $course->rating }}</span>

            <!-- rating stars -->
            <ul class="flex text-sm ml-2">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-300"></i></li>
            </ul>
            <!-- users enrolled -->
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>
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
            <a href="{{ route('courses.category', [app()->getLocale(), $course->category]) }}" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="{{ __('Category') . ': ' . __($course->category->name) }}">
                {{ __($course->category->name) }}
            </a>
            <button type="button" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Nivel">
                {{ __($course->level->name) }}
            </button>
            {{-- <button type="button" data-toggle="tooltip" data-placement="top" class=" bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Modalidad">
                {{ $course->modality->name }}
            </button> --}}
        </div>
        <div class="flex justify-end">
            <span class="text-gray-500 text-xs" title="Modalidad">{{ $course->modality->name }}</span>
        </div>
    </div>
</article>

@props(['course'])


<!-- Card -->
<article class="card">   
    
    <!-- card image -->
    @isset( $course->image )
        <img src="{{ Storage::url( $course->image->url ) }}" alt="" class="h-36 w-full object-cover" />
    @else
        <img id="picture" class="h-36 w-full object-cover" src="{{ asset('images/courses/default.jpg') }}" alt="" >
    @endisset
 

    <!-- card body -->
    <div class="card-body">
        <!-- resource type -->
        <p class="text-sm text-gray-500 mb-2">{{ $course->type->name }}</p>
        <!-- course title -->
        <a href="{{ route( 'courses.show', $course ) }}">
            <h2 class="card-title">{{ Str::limit( $course->title, 40 ) }}</h2>
        </a>
        <div class="flex mb-4">
            <!-- rating -->
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
            </ul>
            <!-- users enrolled -->
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>
        <div class="flex mt-2 mb-2">
            <p class="text-lg text-gray-700 font-semibold">
                {{ $course->price->value > 0 ? $course->price->value : 'Gratis'  }}
            </p>
        </div>
        <div class="flex mt-2 mb-2">
            <button type="button" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Categoría">
                {{ $course->category->name }}
            </button>
            <button type="button" data-toggle="tooltip" data-placement="top" class="mr-2 bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Nivel">
                {{ $course->level->name }}
            </button>
            {{-- <button type="button" data-toggle="tooltip" data-placement="top" class=" bg-gray-300 text-gray text-sm p-1 rounded  leading-none flex items-center focus:outline-none" title="Modalidad">
                {{ $course->modality->name }}
            </button> --}}
        </div>
        <div class="flex mt-2 justify-end">        
            <span class="text-gray-500 text-xs" title="Modalidad">{{ $course->modality->name }}</span>
        </div>
    </div>
</article>

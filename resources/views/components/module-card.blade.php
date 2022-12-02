@props(['module'])


<!-- Card -->

    <div class="card w-full" :key="{{ 'module-card-' . $module->id }}">

        <div class="absolute z-30 p-4 uppercase">

            <a href="{{ route('modules.index') }}" data-tooltip-target="{{ $module->id }}-type-tooltip" data-tooltip-placement="top" class="mr-2 ">
                <!-- badge -->
                <x-tailwind.badge :id="'module-type-'.$module->type->id" text="{{ __($module->type->name) }}" color="gray" size="sm" class="bg-opacity-50"/>
            </a>

            <!-- resource type -->
        {{-- <a href="{{ route('courses.index') }}">
            <span class="text-sm text-gray-500 mb-2 uppercase cursor-pointer">{{ __($course->type->name) }}</span>
        </a> --}}

        </div>


    <!-- card image -->
    <div class="h-36 overflow-hidden relative">

        @if($module->user_id === Auth::id())

            @can('create-module')
                <div class="absolute z-50 right-2 top-2">
                    <a href="{{ route('instructor.courses.edit', $module) }}" data-tooltip-target="{{ $module->id }}-edit-tooltip" data-tooltip-placement="bottom" class="text-white cursor-pointer z-50"><i class="fas fa-edit"></i></a>
                </div>
                <x-tooltip :id="$module->id . '-edit'" text="Edit this module"/>
            @endcan
        @endif

        @isset( $module->image )
            <img :key="{{ 'image-' . $module->id }}" src="{{ Storage::url( $module->image->url ) }}" alt="{{ $module->title }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" />
        @else
            <img :key="{{ 'image-' . $module->id }}" class="h-36 w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $module->title }}" >
        @endisset
    </div>

    <!-- card body -->
    <div class="card-body flex flex-col justify-between h-60 overflow-hidden bg-white">
        <div>

            <div class="flex mb-4">

                @if($module->topic)
                <a href="{{ route('topic.show', $module->topic) }}" class="mr-2">
                    <span class="text-sm text-gray-500 mb-2 cursor-pointer">{{ __($module->topic->name) }}</span>
                </a>
                @endif

                @if($module->created_at->format('Y-m-d') ==  \Carbon\Carbon::today()->format('Y-m-d') )
            <x-tailwind.badges.inline-badge>
                {{ __('New') }}
            </x-tailwind.badges.inline-badge>
            @endif

            </div>



        <!-- course title -->
        <div class="h-12 overflow-y-hidden">
            <a href="{{ route( 'modules.show', $module ) }}">
                <h6 class="font-medium">{{ Str::limit( $module->title, 100 ) }}</h6>
            </a>
        </div>
        <div class="flex whitespace-nowrap items-center">
            @if($module->program)
                <span class="text-gray-400 uppercase mr-1 text-xs">{{ __('By') }}</span> <small class="text-gray-500 uppercase">{{ $module->program->name }}</small>
            @endif
        </div>
        {{-- <p class="text-gray-500 text-sm mb-2 mt-auto">{{ $course->editor->name}}</p> --}}

        {{-- <div class="flex mb-4 items-center">
            <!-- rating value -->
            <span class="text-xl font-bold text-{{ $course->rating > 3 ? 'yellow' : 'gray' }}-300">{{ $course->rating }}</span> --}}

            <!-- rating star component -->
            <div class="flex items-center mb-4">
                <x-tailwind.rating-star :rating="$module->rating" icon="star" color="yellow" />
                <span class="text-xs text-gray-500 ml-2">{{ $module->reviews_count }} {{ ($module->reviews_count != 1) ? __('reviews') : __('review') }}</span>
            </div>
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
                ({{ $course->users_count }})
            </p>
        </div> --}}
        <!-- rating star component -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <span class="text-xs text-gray-500 ml-2"><i class="fas fa-user-friends mr-2"></i>{{ ($module->users_count >= 1) ? $module->users_count : '0' }} / {{ $module->audience }} {{ ($module->audience != 1) ? __('students') : __('student') }}</span>
            </div>
            <div class="flex">
                <p class="text-lg text-gray-700 font-semibold">
                    @if ( $module->price->value > 0)
                        US$ {{ $module->price->value }}
                    @else
                        {{ __('Free') }}
                    @endif
                </p>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Course content -->
        <div class="col-span-1 lg:col-span-2">

            <!-- embed content -->
            @if( isset($current->iframe) )
                <div class="embed-responsive mb-4">
                    {!! $current->iframe !!}
                </div>
            @endif

            {{-- TODO: Display category name --}}
            <div class="mr-2 text-blue-500 text-sm p-1 rounded  leading-none flex items-center uppercase">
                {{ $course->category->name }}
            </div>

            <!-- lesson title -->
            <h2 class="text-bold text-3xl mb-2">
                {{ $this->index + 1 }} - {{ $current->name }}
            </h2>

            @if( $current->description )
                <div class="text-gray-600 mb-8">
                    {{ $current->description->name }}
                </div>
            @endif

            <div class="flex mb-8">
                <button type="button" class="mr-2 bg-gray-300 text-gray text-sm py-2 px-4 leading-none flex items-center focus:outline-none">
                    {{ $course->level->name }}
                </button>
            </div>

            <a href="{{ $current->url }}" title="{{ $current->name }}" target="_blank">
                <div class="mb-8 flex justify-center">
                    <button type="button" class="btn btn-cta btn-primary hover:bg-blue-700 text-md py-2 px-4 leading-none flex items-center focus:outline-none">
                        Ver en {{ $current->platform->name }}
                    </button>
                </div>
            </a>

            <!-- complete lesson button -->
            <div class="flex justify-between">
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-400 mr-2"></i>

                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-400 mr-2"></i>
                    @endif
                        <p class="text-base text-gray-700">Marcar esta lección como finalizada.</p>
                </div>
                <!-- resources -->
                @if( $current->resource )
                    <div class="flex items-center cursor-pointer bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 py-2 px-4 rounded shadow " wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="ml-2">Descargar recurso</p>
                    </div>
                @endif
            </div>

            <div class="card mt-3">
                <div class="card-body flex">
                    @if($this->previous) <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer text-gray-400 hover:text-gray-700"><i class="fas fa-arrow-left mr-2"></i>Lección anterior</a> @endif
                    @if($this->next) <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer text-gray-400 hover:text-gray-700">Lección siguiente<i class="fas fa-arrow-right ml-2"></i></a> @endif
                </div>
            </div>

        </div>

        <!-- sidebar -->
        <div class="card">
            <div class="card-body">
                <!-- course title -->
                <h1 class="font-bold text-3xl lg:text-2xl leading-8 text-gray-600 mt-8 md:mt-4 mb-4">{{ $course->title }}</h1>
                <!-- Author info -->
                <div class="flex items-center mb-4">
                    <figure>
                        <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->editor->profile_photo_url }}" alt="Foto de perfil de {{ $course->editor->firstname }}"/>
                    </figure>
                    <div class="ml-4">
                        <h3 class="font-bold text-lg text-gray-600">{{ $course->editor->firstname . ' ' . $course->editor->lastname }}</h3>
                        <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug( $course->editor->firstname . $course->editor->lastname, '' ) }}</a>
                    </div>
                </div>

                <!-- progress bar -->
                <div class="my-12" x-data="{ width: '{{$this->advance}}' }" x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })" >
                    <!-- Start Regular with text version -->
                    <div class="bg-gray-200 rounded h-6 pt-1 pr-2 overflow-hidden" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100" >
                        <div  class="bg-blue-400 rounded h-4 ml-1 text-center text-white text-sm transition" :style="`width: ${width}%; transition: width 2s;`" x-text="`${width}%`" ></div>
                    </div>
                    <!-- End Regular with text version -->
                </div>
                <!-- /progress bar -->

                <ul>
                    @foreach ( $course->sections as $section )
                        <li class="text-gray-600 mb-4">
                            <a class="text-base font-bold inline-block mb-3" href="">{{ $section->name }}</a>
                            <ul>
                                @foreach ( $section->lessons as $lesson )
                                    <li class="flex">
                                        <div>
                                            @if( $lesson->completed )
                                                @if( $current->id == $lesson->id )
                                                    <span class="inline-block w-4 h-4 border-2 border-blue-400 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if( $current->id == $lesson->id )
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})" >
                                            {{ $lesson->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <!-- /sidebar -->
    </div>
</div>

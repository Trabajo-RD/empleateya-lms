<x-app-layout>

    <section class="bg-blue-900 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            <figure>
            <!-- card image -->
                @isset( $course->image )
                    <img src="{{ Storage::url( $course->image->url ) }}" alt="" class="h-80 w-full object-cover shadow" />
                @else
                    <img id="picture" class="h-80 w-full object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                @endisset
            </figure>
            <div>
                <button type="button" class="bg-opacity-25 mr-2 bg-gray-300 text-gray-300 text-sm py-2 px-4 leading-none flex items-center mb-4 focus:outline-none">
                    {{ $course->type->name }}
                </button>
                <h1 class="text-white font-extrabold text-2xl sm:text-3xl md:text-4xl">{{ $course->title }}</h1>
                <h2 class="text-white mt-3 sm:mt-5 sm:text-lg md:mt-5 md:text-xl lg:mx-0 mb-4">{{ $course->subtitle }}</h2>
                <p class="text-white sm:text-md md:text-lg lg:mx-0 mb-2"><span class="text-gray-400"><i class="fas fa-tags text-sm mr-2"></i>Categoría:&nbsp;</span>{{ $course->category->name }}</p>
                <p class="text-white sm:text-md md:text-lg lg:mx-0 mb-2"><span class="text-gray-400"><i class="fas fa-layer-group text-sm mr-2"></i>Nivel:&nbsp;</span>{{ $course->level->name }}</p>

                <div class="flex mb-4">
                    <!-- rating -->
                    <p class="text-{{ $course->rating > 4 ? 'yellow' : 'white' }}-400 font-extrabold sm:text-lg sm:max-w-xl md:text-xl lg:mx-0">
                        {{ $course->rating }}
                    </p>
                    <!-- rating stars -->
                    <ul class="flex text-sm">
                        <li class="ml-2 mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-6 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                    </ul>
                    <!-- users enrolled -->
                    <p class="text-white sm:text-md md:text-lg lg:mx-0">
                        <i class="fas fa-users text-sm mr-2"></i>{{ $course->students_count }} Usuarios
                    </p>
                </div>
            </div>

        </div>
    </section>


    <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-24">

        @if( session('info') )
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error de aprobación!</strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

            <!-- section description -->
            <section class="mb-12">
                <h2 class="font-bold text-2xl mb-12 text-gray-600">Descripción</h2>
                <div class="text-gray-600 text-base">
                    {!! $course->summary !!}
                </div>
            </section>

            <!-- section requirements  -->
            <section class="mb-12">
                <h2 class="font-bold text-2xl mb-12 text-gray-600">Requisitos</h2>

                <ul class="list-disc list-inside">

                    @forelse ($course->requirements as $requirement )

                        <li class="text-gray-600 text-base">
                            {{ $requirement->name }}
                        </li>

                    @empty

                        <li class="text-gray-600 text-base">
                            Este curso no tiene requerimientos asignados.
                        </li>

                    @endforelse

                </ul>
            </section>

            <!-- section goals -->
            <section class="card mb-12">
                <div class="card-body">
                    <h2 class="font-bold text-2xl mb-2 text-gray-600">Lo que aprenderás</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ( $course->goals as $goal )
                            <li class="text-gray-600 text-base"><i class="fas fa-check text-sm text-gray-500 mr-2"></i>{{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-600 text-base">Este curso no tiene metas asignadas</li>
                        @endforelse

                    </ul>
                </div>
            </section>

            <!-- section subjects -->
            <section class="mb-12">
                <h2 class="font-bold text-2xl mb-12 text-gray-600">Contenido del curso</h2>

                @forelse ( $course->sections as $section )

                    <article class="mb-2 shadow" @if( $loop->first) x-data="{ open: true}"  @else x-data="{ open: false}" @endif>
                        <header class="border border-gray-200 px-4 pt-2 cursor-pointer bg-gray-100 bg-opacity-25 transition duration-700 ease-in-out" x-on:click=" open = !open ">
                            <h3 class="font-bold text-xl mb-2 text-gray-600">
                                <i class="fas fa-chevron-down mr-2" x-show=" open "></i>
                                <i class="fas fa-chevron-right mr-2" x-show=" !open "></i>
                                {{ $section->name }}
                            </h3>
                        </header>
                        <div class="bg-white py-2 px-4" x-show=" open ">
                            <ul class="grid grid-cols-1 gap-x-3 gap-y-4">

                                @foreach ($section->lessons as $lesson )

                                    <li class="text-gray-600 text-base"><i class="far fa-play-circle text-sm text-gray-500 mr-4"></i>{{ $lesson->name }}</li>

                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <div class="card">
                        <div class="card-body">
                            Este curso no tiene secciones asignadas.
                        </div>
                    </div>
                @endforelse

            </section>

        </div>

        <div class="order-1  md:order-2 lg:order-2">
            <section class="card mb-12">
                <div class="card-body">
                    <!-- Author info -->
                    <div class="flex items-center">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->editor->profile_photo_url }}" alt="Foto de perfil de {{ $course->editor->firstname }}"/>
                        </figure>
                        <div class="ml-4">
                            <p class="font-bold text-lg text-gray-600">{{ $course->editor->firstname . ' ' . $course->editor->lastname }}</p>
                                @foreach($course->editor->roles as $role)
                                    @if($role->name == 'Creator')
                                        <p class="text-md text-gray-600 mr-2">Analista de Empleo</p>
                                    @endif
                                    @if($role->name == 'Instructor')
                                        <p class="text-md text-gray-600 mr-2">Instructor</p>
                                    @endif
                                @endforeach
                            <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug( $course->editor->firstname . $course->editor->lastname, '' ) }}</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.courses.approved', $course ) }}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn-cta btn-primary btn-block mt-4 hover:shadow">Aprobar este curso</button>
                    </form>

                    <a href="{{ route('admin.courses.observation', $course ) }}" class="btn-cta btn-block text-center mt-4 bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white border border-gray-500 hover:border-transparent rounded">Añadir observación</a>

                </div>
            </section>



        </div>

    </div>

</x-app-layout>

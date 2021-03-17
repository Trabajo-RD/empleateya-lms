<div class="container py-8">

    <header class="mb-4 flex">
        <span class="text-2xl text-gray-500 mr-2">Bienvenid@</span>
        <h2 class="text-2xl text-gray-800 font-bold">{{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}</h2>
    </header>

    <p class="text-1xl text-gray-500 mb-4">Aquí tienes un listado de tus cursos</p>

    <x-table-responsive>

        <div class="px-6 py-3">
            <div x-data="{isTyped: false}" class="flex w-full">
                <input class="form-input flex-1 shadow-sm"
                        type="search"
                        name="search-creator"
                        id="search-creator"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder='¿Qué curso quieres buscar?'
                        autocomplete="off"
                        wire:keydown="clear"
                        wire:model.debounce.500ms="search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
                <a class="btn btn-primary ml-2" href="{{ route('creator.courses.create') }}">Nuevo curso</a>
            </div>
        </div>

        @if( $courses->count() )
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Matriculados
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estatus
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ( $courses as $course )

                        <tr wire:key="server-action-{{$course->id}}">
                            <!-- TODO: First <td> responsive -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-32 w-32">
                                    @isset( $course->image )
                                        <img class="h-32 w-32 object-cover" src="{{ Storage::url($course->image->url)}}" alt="">
                                    @else
                                        <img id="picture" class="h-32 w-32 object-cover" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                                    @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-md font-bold text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Categoría: <strong>{{ $course->category->name }}</strong>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Tipo: <strong>{{ $course->type->name }}</strong>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Nivel: <strong>{{ $course->level->name }}</strong>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Modalidad: <strong>{{ $course->modality->name }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md text-gray-900 text-center">{{ $course->students->count() }}</div>
                                <div class="text-sm text-gray-500 text-center">Estudiantes</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md text-gray-900 flex items-center">
                                    <strong>{{ $course->rating }}</strong>
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch ( $course->status )
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Borrador
                                        </span>
                                        @break;
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        @break;
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break;
                                    @case(4)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Eliminado
                                        </span>
                                        @break;
                                    @default
                                @endswitch

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <span class="flex">



                                    <a href="{{ route('creator.courses.edit', $course ) }}" class="{{ ($course->observation) ? 'border-red-300 text-red-700 hover:bg-red-50' : 'border-gray-300 text-gray-700 hover:bg-gray-50' }} inline-flex items-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium  bg-white focus:outline-none">
                                        <!-- Heroicon name: solid/pencil -->
                                        <svg class="-ml-1 mr-2 h-5 w-5 {{ ($course->observation) ? 'text-red-500' : 'text-gray-500' }} " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        Editar
                                    </a>
                                    @if( $course->observation )
                                        <!-- Tailwind animate ping -->
                                        <span class="flex h-3 w-3">
                                            <span class="animate-ping h-3 w-3 absolute inline-flex rounded-full bg-red-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                        </span>
                                        <!-- /Tailwind animate ping -->
                                    @endif



                                </span>
                            </td>
                        </tr>


                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>

            <div class="px-6 py-3">
                {{ $courses->links() }}
            </div>
        @else
            <div class="alert alert-light px-6 py-3" role="alert">
                <strong>¡Lo siento!</strong> No encuentro un curso que coincida con tu busqueda :(
            </div>
        @endif

    </x-table-responsive>

    <!-- TODO: Show Microsoft Learn Courses -->
    {{-- <div class="card">
        <div class="card-body">

            <pre>
                @php echo print_r( $microsoft_courses['results'] ); @endphp
            </pre>
        </div>
    </div> --}}

</div>

<div>
    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-user-graduate mr-2"></i>Estudiantes del curso</h1>

    <x-table-responsive>

        <div class="px-6 py-3">
            <div x-data="{isTyped: false}">
                <input class="form-input shadow-sm w-full"
                        type="search"
                        name="search-creator"
                        id="search-creator"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder='¿Qué estudiante quieres buscar?'
                        autocomplete="off"
                        wire:model.debounce.500ms="search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
            </div>
        </div>

        @if( $students->count() )
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <!-- TODO: Display student gender -->
                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Género
                    </th> --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ( $students as $student )

                        <tr>
                        <!-- TODO: First <td> responsive -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16">

                                        <img id="picture" class="h-16 w-16 object-cover rounded-full" src="{{ $student->profile_photo_url }}" alt="" >

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-md font-bold text-gray-900">
                                            {{ ($student->lastname != null) ? $student->lastname : '' }}, {{ $student->name }}
                                        </div>
                                        @if( $student->document_type != null || $student->document_id != null )
                                            <div class="text-sm text-gray-500">
                                                {{ ( $student->document_type != null) ? $student->document_type . ': ' : '' }} <strong>{{ ( $student->document_id != null ) ? $student->document_id : '' }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <!-- TODO: Display student gender -->
                            {{-- <td>
                                <div class="text-md text-gray-600">
                                    @switch($student->gender->name)
                                        @case('M')
                                            <i class="fas fa-mars mr-2"></i>Masculino
                                            @break
                                        @case('F')
                                            <i class="fas fa-venus mr-2"></i>Femenino
                                            @break
                                        @default
                                            No especifado
                                    @endswitch
                                </div>
                            </td> --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md text-gray-900 text-left">{{ $student->email }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <span class="hidden sm:block">
                                    <a href="" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <i class="far fa-eye text-gray-600 mr-2"></i>
                                        Ver
                                    </a>
                                </span>
                            </td>
                        </tr>

                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>

            <div class="px-6 py-3">
                {{ $students->links() }}
            </div>
        @else
            <div class="alert alert-light px-6 py-3" role="alert">
                <strong>¡Algo salió mal!</strong> No se puede cargar la información del estudiante solicitado :(
            </div>
        @endif

    </x-table-responsive>
</div>


<div>
    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-user-graduate mr-2"></i>{{ __('Course students') }}</h1>

    <x-table-responsive>

        <div class="px-6 py-3">
            <div x-data="{isTyped: false}">
                <input class="form-input shadow-sm w-full"
                        type="search"
                        name="search-instructor"
                        id="search-instructor"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder="{{ __('Who do you want to find?') }}"
                        autocomplete="off"
                        wire:model.debounce.500ms="search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
            </div>
        </div>

        @if( $users->count() )

            <x-table>
                <x-slot name="heading">
                    <x-table.heading>{{ __('Name') }}</x-table.heading>
                    <x-table.heading>{{ __('Email') }}</x-table.heading>
                    <x-table.heading>{{ __('Last connection') }}</x-table.heading>
                    <x-table.heading><span class="sr-only">{{ __('Edit') }}</span></x-table.heading>
                </x-slot>
                @foreach($students as $student)
                    <x-table.row>

                        <x-table.cell>
                            {{-- <div class="flex-shrink-0 h-16 w-16">
                                <img id="picture" class="h-16 w-16 object-cover rounded-full" src="{{ $student->profile_photo_url }}" alt="" >
                            </div> --}}
                            <div class="ml-4">
                                <div class="text-md font-bold text-gray-900 uppercase">
                                    {{ $student->name }} {{ ($student->lastname != null) ? $student->lastname : '' }}
                                </div>
                                {{-- @if( $student->document_type != null || $student->document_id != null )
                                    <div class="text-sm text-gray-500">
                                        {{ ( $student->document_type != null) ? $student->document_type . ': ' : '' }} <strong>{{ ( $student->document_id != null ) ? $student->document_id : '' }}</strong>
                                    </div>
                                @endif --}}
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-md text-gray-900 text-left">{{ $student->email }}</div>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="text-md text-gray-500 text-center">{{ ($student->last_login != null) ? $student->last_login : __('Never') }}</div>
                        </x-table.cell>

                        <x-table.cell class="flex items-center">
                            {{-- TODO: Crear boton para notificar estudiante --}}
                            <button type="button" wire:click="reminder('{{ $student->email }}')" data-tooltip-target="{{ $student->id }}-send-reminder-tooltip" data-tooltip-placement="top" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                                <i class="far fa-bell text-gray-600"></i>
                                <x-tooltip :id="$student->id . '-send-reminder'" text="Send reminder"/>
                            </button>

                            <a href="" data-tooltip-target="{{ $student->id }}-view-student-tooltip" data-tooltip-placement="top" class="px-4 py-2 ml-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                                <i class="far fa-eye text-gray-600"></i>
                                {{-- {{ __('View') }} --}}
                                <x-tooltip :id="$student->id . '-view-student'" text="View student profile" />
                            </a>


                        </x-table.cell>

                    </x-table.row>
                @endforeach
            </x-table>

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

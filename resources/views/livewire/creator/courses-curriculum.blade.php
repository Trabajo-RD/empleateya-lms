<div>
        {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-chalkboard-teacher mr-2"></i>{{ __('Modules') }}</h1>
    <hr class="mt-2 mb-6">

    <!-- course sections -->
    @foreach( $course->sections as $key => $item )

        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">

                @if($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <label class="font-bold text-md pb-2">Título del Módulo</label>
                        <input wire:model="section.name" class="form-input w-full {{($errors->has('section.name') ? ' border-red-600' : '')}}" type="text" placeholder="Ingrese el título del módulo">
                        <p class="text-gray-500 text-sm pt-2">Haz click en el cuadro de texto y presiona Enter para guardar o dejar de editar</p>
                        @error('section.name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                @else
                    <!-- Show creator sections -->
                    <header class="flex justify-between items-center">
                        <h2 x-on:click="open = !open" class="cursor-pointer text-xl"><strong>{{ __('Module') }} {{ ($key + 1) }}: </strong>{{ $item->name }}</h2>
                        <div>
                            {{-- <i class="fas fa-edit text-gray-500 cursor-pointer" wire:click="edit({{$item}})"></i> --}}
                            <i class="fas fa-edit text-gray-500 cursor-pointer" wire:click="editConfirm({{ $item }})"></i>
                            <i class="far fa-trash-alt text-red-500 cursor-pointer ml-2" wire:click="deleteConfirm({{ $item->id }})"></i>
                        </div>
                    </header>
                    <!-- Show creator lessons -->
                    <div x-show="open">
                        <!-- when we call a component more than once, we must pass it a key -->
                        @livewire('creator.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>

    @endforeach

    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer mb-2 justify-end">
            <i class="far fa-plus-square text-2xl text-blue-600 mr-2"></i>
            <span class="text-gray-500 font-bold">Añadir módulo</span>
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h2 class="text-xl font-bold mb-4">Añadir nuevo módulo</h2>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full rounded {{($errors->has('name') ? ' border-red-600' : '')}}" type="text" placeholder="Ingrese el título del módulo">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong class="text-xs text-red-700">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Añadir</button>
                </div>
            </div>
        </article>
    </div>
</div>

<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">Lecciones del curso</h1>
    <hr class="mt-2 mb-6">

    <!-- course sections -->
    @foreach( $course->sections as $item )

        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">

                @if($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="form-input w-full {{($errors->has('section.name') ? ' border-red-600' : '')}}" type="text" placeholder="Ingrese el nombre de la sección">
                        @error('section.name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                @else
                    <!-- Show instructor sections -->
                    <header class="flex justify-between items-center">
                        <h2 x-on:click="open = !open" class="cursor-pointer text-xl"><i class="fas fa-chalkboard-teacher mr-4"></i><strong>Sección: </strong>{{ $item->name }}</h2>
                        <div>
                            <i class="fas fa-edit text-gray-500 cursor-pointer mr-4" wire:click="edit({{$item}})"></i>
                            <i class="far fa-trash-alt text-red-500 cursor-pointer" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <!-- Show instructor lessons -->
                    <div x-show="open">
                        <!-- when we call a component more than once, we must pass it a key -->
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>

    @endforeach

    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer mb-2 justify-end">
            <i class="far fa-plus-square text-2xl text-blue-600 mr-2"></i>
            <span class="text-gray-500 font-bold">Agregar nueva sección</span>
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h2 class="text-xl font-bold mb-4">Agregar nueva sección</h2>
                <div class="mb-4">
                    <input wire:model="name" class="form-input w-full rounded {{($errors->has('name') ? ' border-red-600' : '')}}" type="text" placeholder="Escriba el nombre de la sección">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong class="text-xs text-red-700">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>

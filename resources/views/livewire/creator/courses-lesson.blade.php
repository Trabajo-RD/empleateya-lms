<div>

    @foreach ( $section->lessons as $item )

        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">

                @if($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <!-- lesson name input -->
                        <div class="flex items-center">
                            <label class="w-32"><i class="far fa-play-circle mr-2"></i>Nombre:</label>
                            <input type="text" wire:model="lesson.name" class="form-input w-full rounded {{($errors->has('lesson.name') ? ' border-red-600' : '')}}">
                        </div>
                        @error('lesson.name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- lesson platform -->
                        <div class="flex items-center mt-3">
                            <label class="w-32"><i class="fas fa-server mr-2"></i>Plataforma:</label>
                            <select wire:model="lesson.platform_id" class="w-full">
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- lesson url input -->
                        <div class="flex items-center mt-3">
                            <label class="w-32"><i class="fas fa-link mr-2"></i>URL:</label>
                            <input type="text" wire:model="lesson.url" class="form-input w-full rounded {{($errors->has('lesson.url') ? ' border-red-600' : '')}}">
                        </div>
                        @error('lesson.url')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500 mr-2" wire:click="cancel"><i class="fas fa-times mr-2"></i>Cancelar</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt mr-2"></i>Actualizar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h3 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle mr-2"></i><strong>Lección:</strong> {{$item->name}}</h3>
                    </header>

                    <div x-show="open">
                        <hr class="mt-4 mb-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>

                        <div class="my-2">
                            <button class="btn btn-primary focus:outline-none" wire:click="edit({{$item}})"><i class="far fa-edit mr-2"></i>Editar</button>
                            <button class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500 ml-2 focus:outline-none" wire:click="destroy({{$item}})"><i class="far fa-trash-alt mr-2"></i>Eliminar</button>
                        </div>

                        <!-- Livewire Lesson Description  -->
                        <div class="mb-2">
                            @livewire('creator.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                        </div>
                        <!-- /Livewire Lesson Description  -->

                        <!-- Livewire Lesson Resources  -->
                        <div class="mb-2">
                            @livewire('creator.lesson-resources', ['lesson' => $item], key('lesson-resources' . $item->id))
                        </div>
                        <!-- /Livewire Lesson Resources  -->
                    </div>
                @endif

            </div>
        </article>

    @endforeach

    <div class="mt-6" x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer mb-2">
            <i class="far fa-plus-square text-2xl text-blue-500 mr-2"></i>
            <span class="text-blue-500 font-bold">Agregar nueva lección</span>
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h2 class="text-xl font-bold mb-4">Agregar nueva lección</h2>

                <div class="mb-4">
                    <!-- lesson name input -->
                        <div class="flex items-center">
                            <label class="w-32"><i class="far fa-play-circle mr-2"></i>Nombre:</label>
                            <input type="text" wire:model="name" class="form-input w-full rounded {{($errors->has('name') ? ' border-red-600' : '')}}">
                        </div>
                        @error('name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- lesson platform -->
                        <div class="flex items-center mt-3">
                            <label class="w-32"><i class="fas fa-server mr-2"></i>Plataforma:</label>
                            <select wire:model="platform_id" class="w-full {{($errors->has('platform_id') ? ' border-red-600' : '')}}">
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('platform_id')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- lesson url input -->
                        <div class="flex items-center mt-3">
                            <label class="w-32"><i class="fas fa-link mr-2"></i>URL:</label>
                            <input type="text" wire:model="url" class="form-input w-full rounded {{($errors->has('url') ? ' border-red-600' : '')}}">
                        </div>
                        @error('url')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500 focus:outline-none" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2 focus:outline-none" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>


<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body {{ ($lesson->description != '') ? 'bg-green-100 hover:bg-green-200 border-green-100' : 'bg-white-100 hover:bg-gray-100 border-gray-100' }} border ">
            <header>
                <h2 x-on:click="open = !open" class="font-bold cursor-pointer"><i class="far fa-file-alt mr-2"></i>Descripción</h2>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ( $lesson->description )
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full {{($errors->has('description.name') ? ' border-red-600' : '')}}"></textarea>
                        @error('description.name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="flex justify-end">
                            <button type="button" class="btn bg-white text-red-500 hover:bg-red-500 hover:text-white border border-red-500 mr-2" wire:click="destroy"><i class="far fa-trash-alt mr-2"></i>Eliminar</button>
                            <button type="submit" class="btn bg-green-400 text-white ml-2"><i class="fas fa-sync-alt mr-2"></i>Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name" placeholder="Añade una descripción para esta lección" class="form-input w-full {{($errors->has('name') ? ' border-red-600' : '')}}"></textarea>
                        @error('name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-primary ml-2"><i class="fas fa-plus mr-2"></i>Añadir</button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </article>
</div>

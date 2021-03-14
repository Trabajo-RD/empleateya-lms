<div>
    <div class="card" x-data="{open: false}">
        <div class="card-body {{ ($lesson->resource != '') ? 'bg-green-100 hover:bg-green-200 border-green-100' : 'bg-white-100 hover:bg-gray-100 border-gray-100' }} border ">
            <header>
                <!-- alpine event -->
                <h2 x-on:click="open = !open" class="font-bold cursor-pointer"><i class="fas fa-paperclip mr-2"></i>Recursos</h2>
            </header>

            <div x-show="open">
                <hr class="my-2 border-gray-300">

                @if( $lesson->resource )
                    <div class="flex justify-between items-center">
                        <p title="Descargar"><i wire:click="download" class="fas fa-download mr-2 cursor-pointer text-blue-500"></i>{{$lesson->resource->url}}</p>
                        <i wire:click="destroy" class="far fa-trash-alt text-red-500 cursor-pointer" title="Eliminar"></i>
                    </div>
                @else
                    <form wire:submit.prevent="save">
                        <div class="flex items-center">
                            <input wire:model="file" type="file" class="form-input flex-1 {{ ($errors->has('file')) ? 'border-red-600' : '' }}">
                            <button type="submit" class="btn btn-primary ml-2">Guardar</button>
                        </div>
                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                            Cargando...
                        </div>
                        @error('file')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>

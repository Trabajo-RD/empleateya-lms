<section>
    <h1 class="text-2xl font-bold"><i class="fas fa-users mr-2"></i>Audiencia del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach ( $course->audiences as $item )

        <article class="card mb-4">
            <div class="card-body bg-gray-100">

                @if( $audience->id == $item->id )

                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full {{($errors->has('audience.name') ? ' border-red-600' : '')}}" type="text" placeholder="Ingrese la audiencia del curso">
                        @error('audience.name')
                            <span class="invalid-feedback">
                                <strong class="text-xs text-red-700">{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>

                @else
                    <header class="flex items-center justify-between">
                        <h2 class="text-xl">{{ $item->name }}</h2>

                        <div>
                            <i wire:click="edit({{$item}})" class="fas fa-edit text-gray-500 cursor-pointer" ></i>
                            <i wire:click="destroy({{ $item }})" class="far fa-trash-alt text-red-500 cursor-pointer ml-2" ></i>
                        </div>
                    </header>
                @endif

            </div>
        </article>

    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full rounded {{($errors->has('name') ? 'border-red-600' : '')}}" placeholder="Añade el nombre de la meta">
                @error('name')
                    <span class="invalid-feedback">
                        <strong class="text-xs text-red-700">{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Añadir meta</button>
                </div>
            </form>
        </div>
    </article>

</section>


<div>
    <div class="card">

<div class="card-header bg-white">
    <div class="row mb-4">
        <div class="col col-md-6">
            <h4 class="font-weight-bold">
                {{ $componentName }} | {{ $pageTitle }}
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12" x-data="{isTyped: false}">
            <input class="form-control w-100"
                    type="search"
                    name="searchContact"
                    id="searchContact"
                    x-ref="searchField"
                    x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                    placeholder='Buscar...'
                    autocomplete="off"
                    wire:keydown="clear"
                    wire:model.debounce.500ms="search"
                    x-on:keydown.window.prevent.slash="$refs.searchContact.focus()"
                    x-on:keyup.escape="isTyped = false; $refs.searchContact.blur()">
            </div>
    </div>
</div>

    @if( $deleted_messages->count())

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-white bg-light" >
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Opciones</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach( $deleted_messages as $deleted_message )
                        <tr>
                            <td class="align-middle">{{ $deleted_message->updated_at }}</td>
                            <td class="align-middle">{{ $deleted_message->name }}</td>
                            <td class="align-middle text-center">{{ $deleted_message->email }}</td>
                            <td class="align-middle text-center">{{ ($deleted_message->phone != null) ? $deleted_message->phone : 'N/D' }}</td>
                            <!-- button -->
                            <td class="align-middle text-center d-flex flex-nowrap">


                                <button class="btn btn-outline-secondary mr-2" wire:click="Show({{ $deleted_message->id }})"><i class="far fa-envelope mr-1"></i>Abrir</button>

                                <button class="btn btn-outline-info mr-2" wire:click="Restore({{ $deleted_message->id }})"><i class="fas fa-trash-restore mr-1"></i>Restaurar</button>

                                <button class="btn btn-outline-danger" wire:click="deleteMessageConfirm({{ $deleted_message->id }})"><i class="far fa-trash-alt mr-2"></i>Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4">
            {{ $deleted_messages->links() }}
        </div>

        <div class="card-footer text-sm text-muted">
            Estos <strong>mensajes</strong> son visualizados desde el buzón: <strong class="text-primary">capacitate@mt.gob.do</strong>. Puede ver los mensajes con más detalle abriendo dicho buzón. Ten en cuenta que los mensajes que elimines en esta plataforma, solo se eliminarán del sistema, pero seguiran estando en el buzón.
        </div>

    @else
        <div class="alert alert-light" role="alert">
            <strong>Nada por aquí!</strong>
        </div>
    @endif


    </div>

    @include('livewire.admin.partials.message-modal')

</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('show-modal', msg => {
            $('#modal').modal('show');
        });
    });
</script>


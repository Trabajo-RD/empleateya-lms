<div>
    <div class="card">

        <!-- TODO: Reparar error al buscar: Missing required parameter for [Route: admin.users.edit] [URI: {locale}/users/{user}/edit] [Missing parameter: user]. (View: C:\xampp\htdocs\empleateya-lms\resources\views\livewire\admin\users-index.blade.php)  -->

        <div class="card-header">
            <div x-data="{isTyped: false}">
            <input class="form-control w-100"
                    type="search"
                    name="search"
                    id="search"
                    x-ref="searchField"
                    x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                    placeholder='Buscar...'
                    autocomplete="off"
                    wire:keydown="clear"
                    wire:model.debounce.500ms="search"
                    x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                    x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
            </div>
        </div>


            @if( $courses->count())

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                @can('update-user')
                                    <th>User</th>
                                @endcan
                                <th>Status</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $courses as $course )

                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->category->name }}</td>
                                        @can('update-user')
                                            <td>{{ $course->editor->name }} {{ $course->editor->lastname }}</td>
                                        @endcan
                                        <td>
                                            {{ $course->status == '3' ? 'Publicado' : 'Borrador' }}
                                        </td>
                                        {{-- <td>
                                            <a class="btn btn-outline-secondary" href="{{ route('admin.users.edit', [app()->getLocale(), $user] ) }}">Editar</a>
                                        </td> --}}
                                    </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $courses->links() }}
                </div>

            @else
                <div class="alert alert-light" role="alert">
                    <strong>Nada por aquí!</strong> No encuentro datos que coincidan con tu busqueda :(
                </div>
            @endif


    </div>

</div>

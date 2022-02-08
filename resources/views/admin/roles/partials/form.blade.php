<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'Nombre: ' ) !!}
        {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '' ) , 'placeholder' => 'Escribe un nombre para este rol']) !!}

        @error('name')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>    

</div>

<div class="card">
    <div class="card-body">
        <h2 class="card-title font-weight-bold">Permisos</h2>
        <p class="card-text">Seleccione los permisos que desea asignar a este rol.</p>
    </div>
    @error('permissions')
        <div>
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
        </div>
    @enderror

    <div class="d-flex flex-wrap justify-content-start p-4">
        @foreach ( $permissions as $permission )
            <div class="col col-md-4 p-2">
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>



<!--title -->
<div class="form-group">
    {!! Form::label('title', Lang::get('Title')) !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el nombre de la Sección']) !!}
    @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- slug -->
<div class="form-group mb-3">
    {!! Form::label( 'slug', Lang::get('Slug') ) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
</div>

<!--summary-->
<div class="form-group mb-3">
    {!! Form::label('summary', 'Descripción') !!}
    {!! Form::textarea('summary', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese una descripción',
        'rows' => 5,
    ]) !!}
    @error('summary')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="p-4">
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    <small class="text-danger">{{ Lang::get('Required fields') }}</small>
</div>
            
               
<div class="form-group">
    <span class="font-weight-bold">Subcategoría padre</span>
    <div class="input-group mt-1">
        {!! Form::select('topic_id', $topic_list, null, ['class' => 'custom-select']) !!}
        <div class="input-group-append">
            <a class="btn btn-outline-secondary" href="{{ route('admin.topics.create') }}">Nueva subcategoría</a>
        </div>
    </div>
    <small id="emailHelp" class="form-text text-muted">Selecciona o añade una nueva subcategoría.</small>
</div>

@error('topic_id')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}
</div>

@error('name')
    <span class="text-danger">{{ $message }}</span>
@enderror

<!-- course-slug -->
<div class="form-group">
    {!! Form::label( 'slug', Lang::get('Slug') ) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
</div>
@error('slug')
    <span class="text-danger">{{ $message }}</span>
@enderror

 <!-- icon -->
 <div class="form-group">
    {!! Form::label( 'icon', Lang::get('Icono') ) !!}
    {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la clase del icono desde FontAwesome' ]) !!}
</div>
@error('icon')
    <span class="text-danger">{{ $message }}</span>
@enderror

<!-- course-slug -->
{{-- <div class="form-group">
    {!! Form::hidden('topic_id', null, ['class' => 'form-control' ]) !!}
</div> --}}


<hr class="mt-8">

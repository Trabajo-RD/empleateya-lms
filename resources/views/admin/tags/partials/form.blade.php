<div class="form-group">
    {!! Form::label('topic_id', 'Subcategoría padre') !!}
    {!! Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) !!}
    {{-- @if(Route::is('admin.tags.edit') )
        <span class="text-muted text-sm">Cursos registrados con esta etiqueta: {{ count($tag_courses) }}</span>
    @endif --}}
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

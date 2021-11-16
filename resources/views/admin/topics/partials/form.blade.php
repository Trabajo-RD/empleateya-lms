<div class="form-group">
    {!! Form::label('category_id', 'Categoría padre') !!}
    {!! Form::select('category_id', $category_list, null, ['class' => 'form-control']) !!}
</div>

@error('category_id')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la subcategoría']) !!}
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
    {!! Form::hidden('category_id', null, ['class' => 'form-control' ]) !!}
</div> --}}


<hr class="mt-8">


{{-- @error('permissions')
    <div>
        <small class="text-danger">
            <strong>{{ $message }}</strong>
        </small>
    </div>
@enderror --}}

<div class="card">
    <div class="card-body">
        <h2 class="card-title"><strong>Etiquetas</strong></h2>
        <p class="card-text">Selecciona las etiquetas que estarán relacionados a esta subcategoría.</p>
      </div>
      <div class="d-flex flex-wrap justify-content-start p-4">
        @foreach ( $tags as $tag )
            <div class="col col-md-4 p-2">
                <label>
                    {!! Form::checkbox('tags[]', $tag->id, null, ['class' => 'mr-1']) !!}
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach
        </div>
</div>

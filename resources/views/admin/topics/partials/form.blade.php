<div class="form-group">
    <span class="font-weight-bold">Categoría padre</span>
    <div class="input-group mt-1">
        {!! Form::select('category_id', $category_list, null, ['class' => 'custom-select']) !!}
        <div class="input-group-append">
            <a class="btn btn-outline-secondary" href="{{ route('admin.categories.create', app()->getLocale() ) }}">Nueva categoría</a>
        </div>
    </div>
    <small id="emailHelp" class="form-text text-muted">Selecciona o añade una nueva categoría.</small>
</div>

{{-- <a href="" class="btn"><i class="fas fa-plus mr-1"></i></a> --}}
@error('category_id')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="mt-3 mb-3"></div>

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

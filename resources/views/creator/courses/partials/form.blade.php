<!-- hidden user_id -->
<div class="mb-4">
    {!! Form::hidden('user_id', auth()->user()->id ) !!}
</div>

<!-- course-title -->
<div class="mb-4">
    {!! Form::label( 'title', 'Título del curso:' ) !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '') ]) !!}

    @error('title')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- course-slug -->
<div class="mb-4">
    {!! Form::label( 'slug', 'Slug del curso:' ) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '') ]) !!}

    @error('slug')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- course-subtitle -->
<div class="mb-4">
    {!! Form::label( 'subtitle', 'Subtítulo del curso:' ) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '') ]) !!}

    @error('subtitle')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- course-description -->
<div class="mb-4">
    {!! Form::label( 'summary', 'Descripción del curso:' ) !!}
    {!! Form::textarea('summary', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('summary') ? ' border-red-600' : '') ]) !!}

    @error('summary')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- course categories select -->
    <div>
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course types select -->
    <div>
        {!! Form::label('type_id', 'Tipo:') !!}
        {!! Form::select('type_id', $types, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course levels select -->
    <div>
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course prices select -->
    <div>
        {!! Form::label('price_id', 'Costo:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course modality -->
    <div>
        {!! Form::label('modality_id', 'Modalidad:') !!}
        {!! Form::select('modality_id', $modalities, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course duration -->
    <div>
        {!! Form::label('duration_in_minutes', 'Duración del curso:') !!}
        {!! Form::text('duration_in_minutes', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('duration_in_minutes') ? ' border-red-600' : '') ]) !!}
    </div>
    @error('duration_in_minutes')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
    <!-- course status -->
    <!-- TODO: El curso debe estar debidamente completado para pasar a estatus publicado -->
    {{-- <div>
        <p class="mb-1">{!! Form::label('status', 'Estatus:') !!}</p>
        {!! Form::select('status', [1 => 'Borrador', 2 => 'Revisión', 3 => 'Publicado']) !!}
    </div> --}}
</div>

<hr class="mt-2 mb-6">

<!-- course-title -->
<div class="mb-4">
    {!! Form::label( 'url', 'URL Externa:' ) !!}
    {!! Form::text('url', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('url') ? ' border-red-600' : '') ]) !!}

    @error('url')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<hr class="mt-2 mb-6">

<h2 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h2>

<!-- course image -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 items-center">
    <figure>
        @isset( $course->image )
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="" >
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ asset('images/courses/default.jpg') }}" alt="" >
        @endisset
    </figure>
    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="picture">
        Cargando...
    </div>
    <div>
        <p class="mb-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus consequatur beatae, sed eaque, ipsa labore tenetur aliquid eum vitae iste ad laborum modi esse iure eligendi fuga hic, sint nemo?
        </p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
            <span class="invalid-feedback">
                <strong class="text-xs text-red-700">{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<hr class="mt-8 mb-4">

<!--title -->
<div class="form-group">
    {!! Form::label('title', Lang::get('Title')) !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el nombre de la Lección']) !!}
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

<div class="form-group">
    {!! Form::label('url', 'URL Externa') !!}
    <span class="tooltip ml-2">
        <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si el participante puede llevar el avance de esta Lección en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a la misma."></i>
    </span>
    {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
    @error('url')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="row g-2">
    <!-- platform -->
    <div class="col-md-4 form-group mb-3">
        {!! Form::label('platform_id', Lang::get('Platform')) !!}
        {!! Form::select('platform_id', $platforms, null, ['class' => 'form-control', 'placeholder' => 'Selecciona la plataforma donde esta colgado el contenido']) !!}
    </div>
    <!-- duration -->
    <div class="col-md-3 form-group mb-3">
        {!! Form::label('duration_in_minutes', Lang::get('Duration in minutes')) !!}
        {!! Form::number('duration_in_minutes', null, ['class' => 'form-control' ]) !!}
        @error('duration_in_minutes')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>



<div class="p-4">
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    <small class="text-danger">{{ Lang::get('Required fields') }}</small>
</div>

<!--title -->
<div class="form-group">
    {!! Form::label('title', Lang::get('Title')) !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {{-- <input type="text" name="title" class="form-control" placeholder="Ingresa el título del recurso"> --}}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el título del recurso']) !!}
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

<!-- file -->
<div class="mb-4 bg-light px-2 py-2">
    <div class="form-group">
        <label for="origin_file">{{ Lang::get('SCORM Package File') }}</label>
        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
        <input name="origin_file" type="file" id="origin_file" class="form-control-file">

    </div>
    {{-- <div class="mt-1">
        <input type="submit" value="Upload zip file" name="upload_scorm" class="btn btn-accent">
    </div> --}}

    @error('origin_file')
        <span class="text-warning">{{ $message }}</span>
    @enderror
</div>

<!--summary-->
<div class="form-group mb-3">
    {!! Form::label('summary', Lang::get('Summary')) !!}
    {!! Form::textarea('summary', null, [
        'class' => 'form-control',
        'placeholder' => Lang::get('Add a short description of the resource'),
        'rows' => 5,
    ]) !!}
</div>


<div class="form-group">
    {!! Form::label('entry_url', 'URL') !!}
    <span class="tooltip ml-2">
        <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="(Opcional) Puedes ingresar la URL del recurso si deseas que el usuario pueda acceder directamente a la plataforma donde está alojado el curso."></i>
    </span>
    {!! Form::text('entry_url', null, ['class' => 'form-control', 'placeholder' => 'Introduce la URL del recurso']) !!}
    @error('entry_url')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


{{-- <div class="row g-2">
    <div class="col-md-3 form-group">
        {!! Form::label('version', Lang::get('Version')) !!}
        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
        <input type="text" name="version" class="form-control" placeholder="{{ Lang::get('Resource version') }}">
        @error('version')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-9 form-group">
        {!! Form::label('identifier', Lang::get('Identifier')) !!}
        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
        <input type="text" name="identifier" class="form-control" placeholder="{{ Lang::get('Resource Identifier') }}">
        @error('identifier')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div> --}}

<div class="row g-2">
    <!-- aspect ratio -->
    <div class="col-md-3 form-group mb-3">
        {!! Form::label('ratio', Lang::get('Dimensions')) !!}
        {!! Form::select('ratio', $ratios, null, ['class' => 'form-control', 'placeholder' => Lang::get('Select dimensions')]) !!}
    </div>

</div>

<div class="my-2">
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    <small class="text-danger">{{ Lang::get('Required fields') }}</small>
</div>


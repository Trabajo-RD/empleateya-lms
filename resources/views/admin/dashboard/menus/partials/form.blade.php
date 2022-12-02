<!--title -->
<div class="form-group">
    {!! Form::label('title', Lang::get('Title')) !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el nombre del menú']) !!}
    @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!--location -->
{{-- <div class="form-group">
    {!! Form::label('location', Lang::get('Location')) !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {!! Form::text('location', null, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el nombre del menú']) !!}
    @error('location')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> --}}






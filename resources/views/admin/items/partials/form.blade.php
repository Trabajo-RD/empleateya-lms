<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del item']) !!}
</div>
@error('name')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    {!! Form::label('link', 'Enlace') !!}
    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el enlace que estará asociado a este item']) !!}
</div>
@error('link')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    {!! Form::label('status', 'Estado') !!}
    {!! Form::select('status', [1 => 'Ocultar', 2 => 'Mostrar'], null, ['class' => 'form-control input-lg mt-1']) !!}
</div>
@error('status')
    <span class="text-danger">{{ $message }}</span>
@enderror

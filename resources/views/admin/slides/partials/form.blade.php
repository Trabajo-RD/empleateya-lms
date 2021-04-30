<h3 class="pt-4 mb-4">Texto</h3>
<div class="form-group">
                {!! Form::label('title', 'Título') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del slide', 'autocomplete' => 'off']) !!}
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readonly' => 'readonly'] ) !!}
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    {!! Form::label('title_color', 'Color del título') !!}
                    {!! Form::select('title_color', ['text-white' => 'Blanco', 'text-blue' => 'Azul', 'text-red' => 'Rojo', 'text-gray' => 'Gris', 'text-yellow' => 'Amarillo', 'text-green' => 'Verde'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('title_color_saturation', 'Saturación') !!}
                    {!! Form::select('title_color_saturation', ['100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Información') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una breve descripción para este slide']) !!}
            </div>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-row">
                <div class="form-group col-md-10">
                    {!! Form::label('content_color', 'Color del contenido') !!}
                    {!! Form::select('content_color', ['text-white' => 'Blanco', 'text-blue' => 'Azul', 'text-red' => 'Rojo', 'text-gray' => 'Gris', 'text-yellow' => 'Amarillo', 'text-green' => 'Verde'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('content_color_saturation', 'Saturación') !!}
                    {!! Form::select('content_color_saturation', ['100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    {!! Form::label('background_color', 'Color de fondo') !!}
                    {!! Form::select('background_color', ['bg-white' => 'Blanco', 'bg-blue' => 'Azul', 'bg-red' => 'Rojo', 'bg-gray' => 'Gris', 'bg-yellow' => 'Amarillo', 'bg-green' => 'Verde'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('background_color_saturation', 'Saturación') !!}
                    {!! Form::select('background_color_saturation', ['100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('background_color_opacity', 'Opacidad') !!}
                    {!! Form::select('background_color_opacity', ['bg-opacity-100' => '100%', 'bg-opacity-75' => '75%', 'bg-opacity-50' => '50%', 'bg-opacity-25' => '25%', 'bg-opacity-0' => '0%'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

            <hr>

            <h3 class="pt-4">Enlace</h3>
            <p class="text-muted">Si deseas puedes añadir un enlace para mostrarlo en la diapositiva.</p>
            <div class="form-group">
                {!! Form::label('link', 'URL') !!}
                {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'URL del enlace']) !!}
            </div>
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('link_text', 'Texto del enlace') !!}
                {!! Form::text('link_text', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el texto que mostrará el enlace']) !!}
            </div>
            @error('subtitle')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('link_type', 'Tipo de enlace') !!}
                    {!! Form::select('link_type', ['btn' => 'Botón', 'font-italic' => 'Enlace'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('target', 'Abrir enlace en...') !!}
                    {!! Form::select('target', ['none' => 'En la misma ventana', '_blank' => 'Una nueva ventana'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    {!! Form::label('link_color', 'Color del texto') !!}
                    {!! Form::select('link_color', ['text-white' => 'Blanco', 'text-blue' => 'Azul', 'text-red' => 'Rojo', 'text-gray' => 'Gris', 'text-yellow' => 'Amarillo', 'text-green' => 'Verde'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('link_color_saturation', 'Saturación') !!}
                    {!! Form::select('link_color_saturation', ['100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    {!! Form::label('link_bg_color', 'Color de fondo') !!}
                    {!! Form::select('link_bg_color', ['bg-white' => 'Blanco', 'bg-blue' => 'Azul', 'bg-red' => 'Rojo', 'bg-gray' => 'Gris', 'bg-yellow' => 'Amarillo', 'bg-green' => 'Verde'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('link_bg_color_saturation', 'Saturación') !!}
                    {!! Form::select('link_bg_color_saturation', ['100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'], null, ['class' => 'form-control input-lg mt-1']) !!}
                </div>
            </div>

<hr>
<h3 class="pt-4">Imagen</h3>
            <!-- partner logo -->
            <div class="row py-5">
                <div class="col-sm-12 col-md-6 text-center">
                    <figure>
                        @isset( $slide->image )
                            <img id="picture" class="img-fluid" src="{{ Storage::url($slide->image->url) }}" alt="" style="max-height: 125px;">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('images/home/slider/default.png') }}" alt="" style="max-height: 1366px;" >
                        @endisset
                    </figure>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="mb-3">
                        Selecciona una imagen para mostrar como fondo en el carousel de la portada.
                        <br><small>Tamaño recomendado: 1366x400 pixeles</small>
                    </p>
                    {!! Form::file('file', ['class' => 'form-input', 'id' => 'file']) !!}
                </div>
            </div>

            <hr>
<h3 class="pt-4">Información adicional</h3>
<p class="text-muted">De ser necesario, puedes añadir informaciones tales como fecha, hora, dirección o teléfono.</p>
            <div class="form-group">
                {!! Form::label('information', 'Información') !!}
                {!! Form::textarea('information', null, ['class' => 'form-control', 'placeholder' => 'Añade una dirección, fecha, hora, etc...']) !!}
            </div>
            @error('information')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('status', 'Estado de la diapositiva') !!}
                {!! Form::select('status', [1 => 'Ocultar', 2 => 'Mostrar'], null, ['class' => 'form-control input-lg mt-1']) !!}
            </div>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror

<div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la empresa o institución']) !!}
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                {!! Form::label('details', 'Detalles de la sociedad') !!}
                {!! Form::textarea('details', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los detalles de la sociedad']) !!}
            </div>
            @error('details')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                {!! Form::label('url', 'URL') !!}
                {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la URL del sitio web de la empresa o institución']) !!}
            </div>
            @error('url')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- partner logo -->
            <div class="row py-5">
                <div class="col-sm-12 col-md-6 text-center">
                    <figure>
                        @isset( $partner->image )
                            <img id="picture" class="img-fluid" src="{{ Storage::url($partner->image->url) }}" alt="" style="max-height: 125px;">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('images/courses/logo-cloud.png') }}" alt="" style="max-height: 125px;" >
                        @endisset
                    </figure>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="mb-3">
                        Selecciona una imagen para mostrar como logo de la institución o empresa con la que se tiene algún convenio o asociación.
                        <br><small>Tamaño recomendado: 200x155 pixeles</small>
                    </p>
                    {!! Form::file('file', ['class' => 'form-input', 'id' => 'file']) !!}
                </div>
            </div>
            <!-- -->

            <div class="form-group">
                {!! Form::label('visible', 'Estado') !!}
                {!! Form::select('visible', [1 => 'Ocultar', 2 => 'Mostrar'], null, ['class' => 'form-control input-lg mt-1']) !!}
            </div>
            @error('visible')
                <span class="text-danger">{{ $message }}</span>
            @enderror
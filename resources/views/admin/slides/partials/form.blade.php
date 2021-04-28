<div class="form-group">
                {!! Form::label('title', 'Título') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del slide']) !!}
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('subtitle', 'Subtítulo') !!}
                {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el subtítulo del slide']) !!}
            </div>
            @error('subtitle')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('content', 'Contenido') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una breve descripción para este slide']) !!}
            </div>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                {!! Form::label('link', 'URL') !!}
                {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una URL si desea añadir un enlace']) !!}
            </div>
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- partner logo -->
            <div class="row py-5">
                <div class="col-sm-12 col-md-6 text-center">
                    <figure>
                        @isset( $partner->image )
                            <img id="picture" class="img-fluid" src="{{ Storage::url($slide->image->url) }}" alt="" style="max-height: 125px;">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('images/home/slider/hero2.jpg') }}" alt="" style="max-height: 1366px;" >
                        @endisset
                    </figure>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="mb-3">
                        Selecciona una imagen para mostrar como logo de la institución o empresa con la que se tiene algún convenio o asociación.
                        <br><small>Tamaño recomendado: 1366x400 pixeles</small>
                    </p>
                    {!! Form::file('file', ['class' => 'form-input', 'id' => 'file']) !!}
                </div>
            </div>
            <!-- -->

            <div class="form-group">
                {!! Form::label('status', 'Estado') !!}
                {!! Form::select('status', [1 => 'Ocultar', 2 => 'Mostrar'], null, ['class' => 'form-control input-lg mt-1']) !!}
            </div>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
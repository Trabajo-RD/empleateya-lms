<div class="form-group">
                {!! Form::label('title', 'Nombre') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la empresa o institución']) !!}
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror

             <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readonly' => 'readonly'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Detalles de la sociedad') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los detalles de la sociedad']) !!}
            </div>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            
            <hr>

            <h3 class="pt-4">Enlace</h3>
            <p class="text-muted">Si deseas puedes añadir un enlace para mostrarlo junto con el banner.</p>
            <div class="form-group">
                {!! Form::label('link', 'URL') !!}
                {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'URL del enlace']) !!}
            </div>
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <hr>
<h3 class="pt-4">Imagen</h3>
            <!-- partner logo -->
            <div class="row py-5">
                <div class="col-sm-12 col-md-6 text-center">
                    <figure>
                        @isset( $partner->image )
                            <img id="picture" class="img-fluid" src="{{ Storage::url($partner->image->url) }}" alt="" style="max-height: 125px;">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('images/courses/logo-cloud.png') }}" alt="" style="max-height: 1366px;" >
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

            {{-- <!-- partner logo -->
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
                    {!! Form::file('file', ['class' => 'form-input', 'id' => 'file', 'accept' => 'image/*']) !!}
                </div>
            </div>
            <!-- --> --}}

            <div class="form-group">
                {!! Form::label('status', 'Estado') !!}
                {!! Form::select('status', [1 => 'Ocultar', 2 => 'Mostrar'], null, ['class' => 'form-control input-lg mt-1']) !!}
            </div>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
 <!--title -->
 <div class="form-group">
    {!! Form::label('title', 'Título') !!}
    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el título del curso']) !!}
    @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="card shadow mt-4">
    <div class="card-body">
        <div class="row g-3">
            <!-- program -->
            <div class="col-md-4 form-group mb-3">
                {!! Form::label('program_id', Lang::get('Project or Program to which it belongs')) !!}
                {!! Form::select('program_id', $programs, null, ['class' => 'form-control', 'placeholder' => 'Asigna esta ruta a un programa']) !!}
            </div>
            <!-- category -->
            <div class="col form-group mb-3">
                {!! Form::label('category_id', Lang::get('Category')) !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selecciona una categoría']) !!}
            </div>
            <!-- ajax topic select -->
            <div class="col form-group mb-3">
                <label for="topic">{{ Lang::get('Topic') }}</label>
                <select class="form-control" name="topic_id" id="topic"></select>
                {{-- {!! Form::label('topic_id', Lang::get('Topic')) !!}
                {!! Form::select('topic_id', $topics, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un tema']) !!} --}}
            </div>
        </div>

        <!-- slug -->
        <div class="form-group mb-3">
            {!! Form::label( 'slug', Lang::get('Slug') ) !!}
            {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
            @error('slug')
                <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>

        <!--subtitle -->
        <div class="form-group mb-3">
            {!! Form::label('subtitle', Lang::get('Subtitle')) !!}
            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un subtítulo para este curso']) !!}
        </div>

        <!--summary-->
        <div class="form-group mb-3">
            {!! Form::label('summary', Lang::get('Description')) !!}
            <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
            {!! Form::textarea('summary', null, [
                'id' => 'summary',
                'class' => 'form-control',
                'placeholder' => 'Ingrese una descripción',
                'rows' => 5,
            ]) !!}
            @error('summary')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('url', 'URL Externa') !!}
            <span class="tooltip ml-2">
                <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si el participante puede llevar el avance de este Curso en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a este curso."></i>
            </span>
            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
            @error('url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row g-2">
            <!-- level -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('level_id', Lang::get('Level')) !!}
                <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                {!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'placeholder' => 'Nivel de aprendizaje recomendado']) !!}
                @error('level_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- modality -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('modality_id', Lang::get('Modality')) !!}
                {!! Form::select('modality_id', $modalities, null, ['class' => 'form-control', 'placeholder' => 'Modalidad de aprendizaje']) !!}
            </div>

            <!-- language -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('language_id', Lang::get('Language')) !!}
                {!! Form::select('language_id', $languages, null, ['class' => 'form-control', 'placeholder' => 'Idioma de la ruta de aprendizaje']) !!}
            </div>

            <!-- duration -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('duration_in_minutes', Lang::get('Duration in minutes')) !!}
                <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                {!! Form::number('duration_in_minutes', null, ['class' => 'form-control' ]) !!}
                @error('duration_in_minutes')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-3">
            <!-- price -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('price_id', Lang::get('Costo')) !!}
                <span class="tooltip ml-2">
                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si el curso tiene un costo, puedes asignarlo desde esta lista, por defecto el costo es Gratis. Si el costo no está en la lista, contacta a un administrador para que agrege el costo a la lista."></i>
                </span>
                {!! Form::select('price_id', $prices, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un costo']) !!}
            </div>

            <!-- audience -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('audience', Lang::get('Audiencia')) !!}
                <span class="tooltip ml-2">
                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Establece una audiencia si deseas limitar el número de participantes que podrán matricularse en este curso."></i>
                </span>
                {!! Form::number('audience', null, ['class' => 'form-control' ]) !!}
                @error('audience')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- image file -->
        <div class="mb-4" >
            <label for="file">{{ Lang::get('Specify an image file to upload') }}</label><br>
            <div class="form-group bg-light p-2" style="border: 1px solid #777777 ; border-style: dashed;">
                {!! Form::file('file', ['class' => 'form-input' . ($errors->has('file') ? 'border border-danger' : '' ), 'id' => 'file', 'accept' => 'image/*']) !!}
                <br>
                <!-- image preview -->
                <div class="d-flex align-items-center justify-content-around">
                    <figure class="figure text-center">
                        @isset($course->image)
                            <img id="picture" class="figure-img img-fluid" src="{{ Storage::url($course->image->url) }}">
                        @else
                            <img id="picture" class="figure-img img-fluid" src="{{ asset('images/image-icon.svg') }}" style="width:100px;">
                            <figcaption class="figure-caption">{{ Lang::get('Maximun upload file size') }}: 20MB</figcaption>
                        @endisset
                    </figure>
                </div>
            </div>

            @error('file')
                <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>

        <hr>

        <div class="row g-3">
            <!-- start date -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('start_date', Lang::get('Start Date')) !!}
                <span class="tooltip ml-2">
                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si se establece una fecha de inicio, los usuarios podrán matricularse, pero no podrán iniciar el curso hasta la fecha establecida."></i>
                </span>
                {!! Form::date('start_date', null, ['class' => 'form-control' ]) !!}
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- end date -->
            <div class="col-md-3 form-group mb-3">
                {!! Form::label('end_date', Lang::get('End Date')) !!}
                <span class="tooltip ml-2">
                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si se establece una fecha de término, los usuarios no podrán realizar actividades después de la fecha establecida."></i>
                </span>
                {!! Form::date('end_date', null, ['class' => 'form-control' ]) !!}
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
    </div><!--card-body-->

    <div class="p-4">
        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
        <small class="text-danger">{{ Lang::get('Required fields') }}</small>
    </div>
</div><!--card-->


{{-- <div class="card shadow">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto"><span class="h4 text-primary">{{ Lang::get('Sections') }}</span></div>
            <div>
                <a href="{{ route('instructor.dashboard.courses.sections.create') }}" class="btn btn-secondary shadow">{{ Lang::get('Add Section') }}</a>
            </div>
        </div>
    </div>

    @if(count($sections))
        <div class="card-body">

            @error('sections')
                <small class="text-danger">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror

            <div class="card shadow mt-3">
                <div class="card-body">
                    <table class="table">
                        <thead class="bg-secondary">
                            <tr>
                                <th>{{ Lang::get('Title') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <td>
                                        <label>
                                            {!! Form::checkbox('sections[]', $section->id, null, ['class' => 'mr-1']) !!}
                                            {{ $section->title }}
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!--card-body-->
    @endif
</div><!--card--> --}}

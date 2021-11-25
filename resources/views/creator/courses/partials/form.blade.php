<!-- hidden user_id -->
<div class="mb-4">
    {!! Form::hidden('user_id', auth()->user()->id ) !!}
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>

<!-- course-title -->
<div class="mb-4">
    <div class="flex">
        <div class="flex-1">
            {!! Form::label( 'title', Lang::get('Course title') ) !!}
            {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '') ]) !!}

            @error('title')
                <span class="invalid-feedback">
                    <strong class="text-xs text-red-700">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col">
            <button type="button" onclick="copyToClipboard('title')" class="btn h-auto border border-gray-500 mt-auto bg-gray-300 hover:bg-gray-400 text-gray-600 hover:text-gray-700 ml-4"><span title="{{ __('Copy') }}"><i class="far fa-copy fa-lg"></i></span></button>
        </div>
    </div>
</div>

<!-- course-slug -->
<div class="mb-4">
    {!! Form::label( 'slug', Lang::get('Course slug') ) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input bg-gray-100 block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '') ]) !!}

    @error('slug')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- course-subtitle -->
<div class="mb-4">
    {!! Form::label( 'subtitle', Lang::get('Course subtitle' )) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '') ]) !!}

    @error('subtitle')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- course-description -->
<div class="mb-4">
    {!! Form::label( 'summary', Lang::get('Course description')) !!}
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
        {!! Form::label('category_id', Lang::get('Category')) !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'category-select form-input block w-full mt-1']) !!}
    </div>
    <!-- course topic select -->
    <div>
        {!! Form::label('topic_id', 'Tema:') !!}
        {!! Form::select('topic_id', $topics, null, ['class' => 'form-input block w-full mt-1']) !!}

        {{-- <select id="topic_id" name="topic_id">
            <option value='0'>-- Seleccionar tema --</option>
        </select> --}}
    </div>
    <!-- course types select -->
    <div>
        {!! Form::label('type_id', Lang::get('Type')) !!}
        {!! Form::select('type_id', $types, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course levels select -->
    <div>
        {!! Form::label('level_id', Lang::get('Level')) !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <!-- course modality -->
    <div>
        {!! Form::label('modality_id', Lang::get('Modality')) !!}
        {!! Form::select('modality_id', $modalities, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <!-- course duration -->
    <div>
        {!! Form::label('duration_in_minutes', Lang::get('Duration in minutes')) !!}
        {!! Form::text('duration_in_minutes', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('duration_in_minutes') ? ' border-red-600' : '') ]) !!}
    </div>
    @error('duration_in_minutes')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $message }}</strong>
        </span>
    @enderror    

    <!-- course prices select -->
    <div>
        {!! Form::label('price_id', Lang::get('Price')) !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <!-- course language select -->
    <div>
        {!! Form::label('language_id', Lang::get('Language')) !!}
        {!! Form::select('language_id', $languages, null, ['class' => 'language-select form-input block w-full mt-1']) !!}
    </div>
    
    <!-- course status -->
    <!-- TODO: El curso debe estar debidamente completado para pasar a estatus publicado -->
    {{-- <div>
        <p class="mb-1">{!! Form::label('status', 'Estatus:') !!}</p>
        {!! Form::select('status', [1 => 'Borrador', 2 => 'Revisión', 3 => 'Publicado']) !!}
    </div> --}}
</div>

<hr class="mt-2 mb-6">

<h2 class="font-bold text-lg">{{ __('Restrictions')}}</h2>

<!-- Limits -->
<div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- audience -->
    <div>
        {!! Form::label('audience', Lang::get('Audience Limit')) !!}
        {!! Form::text('audience', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('audience') ? 'border-red-600' : '') ]) !!}
    </div>
    @error('audience')
        <span class="invalid-feedback">
            <strong class="text-xs text-red-700">{{ $audience }}</strong>
        </span>
    @enderror

    <!-- start date -->
    <div>
        {!! Form::label('start_date', Lang::get('Start Date')) !!}
        {!! Form::date('start_date', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('start_date') ? 'border-red-600' : '') ]) !!}
    </div>

        <!-- end date -->
    <div>
        {!! Form::label('end_date', Lang::get('End Date')) !!}
        {!! Form::date('end_date', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('end_date') ? 'border-red-600' : '') ]) !!}
    </div>
    
</div>

<hr class="mt-2 mb-6">

<!-- course-URL -->
<div class="mb-4">
    <div class="flex">
        <div class="flex-1"
            {!! Form::label( 'url', Lang::get('External URL') ) !!}
            {!! Form::text('url', null, ['class' => 'form-input block bg-gray-100 text-blue-400 select-auto w-full mt-1' . ($errors->has('url') ? ' border-red-600' : ' ')] ) !!}
            @error('url')
                <span class="invalid-feedback">
                    <strong class="text-xs text-red-700">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col">
            <button type="button" onclick="copyToClipboard('url')" class="btn h-auto border border-gray-500 mt-auto bg-gray-300 hover:bg-gray-400 text-gray-600 hover:text-gray-700 ml-4"><span title="{{ __('Copy') }}"><i class="far fa-copy fa-lg"></i></span></button>
        </div>
    </div>
    <p class="text-gray-600 text-sm">{{ __('If the course was registered with an external URL, you can get more information by copying and pasting this link in your browser') }}</p>
</div>

<hr class="mt-2 mb-6">

<h2 class="text-2xl font-bold mt-8 mb-2">{{ __('Course image')}}</h2>

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
            {{ __('You can add an image from your computer or mobile device. If you don\'t add an image, the system will assign a default image that will be shown to the student along with the course information.') }}
        </p>
        <p class="mb-2 text-gray-400 text-sm">
            {{ __('To reduce the size of your image file, you can use online tools such as:') }}
        </p>
        <div class="flex mb-2 items-center">
            <a href="https://tinypng.com/" target="_blank" class="text-blue-400 bg-gray-100 text-sm text-center py-1 px-4 mr-4">TinyPNG</a>
            <a href="https://compressjpeg.com/es/" target="_blank" class="text-blue-400 bg-gray-100 text-sm text-center py-1 px-4 mr-4">CompressJPEG</a>
            <a href="http://webresizer.com/resizer/?lang=es" target="_blank" class="text-blue-400 bg-gray-100 text-sm text-center py-1 px-4 mr-4">WebResizer</a>
        </div>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
            <span class="invalid-feedback">
                <strong class="text-xs text-red-700">{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<hr class="mt-8 mb-4">

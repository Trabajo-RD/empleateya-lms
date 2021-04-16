<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">{{ __('New_course') }}</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => ['creator.courses.store', app()->getLocale()], 'files' => true, 'autocomplete' => 'off' ]) !!}

                    @include('creator.courses.partials.form')

                    <!-- buttons -->
                    <div class="flex justify-end">
                        {!! Form::submit('Crear curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/creator/courses/form.js') }}"></script>

    </x-slot>

</x-app-layout>

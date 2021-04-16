<x-instructor-layout :course="$course">

    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-info-circle mr-2"></i>Información del curso</h1>
        <hr class="mt-2 mb-6">

        {!! Form::model($course, ['route' => ['instructor.courses.update', [app()->getLocale(), $course]], 'method'=> 'put', 'files' => true ]) !!}

            @include('instructor.courses.partials.form')

            <!-- buttons -->
            <div class="flex justify-end">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary cursor-pointer']) !!}
            </div>


        {!! Form::close() !!}

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

    </x-slot>

</x-instructor-layout>

@extends('adminlte::page')

@section('title', 'Capacítate RD - Create Course')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="color-primary">{{ Lang::get('Add Course')}}</h1>
@stop

@section('content')

    <div class="card mb-5">
        {!! Form::open(['route' => 'instructor.dashboard.courses.store', 'files' => true]) !!}
        <div class="card-body shadow-sm">

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('instructor.dashboard.courses.partials.form')

        </div><!--card-body-->

        <div class="card-footer bg-white mb-4 d-flex justify-content-between">
            <a href="{{ route('instructor.dashboard.courses.index') }}" class="btn btn-default mr-auto"><i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Return') }}</a>
            {!! Form::button('<i class="fas fa-save mr-2"></i>' . Lang::get('Save and Close'), ['type' => 'submit', 'class' => 'btn btn-accent shadow']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <!-- CK Editor WYSIWYG-->
    <script src="{{ asset('js/instructor/courses/custom-ckeditor.js') }}"></script>
    <!-- form js -->
    <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#category_id').on('change', function () {
                var categoryId = this.value;
                alert(categoryId);

                $('#topic').html('');

                $.ajax({
                    url: '{{ route('getTopicsByCategory') }}?category_id='+categoryId,
                    type: 'get',
                    success: function (res) {

                        $('#topic').html('<option value="">Select Topic</option>');

                        $.each(res, function (key, value) {
                            $('#topic').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        
                    }
                });
            });
        })
    </script>
@stop

<x-creator-layout :course="$course">

    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-info-circle mr-2"></i>Información del curso</h1>
        <hr class="mt-2 mb-6">

        {!! Form::model($course, ['route' => ['creator.courses.update', app()->getLocale(), $course], 'method'=> 'put', 'files' => true ]) !!}

            @include('creator.courses.partials.form')

            <!-- buttons -->
            <div class="flex justify-end">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary cursor-pointer']) !!}
            </div>


        {!! Form::close() !!}

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/creator/courses/form.js') }}"></script>

        <script>
            $('.category-select').change(function(){
                // var route = $('.create_form').attr('action'); // recupero la url de mi formulario -> localhost/miproyecto/public/agency/search
                var id = $(this).val(); // recupero el dato de mi input para enviar a buscar a mi controlador
                var csrf = $('#token').val();
                // Empty the dropdown
                //$('#topic_id').find('option').not(':first').remove();

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route("creator.courses.microsoft.request") }}',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        'id' : id,
                        '_token' : csrf,
                        },
                    success:function(response){
                        console.log(response);

                        var len = 0;
                        if(response['data'] != null){
                            len = response['data'].length;
                        }

                        if(len > 0){
                            for( var i = 0; i < len; i++){
                                var id = response['data'][i].id;
                                var name = response['data'][i].name;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#topic_id").append(option);
                            }
                        }


                        // $('#title').val(response["title"]);

                        // var slug = response["title"];
                        // slug = slug.replace(/ /g, '-');
                        // slug = slug.toLowerCase();
                        // $('#slug').val(slug);

                        // $('#summary').val(response["summary"]);

                        // var type = "";
                        // switch (response["type"]) {
                        //     case "learningPath":
                        //         type = 1;
                        //     case "module":
                        //         type = 2
                        //         break;
                        //     case "video":
                        //         type = 3
                        //     default:
                        //         break;
                        // }

                        // $('#category_id').val(3);

                        // $('#type_id').val(type);

                        // var level = "";

                        // switch (response["levels"][0]) {
                        //     case "beginner":
                        //         level = 1;
                        //     case "intermediate":
                        //         level = 2
                        //         break;
                        //     case "advanced":
                        //         level = 3
                        //     default:
                        //         break;
                        // }

                        // $('#level_id').val(level);

                        // $('#duration_in_minutes').val(response["durationInMinutes"]);
                    },
                    error:function(error){
                        console.log('error');// solo ingresa a esta parte
                    }
                });

            });
        </script>

    </x-slot>

</x-creator-layout>

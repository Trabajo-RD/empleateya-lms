<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">{{ __('New_course') }}</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off', 'class' => 'create_form' ]) !!}

                    @include('instructor.courses.partials.linkedin-form')

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

        <!-- creator ajax -->
        {{-- <script src="{{ asset('js/instructor/courses/ajax.js') }}"></script> --}}

        <!-- creator js -->
        {{-- <script src="{{ asset('js/instructor/courses/form.js') }}"></script> --}}

        <script>

            $('.get-data').click(function(){
                // var route = $('.create_form').attr('action'); // recupero la url de mi formulario -> localhost/miproyecto/public/agency/search
                var url = $('#url').val(); // recupero el dato de mi input para enviar a buscar a mi controlador
                var csrf = $('#token').val();
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type:'post',
                    dataType: 'json',
                    url: '{{ route("instructor.courses.linkedin.request") }}',
                    data: { 
                        '_token' : csrf,
                        'url' : url
                        }, //Aqui tienes que enviar el objeto json
                    success:function(response){
                        console.log(response);
                        $('#title').val(response["title"]);

                        var slug = response["title"];
                        slug = slug.replace(/ /g, '-');
                        slug = slug.toLowerCase();
                        $('#slug').val(slug);

                        $('#summary').val(response["summary"]);

                        var type = "";
                        switch (response["type"]) {
                            case "learningPath":
                                type = 1;
                            case "module":
                                type = 2
                                break;
                            case "video":
                                type = 3
                            default:
                                break;
                        }

                        $('#category_id').val(3);

                        $('#type_id').val(type);

                        var level = "";

                        switch (response["levels"][0]) {
                            case "beginner":
                                level = 1;
                            case "intermediate":
                                level = 2
                                break;
                            case "advanced":
                                level = 3
                            default:
                                break;
                        }

                        $('#level_id').val(level);

                        $('#duration_in_minutes').val(response["durationInMinutes"]);
                    },
                    error:function(error){
                        console.log('error');// solo ingresa a esta parte
                    }
                });

            });

            function convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-')
                    ;
            }

        /*
        TODO: PASTE FROM CLIPBOARD

        */
        // async function getClipboardContent(){
        //     try {
        //         const text = await navigator.clipboard.readText();
        //     } catch (err) {
        //         console.log(err);
        //     }
        // }

        // Paste from clipboard
        // async function pasteFromClipboard(id) {

        //     this.getClipboardContent();

        //     document.getElementById(id).select();
        //     document.execCommand('paste');
            
            
        // }



        // AUTOMATIC SLUG 
        // title listener
        document.getElementById("title").addEventListener('keyup', slugChange);

        // event change
        function slugChange(){
            title = document.getElementById("title").value;
            document.getElementById("slug").value = slug(title);
        }

        // formating slug
        function slug(str){
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.normalize("NFD").replace(/[\u0300-\u036f]/g, '');

            return $slug.replace(/\s+/g, '-').toLowerCase();
        }




        /* CHANGE IMAGE */

        document.getElementById("file").addEventListener('change', imageChange);

        function imageChange( event ){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = ( event ) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL( file );
        }

        // Copy to clipboard the input value by the ID
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
        }

        </script>

    </x-slot>

</x-app-layout>

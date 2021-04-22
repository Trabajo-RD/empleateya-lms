<x-app-layout>

    <section class="bg-blue-900 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            <figure>
            <!-- card image -->
                <img id="picture" class="h-80 w-full object-cover shadow" src="{{ asset('images/courses/default.jpg') }}" alt="" >
            </figure>
            <div>

                {{-- <h1 class="text-white font-extrabold text-2xl sm:text-3xl md:text-4xl">{{ $courses->modality->name }}</h1> --}}


            </div>

        </div>
    </section>


    <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-24">

        <div class="order-1  md:order-2 lg:order-2">

            <aside class="hidden md:block">

                <h2 class="font-bold text-2xl text-gray-600 mb-12">Cursos relacionados</h2>



                   {{ $courses }}

                <h2 class="font-bold text-2xl text-gray-600 my-12">Encuesta de Satisfacción</h2>
                <article>
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </article>

            </aside>

        </div>

    </div>

    <x-slot name="js">

        <!-- CDN CKEditor 5 Classic -->
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <!-- instructor js -->
        <script src="{{ asset('js/student/courses/review.js') }}"></script>

    </x-slot>

</x-app-layout>

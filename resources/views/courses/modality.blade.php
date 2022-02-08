<x-app-layout>

    <!-- hero -->
    <section class="bg-cover" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/courses/hero9.jpg' ) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <!-- titulo -->
                <h1 class="text-white font-extrabold text-3xl sm:text-4xl md:text-5xl">{{ __($modality->name) }}</h1>
                <!-- parrafo -->
                <p class="text-white mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __($modality->name . '-description') }}</p>
                <!-- Buscador -->
                @livewire('search')
            </div>
        </div>
    </section>



    <main>
        @livewire('course-modality')

        {{-- <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display font-semibold text-gray-600 text-2xl sm:text-3xl md:text-4xl mb-6" >Subcategorías en {{ $modality->name }}</h2>
            <!-- This is the tags container -->
            <div class='mt-8 flex flex-wrap justify-center -m-1'>
                @foreach ($topics as $topic)
                    <a class="cursor-pointer my-2 text-normal text-gray-700">
                        <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full py-4 px-6 font-bold text-sm leading-loose cursor-pointer" >
                            {{ $topic->name }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div> --}}
    </main>






    <!-- Page Footer -->
    @if(isset($footer))
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $footer }}
        </div>
    </footer>
    @endif

    <!-- Page Copyright -->
    @if(isset($copyright))
    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
            {{ $copyright }}
        </div>
    </section>
    @endif

</x-app-layout>

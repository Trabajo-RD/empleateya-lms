<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">{{ __('New_course') }}</h1>
                <hr class="mt-2 mb-4"> 

                <p class="text-2xl text-gray-700 mx-auto text-center mt-12">{{ __('Choose the platform of the course to create') }}:
                    <!-- courses -->
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 py-16 gap-x-6 gap-y-8">
                    @include('creator.courses.partials.platforms')                        
                </div>             

            </div>
        </div>
    </div>    

</x-app-layout>

<x-app-layout>

    <!-- hero -->
    <section class="bg-cover mb-8" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/courses/hero9.jpg' ) }})">
        <x-tailwind.layouts.container>
            <div class="w-full md:w-3/4 lg:w-1/2 py-12">
                <!-- titulo -->
                <x-tailwind.headings.h2  color="white" class="font-extrabold">
                    {{ __('Course catalog') }}
                </x-tailwind.headings.h2>

                <x-tailwind.text.lead color="white">
                    {{ __('If you are looking to be more competitive, get a job or start your own business, these courses are for you') }}
                </x-tailwind.text.lead>

                <!-- Buscador -->
                {{-- @livewire('search') --}}
                
            </div>
        </x-tailwind.layouts.container>
    </section>

    <main>
        {{-- @livewire('courses-index') --}}
        @livewire('course.course-index')
    </main>

   
</x-app-layout>

<x-app-layout>

    <!-- hero -->
    <section class="bg-cover mb-8" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/home/hero15.jpg' ) }})">
        <x-tailwind.layouts.container>
            <div class="w-full md:w-3/4 lg:w-1/2 py-12">
                <!-- titulo -->
                <x-tailwind.headings.h2  color="white" class="font-extrabold">
                    {{ __('Workshops') }}
                </x-tailwind.headings.h2>

                <x-tailwind.text.lead color="white">
                    {{ __('Participate in the workshops that will be taught or announced through our platform, where you will carry out various tasks and activities that will allow you to acquire the necessary skills to complement your training.') }}
                </x-tailwind.text.lead>                
            </div>
        </x-tailwind.layouts.container>
    </section>

    <main>
        {{-- @livewire('courses-index') --}}
        @livewire('workshop.workshop-index')
    </main>


</x-app-layout>

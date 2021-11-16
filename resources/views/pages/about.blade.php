<x-app-layout>
<!-- hero -->
    <section class="bg-cover" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/courses/hero9.jpg' ) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-28">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <!-- titulo -->
                <h1 class="text-white font-extrabold text-3xl sm:text-4xl md:text-5xl">{{ __('Sobre nosotros') }}</h1>
                
                <!-- Buscador -->
                {{-- @livewire('search') --}}
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16">
            <div class="w-full bg-white py-12 px-8">
            
                <!-- the content -->
                <h2 class="text-gray-700 font-bold text-2xl sm:text-3xl md:text-4xl">{{ __('¿Qué es Capacítate?') }}</h2>
                <p class="text-gray-600 mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('Capacítate es un Sistema de Gestión de Aprendizaje (LMS por sus siglas en inglés). Un sistema de capacitación para el empleo desarrollado por el Ministerio de Trabajo, conforme a las necesidades de todos los sectores económicos del país.') }}</p>
                <p class="text-gray-600 mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('Mediante este sistema, los participantes podrán tener acceso a los distintos cursos, dentro de las distintas modalidades, que serán publicados, tanto en esta como en otras plataformas, entre ellas Microsoft Learn y LinkedIn Learning.') }}</p>
                <p class="text-gray-600 mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('El Ministerio de Trabajo, contará con personal dispuesto a colaborar, monitorear y dar seguimiento a cada uno de los participantes, con la finalidad de que estos logren completar los objetivos propuestos y avanzar en su proceso de inserción al mercado laboral.') }}</p>
            </div>
        </div>  
    </section>
    
</x-app-layout>
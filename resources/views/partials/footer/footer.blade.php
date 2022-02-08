 <!-- Page Footer -->
 <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex justify-center">
    <img class="h-24 w-auto" src="{{ asset('images/home/footer/rd-trabaja_footer.svg') }}">
 </div>

 <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">

        <!-- About website column  -->
        <div class="col-span-2 sm:col-span-2 md:col-span-3 lg:col-span-2">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ str_replace('i', 'í', config('app.name')) }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    El Ministerio de Trabajo desarrolla el programa RD-Trabaja, compuesto por un sistema de capacitación para el empleo conforme a las necesidades de todos los sectores económicos del país.
                </li>
            </ul>
        </div>

        <!-- Navigation columns -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 ">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Navigations') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    <a target="_top" href="{{ route('home') }}" class="text-sm hover:text-gray-100">{{ __('Home') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('courses.index') }}" class="text-sm hover:text-gray-100">{{ __('Courses') }}</a>
                </li>
                {{-- <li class="mt-1">
                    <a target="_top" href="" class="text-sm hover:text-gray-100">{{ __('Another') }}</a>
                </li> --}}
            </ul>
        </div>

        <!-- Pages colums -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 ">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Pages') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">
                <li>
                    <a target="_top" href="{{ route('pages.about') }}" class="text-sm hover:text-gray-100">{{ __('About us') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{route('contact-us') }}" class="text-sm hover:text-gray-100">{{ __('Contact us') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('pages.glosary') }}" class="text-sm hover:text-gray-100">{{ __('Glossary of terms') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('terms.show') }}" class="text-sm hover:text-gray-100">{{ __('Terms of Service') }}</a>
                </li>
                <li class="mt-1">
                    <a target="_top" href="{{ route('policy.show') }}" class="text-sm hover:text-gray-100">{{ __('Privacy Policy') }}</a>
                </li>
            </ul>
        </div>



        <!-- Follow us column -->
        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1">
            <h2 class="uppercase text-sm font-bold text-white text-center sm:text-left">{{ __('Follow us') }}</h2>
            <ul class="mt-4 text-gray-400 text-center sm:text-left">

                <li class="grid justify-items-center sm:justify-items-start">
                    @livewire('link.social-media')
                </li>
                <li class="mt-6">


                    <x-tailwind.language-switcher-button />


                </li>
            </ul>
        </div>
    </div>


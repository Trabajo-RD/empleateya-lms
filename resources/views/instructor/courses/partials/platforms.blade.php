<a href="{{ route('instructor.courses.create', app()->getLocale() ) }}" class="col-span-1">    
    <figure class="relative cursor-pointer">
        <div class="h-40 w-5/6 mx-auto rounded-lg overflow-hidden">
            <img class="rounded-lg object-cover h-full w-full transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/platforms/capacitate.jpg')}}">
        </div>
        <figcaption class="text-lg text-white text-center">
        <div class="mt-2">
            <h1 class="text-gray-600 font-semibold">{{ __('Capacítate') }}</h1>
        </div>        
        </figcatpion>
    </figure>    
</a>
<a href="{{ route('instructor.courses.microsoft.create', app()->getLocale() ) }}" class="col-span-1">    
    <figure class="relative cursor-pointer">
        <div class="h-40 w-5/6 mx-auto rounded-lg overflow-hidden">
            <img class="rounded-lg shadow-xl hover:shadow-2xl object-cover h-full w-full transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/platforms/microsoft-learn.png') }}">
        </div>
        <figcaption class="text-lg text-white text-center">
        <div class="mt-2">
            <h1 class="text-gray-600 font-semibold">{{ __('Microsoft Learn') }}</h1>
        </div>       
        </figcatpion>
    </figure>    
</a>
<a href="{{ route('instructor.courses.linkedin.create', app()->getLocale() ) }}" class="col-span-1">    
    <figure class="relative cursor-pointer">
        <div class="h-40 w-5/6 mx-auto rounded-lg overflow-hidden">
            <img class="rounded-lg shadow-xl hover:shadow-2xl object-cover h-full w-full transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/platforms/linkedin-learning.jpg')}}">
        </div>
        <figcaption class="text-lg text-white text-center">
        <div class="mt-2">
            <h1 class="text-gray-600 font-semibold">{{ __('LinkedIn Learning') }}</h1>
        </div>        
        </figcatpion>
    </figure>    
</a>
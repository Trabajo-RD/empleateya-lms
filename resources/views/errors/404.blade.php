<x-app-layout>
    <div class="max-w-7xl mx-auto mt-12 py-8 px-4 sm:px-6 lg:px-8 flex justify-center">
        <img class="w-3/4" src="{{ asset('images/404.svg') }}">        
    </div>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex justify-center"> 
        <p>{{ __('The page you are looking for was moved, removed, renamed or might never existed.') }}</p>
    </div>
    <div class="max-w-7xl mx-auto mb-12 py-8 px-4 sm:px-6 lg:px-8 flex justify-center">
        <a href="{{ route('home', app()->getLocale() )}}" data-wow-delay="1.1s" class="btn-cta btn-accent font-bold py-2 px-4 rounded">{{ __('Go Home') }}</a>
    </div>
</x-app-layout>
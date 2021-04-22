<div>
    {{-- <a href="" class="text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center">
        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
        </svg>
        Primary
    </a> --}}

    <div class="flex my-2">
        {{-- <i style="background-color: #3B5998;"
        class="flex items-center justify-center h-12 w-12 mx-1 fill-current text-white text-2xl {{ $icon }}"></i>
        <i style="background-color:#dd4b39"
        class="flex items-center justify-center h-12 w-12 mx-1 fas fill-current text-white text-2xl fa-envelope"></i>
        <i style="background-color:#125688;"
        class="flex items-center justify-center h-12 w-12 mx-1 fab fill-current text-white text-2xl fa-instagram"></i>
        <i style="background-color:#55ACEE;"
        class="flex items-center justify-center h-12 w-12 mx-1 fab fill-current text-white text-2xl fa-twitter"></i> --}}

        {{-- {{ $social_links }} --}}

        @foreach ($social_links as $social_link)
            <a href="{{ $social_link->url }}" target="{{ $social_link->target }}" class="block px-1 py-1 text-gray-400 hover:text-gray-100">
                @if(isset($social_link->metadata['icon']))

                    <i class="flex items-center justify-center py-1 px-1 mx-1 fill-current text-gray-400 hover:text-gray-100 text-xl {{ $social_link->metadata['icon'] }}"></i>

                @else
                    {{ $social_link->name }}
                @endif
            </a>
        @endforeach
    </div>


</div>

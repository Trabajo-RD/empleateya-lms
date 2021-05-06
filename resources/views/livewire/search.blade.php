<form class="py-4 relative mx-auto text-gray-600" autocomplete="off">


    {{-- <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-14 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="{{ __('What do you want to learn?') }}"> --}}

    <div x-data="{isTyped: false}" class="flex items-center">
    <input class="w-full border-2 border-gray-300 bg-white h-14 px-5 pr-16 rounded-lg text-md focus:outline-none"
                        type="search"
                        name="search"
                        id="search"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder="{{ __('What do you want to learn?') }}"
                        autocomplete="off"
                        wire:model="search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">

        <button type="submit" class="transparent text-gray-400 absolute right-0 flex items-center focus:outline-none">
            <i class="fas fa-search fa-lg text-gray-400 absolute right-5"></i>
        </button>
    </div>


    {{-- <button type="submit" class="btn-accent text-white font-bold py-2 px-8 rounded absolute right-0 h-14 focus:outline-none">
        {{ __('Search') }}
    </button> --}}

    @if ( $search )
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden shadow-lg border-gray-300">
            @forelse( $this->results as $result )
                <li class="leading-10 px-5 text-md cursor-pointer hover:bg-gray-200">
                    <a href="{{ route('courses.show', [app()->getLocale(), $result] ) }}">
                        {{ $result->title }}
                    </a>
                </li>
            @empty
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200">
                    {{ __('course_search_not_result') }}
                </li>
            @endforelse
        </ul>
    @endif
</form>

<form class="py-4 relative mx-auto text-gray-600" autocomplete="off">

    <div x-data="{isTyped: false}" class="flex items-center">
    <!-- workshops search -->
    <input class="w-full border-2 border-gray-300 bg-white h-14 px-5 pr-16 rounded-lg text-md focus:outline-none"
                        type="search"
                        name="search"
                        id="search"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder="{{ __('Are you looking for a specific topic?') }}"
                        autocomplete="off"
                        wire:model="workshops_search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">

        <button type="submit" class="transparent text-gray-400 absolute right-0 flex items-center focus:outline-none">
            <i class="fas fa-search fa-lg text-gray-400 absolute right-5"></i>
        </button>
    </div>

    @if ( $workshops_search )
        <ul class="absolute z-40 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden shadow-lg border-gray-300">
            @forelse( $this->workshopsresults as $result )
                <li class="leading-10 flex items-center px-5 text-md cursor-pointer hover:bg-gray-200">
                    <a href="{{ route('workshops.show', $result ) }}">
                        {{ $result->title }}

                    @if($result->modality)
                    <span>
                        <span class="text-xs text-gray-400 ml-3 uppercase">[{{ __($result->modality->name) }}]</span>
                    </span>
                    @endif
                    @if($result->program)
                    <span>
                        <span class="text-xs text-gray-400 ml-3 uppercase">[{{ __($result->program->name) }}]</span>
                    </span>
                    @endif
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

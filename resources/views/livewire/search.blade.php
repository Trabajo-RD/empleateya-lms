<form class="py-4 relative mx-auto text-gray-600" autocomplete="off">

    <div class="flex">

        <select wire:model="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-52 text-center cursor-pointer font-semibold">
            <option>-- {{ __('Select') }} --</option>

            @foreach($filters as $filter)
            <option value="{{ $filter['id'] }}" wire:click="$set('type', {{ $filter['id'] }})">{{ __($filter['name']) }}</option>
            @endforeach
        </select>

        {{-- <button id="types-listing" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">{{ $type }} <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 z-40" aria-labelledby="dropdown-button">
            <li>
                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Courses') }}</button>
            </li>
            <li>
                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Modules') }}</button>
            </li>
            <li>
                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Paths') }}</button>
            </li>
            <li>
                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Workshops') }}</button>
            </li>
            </ul>
        </div> --}}

        <div class="relative w-full">

            <input class="block py-2.5 pl-2.5 pr-12 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-900 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
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

            <button type="button" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-gray-700 bg-transparent rounded-r-lg  focus:ring-4 focus:outline-none">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>
    </div>





    {{-- <div class="flex w-full items-center">
        <div x-data="{isTyped: false}" class="flex w-11/12 items-center ">
            <div class="relative w-full">
                <input class="block w-full border-2 border-gray-300 bg-white h-14 px-5 pr-16 rounded-lg text-md focus:outline-none"
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

                <span class="absolute inset-y-0 right-5 flex items-center pl-2">
                    <button type="button" class="p-1 focus:outline-none focus:shadow-outline cursor-auto">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                  </span>


            </div>
        </div>
        <a href="/" class="flex w-max transparent text-gray-400 items-center absolute right-0 text-right focus:outline-none">
                    {{ __('Advance search') }}
                </a>
    </div> --}}

    @if ( $search )
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden shadow-lg border-gray-300">
            @forelse( $this->results as $result )
                <li wire:loading.class.delay="opacity-50" class="leading-10 px-5 text-md cursor-pointer hover:bg-gray-200">
                    <a href="{{ route($this->url, $result ) }}">
                        {{ $result->title }}
                    </a>
                </li>
            @empty
                <li class="leading-10 px-5 text-sm cursor-auto">
                    <div class="flex justify-center items-center">
                        <span class="font-medium text-cool-gray-400 text-xl py-4">
                            {{ __('course_search_not_result') }}
                        </span>
                    </div>
                </li>
            @endforelse
        </ul>
    @endif
</form>

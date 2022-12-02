<div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($module->units as $unit)
        <button id="unit-{{ $unit->id }}" wire:click="$emit('change-unit', {{ $unit }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 {{ $unit->completed ? 'bg-blue-100 text-blue-700' : '' }} {{ ($current->id == $unit->id) ? 'bg-gray-100' : 'bg-white' }}hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
            @if( $unit->completed )
                @if( $current->id == $unit->id )
                    <span class="inline-block w-4 h-4 border-2 border-blue-400 rounded-full mr-2 mt-1"></span>
                    <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                @else
                    <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                    <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                @endif
            @else
                @if( $current->id == $unit->id )
                    <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                    <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                @else
                    <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                    <x-icons.video classes="mr-2" key="icon-{{ $unit->id }}"></x-icons.video>
                @endif
            @endif
            
            {{ $unit->title }}
        </button>
    @endforeach

</div>

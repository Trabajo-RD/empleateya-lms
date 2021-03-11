<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="¿Qué quieres aprender?">
    <button type="submit" class="btn-accent text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2 focus:outline-none">
        Buscar
    </button>

    @if ( $search )
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden shadow-lg border-gray-300">
            @forelse( $this->results as $result )
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200">
                    <a href="{{ route('courses.show', $result ) }}">
                        {{ $result->title }}
                    </a>
                </li>
            @empty                 
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200">
                    Lo siento, pero no encuentro el curso que buscas :(
                </li>             
            @endforelse
        </ul>
    @endif 
</form>
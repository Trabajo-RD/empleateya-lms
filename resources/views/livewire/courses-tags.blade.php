{{-- Display a list of tags --}}

<div class="w-full pb-12 flex">
    @foreach ($course->tags as $tag)
        <a class="inline-flex items-center mr-2" href="{{ route('tags.show', $tag) }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                <i class="{{ $tag->icon }} mr-2"></i>
                {{ $tag->name }}
            </div>
        </a>
    @endforeach
</div>

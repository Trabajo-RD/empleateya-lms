@props([
    'category' => ''
])

<div class="text-center pt-4">
    <a class="cursor-pointer" href="{{ route('categories.show', $category) }}">
        <img
            src="{{ asset('images/categories/'.$category->cdg.'.svg') }}"
            class="rounded-full w-28 mb-4 mx-auto transition duration-300 transform hover:scale-125"
            alt="{{ $category->name }}"
        />
    </a>
    <a href="{{ route('categories.show', $category) }}">
        <x-tailwind.text.caption color="black" align="center" cursor="pointer">
            {{ $category->name }}
        </x-tailwind.text.caption>
    </a>

    {{-- <span class="text-xs text-gray-500">{{ count($category->publishedCourses) }} {{ ((count($category->publishedCourses) != 1 ) ? __('courses') : __('course')) }}</span> --}}
</div>

@props([
    'title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
])


<article class="flex flex-col justify-between leading-normal">
    <x-tailwind.text.caption>{{ __($title) }}</x-tailwind.text.caption>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $slot }}</p>
</article>

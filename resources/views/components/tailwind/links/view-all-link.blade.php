@props([
    'text' => 'View All',
    'color' => 'blue',
    'icon' => 'fas fa-arrow-right',
    'link' => '#!'
])

<a href="{{ $link }}">
    <span {{ $attributes->merge(['class' => 'whitespace-nowrap inline-flex items-center px-2.5 py-0.5 text-sm font-medium hover:bg-gray-200 rounded-full text-'.(($color == "white" || $color == "black") ? $color : $color.'-800')]) }}>
        {{ __($text) }}
        <i {{ $attributes->merge(['class' => $icon.' ml-2']) }}></i>
    </span>
</a>

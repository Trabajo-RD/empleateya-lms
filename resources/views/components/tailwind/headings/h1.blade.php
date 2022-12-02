@props([
    'color' => 'black',
    'cursor' => 'auto',
    'align' => 'left'
])

<h1 {{ $attributes->merge(['class' => 'lg:font-artifex bold font-medium leading-tight text-6xl mt-0 mb-2 text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') .' cursor-'.$cursor ]) }} >
    {{ $slot }}
</h1>
@props([
    'color' => 'black',
    'cursor' => 'auto',
    'align' => 'left'
])

<h2 {{ $attributes->merge(['class' => 'lg:font-artifex bold text-'.$align.' text-5xl mt-0 mb-2 text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') .' cursor-'.$cursor ]) }} >
    {{ $slot }}
</h2>

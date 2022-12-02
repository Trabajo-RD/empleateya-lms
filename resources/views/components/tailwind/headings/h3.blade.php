@props([
    'color' => 'black',
    'cursor' => 'auto',
    'align' => 'left'
])

<h3 {{ $attributes->merge(['class' => 'lg:font-artifex bold text-'.$align.' text-4xl mt-0 mb-2 text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') .' cursor-'.$cursor ]) }} >
    {{ $slot }}
</h3>

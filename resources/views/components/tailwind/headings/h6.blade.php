@props([
    'color' => 'blue',
    'cursor' => 'auto',
    'align' => 'left'
])

<h6 {{ $attributes->merge(['class' => 'lg:font-artifex bold text-'.$align.' text-xl mt-0 mb-2 text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') .' cursor-'.$cursor ]) }} >
    {{ $slot }}
</h6>

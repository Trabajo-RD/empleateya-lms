@props([
    'size' => 'base',
    'align' => 'left',
    'color' => 'gray'
])

<p {{ $attributes->merge(['class' => 'font-gotham book text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') .' leading-loose mt-0 mb-4 text-'. $size . ' text-' . $align]) }}>
    {{ $slot }}
</p>
@props([
    'size' => 'md',
    'align' => 'left',
    'color' => 'black'
])

<span {{ $attributes->merge(['class' => 'font-gotham font-bold text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-800') .' mt-6 mb-4 text-'. $size . ' text-' . $align]) }}>
    {{ $slot }}
</span>

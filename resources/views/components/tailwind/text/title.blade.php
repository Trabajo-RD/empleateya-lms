@props([
    'size' => '2xl',
    'align' => 'left',
    'color' => 'gray'
])

<p {{ $attributes->merge(['class' => 'font-bold text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-800') .' mt-6 mb-4 text-'. $size . ' text-' . $align]) }}>
    {{ $slot }}
</p>
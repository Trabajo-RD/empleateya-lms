@props([
    'size' => 'xl',
    'align' => 'left',
    'color' => 'black'
])

<p {{ $attributes->merge(['class' => 'font-gotham book text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-800') .' leading-loose font-light mt-6 mb-4 text-'. $size . ' text-' . $align]) }}>
    {{ $slot }}
</p>
@props([
    'image' => '',
    'title' => '',
    'side' => 'center',
    'bgColor' => 'transparent',
    'width' => '24',
    'height' => '24'
])

<img {{ $attributes->merge(['src' => $image, 'class' => 'h-100 mx-auto object-none object-'.$side. '  bg-yellow-300 w-'.$width.' h-'.$height, 'alt' => $title ]) }} />
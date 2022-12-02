@props([
    'color' => 'white',
    'bgColor' => 'blue',
    'target' => 'self',
    'cursor' => 'pointer',
    'link' => '#'
])


<a {{ $attributes->merge(['href' => $link, 'class' => 'transition duration-150 ease-in-out text-'. (($color == 'white' || $color == 'black') ? $color : $color.'-900') . ' bg-'. (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-700') . '  hover:bg-' . (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-800') . ' focus:ring-4 focus:ring-' . (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-300') . ' font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-' . (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-600') . ' dark:hover:bg-' . (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-700') . ' dark:focus:ring-' . (($bgColor == 'white' || $bgColor == 'black') ? $bgColor : $bgColor.'-800') . ' cursor-'. $cursor, 'target' => '_'.$target ]) }} >

    {{ $slot }}

</a>

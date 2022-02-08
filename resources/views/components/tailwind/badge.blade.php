@props([
    'color',
    'size',
    'text',
    'id',
    'icon'
])

<span {{ $attributes->merge(['class' => 'bg-'.$color.'-100 hover:bg-'.$color.'-200 text-'.$color.'-800 text-'.$size.' font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-'.$color.'-200 dark:text-'.$color.'-900 dark:hover:bg-'.$color.'-300']) }} >
    <i class="{{ $icon }} mr-2"></i>{{ $text }}
</span>

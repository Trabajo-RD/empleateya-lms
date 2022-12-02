@props([
    'color' => 'red',
    'size' => 'xs'
])

<span {{ $attributes->merge(['class' => 'bg-'.$color.'-500 text-'.$color.'-100 py-1 px-1.5 text-'.$size.' rounded cursor-pointer']) }}>
    {{ $slot }}
</span>

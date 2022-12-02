@props([
    'color' => 'red',
    'size' => 'xs'
])

<span {{ $attributes->merge(['class' => 'bg-'.$color.'-500 text-'.$color.'-100 py-1 px-4 text-'.$size.' rounded-full']) }}>
    {{ $slot }}
</span>

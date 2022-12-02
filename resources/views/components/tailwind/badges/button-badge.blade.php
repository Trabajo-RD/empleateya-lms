@props([
    'text' => 'Text here',
    'color' => 'blue',
    'size' => 'md'
])

<button {{ $attributes->merge(['class' => 'bg-'.$color.'-500 text-'.$color.'-50 py-3 px-4 text-'.$size.' rounded']) }}>
    {{ __($text) }}
    <span {{ $attributes->merge(['class' => 'bg-'.$color.'-900 text-'.$color.'-200 py-1 px-2 text-xs rounded ml-1']) }} >
        {{ $slot }}
    </span>
</button>

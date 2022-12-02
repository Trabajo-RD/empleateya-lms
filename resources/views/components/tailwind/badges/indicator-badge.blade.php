@props([
    'text' => 'Text here',
    'color' => 'blue',
    'badgeColor' => 'red',
    'size' => 'md'
])

<button {{ $attributes->merge(['class' => 'relative bg-'.$color.'-500 text-'.$color.'-50 py-3 px-4 text-'.$size.' rounded']) }}>
    {{ __($text) }}
    <span {{ $attributes->merge(['class' => 'absolute -top-1 -right-1 bg-'.$badgeColor.'-500 rounded-full w-3 h-3 animate-ping']) }} >
    </span>
</button>

@props([
    'text' => 'Text here',
    'badge' => '99+',
    'color' => 'blue',
    'badgeColor' => 'red',
    'size' => 'md'
])

<button {{ $attributes->merge(['class' => 'relative bg-'.$color.'-500 text-'.$color.'-50 py-3 px-4 text-'.$size.' rounded']) }}>
    {{ __($text) }}
    <span {{ $attributes->merge(['class' => 'absolute -top-3 -right-3 bg-'.$badgeColor.'-500 text-'.$badgeColor.'-50 py-1 px-2 text-xs rounded ml-1']) }} >
        {{ __($badge) }}
    </span>
</button>

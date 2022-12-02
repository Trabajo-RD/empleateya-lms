@props([
    'text',
    'color',
    'id',
    'icon'
])


<span {{ $attributes->merge(['id' => 'badge-'.$id, 'class' => 'bg-'.$color.'-200 hover:bg-'.$color.'-300 text-'.$color.'-700 rounded-full py-2 px-4 font-bold text-sm leading-loose cursor-pointer']) }} >
    <i class="{{ $icon }} mr-2"></i>{{ __($text) }}
</span>


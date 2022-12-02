@props([
    'image' => '',
    'title' => ''
])

<div class="flex flex-wrap justify-center">
    <img {{ $attributes->merge(['src' => $image, 'class' => 'p-1 bg-white border rounded max-w-sm', 'alt' => $title ]) }} />
</div>
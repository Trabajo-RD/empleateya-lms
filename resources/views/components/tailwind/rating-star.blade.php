@props([
    'rating',
    'icon',
    'color'
])

<div class="flex mb-4 items-center">

    <!-- rating value -->
    <span class="text-xl font-bold text-{{ $rating > 3 ? $color : 'gray' }}-300">
        {{ \Str::limit($rating, 3, null ) }}
    </span>

    <!-- rating stars -->
    <ul class="flex text-sm ml-2">
        <li class="mr-1"><i class="fas fa-{{ $icon }} text-{{ $rating >= 1 ? $color : 'gray' }}-300"></i></li>
        <li class="mr-1"><i class="fas fa-{{ $icon }} text-{{ $rating >= 2 ? $color : 'gray' }}-300"></i></li>
        <li class="mr-1"><i class="fas fa-{{ $icon }} text-{{ $rating >= 3 ? $color : 'gray' }}-300"></i></li>
        <li class="mr-1"><i class="fas fa-{{ $icon }} text-{{ $rating >= 4 ? $color : 'gray' }}-300"></i></li>
        <li class="mr-1"><i class="fas fa-{{ $icon }} text-{{ $rating == 5 ? $color : 'gray' }}-300"></i></li>
    </ul>

</div>

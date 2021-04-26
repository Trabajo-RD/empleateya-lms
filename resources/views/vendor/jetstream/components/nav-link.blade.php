@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block items-center px-4 py-2 text-2md leading-5 text-gray-600 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'
            : 'block items-center px-4 py-2 text-2md leading-5 text-gray-600 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out';
@endphp

{{-- block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out --}}

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

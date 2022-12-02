@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-blue-400 text-base font-medium text-blue-700 focus:outline-none focus:text-blue-800  focus:border-blue-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes. ' flex items-center whitespace-nowrap py-2']) }}>
    @if(isset($icon))<i {{ $attributes->merge(['class' => $icon.' mr-2']) }}></i>@endif{{ $slot }}
</a>

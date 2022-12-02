@props(['align' => 'center', 'width' => 'max', 'contentClasses' => 'py-1 bg-white', 'dropdownClasses' => ''])

@php

switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'left-negative-56':
        $alignmentClasses = 'origin-top-left -left-56';
        break;
    case 'left-negative-64':
        $alignmentClasses = 'origin-top-left -left-64';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'center':
        $alignmentClasses = 'w-3/4 -left-64 mx-auto';
        break;
    case 'none':
    case 'false':
        $alignmentClasses = '';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
    case '96':
        $width = 'w-96';
        break;
    case 'full':
        $width = 'w-full';
        break;
    case 'screen':
        $width = 'w-screen';
        break;
    case 'min':
        $width = 'w-min';
        break;
    case 'max':
        $width = 'w-max';
        break;
}

$triggerClasses = ($active ?? false)
            ? 'nav-link block pr-2 px-3 py-2 text-2md leading-5  text-red-50 transition duration-150 ease-in-out dropdown-toggle flex items-center whitespace-nowrap transition duration-150 ease-in-out bg-red-500 text-red-50'
            : 'nav-link block pr-2 px-3 py-2 text-2md leading-5 text-gray-600  transition duration-150 ease-in-out dropdown-toggle flex items-center whitespace-nowrap transition duration-150 ease-in-out';

@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        <a {{ $attributes->merge(['class' => $triggerClasses]) }} href="#" data-mdb-ripple="true" data-mdb-ripple-color="light" type="button" id="dropdownMenuButtonX" data-bs-toggle="dropdown"
          aria-expanded="false">
        {{ $trigger }}
        </a>
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }} {{ $dropdownClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

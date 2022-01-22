@props(['id', 'text'])

<!-- tooltip -->
<div id="{{ $id }}-tooltip" role="tooltip" class="tooltip absolute z-50 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 invisible dark:bg-gray-700">
    {{ __($text) }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>

@props([
    'id',
    'checked' => false,
    'label' => '',
    'value' => '',
    'model' => ''
])

<div class="flex items-center mb-4">
    <input value="{{ $value }}" id="{{ $id }}" aria-describedby="{{ $id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $checked }} >
    <label for="{{ $id }}" class="font-gotham light ml-3 text-md text-gray-800 dark:text-gray-300">
        {{ $label }}
    </label>
</div>

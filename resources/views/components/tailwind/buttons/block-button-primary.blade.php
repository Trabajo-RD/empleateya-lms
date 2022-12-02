@props([
    'color' => 'blue', 'id' => ''
])

<button {{ $attributes->merge(['class' => 'mb-2 w-full inline-block px-6 py-2.5 bg-'.$color.'-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-'.$color.'-700 hover:shadow-lg focus:bg-'.$color.'-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-'.$color.'-800 active:shadow-lg transition duration-150 ease-in-out', 'type' => 'button', 'id' => $id]) }}>
    {{ __($slot) }}
</button>


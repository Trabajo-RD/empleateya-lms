@props([
    'color' => 'blue', 'id'
])

<button {{ $attributes->merge(['class' => 'w-full inline-block px-6 py-2 border-2 border-'.$color.'-600 text-'.$color.'-600 font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out', 'type' => 'button', 'id' => $id]) }}>
    {{ __($slot) }}
</button>

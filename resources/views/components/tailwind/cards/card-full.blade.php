@props([
    'lightColor' => 'white',
    'darkColor' => 'gray',
    'borderColor' => 'gray'
])

<div {{ $attributes->merge(['class' => 'w-full h-full p-12 bg-'.(($lightColor == 'white' || $lightColor == 'black') ? $lightColor : $lightColor.'-200').'  border border-'.(($borderColor == 'white' || $borderColor == 'black') ? $borderColor : $borderColor.'-200').' shadow-md dark:bg-'.(($darkColor == 'white' || $darkColor == 'black') ? $darkColor : $darkColor.'-800').' dark:border-'.(($darkColor == 'white' || $darkColor == 'black') ? $darkColor : $darkColor.'-700')]) }}>

    {{ $slot }}

</div>
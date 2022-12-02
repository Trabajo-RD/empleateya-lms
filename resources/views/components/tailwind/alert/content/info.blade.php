@props([
    'key' => '1',
    'confirm' => 'View more',
    'cancel' => 'Dismiss',
    'classes' => '',
    'link' => '#'
])

@php

    switch($classes) {
        case 'info':
            $color = 'blue';
            break;
        case 'danger':
            $color = 'red';
            break;
        case 'success':
            $color = 'green';
            break;
        case 'warning':
            $color = 'yellow';
            break;
        case 'dark':
            $color = 'gray';
            break;
        default:
            break;
    }

@endphp

<div id="alert-additional-content-{{$key}}" class="p-4 mb-4 bg-{{ $color }}-100 dark:bg-{{ $color }}-{{ $classes == 'dark' ? '700' : '200' }} rounded-lg" role="alert" x-show="show = true">
    <div class="flex items-center">
      <svg class="mr-2 w-5 h-5 text-{{ $color }}-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <h3 class="text-lg font-medium text-{{ $color }}-700 dark:text-{{ $color }}-800">
          {{ $title }}
      </h3>
    </div>
    <div class="mt-2 mb-4 text-sm text-{{ $color }}-700 dark:text-{{ $color }}-800">
      {{ $slot }}
    </div>
    <div class="flex">
      <a href="{{ $link }}" class="text-white bg-{{ $color }}-700 hover:bg-{{ $color }}-800 focus:ring-4 focus:ring-{{ $color }}-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-800 dark:hover:bg-blue-900">
        <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
        {{ __($confirm) }}
      </a>
      <button type="button" class="text-{{ $color }}-700 bg-transparent border border-{{ $color }}-700 hover:bg-{{ $color }}-800 hover:text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-blue-800 dark:text-blue-800 dark:hover:text-white" data-collapse-toggle="alert-additional-content-1" aria-label="Close" x-on:click="show = false">
        {{ __($cancel) }}
      </button>
    </div>
  </div>

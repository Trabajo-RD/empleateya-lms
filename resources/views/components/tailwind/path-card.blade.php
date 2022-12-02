@props([
    'path',
])


<div class="card">

    <div class="flex justify-between items-center bg-primary px-5 py-3 text-blue-50">
        <i class="fas fa-map-marked-alt"></i>
        <span class="uppercase text-xs">{{ __('Last update') }} {{ app()->getLocale() == 'en' ? $path->updated_at->format('Y-m-d') : $path->updated_at->format('d-m-Y') }}</span>
    </div>

    <div class="card-body bg-white h-60 p-4 overflow-hidden flex flex-col justify-between">
        <div>
            <div class="text-left">

                <div class="flex items-center mb-4">
                    <a href="{{ route('learning-paths.index') }}" class="mr-2">
                        <span class="text-gray-500 uppercase cursor-pointer">{{ __($path->type->name) }}</span>
                    </a>

                    @if($path->created_at->format('Y-m-d') ==  \Carbon\Carbon::today()->format('Y-m-d') )
                        <x-tailwind.badges.inline-badge>
                            {{ __('New') }}
                        </x-tailwind.badges.inline-badge>
                    @endif
                </div>

                <!-- image -->
                {{-- <x-tailwind.images.image image="https://rdtrabaja.mt.gob.do/assets/img/categorias/170.svg" :title="$path->title" /> --}}
                <!-- title -->
                <div class="flex items-center sh-5 mt-2">

                    <div class="h-24 w-24 min-w-max">
                        <!-- badge icon -->
                        <img :key="{{ 'badge-' . $path->id }}" class="h-24 w-24" src="{{ asset('images/badges/paths.svg') }}" alt="{{ __('Paths') }}" >
                    </div>

                    <a class="heading stretched-link ml-6" href="{{ route('learning-paths.show', $path) }}">
                        <x-tailwind.text.caption color="blue" cursor="pointer" align="left">
                            {{ $path->title }}
                        </x-tailwind.text.caption>
                    </a>
                </div>
            </div>
            {{-- <div>
                <!-- excerpt -->
                <x-tailwind.text.paragraph align="left" size="sm">
                    {{ $path->excerpt() }}
                </x-tailwind.text.paragraph>
            </div> --}}
            <!-- rating star component -->
            <div class="flex items-center mt-2 mb-4">
                <x-tailwind.rating-star :rating="$path->rating" icon="star" color="yellow" />
                <span class="text-xs text-gray-500 ml-2"><i class="fas fa-comments mr-2"></i>{{ $path->reviews_count }} {{ Str::plural( __('review'), $path->reviews_count ) }}</span>
                <span class="text-xs text-gray-500 ml-6"><i class="fas fa-eye mr-2"></i>{{ $path->views }} {{ Str::plural( __('view'), $path->views ) }}</span>
            </div>
        </div>


        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <span class="text-gray-400">{{  $path->modules_count }} {{ Str::plural( __('module'), $path->modules_count) }}</span>
                <span class="text-gray-400 ml-4">{{  $path->hours }}</span>
            </div>
            <span class="text-gray-400">{{  $path->users_count }} {{ Str::plural( __('student'), $path->users_count) }}</span>
        </div>

    </div>

</div>

    {{-- TODO: Utilizar el tree en el menu de rutas --}}
    {{-- <pre>
        @php
            print_r($path::tree());
        @endphp
    </pre> --}}


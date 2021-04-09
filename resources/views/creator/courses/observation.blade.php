<x-creator-layout :course="$course">

    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold"><i class="fas fa-info-circle mr-2"></i>{{ __('Course_observations') }}</h1>
        <hr class="mt-2 mb-6">

    <div class="sticky-notes">
        <ul class="grid md:grid-cols-1 lg:grid-cols-3">
            {{-- @foreach( $observations as $key => $observation ) --}}
                <li class="md:col-span-1 lg:col-span-1 sticky-note__body tex-gray-500">
                    <a href="#">

                        <h2 class="font-bold text-xl">{{ __('Note') }}</h2>
                        <p class="mt-4">{!! $course->observation->body !!}</p>

                        {{-- <h2 class="font-bold text-xl">Nota #{{ ( 1 ) }}</h2>
                        <p class="mt-4">{!! $observation->body !!}</p> --}}

                    </a>
                </li>
            {{-- @endforeach --}}
        </ul>
    </div>

</x-creator-layout>

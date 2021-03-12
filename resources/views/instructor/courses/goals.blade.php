<x-instructor-layout :course="$course">

    {{-- <x-slot name="course">

        {{  $course->slug }}

    </x-slot> --}}

    <!-- livewire courses goals -->
    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals' . $user->id))
    </div>

    <!-- livewire courses requirements -->
    <div class="mt-8">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $user->id))
    </div>

    <!-- livewire courses audiences -->
    <div class="mt-8">
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $user->id))
    </div>

</x-instructor-layout>

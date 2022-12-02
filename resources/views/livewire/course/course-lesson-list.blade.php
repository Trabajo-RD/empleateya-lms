<div id="accordion-open" data-accordion="open">
    @foreach($course->sections as $section)
    <h2 id="accordion-open-heading-1">
        <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
            <span class="flex items-center">
              {{ $section->title }}
            </span>
            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
      </h2>

      <div class="w-full text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          @foreach($section->lessons as $lesson)
              <button wire:click="$emit('change-lesson', {{ $lesson }} )" type="button" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                  @if( $lesson->completed )
                      @if( $current == $lesson->id )
                          <span class="inline-block w-4 h-4 border-2 border-blue-400 rounded-full mr-2 mt-1"></span>
                      @else
                          <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
                      @endif
                  @else
                      @if( $current == $lesson->id )
                          <span class="inline-block w-4 h-4 border-2 border-gray-400 rounded-full mr-2 mt-1"></span>
                      @else
                          <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                      @endif
                  @endif
                  {{-- <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg> --}}
                  <x-icons.video classes="mr-2" key="icon-{{ $lesson->id }}"></x-icons.video>

                    @php
                        $lessonTitle = trim($lesson->title)
                    @endphp

                    <p class="text-left ...">{{ $lessonTitle }}</p>
              </button>
          @endforeach
      </div>
    @endforeach
</div>

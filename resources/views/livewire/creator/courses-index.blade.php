<div class="container py-8">

    <header class="mb-4 flex">
        <span class="text-2xl text-gray-500 mr-2">{{ __('Welcome to your dashboard') }}!</span>
    </header>

    <p class="text-1xl text-gray-500 mb-4">{{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}, {{ __('here you can find the list of courses that you have registered on our platform, and the courses of other users where you participate as a Moderator or Collaborator') }}.</p>

    <x-table-responsive>

        <div class="px-6 pt-5">
            <header class="mb-4 flex">
                <h2 class="text-2xl text-gray-800 font-bold">{{ __('Dashboard') }}</h2>
            </header>
        </div>

        <div class="px-6 py-3">
            <div x-data="{isTyped: false}" class="flex w-full">
                <input class="form-input flex-1 shadow-sm"
                        type="search"
                        name="search-creator"
                        id="search-creator"
                        x-ref="searchField"
                        x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                        placeholder="{{ __('What course do you want to search for?') }}"
                        autocomplete="off"
                        wire:keydown="clear"
                        wire:model.debounce.500ms="search"
                        x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                        x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
                <a class="btn btn-primary ml-2" href="{{ route('creator.courses.new' ) }}">{{ __('New course') }}</a>
            </div>
        </div>

        @if( $courses->count() )
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Course') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Audience') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Rating') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Status') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('Edit') }}</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ( $courses as $course )

                        <tr wire:key="server-action-{{$course->id}}">
                            <!-- TODO: First <td> responsive -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-32 w-32">
                                        @isset( $course->image )
                                            <img class="relative inline-block h-32 w-32 object-cover" src="{{ Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img id="picture" class="h-32 w-32 object-cover" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                                        @endisset
                                    </div>
                                    <div class="ml-6">
                                        <div>
                                            @if ( $course->moderator_id !== null || $course->contributor_id !== null)

                                                    @if( $course->moderator_id !== null)
                                                        <span class="bg-red-700 rounded-full px-3 py-1 text-xs font-semibold text-white mr-2">{{ __('Auditing') }}</span>
                                                    @endif
                                                    @if( $course->contributor_id !== null)
                                                        <span class="bg-blue-700 rounded-full px-3 py-1 text-xs font-semibold text-white mr-2">{{ __('Collaborating') }}</span>
                                                    @endif

                                            @endif
                                            <span class="text-lg font-bold text-gray-900">
                                                {{ $course->title }}
                                            </span>

                                            <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($course->summary, 100, $end='...') }}</p>
                                        </div>
                                        <div class="pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ __($course->topic->name) }}</span>
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ __($course->type->name) }}</span>
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ __($course->level->name) }}</span>
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ __($course->modality->name) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md text-gray-900 text-center">{{ $course->users->count() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md text-gray-900 flex items-center">
                                    <strong>{{ $course->rating }}</strong>
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch ( $course->status )
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            {{ __('Draft') }}
                                        </span>
                                        @break;
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ __('In review') }}
                                        </span>
                                        @break;
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ __('Published') }}
                                        </span>
                                        @break;
                                    @case(4)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ __('Removed') }}
                                        </span>
                                        @break;
                                    @default
                                @endswitch

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                <span class="flex">
                                    <a href="{{ route('creator.courses.edit', ['course' => $course] ) }}" class="{{ ($course->observation) ? 'border-red-300 text-red-700 hover:bg-red-50' : 'border-gray-300 text-gray-700 hover:bg-gray-50' }} inline-flex items-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium  bg-white focus:outline-none">
                                        <!-- Heroicon name: solid/pencil -->
                                        <svg class="-ml-1 mr-2 h-5 w-5 {{ ($course->observation) ? 'text-red-500' : 'text-gray-500' }} " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        {{ __('Edit') }}
                                    </a>
                                    @if( $course->observation )
                                        <!-- Tailwind animate ping -->
                                            <span class="flex h-3 w-3">
                                            <span class="animate-ping h-3 w-3 absolute inline-flex rounded-full bg-red-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500" title="Tienes una observación"></span>
                                        </span>
                                            <!-- /Tailwind animate ping -->
                                        @endif
                                </span>
                            </td>
                        </tr>


                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>

            <div class="px-6 py-3">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-3">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong>{{ __('Sorry!') }}</strong> {{ __('I can\'t find a course that matches what you\'re looking for') }}
                </div>
            </div>
        @endif

    </x-table-responsive>

    <!-- TODO: Show Microsoft Learn Courses -->
    {{-- <div class="card">
        <div class="card-body">

            <pre>
                @php echo print_r( $microsoft_courses['results'] ); @endphp
            </pre>
        </div>
    </div> --}}

</div>

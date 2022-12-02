<div id="layout-admin-left-sidebar" class="primary-sidebar bg-gray-200 text-gray-800 w-64 px-4 py-8 space-y-6 absolute md:relative inset-y-0 left-0 transform -translate-x-full md:-translate-x-0 transition duration-200 ease-in-out shadow">
    <!-- admin left sidebar -->
                    {{-- <div id="layout-admin-left-sidebar" class="bg-gray-200 text-gray-800 w-64 px-4 py-8 space-y-6 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out"> --}}

<!-- logo -->
<div class="items-center text-center">
    <a href="{{ route('home') }}" class="items-center flex justify-center space-x-2">
        <x-jet-application-mark class="block h-9 w-auto" />
    </a>
        {{-- <span class="uppercase text-blue-900 font-extrabold text-2xl">Capacítate</span> --}}
</div>




<!-- navigation -->
<nav>
    {{-- <h2 class="font-bold text-lg">Editar curso</h2>
    <h1 class="capitalize text-2xl mt-1">{{ $course->title }}</h1> --}}
    <!-- sidebar menu -->


    <a href="{{ route('instructor.dashboard.index', App::getLocale() ) }}" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80 @routeIs('instructor.dashboard.index' ) bg-gray-300 bg-opacity-80 font-extrabold @else bg-transparent @endif">
        <i class="fas fa-th-large"></i>
        <span class="sidebar-item-text">{{ __('Dashboard') }}</span>
    </a>
    <a href="{{ route('instructor.courses.index', App::getLocale() ) }}" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80 @routeIs('instructor.courses.index', App::getLocale() ) bg-gray-300 bg-opacity-80 font-extrabold @else bg-transparent @endif">
        <i class="fas fa-laptop"></i>
        <span class="sidebar-item-text">{{ __('Courses') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="far fa-newspaper"></i>
        <span class="sidebar-item-text">{{ __('Posts') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="fas fa-sitemap"></i>
        <span class="sidebar-item-text">{{ _('Pages') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="fas fa-users"></i>
        <span class="sidebar-item-text">{{ __('Users') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="fas fa-tasks"></i>
        <span class="sidebar-item-text">{{ __('Quizzes') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="fas fa-certificate"></i>
        <span class="sidebar-item-text">{{ __('Certificates') }}</span>
    </a>
    <a href="#" class="block py-2.5 px-4 flex items-center space-x-4 rounded-lg transition duration-200 hover:bg-gray-300 hover:bg-opacity-80">
        <i class="far fa-comment-alt"></i>
        <span class="sidebar-item-text">{{ __('Messages') }}</span>
    </a>

    {{-- <hr class="my-6">

    <a href="{{ route('instructor.courses.preview', ['course' => $course]) }}" target="_blank" class="btn bg-gray-300 text-gray-700 block w-full mb-4 text-center hover:shadow">
        {{ __('Preview') }}
    </a> --}}

    {{-- @switch($course->status)
        @case(1)
            <!-- Request change course status -->
            <form action="{{ route('instructor.courses.status', ['course' => $course]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-accent w-full shadow">{{ __('Request review') }}</button>
            </form>
            @break
        @case(2)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">{{ __('Course in review') }}</p>
                <p>{{ __('This course is under review') }}</p>
            </div>

            @break
        @case(3)
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">{{ __('Course published') }}</p>
                    <p class="text-sm">{{ __('This course is published') }}</p>
                </div>
                </div>
            </div>
            @break
        @default

    @endswitch --}}
</nav>
</div>

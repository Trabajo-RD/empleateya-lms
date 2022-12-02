<x-app-layout>
    <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto items-center">
        <x-tailwind.layouts.container class="bg-white py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <div class="col-span-2">   


                    <div>
                        <x-tailwind.headings.h3>{{ __('Enrollment') }}</x-tailwind.headings.h3>
                    </div>
                    <div class="mt-12 divide-y">
                        <h2 class="font-gotham font-bold ">{{ __('Details') }}</h2>

                        <div class="lg:flex items-center pt-8">
                            <div class="w-40 overflow-hidden mr-6">
                                @isset( $course->image )
                                    <img :key="{{ 'image-' . $course->id }}" src="{{ Storage::url( $course->image->url ) }}" alt="{{ $course->title }}" class="w-full object-cover transition duration-300 transform hover:scale-125" />
                                @else
                                    <img :key="{{ 'image-' . $course->id }}" class="w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $course->title }}" >
                                @endisset
                            </div>
                            <div class="lg:flex flex-wrap lg:flex-1 items-center justify-between py-6 pr-6">
                                <div>
                                    <span>
                                        Usted está adquiriendo el <span class="lowercase">{{ __($course->type->name) }} </span>
                                    </span>
                                    <h3 class="text-xl font-medium">
                                        {{ $course->title }}
                                    </h3>
                                </div>
                                <div>
                                    <p class="pt-4 lg:text-right">{{ __('Price') }}</p>
                                    <span class="font-medium text-2xl lg:text-right">{{ $course->price->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 py-8">
                    <x-tailwind.cards.card-full>
                        <div class="divide-y">
                            <h2 class="font-gotham font-bold">{{ __('Resume') }}</h2>
                            <div class="flex justify-between py-4">
                                <span class="text-md font-medium">{{ $course->title }}</span>
                                <span class="text-md ml-4">{{ $course->price->name }}</span>
                            </div>
                            <div class="py-4">
                                <small>
                                    {{ __('By completing your registration, you agree to our') }} <a target="_top" href="{{ route('terms.show') }}" class="text-sm hover:text-blue-600">{{ __('Terms of Service') }}</a>
                                </small>
                            </div>
                            <div class="pt-4">
                                <form action="{{ route('courses.enrolled', $course ) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-cta btn-accent btn-block mt-4 hover:shadow">{{ __('Enroll') }}</button>
                                </form>

                                @if( session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if( session('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('info') }}
                        </div>
                    @endif

                    @if( session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ Lang::get('Error') }}</strong>
                            <span class="block sm:inline text-red-500">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                          </div>
                    @endif
                            </div>
                        </div>
                    </x-tailwind.cards.card-full>
                </div>
            </div>
        </x-tailwind.layouts.container>
    </div>
</x-app-layout>

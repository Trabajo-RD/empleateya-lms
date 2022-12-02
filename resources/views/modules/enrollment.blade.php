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
                                @isset( $module->image )
                                    <img :key="{{ 'image-' . $module->id }}" src="{{ Storage::url( $module->image->url ) }}" alt="{{ $module->title }}" class="w-full object-cover transition duration-300 transform hover:scale-125" />
                                @else
                                    <img :key="{{ 'image-' . $module->id }}" class="w-full object-cover transition duration-300 transform hover:scale-125" src="{{ asset('images/courses/default.jpg') }}" alt="{{ $module->title }}" >
                                @endisset
                            </div>
                            <div class="lg:flex flex-wrap lg:flex-1 items-center justify-between py-6 pr-6">
                                <div>
                                    <span>
                                        Usted está adquiriendo el <span class="lowercase">{{ __($module->type->name) }} </span>
                                    </span>
                                    <h3 class="text-xl font-medium">
                                        {{ $module->title }}
                                    </h3>
                                </div>
                                <div>
                                    <p class="pt-4 lg:text-right">{{ __('Price') }}</p>
                                    <span class="font-medium text-2xl lg:text-right">{{ $module->price->name }}</span>
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
                                <span class="text-md font-medium">{{ $module->title }}</span>
                                <span class="text-md ml-4">{{ $module->price->name }}</span>
                            </div>
                            <div class="py-4">
                                <small>
                                    {{ __('By completing your registration, you agree to our') }} <a target="_top" href="{{ route('terms.show') }}" class="text-sm hover:text-blue-600">{{ __('Terms of Service') }}</a>
                                </small>
                            </div>
                            <div class="pt-4">
                                <form action="{{ route('modules.enrolled', $module ) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-cta btn-accent btn-block mt-4 hover:shadow">{{ __('Enroll') }}</button>
                                </form>
                            </div>
                        </div>
                    </x-tailwind.cards.card-full>
                </div>
            </div>
        </x-tailwind.layouts.container>
    </div>
</x-app-layout>

<section>
    @if($course->reviews->count() > 0)
    <h2 class="font-bold text-2xl mb-12 text-gray-600">{{ __('Reviews') }}</h2>
    @endif

    @can('enrolled', $course)
        <article>

            @can('valued', $course)
                <textarea wire:model="comment" id="new-review" class="form-input w-full" rows="3" placeholder="Escribe una reseña del curso"></textarea>
                <div class="text-center">

                    <!-- rating -->
                        <p class="text-xl mt-6">{{ __('How would you rate this course?') }}</p>

                        <ul class="flex justify-center text-xl mt-2">
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)"><i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i></li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)"><i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i></li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)"><i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i></li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)"><i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i></li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)"><i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray' }}-300"></i></li>
                        </ul>

                    <button class="btn btn-primary mt-2 mb-8" wire:click="store">{{ __('Send review') }}</button>

                </div>
            @else
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-2" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ __('You have already rated this course.') }}</p>
                </div>
            @endcan

        </article>
    @endcan

    @if($course->reviews->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="card-header py-5">
                <p class="text-gray-800 text-xl">{{ $course->reviews->count() }} {{ $course->reviews->count() > 1 ? __('reviews') : __('review') }}</p>
            </div>

            <hr class="mb-4">

            @foreach( $course->reviews->sortByDesc('updated_at') as $review )

                <article class="flex mb-4 text-gray-600">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $review->user->profile_photo_url }}" alt="">
                    </figure>
                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{ $review->user->name }}</b></p>
                            <div class="flex items-center mt-2 mb-2">
                                <ul class="flex text-sm mr-4">
                                    <li class="mr-1 cursor-pointer"><i class="fas fa-star text-{{ $review->rating >= 1 ? 'yellow' : 'gray' }}-300"></i></li>
                                    <li class="mr-1 cursor-pointer"><i class="fas fa-star text-{{ $review->rating >= 2 ? 'yellow' : 'gray' }}-300"></i></li>
                                    <li class="mr-1 cursor-pointer"><i class="fas fa-star text-{{ $review->rating >= 3 ? 'yellow' : 'gray' }}-300"></i></li>
                                    <li class="mr-1 cursor-pointer"><i class="fas fa-star text-{{ $review->rating >= 4 ? 'yellow' : 'gray' }}-300"></i></li>
                                    <li class="mr-1 cursor-pointer"><i class="fas fa-star text-{{ $review->rating == 5 ? 'yellow' : 'gray' }}-300"></i></li>
                                </ul>
                                <small class="text-gray-400">{{ $review->updated_at }}</small>
                            </div>
                            {!! $review->comment !!}
                        </div>
                    </div>
                </article>

            @endforeach

        </div>
    </div>
    @else
        <p class="text-gray-500 text-md">{{ __('This course has not been rated yet') }}</p>
    @endif
</section>

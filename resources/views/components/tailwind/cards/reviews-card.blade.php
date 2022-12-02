@props([
    'model' => ''
])

<div class="w-80 px-12 py-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    
    <div class="flex flex-col items-center mb-4">        
        <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ __('Rating') }}</h3>
        <div class="flex items-center">
            <h3 class="mb-1 text-4xl font-medium text-gray-900 dark:text-white flex items-center">{{ $model->rating }} </h3><span class="text-gray-500 text-sm ml-1"> / 5</span>
        </div>
        <x-tailwind.rating-star :rating="$model->rating"></x-tailwind.rating-star>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $model->reviews_count }} {{  ($model->reviews_count) != 1 ? 'reviews' : 'review'  }}</span>          
    </div>

    <div class="flex items-center justify-between space-x-3 lg:mt-6">
        <span class="flex items-center">
            <span class="font-medium text-sm mr-2">5<i class="fas fa-star "></i></span>
            <span>
                @for($i=0; $i<5; $i++)
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                @endfor
                @for($i=5; $i>5; $i--)
                    <i class="fas fa-star fa-sm text-gray-400"></i>
                @endfor
            </span>
        </span>
        <span class="text-gray-600 text-xs">1024</span>
    </div>

    <div class="flex items-center justify-between space-x-3 lg:mt-6">
        <span class="flex items-center">
            <span class="font-medium text-sm mr-2">4<i class="fas fa-star "></i></span>
            <span>
                @for($i=0; $i<4; $i++)
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                @endfor
                @for($i=5; $i>4; $i--)
                    <i class="fas fa-star fa-sm text-gray-400"></i>
                @endfor
            </span>
        </span>
        <span class="text-gray-600 text-xs">150</span>
    </div>

    <div class="flex items-center justify-between space-x-3 lg:mt-6">
        <span class="flex items-center">
            <span class="font-medium text-sm mr-2">3<i class="fas fa-star "></i></span>
            <span>
                @for($i=0; $i<3; $i++)
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                @endfor
                @for($i=5; $i>3; $i--)
                    <i class="fas fa-star fa-sm text-gray-400"></i>
                @endfor
            </span>
        </span>
        <span class="text-gray-600 text-xs">4</span>
    </div>

    <div class="flex items-center justify-between space-x-3 lg:mt-6">
        <span class="flex items-center">
            <span class="font-medium text-sm mr-2">2<i class="fas fa-star "></i></span>
            <span>
                @for($i=0; $i<2; $i++)
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                @endfor
                @for($i=5; $i>2; $i--)
                    <i class="fas fa-star fa-sm text-gray-400"></i>
                @endfor
            </span>
        </span>
        <span class="text-gray-600 text-xs">10</span>
    </div>

    <div class="flex items-center justify-between space-x-3 lg:mt-6">
        <span class="flex items-center">
            <span class="font-medium text-sm mr-2">1<i class="fas fa-star "></i></span>
            <span>
                @for($i=0; $i<1; $i++)
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                @endfor
                @for($i=5; $i>1; $i--)
                    <i class="fas fa-star fa-sm text-gray-400"></i>
                @endfor
            </span>
        </span>
        <span class="text-gray-600 text-xs">5</span>
    </div>

</div>
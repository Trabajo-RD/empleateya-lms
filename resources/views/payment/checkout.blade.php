<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight">Detalle del pedido</h1>

        <div class="card text-gray-600 mt-4">
            <div class="card-body">
                <article class="flex justify-between mb-4">
                    <div class="flex items-center">
                        <img src="{{ Storage::url($course->image->url) }}" class="h-24 w-24 object-cover mr-4" alt="">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $course->title }}</h2>
                            <p>{{ $course->editor->firstname }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex-1 flex flex-col">
                            <p class="text-xl font-bold ml-auto mb-auto">US$ {{ $course->price->value }}</p>
                            <a href="{{ route('payment.paypal', $course ) }}" class="btn btn-primary " alt="">Comprar curso</a>
                        </div>
                    </div>
                </article>



                <hr>
                <p class="text-sm mt-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, odit obcaecati. Modi sint, et omnis assumenda alias libero quae quisquam. Est exercitationem unde provident recusandae repudiandae odio laborum officia debitis?
                    <a class="text-blue-500 font-bold" href="">Términos y condiciones</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <style>
        .icon::after{
            content: '';
            display: block;
            position: absolute;
            border-top: 23px solid transparent;
            border-bottom: 17px solid transparent;
            border-left: 12px solid #3182ce;
            left: 100%;
            top: 0;
        }
    </style>

    <!-- hero -->
        <section class="bg-contain" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/pages/contact-us.jpg' ) }}); background-position: center top; background-size: 100% auto; background-repeat: no-repeat;">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="order-2 w-full sm:col-span-1 ">

                    {{-- @if(Session::get('message_sent'))
                        

                        <div class="bg-green-200 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                <p class="font-bold">{{__('Message sent')}}</p>
                                <p class="text-sm">{{ Session::get('message_sent')}}</p>
                                </div>
                            </div>
                        </div>
                    @endif --}}

                    <!-- form -->
                    <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" class="form bg-white p-6 my-10 relative">
                        @csrf
                            <div class="icon bg-blue-600 text-white w-6 h-6 absolute flex items-center justify-center p-5" style="left:-40px"><i class="fas fa-paper-plane fa-fw text-2xl "></i></div>
                            <h3 class="text-2xl text-gray-900 font-semibold">{{__('Let us contact you')}}!</h3>
                            <p class="text-gray-600"> {{__('We are here to help you')}}.</p>

                            <div class="block md:flex md:space-x-5 mt-3">
                                <input type="text" name="name" id="name" placeholder="{{__('Your Name')}}" class="border p-2 w-full md:w-1/2">
                                <input type="tel" name="phone" id="phone" placeholder="{{__('Your Number')}}" class="border mt-3 md:mt-0 w-full md:w-1/2">
                            </div>

                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="email" name="email" id="email" placeholder="{{__('Your Email')}}" class="border p-2 w-full mt-3">

                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <textarea name="message" id="message" cols="10" rows="3" placeholder="{{__('Tell us your concern')}}" class="border p-2 mt-3 w-full"></textarea>

                            @error('message')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <p class="font-bold text-sm mt-3">{{__('GDPR Agreement')}} *</p>

                            <div class="flex items-baseline space-x-2 mt-2">
                                <input type="checkbox" name="agreement" id="agreement" class="inline-block">
                                <p class="text-gray-600 text-sm">{{__('I consent to having this website store my submitted information so they can respond to my inquiry')}}.</p>
                            </div>

                            @error('agreement')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="submit" value="{{__('Submit')}}" class="w-full mt-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-3">

                        </form>
                </div>
                <!-- Text -->
                <div class="w-full sm:col-span-1 order-1  md:order-2">
                    <!-- titulo -->
                    <h1 class="text-white font-extrabold text-3xl sm:text-4xl md:text-5xl">{{__('Contact Us')}}</h1>
                    <!-- parrafo -->
                    <p class="text-white mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('Our staff is available to inform you, guide you and help you with all your concerns about Capacítate') }}.</p>  

                    <address>
                    <ul class="w-full rounded-lg mt-2 mb-3 text-white">
                        <li class="mb-1">
                            <a href="mailto:capacitate@mt.gob.do" class="w-fill flex items-center p-3 pl-3 bg-gray-100 bg-opacity-25 hover:text-blue-800 hover:bg-gray-200 rounded-lg transition duration-700 ease-in-out">
                                <i class="fas fa-envelope fa-lg"></i>
                                <span class="ml-2 truncate" title="Envianos un correo a capacitate@mt.gob.do">capacitate@mt.gob.do </span>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="tel:8095354404" class="w-fill flex items-center p-3 pl-3 bg-gray-100 bg-opacity-25 hover:text-blue-800 hover:bg-gray-200 rounded-lg transition duration-700 ease-in-out">
                                <i class="fas fa-phone fa-lg"></i>
                                <span class="ml-2 truncate" title="Llámanos al 809 535-4404">Tel.: (809) 535-4404 </span>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="https://goo.gl/maps/azheaRuhczz9je7W6" target="_blank" class="w-fill flex items-center p-3 pl-3 bg-gray-100 bg-opacity-25 hover:text-blue-800 hover:bg-gray-200 rounded-lg transition duration-700 ease-in-out">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                                <span class="ml-2 " title="Encuentranos en Google Maps">Ave. Enrique Jiménez Moya 5, esq. Republica del Libano, Centro de los Héroes, Distrito Nacional, Republica Dominicana </span>
                            </a>
                        </li>                        
                    </ul>
                    </address>
                                   
                </div>                
            </div>


             
        </section>

        <div class=" gap-x-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">  

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3784.7510497723056!2d-69.929249!3d18.4496091!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea5626db99183fb%3A0x1bd5a3e2c7836a6c!2sMinisterio%20de%20Trabajo!5e0!3m2!1ses-419!2sdo!4v1624223659049!5m2!1ses-419!2sdo" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        

    </div>

    <x-slot name="js">

        <!-- alert -->    
        {{-- https://www.youtube.com/watch?v=qxybVAyaXj8 --}}
        {{-- https://cdnjs.com/libraries/sweetalert --}}
        @if (Session::has('message_sent'))
            <script>
                // swal("Mensaje enviado!", "{!! Session::get('message_sent') !!}", "success", {
                //     button: "OK",
                // });

                swal({
                    title: "Mensaje enviado!",
                    text: "{!! Session::get('message_sent') !!}",
                    type: 'success',
                    icon: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Cerrar',
                    confirmButtonColor: '#003876',
                    confirmButtonClass: 'btn btn-success'
                });
            </script>
        @endif  

    </x-slot>

    
</x-app-layout>
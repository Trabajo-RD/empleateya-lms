<div class="hidden container md:flex py-4 border-b border-gray-300">
    <ul class="page-breadcrumb flex items-center">
        <li>
            <i class="fa fa-home text-gray-500 mr-2"></i>
                <a class="text-md text-gray-500" href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right text-md text-gray-300 mx-3"></i>
        </li>

        @for($i = 0; $i <= count(Request::segments()); $i++)
            <li>
                <a class="text-md text-gray-500" href="">{{Request::segment($i)}}</a>
                @if($i < count(Request::segments()) & $i > 0)
                    {!!'<i class="fa fa-angle-right text-md text-gray-300 mx-3"></i>'!!}
                @endif
            </li>
        @endfor
    </ul>
</div>

{{-- Bootstrap Card --}}

<div class="card-group">
    @foreach ($courses as $index => $course)
        {{-- <div class="col-sm-6"> --}}
            <div class="card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">{{ $course->title }}</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('instructor.courses.edit',  ['course' => $course]) }}" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        {{-- </div> --}}
    @endforeach
</div>

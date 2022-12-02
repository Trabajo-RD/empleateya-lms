@extends('adminlte::page')

@section('title', 'Revisar curso')

@section('content_header')
    <div class="d-flex border-bottom pb-1">
        <nav class="nav nav-pills nav-justified">
            <a href="{{ url()->previous() }}" class="btn btn-light" data-toggle="tooltip" data-placement="right" title="Volver atrás"><i class="fas fa-arrow-circle-left fa-lg"></i></a>
        </nav>
    </div>
    {{-- <hr class=""> --}}
    <h1 class="text-primary my-4">Revisar curso</h1>
@stop

@section('content')

    <div class="container">
        <div class="d-flex align-content-center flex-wrap">
            <div class="col-sm-12 col-md-6">
                <!-- card image -->
                @isset( $course->image )
                    <img src="{{ Storage::url( $course->image->url ) }}" alt="" class="img-thumbnail" style="height: 300px;" />
                @else
                    <img id="picture" class="img-fluid" src="{{ asset('images/courses/default.jpg') }}" alt="" >
                @endisset
            </div>

            <div class="col-sm-12 col-md-6">
                <!-- title -->
                <h2 class="text-dark">{{ $course->title }}</h2>
                <!-- subtitle -->
                <h4 class="text-secondary">{{ $course->subtitle }}</h4>
                <!-- course type -->
                <span class="badge badge-secondary p-2" data-toggle="tooltip" data-placement="top" title="Tipo de curso">
                    <i class="fas fa-photo-video text-sm mr-2"></i>{{ $course->type->name }}
                </span>
                <!-- course category -->
                <span class="badge badge-secondary p-2" data-toggle="tooltip" data-placement="top" title="Categoría">
                    <i class="fas fa-tags text-sm mr-2"></i>{{ $course->topic->name }}
                </span>
                <!-- course level -->
                <span class="badge badge-secondary p-2" data-toggle="tooltip" data-placement="top" title="Nivel requerido">
                    <i class="fas fa-layer-group text-sm mr-2"></i>{{ $course->level->name }}
                </span>

                <div class="d-flex align-content-center justify-content-start pt-2">

                        <div class="d-flex flex-nowrap mr-auto">
                            <!-- rating -->
                            <span class="h4 text-{{ $course->rating > 4 ? 'warning' : 'secondary' }}">
                                {{ $course->rating }}
                            </span>
                            <!-- rating stars -->
                            <div class="ml-2 mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'warning' : 'secondary' }}"></i></div>
                            <div class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'warning' : 'secondary' }}"></i></div>
                            <div class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'warning' : 'secondary' }}"></i></div>
                            <div class="mr-1 pt-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'warning' : 'secondary' }}"></i></div>
                            <div class="mr-6 pt-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'warning' : 'secondary' }}"></i></div>
                        </div>

                </div>
                <!-- users enrolled -->
                <span class="text-muted">
                    <i class="fas fa-users text-sm mr-2"></i>{{ $course->users_count }} Participantes
                </span>
            </div>
        </div>

    </div>



<div class="container py-5">

    @if( session('info') )
        <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error de aprobación!</strong>
                <span class="block sm:inline">{{ session('info') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg x-on:click="open = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @endif

    <div class="order-2 md:col-span-1 lg:col-span-2 md:order-1 lg:order-1">

        <!-- section description -->
        <section class="mb-4 text-dark">
            <h4 class="font-weight-bold mb-1">Descripción</h4>
            <div>
                {!! $course->summary !!}
            </div>
        </section>

        <!-- section requirements  -->
        @isset($course->requirements)
        <section class="mb-4 text-dark">
            <h4 class="font-weight-bold mb-1">{{ __('Requirements') }}</h4>

            <ul class="list-group">

                @forelse ($course->requirements as $requirement )

                    <li class="list-group-item">
                        {{ $requirement->name }}
                    </li>

                @empty

                    <li class="list-group-item">
                        Este curso no tiene requerimientos asignados.
                    </li>

                @endforelse

            </ul>
        </section>
        @endisset

        <!-- section goals -->
        @if($course->goals)
            <section class="mb-4 text-dark">
                <h4 class="font-weight-bold mb-1">{{ __('What you will learn') }}</h4>
                    <ul class="list-group">

                        @forelse ( $course->goals as $goal )
                            <li class="list-group-item"><i class="fas fa-check text-sm text-gray-500 mr-2"></i>{{ $goal->name }}</li>
                        @empty
                            <li class="list-group-item">Este curso no tiene metas asignadas</li>
                        @endforelse

                    </ul>
            </section>
        @endif

        <!-- section subjects -->
        @if($course->section)
            <section class="mb-4 text-dark">
                <h4 class="font-weight-bold mb-1">Contenido del curso</h4>

                @forelse ( $course->sections as $section )

                    <div class="card">

                        <h5 class="card-header">
                            <i class="fas fa-chevron-down mr-2"></i>
                            {{ $section->title }}
                        </h5>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($section->lessons as $lesson )

                                    <li class="list-group-item"><i class="far fa-play-circle fa-lg mr-4"></i>{{ $lesson->title }}</li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            Este curso no tiene secciones asignadas.
                        </div>
                    </div>
                @endforelse

            </section>
        @endif


        <div class="card mb-4 py-4">

            <!-- Author info -->
            <div class="row no-gutters">
                <div class="px-4">
                    <figure>
                        <img class="rounded-circle" src="{{ $course->editor->profile_photo_url }}" alt="Foto de perfil"/>
                    </figure>
                </div>
                <div>
                    <h5 class="card-title font-weight-bold">{{ $course->editor->name . ' ' . $course->editor->lastname }}</h5><br/>

                    <p class="card-text mb-0">{{ $course->editor->email }}</p><br/>

                    <a class="btn btn-secondary btn-lg rounded-circle" href="mailto:{{ $course->editor->email }}" target="_blank" role="button" ><i class="far fa-envelope"></i></a>
                </div>
            </div>

        </div>

        <section class="card mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between">

                    <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir los cambios y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>


                    {{-- <a href="{{ route('admin.courses.observation', $course ) }}" wire:click="sendDisapprovedNotification" class="btn btn-secondary">Añadir observación</a> --}}

                    <div class="d-flex justify-content-around">
                        <a href="{{ route('admin.courses.observation', $course) }}" class="btn btn-warning mx-2"><i class="fas fa-exclamation-circle mr-2"></i>Añadir observación</a>

                        <form action="{{ route('admin.courses.approved', $course ) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary mx-2"><i class="fas fa-check-circle mr-2"></i>Aprobar curso</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

    </div>

</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop


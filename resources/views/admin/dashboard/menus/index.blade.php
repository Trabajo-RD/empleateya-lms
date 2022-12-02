@extends('adminlte::page')

@section('title', 'Capacítate RD - Menus')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <h1 class="text-dark">{{ Lang::get('Menus') }}</h1>
            @if( count($menus) > 0)
                <form action="{{ url('admin/dashboard/menus/index') }}" class="form-inline ml-4">
                    <div class="input-group">
                        <select name="id" class="menu-select">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary">{{ Lang::get('Select') }}</button>
                        </div>
                      </div>
                </form>
            @endif
        </div>

        <!-- Button trigger modal -->
        <a class="btn btn-accent ml-2" href="{{ url('admin/dashboard/menus/index?id=new') }}">
            <i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Menu') }}
        </a>

    </div>
@stop

@section('content')

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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="row">
        <!-- left -->
        <div class="col-sm-3">
            <div class="mb-4">
                <h5 class="font-weight-bold color-primary"><span>{{ Lang::get('Add Menu Items') }}</span></h5>
            </div>

            <div id="menu-items-accordion">
                @if( count($categories) > 0)
                    <!-- card -->
                    <div class="card">
                        <div class="card-header " id="category-list-header">
                            <h5 class="mb-0 mr-auto">
                                <button class="btn btn-link collapsed btn-block d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#categories-list" aria-expanded="false" aria-controls="categories-list">
                                    {{ Lang::get('Categories') }}
                                    <i class="fas fa-caret-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div class="collapse show" id="categories-list" aria-labelledby="category-list-header" data-parent="#menu-items-accordion">
                            <div class="card-body">
                                <div class="item-list-body" id="categories-list-items">
                                    @foreach($categories as $category)
                                        <p><input type="checkbox" name="select-category[]" value="{{ $category->id }}" class="mr-3">{{ $category->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="form-check btn btn-link">
                                        <input type="checkbox" id="select-all-categories" class="form-check-input">
                                        <label for="select-all-categories" class="form-check-label">
                                            {{ Lang::get('Select All') }}
                                        </label>
                                    </div>
                                    <button type="button" class="btn btn-default btn-sm" id="add-categories">{{ Lang::get('Add to Menu') }}</button>
                                </div>
                            </div>
                        </div>

                    </div><!--card-->
                @endif

                @if( count($courses) > 0)
                    <!-- card -->
                    <div class="card">
                        <div class="card-header" id="course-list-header">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed btn-block d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#categories-list" aria-expanded="false" aria-controls="categories-list">
                                    {{ Lang::get('Courses') }}
                                    <i class="fas fa-caret-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div class="collapse show" id="courses-list" aria-labelledby="course-list-header" data-parent="#menu-items-accordion">
                            <div class="card-body">
                                <div class="item-list-body">
                                    @foreach($courses as $course)
                                        <p><input type="checkbox" name="select-course[]" value="{{ $coruse->id }}" class="mr-3">{{ $coruse->title }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--card-->
                @endif

                @if( count($workshops) > 0)
                    <!-- card -->
                    <div class="card">
                        <div class="card-header" id="workshop-list-header">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed btn-block d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#categories-list" aria-expanded="false" aria-controls="categories-list">
                                    {{ Lang::get('Workshops') }}
                                    <i class="fas fa-caret-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div class="collapse show" id="workshops-list" aria-labelledby="workshop-list-header" data-parent="#menu-items-accordion">
                            <div class="card-body">
                                <div class="item-list-body">
                                    @foreach($workshops as $workshop)
                                        <p><input type="checkbox" name="select-workshop[]" value="{{ $workshop->id }}" class="mr-3">{{ $workshop->title }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--card-->
                @endif

                @if( count($modules) > 0)
                    <!-- card -->
                    <div class="card">
                        <div class="card-header" id="module-list-header">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed btn-block d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#categories-list" aria-expanded="false" aria-controls="categories-list">
                                    {{ Lang::get('Modules') }}
                                    <i class="fas fa-caret-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div class="collapse show" id="modules-list" aria-labelledby="module-list-header" data-parent="#menu-items-accordion">
                            <div class="card-body">
                                <div class="item-list-body">
                                    @foreach($modules as $module)
                                        <p><input type="checkbox" name="select-module[]" value="{{ $module->id }}" class="mr-3">{{ $module->title }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--card-->
                @endif

                @if( count($paths) > 0)
                    <!-- card -->
                    <div class="card">
                        <div class="card-header" id="path-list-header">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed btn-block d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#paths-list" aria-expanded="false" aria-controls="paths-list">
                                    {{ Lang::get('Paths') }}
                                    <i class="fas fa-caret-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div class="collapse show" id="paths-list" aria-labelledby="path-list-header" data-parent="#menu-items-accordion">
                            <div class="card-body">
                                <div class="item-list-body">
                                    @foreach($paths as $path)
                                        <p><input type="checkbox" name="select-path[]" value="{{ $path->id }}" class="mr-3">{{ $path->title }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--card-->
                @endif
            </div>
        </div>

        <!--right -->
        <div class="col-sm-9">
            @if(isset($_GET['id']) && $_GET['id'] != 'new')
                <div class="mb-4">
                    <h5 class="font-weight-bold color-primary">{{ Lang::get('Current Menu: ') }}<span class="color-secondary ml-2">{{ $selectedMenu->title }}</span></h5>
                </div>
            @else
                <div class="mb-4">
                    <h5 class="font-weight-bold color-primary"><span>{{ Lang::get('Menu Items') }}</span></h5>
                </div>
            @endif

            <div class="card">

                <div class="card-body">

                    @if( $selectedMenu == '')

                        <x-bootstrap.forms.form id="add-menu-form" route="admin.dashboard.menus.store">
                            @include('admin.dashboard.menus.partials.form')

                            {!! Form::submit( Lang::get('Create Menu'), ['class' => 'btn btn-primary shadow']) !!}
                        </x-bootstrap.forms.form>

                    @else

                        <p>{{ Lang::get('Add categories, courses, or customs to the menu') }}</p>

                        @if($menuItems)
                            <ul>
                                @foreach($menuItems as $menuItem)
                                    <li>{{ $menuItem->title }}</li>
                                @endforeach
                            </ul>
                        @endif

                    @endif


                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    {{-- Create confirmed --}}
    @if (session('success') )
    <script>
        Swal.fire(
            'Creado!',
            'Menu creado satisfactoriamente.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') )
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El curso ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-menu').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este menú?',
            text: "Se eliminará el menú pero los items asociados al mismo, no se verán afectados",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#EE2A24',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {

                // Submit the form
                this.submit();

            }
            })
        });
    </script>

    <script>
        // Check all categories
        jQuery('#select-all-categories').click( function(event) {
            if (this.checked) {
                jQuery('#categories-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                jQuery('#categories-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });


            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            };


            // Store categories data using ajax
            jQuery('#add-categories').click( function() {
                var menuid = getUrlParameter('id');

                var n = $('#categories-list-items input:checked').length;
                // alert(n);

               var array = $('#categories-list-items input:checked');

                var ids = [];

                for(i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                    // alert(ids[i])

                }

                if(ids.length < 1) {
                    return false;
                } else {
                    var ajaxUrl = "{{ url('admin/add-categories-to-menu') }}";
                    $.ajax({
                        type: "get",
                        data: {menuid:menuid, ids:ids},
                        url: ajaxUrl,
                        success:function() {
                            location.reload();
                        }
                    })
                }

            })




        </script>




@stop

@props(['id', 'size', 'route', 'params' => null, 'files' => 'false'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    @if($files == 'true')

        {!! Form::open(['route' => [$route, $params], 'files' => 'true','enctype'=>'multipart/form-data']) !!}

    @else

        {!! Form::open(['route' => [$route, $params]]) !!}

    @endif

    <div class="modal-dialog modal-{{ $size }}" role="document">
      <div class="modal-content">
        <div class="modal-header">
            {{ $modal_header }}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $modal_body }}
        </div>
        <div class="modal-footer">
            {{ $modal_footer }}
        </div>
      </div>
    </div>

    {!! Form::close() !!}

  </div>

@section('js')
    <script>
    //     $(document).ready(function() {
    //     $(".modal").modal();
    // });
    </script>
@stop

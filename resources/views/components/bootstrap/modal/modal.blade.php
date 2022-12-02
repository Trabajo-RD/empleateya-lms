@props(['id', 'size'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-{{ $size }}" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-primary" id="modalLabel">{{ Lang::get('New Lesson') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {{ $modal_body }}

        </div>
        <div class="modal-footer">
          <button type="button" id="cancel-button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="ok-button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>

@section('js')
    $(document).ready(function() {
        $(".modal").modal();
    });

    <script>
        $('.modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var title = button.data('title')
        var cancelButtonText = button.data('cancel-text')
        var okButtonText = button.data('ok-text') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(title)
        modal.find('#ok-button').text(okButtonText)
        modal.find('#cancel-button').text(cancelButtonText)
    })
    </script>
@stop

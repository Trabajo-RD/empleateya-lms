<!-- edit-section-modal -->
<div class="modal fade" id="edit-section-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

    {!! Form::model($section, ['method' => 'PUT', 'route' => ['instructor.dashboard.courses.sections.update', $section]]) !!}

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="modalLabel">{{ Lang::get('Edit Section') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @include('instructor.dashboard.courses.sections.partials.form')

                </div><!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit( Lang::get('Update Section'), ['class' => 'btn btn-accent shadow']) !!}
                </div>
            </div><!-- modal-content-->
        </div>

    {!! Form::close() !!}

</div><!-- modal -->
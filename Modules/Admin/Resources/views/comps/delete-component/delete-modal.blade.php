<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    @lang('admin::messages.delete-confirmation')
                </h5>
            </div>
            {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE']) !!}
            <div class="modal-body">
                <h5 class="text-center text-danger fw-bolder">
                    @lang('admin::messages.delete-alert')
                </h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light-success btn-sm">
                    @lang('admin::cruds.delete')
                </button>
                <button type="button" class="btn btn-light-danger btn-sm" data-bs-dismiss="modal">
                    @lang('admin::cruds.cancel')
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

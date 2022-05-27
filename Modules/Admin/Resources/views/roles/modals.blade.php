<!-- Add New Role Modal -->
<div class="modal fade" id="addNewRoleModal" tabindex="-1" aria-labelledby="addNewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewRoleModalLabel">@lang('admin::cruds.add-new-role')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['method' => 'POST' , 'url' => route('roles-and-permissions.store')]) !!}
            <div class="modal-body">
                <div class="mb-5">
                    <label class="form-label">@lang('admin::cruds.roles.title')</label>
                    <input type="text" name="title" placeholder="@lang('admin::cruds.type-here')" class="form-control form-control-solid">
                </div>
                <div class="mb-5">
                    <label class="form-label">@lang('admin::cruds.roles.name')</label>
                    <input type="text" name="name" placeholder="@lang('admin::cruds.type-here')" class="form-control form-control-solid">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-light-success">@lang('locations::cruds.create')</button>
                <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">@lang('admin::cruds.cancel')</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- Edit Current Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">@lang('admin::cruds.add-new-role')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['method' => 'PUT' , 'id' => 'editRoleForm']) !!}
            <div class="modal-body">
                <div class="mb-5">
                    <label class="form-label">@lang('admin::cruds.roles.title')</label>
                    <input type="text" id="edit_role_title" name="title" placeholder="@lang('admin::cruds.type-here')" class="form-control form-control-solid">
                </div>
                <div class="mb-5">
                    <label class="form-label">@lang('admin::cruds.roles.name')</label>
                    <input type="text" id="edit_role_name" name="name" placeholder="@lang('admin::cruds.type-here')" class="form-control form-control-solid">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-light-success">@lang('locations::cruds.create')</button>
                <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">@lang('admin::cruds.cancel')</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

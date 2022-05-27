<div class="card shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            <div class="card-icon">
                <i class="fas fa-filter"></i>
            </div>
            <h3 class="card-label fw-bolder">
                @lang('admin::cruds.filteration')
            </h3>
        </div>
    </div>
    {!! Form::open(['method' => 'POST', 'url' => route('users.filter')]) !!}
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('creation-date', __('admin::cruds.users.creation-date'), ['class' => 'form-label']) !!}
        </div>
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('from', __('admin::cruds.users.from'), ['class' => 'form-label']) !!}
                    {!! Form::date('from', Request::get('from') ?? null, ['class' => 'form-control form-control-solid']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('to', __('admin::cruds.users.to'), ['class' => 'form-label']) !!}
                    {!! Form::date('to', Request::get('to') ?? null, ['class' => 'form-control form-control-solid']) !!}
                </div>
            </div>
        </div>

        <div class="mb-5">
            {!! Form::label('name-or-email', __('admin::cruds.users.name-or-email'), ['class' => 'form-label']) !!}
            {!! Form::text('name-or-email', Request::get('name-or-email') ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('role-name', __('admin::cruds.users.role-name'), ['class' => 'form-label']) !!}
            {!! Form::select('role-name', $roles, Request::get('role-name') ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.users.select-role')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('id', __('admin::cruds.users.id'), ['class' => 'form-label']) !!}
            {!! Form::text('id', Request::get('id') ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-light-danger" type="reset">
            <i class="fas fa-trash"></i> @lang('admin::cruds.reset')
        </button>
        <button class="btn btn-light-primary">
            <i class="fas fa-check-circle"></i> @lang('admin::cruds.filter')
        </button>
    </div>
    {!! Form::close() !!}
</div>

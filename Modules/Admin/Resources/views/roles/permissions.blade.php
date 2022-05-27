@extends('admin::layouts.master')

@section('title' , __('admin::cruds.permissions'). ' | ' .  $role->title)

@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('roles-and-permissions.index') }}" class="btn btn-light-danger mb-3">
            <i class="fas fa-arrow-circle-left"></i> @lang('admin::cruds.back')
        </a>
    </div>
</div>
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-cogs"></i>
            </span>
            <h3 class="card-label fw-bolder">
                @lang('admin::cruds.permissions') | {{ $role->title }}
            </h3>
        </div>
    </div>
    {!! Form::open(['method' => 'POST', 'url' => route('role-permissions.save', $role->name)]) !!}
    <div class="card-body">
        <table class="table table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
            <tbody>
                <tr>
                    <td class="fw-bolder">
                        @lang('admin::cruds.roles.all-abilities')
                    </td>
                    <td>
                        <label for="*" class="form-check form-check-custom form-check-solid">
                            <input
                            {{ $role->abilities()->where('name', '*')->first() ? 'checked' : null }}
                            id="*" class="form-check-input h-20px w-20px" type="checkbox" name="abilities[]" value="*">
                            <span class="form-check-label fw-bold">@lang('admin::cruds.roles.all-abilities')</span>
                        </label>
                    </td>
                </tr>
                @foreach ($entities as $entity)
                    @if (!in_array($entity, config('admin.excludedAbilities')) )
                    <tr>
                        <td class="fw-bolder">{{ $entity }}</td>
                        @if (Arr::exists(config('admin.customAbilities'), $entity))
                            @foreach (config('admin.customAbilities.'.$entity.'.abilities') as $ability)
                            <td>
                                <label for="{{ config('admin.customAbilities.'.$entity.'.as') . '.' . $ability }}" class="form-check form-check-custom form-check-solid">
                                    <input
                                    {{ $role->abilities()->where('name', Str::lower($entity) . '.' . $ability)->first() ? 'checked' : null }}
                                    id="{{ config('admin.customAbilities.'.$entity.'.as') . '.' . $ability }}" class="form-check-input h-20px w-20px" type="checkbox" name="abilities[]" value="{{ Str::lower($entity) . '.' . $ability }}">
                                    <span class="form-check-label fw-bold">{{ Str::ucfirst($ability) }}</span>
                                </label>
                            </td>
                            @endforeach
                        @else
                        @foreach(['create', 'read', 'update', 'delete', 'export', 'print'] as $permission)
                        <td>
                            <label for="{{ $entity . '.' . $permission }}" class="form-check form-check-custom form-check-solid">
                                <input
                                {{ $role->abilities()->where('name', Str::lower($entity) . '.' . $permission)->first() ? 'checked' : null }}
                                id="{{ $entity . '.' . $permission }}" class="form-check-input h-20px w-20px" type="checkbox" name="abilities[]" value="{{ Str::lower($entity) . '.' . $permission }}">
                                <span class="form-check-label fw-bold">@lang('admin::cruds.roles.'.$permission)</span>
                            </label>
                        </td>
                        @endforeach
                        @endif
                    </tr>
                    @endif
                @endforeach
                @forelse (config('admin.additionalAbilities') as $key => $add_ability)
                    <tr>
                    <td class="fw-bolder">{{ $key }}</td>
                    @foreach ($add_ability['abilities'] as $perm)
                        <td>
                            <label for="{{ Str::lower($key) . '.' . $perm }}" class="form-check form-check-custom form-check-solid">
                                <input
                                {{ $role->abilities()->where('name', Str::lower($key) . '.' . $perm)->first() ? 'checked' : null }}
                                id="{{ Str::lower($key) . '.' . $perm }}" class="form-check-input h-20px w-20px" type="checkbox" name="abilities[]" value="{{ Str::lower($key) . '.' . $perm }}">
                                <span class="form-check-label fw-bold">@lang('admin::cruds.roles.'.$perm)</span>
                            </label>
                        </td>
                    @endforeach
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-light-success">
            <i class="fas fa-check-circle"></i> @lang('admin::cruds.save')
        </button>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@extends('admin::layouts.master')

@section('title' , __('admin::menu.roles-and-permissions'))

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-custom shadow-sm">
        <div class="card-header bg-light">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-cogs"></i>
            </span>
                <h3 class="card-label fw-bolder">@lang('admin::menu.roles-and-permissions')</h3>
            </div>
        </div>
        <div class="card-body">
            <button data-bs-toggle="modal" data-bs-target="#addNewRoleModal" class="btn btn-light-primary float-end mb-3">
                <i class="fas fa-plus-circle"></i> @lang('admin::cruds.add-new-role')
            </button>
            <table class="table table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
                <thead class="bg-light">
                <tr class="fw-bolder text-muted">
                    <td>@lang('admin::cruds.name')</td>
                    <td>@lang('admin::cruds.title')</td>
                    <td>@lang('admin::cruds.permissions')</td>
                    <td>@lang('admin::cruds.actions')</td>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->title }}</td>
                        <td>
                            @forelse ($role->abilities->take(5) as $ability)
                                <span class="badge bg-info">
                                    {{ $ability->title }}
                                </span>
                            @empty
                                @lang('admin::messages.no-abilities-available')
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route('show-permissions-page', $role->name) }}" class="btn btn-icon btn-light-info">
                                <i class="fas fa-user-cog"></i>
                            </a>
                            <button data-id="{{ $role->id }}" onclick="editRoleName(this)" data-bs-toggle="modal" data-bs-target="#editRoleModal" class="btn btn-icon btn-light-success">
                                <i class="fas fa-edit"></i>
                            </button>
                            @component('admin::comps.delete-component.button')
                                @slot('id',$role->id)
                            @endcomponent
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            @lang('admin::messages.no-data-available')
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('admin::roles.modals')
    @component('admin::comps.delete-component.delete-modal') @endcomponent
@endsection

@push('javascript')
    @component('admin::comps.delete-component.delete-function')
        @slot('route', 'roles-and-permissions.destroy')
    @endcomponent

    <script>
        function editRoleName(button) {

            let role_id = $(button).data('id');
            let url = "{{ route('roles-and-permissions.edit', ':id') }}";
            url = url.replace(':id', role_id);
            $.ajax({
                method: "GET",
                url: url,
                success: function (response) {
                    let formURL = "{{ route('roles-and-permissions.update', ':id') }}";
                    formURL = formURL.replace(':id', response.role.id);
                    $('#editRoleForm').attr('action', formURL);
                    $("#edit_role_title").val(response.role.title);
                    $("#edit_role_name").val(response.role.name);
                }
            })

        }
    </script>
@endpush

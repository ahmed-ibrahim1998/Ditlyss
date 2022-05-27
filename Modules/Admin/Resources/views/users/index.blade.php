@extends('admin::layouts.master')

@section('title' , __('admin::cruds.users.title'))

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
<div class="row">
    <div class="col-md-9">
        <div class="card card-custom shadow-sm">
            <div class="card-header bg-light">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <h3 class="card-label fw-bolder">@lang('admin::cruds.users.title')</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-light-primary float-end mb-3">
                            <i class="fas fa-plus-circle"></i> @lang('admin::cruds.users.add-new-user')
                        </a>
                    </div>
                </div>
                <table class="table table-bordered table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-bolder">@lang('admin::cruds.users.id')</th>
                            <th class="fw-bolder">@lang('admin::cruds.users.profile-photo')</th>
                            <th class="fw-bolder">@lang('admin::cruds.users.name')</th>
                            <th class="fw-bolder">@lang('admin::cruds.users.email')</th>
                            <th class="fw-bolder">@lang('admin::cruds.users.role')</th>
                            <th class="fw-bolder">@lang('admin::cruds.users.created-at')</th>
                            <th class="fw-bolder">@lang('admin::cruds.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td># {{ $user->id }}</td>
                                <td><img src="{{ asset($user->profile_photo_path) }}" alt="Profile Picture" class="mx-auto" width="50"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->getRoles()->count() > 0)
                                    <span class="badge {{ $user->getRoleBackground($user->getRoles()->first()) }}">
                                        {{ Str::upper($user->getRoles()->first()) }}
                                    </span>
                                    @else
                                    <span class="badge bg-danger">
                                        @lang('admin::messages.no-abilities-available')
                                    </span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <button class="btn btn-icon btn-light-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-icon btn-light-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @component('admin::comps.delete-component.button')
                                        @slot('id',$user->id)
                                    @endcomponent  
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="fw-bolder">
                                    @lang('admin::messages.no-data-available')
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->render() }}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @include('admin::users.filteration')
    </div>    
</div>

@component('admin::comps.delete-component.delete-modal') @endcomponent
@endsection


@push('javascript')
    @component('admin::comps.delete-component.delete-function')
        @slot('route', 'users.destroy')
    @endcomponent
@endpush
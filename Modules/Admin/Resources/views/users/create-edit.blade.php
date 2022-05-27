@extends('admin::layouts.master')

@section('title' , isset($user) ? __('admin::cruds.edit') . ' | ' . $user->name : __('admin::cruds.users.add-new-user'))

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
    <div class="col-md-12">
        <a href="{{ route('users.index') }}" class="btn btn-light-danger mb-3">
            <i class="fas fa-arrow-circle-left"></i> @lang('admin::cruds.back')
        </a>
    </div>
</div>
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            @isset($user)
            <span class="card-icon">
                <i class="fas fa-user-edit"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('admin::cruds.edit') | {{ $user->name }}</h3>
            @else
            <span class="card-icon">
                <i class="fas fa-user-plus"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('admin::cruds.users.add-new-user')</h3>
            @endisset
        </div>
    </div>

    @isset($user)
    {!! Form::open(['method' => 'PUT', 'url' => route('users.update', $user->id), 'files' => true]) !!}
    @else
    {!! Form::open(['method' => 'POST', 'url' => route('users.store'), 'files' => true]) !!}
    @endisset
    <div class="card-body">
        <div class="mb-5 text-center">
            {!! Form::label('profile_photo_path', __('admin::cruds.users.profile-photo'), ['class' => 'form-label']) !!}
            @component('admin::comps.photo')
                @slot('name', 'profile_photo_path')
                @isset($user)
                    @slot('path', $user->profile_photo_path)
                @endisset
            @endcomponent
        </div>
        <div class="mb-5">
            {!! Form::label('name', __('admin::cruds.users.name'), ['class' => 'form-label']) !!}
            {!! Form::text('name', $user->name ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
        <div class="mb-5">
            {!! Form::label('email', __('admin::cruds.users.email'), ['class' => 'form-label']) !!}
            {!! Form::email('email', $user->email ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
        <div class="mb-5">
            {!! Form::label('role', __('admin::cruds.users.role'), ['class' => 'form-label']) !!}
            {!! Form::select('role', $roles , isset($user) ? $user->getRoles()->first() : null , ['class' => 'form-control form-control-solid']) !!}
        </div>
        <div class="mb-5">
            @isset($user)
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {!! Form::label('password', __('admin::cruds.users.new-password'), ['class' => 'form-label']) !!}
            @else
            {!! Form::label('password', __('admin::cruds.users.password'), ['class' => 'form-label']) !!}
            @endisset
            {!! Form::password('password', ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
        <div class="mb-5">
            {!! Form::label('password_confirmation', __('admin::cruds.users.password_confirmation'), ['class' => 'form-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-light-success">
            @isset($user)
            <i class="fas fa-check-circle"></i> @lang('admin::cruds.save')
            @else
            <i class="fas fa-check-circle"></i> @lang('admin::cruds.create')
            @endisset
        </button>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@extends('admin::layouts.master')

@section('title' , isset($client) ? __('client::cruds.edit') . ' | ' . $client->name : __('client::cruds.add-new-client'))

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
        <a href="{{ route('all-clients.index') }}" class="btn btn-light-danger mb-3">
            <i class="fas fa-arrow-circle-left"></i> @lang('client::cruds.back')
        </a>
    </div>
</div>
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            @isset($client)
            <span class="card-icon">
                <i class="fas fa-user-edit"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('client::cruds.edit') | {{ $client->name }}</h3>
            @else
            <span class="card-icon">
                <i class="fas fa-user-plus"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('client::cruds.add-new-client')</h3>
            @endisset
        </div>
    </div>

    @isset($client)
    {!! Form::open(['method' => 'PUT', 'url' => route('all-clients.update', $client->id), 'files' => true]) !!}
    @else
    {!! Form::open(['method' => 'POST', 'url' => route('all-clients.store'), 'files' => true]) !!}
    @endisset
    <div class="card-body">
        <div class="mb-5 text-center">
            {!! Form::label('profile_photo_path', __('client::cruds.profile-photo'), ['class' => 'form-label']) !!}
            @component('client::components.photo')
                @slot('name', 'profile_photo_path')
                @isset($client)
                    @slot('path', $client->profile_photo_path)
                @endisset
            @endcomponent
        </div>
        <div class="mb-5">
            {!! Form::label('name', __('client::cruds.name'), ['class' => 'form-label']) !!}
            {!! Form::text('name', $client->name ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>
        <div class="mb-5">
            {!! Form::label('email', __('client::cruds.email'), ['class' => 'form-label']) !!}
            {!! Form::email('email', $client->email ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('phone', __('client::cruds.phone'), ['class' => 'form-label']) !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <select style="width:200px;" name="number_prefix" id="" class="form-control form-control-solid">
                        @forelse ($countries as $country)
                        <option value="{{ $country->number_prefix }}"
                            @if(isset($client) && !is_null($client->phone))
                            {{ Str::substr($client->phone, 0, 2) == $country->number_prefix ? 'selected' : '' }}
                            @endif
                            >
                            {{ $country->name . ' ( +' . $country->number_prefix . ' )' }}
                        </option>
                        @empty
                            <option hidden disabled selected>@lang('client::cruds.add-country-first')</option>
                        @endforelse
                    </select>
                </div>
                {!! Form::number('phone', isset($client) ? Str::substr($client->phone, 2) : null , ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
            </div>
        </div>

        <div class="mb-5">
            @isset($client)
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            {!! Form::label('password', __('client::cruds.new-password'), ['class' => 'form-label']) !!}
            @else
            {!! Form::label('password', __('client::cruds.password'), ['class' => 'form-label']) !!}
            @endisset
            {!! Form::password('password', ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('password_confirmation', __('client::cruds.password_confirmation'), ['class' => 'form-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('age', __('client::cruds.age'), ['class' => 'form-label']) !!}
            {!! Form::number('age',  $client->age ?? null ,['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('height', __('client::cruds.height'), ['class' => 'form-label']) !!}
            {!! Form::number('height',  $client->height ?? null,['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('weight', __('client::cruds.weight'), ['class' => 'form-label']) !!}
            {!! Form::number('weight',  $client->weight ?? null,['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('physical_activity', __('client::cruds.physical_activity'), ['class' => 'form-label']) !!}
            {!! Form::text('physical_activity',  $client->physical_activity ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

        <div class="mb-5">
            {!! Form::label('notes', __('client::cruds.notes'), ['class' => 'form-label']) !!}
            {!! Form::textarea('notes',  $client->notes ?? null,  ['class' => 'form-control form-control-solid', 'placeholder' => __('admin::cruds.type-here')]) !!}
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-light-success">
            @isset($client)
            <i class="fas fa-check-circle"></i> @lang('client::cruds.save')
            @else
            <i class="fas fa-check-circle"></i> @lang('client::cruds.create')
            @endisset
        </button>
    </div>
    {!! Form::close() !!}
</div>
@endsection

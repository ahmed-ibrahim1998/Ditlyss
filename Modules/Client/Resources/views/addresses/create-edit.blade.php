@extends('admin::layouts.master')

@section('title' , isset($address) ? __('client::cruds.edit') . ' | ' . $address->client->name : __('client::cruds.add-new-address'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('addresses.index') }}" class="btn btn-light-danger mb-3">
            <i class="fas fa-arrow-circle-left"></i> @lang('client::cruds.back')
        </a>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger fw-bolder mb-0 pb-0">
        <ul type="disc">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>        
            @endforeach
        </ul>
    </div>
@endif
@isset($address)
{!! Form::open(['method' => 'PUT', 'url' => route('addresses.update', $address->id)]) !!}
@else
{!! Form::open(['method' => 'POST', 'url' => route('addresses.store')]) !!}
@endisset
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            @isset($address)
            <span class="card-icon">
                <i class="fas fa-edit"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('client::cruds.edit') | {{ $address->client->name }} @lang('client::cruds.addresses.address')</h3>
            @else
            <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('client::cruds.add-new-address')</h3>
            @endisset
        </div>
    </div>
    <div class="card-body">
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('client_id', __('client::cruds.client'), ['class' => 'form-label']) !!}
                    <span class="text-danger fw-bolder">*</span>
                    <div class="input-group">
                        {!! Form::text(null, $address->client->name ?? null , ['id' => 'client_name_or_email', 'class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.client-email-or-name')]) !!}
                        <button type="button" onclick="searchClient()" class="btn btn-light-success">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    {!! Form::label('phone', __('client::cruds.phone'), ['class' => 'form-label']) !!}
                    <span class="text-danger fw-bolder">*</span>
                    {!! Form::number('phone', isset($address) ? Str::substr($address->phone ,2) : null , ['id' => 'phone', 'class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
                </div>
            </div>
            {!! Form::hidden('client_id', $address->client_id ?? null , ['id' => 'client_id']) !!}
        </div>
        <div class="mb-5 row" id="clientsData"></div>
        @foreach ($languages as $key => $language)
        <div class="mb-5">
            <label for="">Title {{$language->prefix}}- ({{$language->name}})</label>
            <input placeholder="@lang('locations::cruds.type-here')" type="text" value="{{ isset($address) ? $address->getTranslation('title', $language->prefix) : '' }}" name="{{$language->prefix}}" class="form-control form-control-solid">
        </div>
        @endforeach
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                {!! Form::label('country', __('client::cruds.country'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::select('country', $countries, isset($address) ? $address->area->city->country_id : null , ['class' => 'form-control form-control-solid', 'id' => 'country', 'placeholder' => __('client::cruds.select-country')]) !!}
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('city', __('client::cruds.city'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                <select id="city" class="form-control form-control-solid">
                    @isset($address)
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $address->area->city_id == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                        @endforeach
                    @else
                        <option selected hidden disabled>@lang('client::cruds.select-country-first')</option>
                    @endisset
                    
                </select>
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('area_id', __('client::cruds.area'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                <select name="area_id" id="area" class="form-control form-control-solid">
                    @isset($address)
                        @foreach ($areas->where('city_id', $address->area->city_id)->get() as $area)
                        <option value="{{ $area->id }}" {{ $address->area_id == $area->id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                        @endforeach
                    @else
                        <option selected hidden disabled>@lang('client::cruds.select-city-first')</option>
                    @endisset
                </select>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                {!! Form::label('block', __('client::cruds.addresses.block'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('block', $address->block ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('avenue', __('client::cruds.addresses.avenue'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('avenue', $address->avenue ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('street', __('client::cruds.addresses.street'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('street', $address->street ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                {!! Form::label('building', __('client::cruds.addresses.building-no'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('building', $address->building ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('floor', __('client::cruds.addresses.floor-no'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('floor', $address->floor ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
            <div class="col-md-4 mb-5">
                {!! Form::label('flat', __('client::cruds.addresses.flat-no'), ['class' => 'form-label']) !!}
                <span class="text-danger fw-bolder">*</span>
                {!! Form::text('flat', $address->flat ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here')]) !!}
            </div>
        </div>
        <div class="mb-5">
            {!! Form::label('details', __('client::cruds.addresses.details'), ['class' => 'form-label']) !!}
            {!! Form::textarea('details', $address->details ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('client::cruds.type-here'), 'rows' => '1']); !!}
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-light-success">
            <i class="fas fa-check-circle"></i>
            @isset($address)
                @lang('client::cruds.update')
            @else
                @lang('client::cruds.create')
            @endisset
        </button>
    </div>
</div>

{!! Form::close() !!}
@endsection

@push('javascript')
@include('client::addresses.scripts')
@endpush
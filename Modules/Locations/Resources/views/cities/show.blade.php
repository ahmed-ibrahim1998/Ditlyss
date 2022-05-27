@extends('admin::layouts.master')
@section('title' , __('locations::cruds.cities.name'))
@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <a href="{{ route('countries.index') }}" class="btn mb-3 btn-sm btn-danger">
            <i class="fas fa-arrow-circle-left"></i> @lang('locations::cruds.back')
        </a>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-map-marker"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('locations::cruds.edit') | {{ $country->getTranslatedField('name') }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-5">
            @forelse ($country->translates as $translate)
            <div class="col-md-4 mb-4 text-center">
                <span class="d-block">
                    @lang('locations::cruds.countries.country_name') ( {{ App\Models\Language::findOrFail($translate->language->id)->name }} ) : 
                </span>
                <span class="mt-3 d-block fw-bolder">
                    {{ $translate->value }} 
                </span>
            </div>
            @empty
                
            @endforelse
            <div class="col-md-4 text-center">
                <span class="d-block">
                    @lang('locations::cruds.created-at') : 
                </span>
                <span class="mt-3 d-block fw-bolder">
                    {{ $country->created_at->toFormattedDateString() }} 
                </span>
            </div>
        </div>

        
        <div class="row">
            <h5 class="mt-5 text-center">@lang('locations::cruds.countries.cities') : </h5>
            <div class="col-md-12 text-center">
                @forelse ($country->cities as $city)
                    @foreach ($city->translates as $trans)
                        <span class="badge mr-2 badge-success">
                            {{ $trans->value }}
                        </span>
                    @endforeach
                @empty
                    @lang('locations::messages.no-data-available')
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
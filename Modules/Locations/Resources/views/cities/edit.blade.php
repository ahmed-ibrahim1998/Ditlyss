@extends('admin::layouts.master')
@section('title' , __('locations::cruds.countries.name'))
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
                <h3 class="card-label">
                    @lang('locations::cruds.edit')
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('cities.update', $city)}}" method="post">
                @csrf
                @method('PUT')
                @foreach(\App\Models\Language::all() as $lang)
                    <x-admin::input-text label="Name in {{$lang->prefix}}" name="name[{{$lang['prefix']}}]" oldValue="{{old('name.'.$lang['prefix'], $city->getTranslation('name', $lang->prefix))}}"></x-admin::input-text>
                @endforeach
                <x-admin::input-select oldValue="{{$city->country_id}}" label="Country" name="country_id" :options="\Modules\Locations\Entities\Country::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
                <button class="btn btn-primary float-right" type="submit"><i class="fa fa-plus"></i>@lang('locations::cruds.update')</button>
            </form>
        </div>
    </div>
@endsection

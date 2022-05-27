@extends('admin::layouts.master')
@section('title' , __('locations::cruds.edit'))
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
            <form action="{{route('areas.update',$area)}}" method="post">
                @csrf
                @method('PUT')
                @foreach(\App\Models\Language::all() as $lang)
                    <x-admin::input-text label="Name in {{$lang->prefix}}" name="name[{{$lang['prefix']}}]" oldValue="{{old('name.'.$lang['prefix'], $area->getTranslation('name', $lang->prefix))}}"></x-admin::input-text>
                @endforeach
                <x-admin::input-select label="City" name="city_id" :options="\Modules\Locations\Entities\City::all()" optionsValueField="id" optionsDisplayField="name" oldValue="{{$area->city_id}}"></x-admin::input-select>
                <x-admin::input-number label="{{trans('locations::cruds.areas.delivery_fees')}}" name="delivery_fees" oldValue="{{old('delivery_fees', $area->delivery_fees)}}"></x-admin::input-number>

                <button class="btn btn-primary float-right" type="submit"><i class="fa fa-plus"></i>@lang('locations::cruds.update')</button>
            </form>
        </div>
    </div>
@endsection

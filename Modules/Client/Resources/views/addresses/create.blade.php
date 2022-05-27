@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6 mb-5">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-credit-card"></i>
                </span>
                <h3 class="card-label">{{trans('client::cruds.add-new-address')}}</h3>
            </div>
            <div class="card-toolbar">
                <div class="ml-3">
                    <a class="btn btn-light-primary" href="{{route('addresses.index')}}">
                        <i class="fa fa-list"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 ">
            <form action="{{route('address.store')}}" method="post">
                @csrf
                @foreach(\App\Models\Language::all() as $lang)
                    <x-admin::input-text name="title[{{$lang['prefix']}}]" label="{{trans('client::cruds.addresses.title')}} in {{$lang['prefix']}}" oldValue="{{old('phone.'.$lang->prefix, '')}}"></x-admin::input-text>
                @endforeach
                <div class="form-row">
                    <label class="form-label" for="user_id">{{trans('client::cruds.client')}}</label>
                    <select name="client_id" class="form-select form-select-lg form-select-solid" id="user_id" data-control="select2" data-placeholder="Select an option">
                        @foreach(\App\Models\User::whereIs('client')->get() as $item)
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <x-admin::input-text name="phone" label="{{trans('client::cruds.phone')}}" oldValue="{{old('phone', '')}}"></x-admin::input-text>

                <div class="form-row">
                    <label class="form-label" for="area_id">{{trans('client::cruds.area')}}</label>
                    <select name="area_id" class="form-select form-select-lg form-select-solid" id="area_id" data-control="select2" data-placeholder="Select an option">
                        @foreach(\Modules\Locations\Entities\Area::with('city.country')->get() as $item)
                            <option value="{{$item['id']}}">{{$item['name']}}, {{$item->city->name??''}}, {{$item->city->country->name??''}}</option>
                        @endforeach
                    </select>
                </div>

                <x-admin::input-text name="block" label="{{trans('client::cruds.addresses.block')}}" oldValue="{{old('block', '')}}"></x-admin::input-text>
                <x-admin::input-text name="avenue" label="{{trans('client::cruds.addresses.avenue')}}" oldValue="{{old('avenue', '')}}"></x-admin::input-text>
                <x-admin::input-text name="street" label="{{trans('client::cruds.addresses.street')}}" oldValue="{{old('street', '')}}"></x-admin::input-text>
                <x-admin::input-text name="building" label="{{trans('client::cruds.addresses.building-no')}}" oldValue="{{old('building', '')}}"></x-admin::input-text>
                <x-admin::input-text name="floor" label="{{trans('client::cruds.addresses.floor-no')}}" oldValue="{{old('floor', '')}}"></x-admin::input-text>
                <x-admin::input-text name="flat" label="{{trans('client::cruds.addresses.flat-no')}}" oldValue="{{old('flat', '')}}"></x-admin::input-text>
                <x-admin::input-text name="details" label="{{trans('client::cruds.addresses.details')}}" oldValue="{{old('details', '')}}"></x-admin::input-text>

                <button type="submit" class="btn btn-success">{{trans('admin::cruds.save')}}</button>
            </form>
        </div>
    </div
@endsection

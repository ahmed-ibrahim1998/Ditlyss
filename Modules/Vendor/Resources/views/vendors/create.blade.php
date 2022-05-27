@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('vendor.store')}}" enctype="multipart/form-data">
                    @csrf
                    <x-admin::input-image name="logo" lable="{{__('vendor::cruds.logo')}}"></x-admin::input-image>
                    <livewire:vendor::vendor-user></livewire:vendor::vendor-user>

                    <div class="form-group mb-5">
                        <label for="users">{{__('vendor::cruds.vendors.categories')}}</label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="categories[]" multiple="multiple">
                            @foreach(\Modules\Vendor\Entities\Category::all() as $item)
                                <option value="{{$item['id']}}" {{in_array($item['id'], old('users', [])) ? 'selected':'' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group mb-5">
                        <label for="">{{__('vendor::cruds.vendors.order')}}</label>
                        <input type="number" name="ordering" id="ordering" class="form-control form-control-solid">
                        @error('ordering')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">{{trans('vendor::cruds.vendors.phone')}}</label>
                        <input type="text" name="phone" id="ordering" class="form-control form-control-solid">
                    </div>

                    <div class="form-group mb-5">
                        <label for="">{{trans('vendor::cruds.vendors.address')}}</label>
                        <input type="text" name="address" id="address" class="form-control form-control-solid">
                    </div>

                    <div class="form-group mb-5">
                        <label for="">{{trans('vendor::cruds.vendors.commission')}}</label>
                        <input type="number" name="commission" id="address" class="form-control form-control-solid">
                        @error('commission')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
<<<<<<< HEAD
                    <x-admin::input-switch name="is_active" label="{{trans('vendor::cruds.vendors.is_active')}}"></x-admin::input-switch>
                    <x-admin::input-switch name="is_featured" label="{{trans('vendor::cruds.vendors.is_featured')}}"></x-admin::input-switch>
=======

                    <div class="form-group mb-5">
                        <label for="methods">PaymentMethods: </label>
                        <select id="methods" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="methods[]" multiple="multiple">
                            @foreach(\Modules\Vendor\Entities\PaymentMethod::all() as $item)
                                <option value="{{$item['id']}}" {{in_array($item['id'], old('methods', [])) ? 'selected':'' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <x-admin::input-switch name="is_active" label="Is Active"></x-admin::input-switch>
                    <x-admin::input-switch name="can_deliver" label="Will Deliver"></x-admin::input-switch>
>>>>>>> 2b3e311958e5ce40c6ba9fb2b3271533ef56ffbd
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection

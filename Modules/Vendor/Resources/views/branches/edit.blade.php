@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize">create new branch</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('branch.update', $branch)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid" value="{{$branch->getTranslation('name', $lang->prefix)}}">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group mb-5">
                        <label for="users">Vendor: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="vendor_id">
                            @foreach(\Modules\Vendor\Entities\Vendor::all() as $vendor )
                                <option value="{{ $vendor['id']}}" {{$vendor['id']===$branch['vendor_id'] ? 'selected':''}}>{{ $vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <label for="users">Area: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="area_id">
                            @foreach(\Modules\Locations\Entities\Area::all() as $item)
                                <option value="{{ $item['id']}}" {{$item['id']===$branch['area_id'] ? 'selected':''}}>{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mb-5">
                        <label for="users">Status: </label>
                        <input type="text" name="status" value="{{$branch['status']}}" class="form-control form-control-solid">
                    </div>

                    <x-admin::input-number name="long" label="Lat" oldValue="{{$branch['lat']}}"></x-admin::input-number>
                    <x-admin::input-number name="lat" label="Long" oldValue="{{$branch['long']}}"></x-admin::input-number>
                    <x-admin::input-text name="address" label="Address" oldValue="{{$branch['address']}}"></x-admin::input-text>
                    <x-admin::input-number name="delivery_time" label="Delivery time" oldValue="{{$branch['delivery_time']}}"></x-admin::input-number>
                    <x-admin::input-text name="description" label="Description" oldValue="{{$branch['description']}}"></x-admin::input-text>


                    <x-admin::input-switch name="is_featured" label="Is Featured" oldValue="{{$branch['is_featured']}}"></x-admin::input-switch>
                    <x-admin::input-switch name="is_active" label="Is Active" oldValue="{{$branch['is_active']}}"></x-admin::input-switch>

                    <livewire:vendor::area-branch-delivery :areas="$areas"></livewire:vendor::area-branch-delivery>

                    <button class="btn btn-success float-right" type="submit">{{__('vendor::cruds.update')}}</button>
                </form>
            </div>
        </div>
    </div>



@endsection

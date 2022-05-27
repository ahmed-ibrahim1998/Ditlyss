@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize">create new branch</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('branch.store')}}" enctype="multipart/form-data">
                    @csrf

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
                        <label for="users">Vendor: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="vendor_id">
                            @foreach(\Modules\Vendor\Entities\Vendor::all() as $vendor )
                                <option value="{{ $vendor['id']}}" {{$vendor['id']===old('vendor_id') ? 'selected':''}}>{{ $vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <label for="users">Area: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="area_id">
                            @foreach(\Modules\Locations\Entities\Area::all() as $item)
                                <option value="{{ $item['id']}}" {{$item['id']===old('$item') ? 'selected':''}}>{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mb-5">
                        <label for="users">Status: </label>
                        <input type="text" name="status" value="{{old('status')}}" class="form-control form-control-solid">
                    </div>

                    <x-admin::input-number name="long" label="Lat"></x-admin::input-number>
                    <x-admin::input-number name="lat" label="Long"></x-admin::input-number>
                    <x-admin::input-text name="address" label="Address"></x-admin::input-text>
                    <x-admin::input-number name="delivery_time" label="Delivery time"></x-admin::input-number>

                    <div class="form-group mb-5">
                        <label for="users">Cuisines: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="cuisines[]" multiple="multiple">
                            @foreach(\Modules\Vendor\Entities\Cuisine::all() as $item)
                                <option value="{{$item['id']}}" {{in_array($item['id'], old('cuisines', []), true) ? 'selected':'' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-admin::input-text name="description" label="Description"></x-admin::input-text>

                    <div class="form-group mb-5">
                        <label for="users">Active</label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="is_active">
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>

                    <x-admin::input-switch name="is_featured" label="Is Featured" oldValue="0"></x-admin::input-switch>

{{--                    <x-admin::input-switch name="is_active" label="Is Active" oldValue="0"></x-admin::input-switch>--}}
                    <livewire:vendor::area-branch-delivery></livewire:vendor::area-branch-delivery>

                        <button class="btn btn-success float-right" type="submit">{{__('vendor::cruds.create')}}</button>
                </form>
            </div>
        </div>
    </div>



@endsection

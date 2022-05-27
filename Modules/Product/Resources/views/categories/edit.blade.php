@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-capitalize">
                            Edit category
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product-category.update', $productCategory)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <x-admin::input-image name="logo" url="{{$productCategory->getFirstMediaUrl('product-category')}}"></x-admin::input-image>

                            @foreach(\App\Models\Language::all() as $lang)
                                <x-admin::input-text oldValue="{{$productCategory->getTranslation('name', $lang->prefix)}}" name="name[{{$lang->prefix}}]" :label="trans('product::cruds.categories.category-name') . ' in ' . $lang->prefix"></x-admin::input-text>
                            @endforeach

                            <x-admin::input-number name="ordering" label="{{trans('product::cruds.categories.ordering')}}" oldValue="{{$productCategory->ordering}}"></x-admin::input-number>
                            <x-admin::input-switch name="is_active" label="{{trans('product::cruds.categories.is_active')}}" oldValue="{{$productCategory->is_active}}"></x-admin::input-switch>
                            <x-admin::input-switch name="is_featured" label="{{trans('product::cruds.categories.is_featured')}}" oldValue="{{$productCategory->is_featured}}"></x-admin::input-switch>

                            <button type="submit" class="btn btn-success float-right">{{trans('product::cruds.update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

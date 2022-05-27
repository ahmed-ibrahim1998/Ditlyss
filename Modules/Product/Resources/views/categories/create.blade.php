@extends('admin::layouts.master')
@section('title', isset($productCategory) ? __('product::cruds.edit') : __('product::cruds.categories.add-new-category'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            @lang('product::cruds.categories.add-new-category')
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product-category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <x-admin::input-image name="logo"></x-admin::input-image>

                            @foreach(\App\Models\Language::all() as $lang)
                                <x-admin::input-text name="name[{{$lang->prefix}}]" :label="trans('product::cruds.categories.category-name') . ' in ' . $lang->prefix"></x-admin::input-text>
                            @endforeach

                            <x-admin::input-number name="ordering" label="{{trans('product::cruds.categories.ordering')}}"></x-admin::input-number>
                            <x-admin::input-switch name="is_active" label="{{trans('product::cruds.categories.is_active')}}"></x-admin::input-switch>
                            <x-admin::input-switch name="is_featured" label="{{trans('product::cruds.categories.is_featured')}}"></x-admin::input-switch>
                            <button type="submit" class="btn btn-success float-right">{{trans('product::cruds.create')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

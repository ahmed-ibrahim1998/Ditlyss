@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize">create new Cuisine</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('category.update',$category)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-admin::input-image name="logo" url="{{$category->getFirstMediaUrl('logo')}}"></x-admin::input-image>

                @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid" value="{{$category->getTranslation('name', $lang->prefix)}}">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach
                    <x-admin::input-switch name="is_featured" label="{{trans('vendor::cruds.categories.is_featured')}}" oldValue="{{$category->is_featured}}"></x-admin::input-switch>

                    <button class="btn btn-success float-right" type="submit">{{__('vendor::cruds.edit')}}</button>
                </form>
            </div>
        </div>
    </div>



@endsection

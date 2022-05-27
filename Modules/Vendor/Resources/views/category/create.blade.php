@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <x-admin::input-image name="logo"></x-admin::input-image>


                    @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach

                    <x-admin::input-switch name="is_featured" label="{{trans('vendor::cruds.categories.is_featured')}}"></x-admin::input-switch>

                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection

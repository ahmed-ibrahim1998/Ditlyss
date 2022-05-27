@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize">create new Cuisine</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('cuisine.update', $cuisine)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid" value="{{$cuisine->getTranslation('name', $lang->prefix)}}">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach

                    <button class="btn btn-success float-right" type="submit">{{__('vendor::cruds.edit')}}</button>
                </form>
            </div>
        </div>
    </div>



@endsection

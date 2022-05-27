@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('trainer.update', $trainer)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-admin::input-image name="logo" lable="{{trans('trainers::cruds.trainers.logo')}}" url="{{$trainer->getFirstMediaUrl('logo')}}"></x-admin::input-image>


                    @foreach(\App\Models\Language::all() as $lang)
                        <div class="form-group mb-5">
                            <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                            <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid" value="{{old("name[$lang->prefix]", $trainer->getTranslation('name',$lang->prefix))}}">
                            @error("name.$lang->prefix")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group mb-5">
                        <label for="">{{__('trainers::cruds.trainers.price')}}</label>
                        <input type="number" name="price" id="price" class="form-control form-control-solid" value="{{old('specialty', $trainer->price)}}">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">{{__('trainers::cruds.trainers.specialty')}}</label>
                        <input type="text" name="specialty" id="specialty" class="form-control form-control-solid" value="{{old('specialty', $trainer->specialty)}}">
                        @error('specialty')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">{{__('trainers::cruds.trainers.definition')}}</label>
                        <textarea type="text" name="definition" id="definition" class="form-control form-control-solid">{{$trainer->definition   }}></textarea>
                        @error('definition')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <x-admin::input-switch name="is_active" label="{{trans('trainers::cruds.trainers.is_active')}}" oldValue="{{$trainer->is_active}}"></x-admin::input-switch>
                    <x-admin::input-switch name="is_featured" label="{{trans('trainers::cruds.trainers.is_featured')}}" oldValue="{{$trainer->is_featured}}"></x-admin::input-switch>
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>

                </form>
            </div>
        </div>
    </div>



@endsection

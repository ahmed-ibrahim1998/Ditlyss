@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize">
                    <a href="{{route('trainer.index')}}"><i class="fas fa-user"></i></a>
                    <h3 class="card-label">@lang('trainers::cruds.trainer')</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{__('trainers::cruds.trainers.name')}}</td>
                        <td>{{$trainer->name}}</td>
                    </tr>

                    <tr>
                        <td>{{__('trainers::cruds.trainers.price')}}</td>
                        <td>{{$trainer->price}}</td>
                    </tr>


                    <tr>
                        <td>{{__('trainers::cruds.trainers.specialty')}}</td>
                        <td>{{$trainer->specialty}}</td>
                    </tr>
                    <tr>
                        <td>{{__('trainers::cruds.trainers.definition')}}</td>
                        <td>{{$trainer->definition}}</td>
                    </tr>
                    <tr>
                        <td>{{__('trainers::cruds.trainers.logo')}}</td>
                        <td>
                            <img src="{{$trainer->getFirstMediaUrl('logo')}}" alt="logo" width="100" height="100" class="image-input-circle">
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('trainers::cruds.trainers.is_active')}}</td>
                        <td>
                            @if($trainer->is_active)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>{{__('trainers::cruds.trainers.is_featured')}}</td>
                        <td>
                            @if($trainer->is_featured)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

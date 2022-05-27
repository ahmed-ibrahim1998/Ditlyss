@extends('admin::layouts.master')
@section('title' , __('locations::cruds.countries.name'))
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
                <h3 class="card-label">
                    @lang('locations::cruds.countries.create-new-country')
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('countries.store')}}" method="post">
                @csrf
                @foreach(\App\Models\Language::all() as $lang)
                    <x-admin::input-text label="Name in {{$lang->prefix}}" name="name[{{$lang['prefix']}}]" oldValue="{{old('name.'.$lang['prefix'], '')}}"></x-admin::input-text>
                @endforeach
                <x-admin::input-text label="phone code" name="number_prefix" oldValue="{{old('number_prefix', '')}}"></x-admin::input-text>
                <button class="btn btn-primary float-right" type="submit"><i class="fa fa-plus"></i>@lang('locations::cruds.create')</button>
            </form>
        </div>
    </div>
@endsection

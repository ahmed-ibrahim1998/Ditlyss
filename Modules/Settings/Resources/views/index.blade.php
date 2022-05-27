@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <x-admin::form :route="route('settings.update')" method="POST">
                    <x-admin::input-text :oldValue="old('name',$settings->name )" name="name" label="Name"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('meta_tags',$settings->meta_tags )" name="meta_tags" label="Meta tags seperated by a comma ,"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('phone',$settings->phone )" name="phone" label="Phone"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('email',$settings->email )" name="email" label="Email"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('fax',$settings->fax )" name="fax" label="Fax"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('logo',$settings->logo )" name="logo" label="Logo"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('ios_link',$settings->ios_link )" name="ios_link" label="Ios link"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('android_link',$settings->android_link )" name="android_link" label="Android link"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('facebook',$settings->facebook )" name="facebook" label="Facebook"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('instagram',$settings->instagram )" name="instagram" label="Instagram"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('twitter',$settings->twitter )" name="twitter" label="Twitter"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('linkedin',$settings->linkedin )" name="linkedin" label="Linkedin"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('pinterest',$settings->pinterest )" name="pinterest" label="Pinterest"></x-admin::input-text>
                    <x-admin::input-text :oldValue="old('description',$settings->description )" name="description" label="Description"></x-admin::input-text>
                </x-admin::form>
            </div>
        </div>
    </div>
@endsection

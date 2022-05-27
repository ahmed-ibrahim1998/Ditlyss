@extends('admin::layouts.master')

@section('title' , __('coupon::menu.coupons'))

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('coupon.name') !!}
    </p>
@endsection

@extends('admin::layouts.master')
@section('content')
    <livewire:product::product-attributes></livewire:product::product-attributes>
@endsection
@push('css')
    <style>
        [type='checkbox']:checked, [type='radio']:checked {
            background-size: auto;
        }
    </style>
@endpush

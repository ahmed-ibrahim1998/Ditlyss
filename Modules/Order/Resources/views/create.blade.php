@extends('admin::layouts.master')
@section('title', __('order::menu.orders'))
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
                <h3 class="card-label">
                    @lang('order::cruds.add-new-order')
                </h3>
            </div>
        </div>
        <div class="card-body">
            <livewire:order::order-create></livewire:order::order-create>
        </div>
    </div>
@endsection

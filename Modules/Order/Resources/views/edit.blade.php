@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <livewire:order::order-create :order="$order->load('branch.vendor', 'products')"></livewire:order::order-create>
            </div>
        </div>
    </div>
@endsection

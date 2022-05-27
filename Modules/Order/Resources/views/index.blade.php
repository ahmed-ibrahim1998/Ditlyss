@extends('admin::layouts.master')
@section('title', __('order::cruds.orders'))
@section('content')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6 mb-5">
            <!--begin::Card title-->
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-credit-card"></i>
                </span>
                <h3 class="card-label">@lang('order::cruds.orders')</h3>
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--end::Search-->
                <div class="ml-3">
                    <a class="btn btn-light-primary" href="{{route('order.create')}}">
                        <i class="fa fa-plus"></i>
                        @lang('order::cruds.add-new-order')
                    </a>
                </div>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 ">
            <div class="table-responsive mb-5">
                <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="orders_table">
                    <thead>
                    <!--begin::Table row-->
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                        <th class="text-capitalize">id</th>
                        <th class="text-capitalize">@lang('order::cruds.customer')</th>
                        <th class="text-capitalize">@lang('order::cruds.driver')</th>
                        <th class="text-capitalize">vendor</th>
                        <th class="text-capitalize">@lang('order::cruds.branch')</th>
                        <th class="text-capitalize">@lang('order::cruds.status')</th>
                        <th class="text-capitalize">@lang('order::cruds.address')</th>
                        <th class="text-capitalize">@lang('order::cruds.subtotal')</th>
                        <th class="text-capitalize">@lang('order::cruds.delivery_fees')</th>
                        <th class="text-capitalize">@lang('order::cruds.total')</th>
                        <th class="text-capitalize">@lang('order::cruds.actions')</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                </table>
            </div>
        </div>
        <!--end::Card body-->
    </div>

    @component('order::components.delete-component.delete-modal') @endcomponent


@endsection

@push('javascript')
    <script>
        $('#orders_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('order.index')}}",
            search: true,
            columns: [
                {data: 'id'},
                {data: 'client_id', orderable: false},
                {data: 'driver_id', defaultContent: ''},
                {data: 'vendor'},
                {data: 'branch_id'},
                {data: 'status_id'},
                {data: 'address'},
                {data: 'subtotal'},
                {data: 'delivery_fees'},
                {data: 'total'},
                {data: 'actions', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush

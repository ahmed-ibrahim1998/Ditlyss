@extends('admin::layouts.master')
@section('title' , __('client::menu.all-clients'))
@section('content')

@if ($errors->any())
    <div class="alert alert-danger fw-bolder mb-0 pb-0">
        <ul type="disc">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6 mb-5">
        <!--begin::Card title-->
        <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-users"></i>
                </span>
            <h3 class="card-label">@lang('client::menu.clients')</h3>
        </div>
        <!--begin::Client toolbar-->
        <div class="card-toolbar">
            <!--end::Search-->
            <div class="ml-3">
                <a class="btn btn-light-primary" href="{{route('all-clients.create')}}">
                    <i class="fas fa-user-plus"></i>
                    @lang('client::cruds.add-new-client')
                </a>
            </div>
        </div>
        <!--end::Client toolbar-->
    </div>
    <!--end::Client header-->
    <!--begin::Client body-->
    <div class="card-body pt-0 ">
        <div class="table-responsive mb-5">
            <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="clients_table">
                <thead>
                <!--begin::Table row-->
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                    <th class="text-capitalize">@lang('client::cruds.profile-photo')</th>
                    <th class="text-capitalize">@lang('client::cruds.name')</th>
                    <th class="text-capitalize">@lang('client::cruds.email')</th>
                    <th class="text-capitalize">@lang('client::cruds.phone')</th>
                    <th class="text-capitalize">@lang('client::cruds.age')</th>
                    <th class="text-capitalize">@lang('client::cruds.height')</th>
                    <th class="text-capitalize">@lang('client::cruds.weight')</th>
                    <th class="text-capitalize">@lang('client::cruds.physical_activity')</th>
                    <th class="text-capitalize">@lang('client::cruds.orders-count')</th>
                    <th class="text-capitalize">@lang('client::cruds.addresses-count')</th>
                    <th class="text-capitalize">@lang('client::cruds.actions')</th>
                </tr>
                <!--end::Table row-->
                </thead>
            </table>
        </div>
    </div>
    <!--end::Client body-->
</div>

@component('client::components.delete-component.delete-modal') @endcomponent
@endsection

@push('javascript')

  <script>
        $('#clients_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('client.index')}}",
            search: true,
            columns: [
                {data: 'id'},
                {data: 'client_id', orderable: false},
                {data: 'DT_RowIndex', profile_photo_path: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'age', name: 'age'},
                {data: 'height', name: 'height'},
                {data: 'weight', name: 'weight'},
                {data: 'height', name: 'height'},
                {data: 'physical_activity', name: 'physical_activity'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    </script>
{{--  @component('client::components.delete-component.delete-function')--}}
{{--      @slot('route', 'all-clients.destroy')--}}
{{--  @endcomponent--}}
@endpush
{{--<div class="card card-custom shadow-sm">--}}
{{--    <div class="card-header bg-light">--}}
{{--        <div class="card-title">--}}
{{--        <span class="card-icon">--}}
{{--            <i class="fas fa-users"></i>--}}
{{--        </span>--}}
{{--            <h3 class="card-label fw-bolder">@lang('client::menu.clients')</h3>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <a href="{{ route('all-clients.create') }}" class="btn btn-light-primary float-end mb-3">--}}
{{--                    <i class="fas fa-user-plus"></i> @lang('client::cruds.add-new-client')--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="table-responsive">--}}
{{--            <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded">--}}
{{--                <thead>--}}
{{--                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">--}}
{{--                        <th>@lang('client::cruds.profile-photo')</th>--}}
{{--                        <th>@lang('client::cruds.name')</th>--}}
{{--                        <th>@lang('client::cruds.email')</th>--}}
{{--                        <th>@lang('client::cruds.phone')</th>--}}
{{--                        <th>@lang('client::cruds.age')</th>--}}
{{--                        <th>@lang('client::cruds.height')</th>--}}
{{--                        <th>@lang('client::cruds.weight')</th>--}}
{{--                        <th>@lang('client::cruds.physical_activity')</th>--}}
{{--                        <th>@lang('client::cruds.orders-count')</th>--}}
{{--                        <th>@lang('client::cruds.addresses-count')</th>--}}
{{--                        <th>@lang('client::cruds.actions')</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                    @forelse ($clients as $client)--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <img class="mx-auto" src="{{ asset($client->profile_photo_path != NULL ? $client->profile_photo_path : 'media/images/profile-pictures/user.png') }}" width="50" alt="Profile Photo">--}}
{{--                        </td>--}}
{{--                        <td>{{ $client->name }}</td>--}}
{{--                        <td>{{ $client->email }}</td>--}}
{{--                        <td>{{ $client->phone != NULL ? $client->phone : __('client::messages.not-available') }}</td>--}}
{{--                        <td>{{ $client->age != NULL ? $client->age : __('client::messages.not-available') }}</td>--}}
{{--                        <td>{{ $client->height != NULL ? $client->height : __('client::messages.not-available') }}</td>--}}
{{--                        <td>{{ $client->weight != NULL ? $client->weight : __('client::messages.not-available') }}</td>--}}
{{--                        <td>{{ $client->physical_activity != NULL ? $client->physical_activity : __('client::messages.not-available') }}</td>--}}
{{--                        <td>{{ $client->orders()->count() }}</td>--}}
{{--                        <td>{{ $client->addresses()->count() }}</td>--}}
{{--                        <td>--}}
{{--                            <a href="{{ route('all-clients.edit', $client->id) }}" class="btn btn-icon btn-light-success">--}}
{{--                                <i class="fas fa-edit"></i>--}}
{{--                            </a>--}}
{{--                            @component('client::components.delete-component.button')--}}
{{--                                @slot('id',$client->id)--}}
{{--                            @endcomponent--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @empty--}}
{{--                    <tr>--}}
{{--                        <td colspan="6">--}}
{{--                            @lang('client::messages.no-data-available')--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @endforelse--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

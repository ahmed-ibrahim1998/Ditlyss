@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6 mb-5">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-credit-card"></i>
                </span>
                <h3 class="card-label">{{trans('client::cruds.add-new-address')}}</h3>
            </div>
            <div class="card-toolbar">
                <div class="ml-3">
                    <a class="btn btn-light-primary" href="{{route('addresses.create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 ">
            <div class="table-responsive mb-5">
                <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="addresses_id">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                        <th class="text-capitalize">id</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.title')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.client')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.area')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.phone')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.block')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.avenue')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.street')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.building-no')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.floor-no')}}</th>
                        <th class="text-capitalize">{{trans('client::cruds.addresses.flat-no')}}</th>
                        <th class="text-capitalize">{{trans('order::cruds.actions')}}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div
@endsection

@push('javascript')
    <script>
        $('#addresses_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('addresses.index')}}",
            search: true,
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'client_id'},
                {data: 'area_id'},
                {data: 'phone'},
                {data: 'block'},
                {data: 'avenue'},
                {data: 'street'},
                {data: 'building'},
                {data: 'floor'},
                {data: 'flat'},
                {data: 'actions', orderable: false, searchable: false},
            ]
        });

        function deleteAddress(event) {
            if (confirm('are you sure?')) {

            } else {
                event.preventDefault();
            }
        }

    </script>
@endpush

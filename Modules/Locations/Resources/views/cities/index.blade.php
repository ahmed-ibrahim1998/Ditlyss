@extends('admin::layouts.master')

@section('title' , __('locations::cruds.countries.name'))

@section('content')
    <div class="card card-custom shadow-sm" xmlns="">
        <div class="card-header bg-light">
            <div class="card-title d-flex w-100 justify-content-between">
                <div>
                    <span class="card-icon d-inline"><i class="fas fa-map-marker"></i></span>
                    <h3 class="card-label fw-bolder d-inline">@lang('locations::cruds.cities.name')</h3>
                </div>
                <a href="{{route('cities.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-5">
                <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="cities_table">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                        <th class="text-capitalize">id</th>
                        <th class="text-capitalize">@lang('locations::cruds.cities.name')</th>
                        <th class="text-capitalize">@lang('locations::cruds.cities.areas-count')</th>
                        <th class="text-capitalize">@lang('locations::cruds.countries.name')</th>
                        <th class="text-capitalize">@lang('locations::cruds.actions')</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
        $('#cities_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('cities.index')}}",
            search: true,
            columns: [
                {data: 'id'},
                {data: 'name', orderable: false},
                {data: 'areas_count'},
                {data: 'country_id'},
                {data: 'actions', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush

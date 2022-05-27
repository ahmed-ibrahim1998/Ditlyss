@extends('admin::layouts.master')
@section('title', __('product::menu.product_cat'))
@section('content')
    <div class="card card-custom shadow-sm">
        <div class="card-header bg-light">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-list"></i>
            </span>
                <h3 class="card-label fw-bolder">@lang('product::menu.product_cat')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-right">
                    @can('product-category.create')
                        <a href="{{ route('product-category.create') }}" class="btn btn-light-primary float-end mb-3">
                            <i class="fas fa-plus-circle"></i> @lang('product::cruds.categories.add-new-category')
                        </a>
                    @endcan
                </div>
            </div>
            <table class="table table-bordered table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="cat_table">
                <thead class="bg-light">
                <tr>
                    <th class="fw-bolder">Id</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.name')</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.photo')</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.products-count')</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.ordering')</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.is_active')</th>
                    <th class="fw-bolder">@lang('product::cruds.categories.is_featured')</th>
                    <th class="fw-bolder">@lang('product::cruds.actions')</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
        $('#cat_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('product-category.index')}}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'photo'},
                {data: 'count'},
                {data: 'ordering'},
                {data: 'is_active'},
                {data: 'is_featured'},
                {data: 'actions'}
            ],
        });
    </script>
    <script>
        function deleteItem(event) {
            if (confirm('are you sure?')) {

            } else {
                event.preventDefault();
            }
        }
    </script>
@endpush

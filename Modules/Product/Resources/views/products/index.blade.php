@extends('admin::layouts.master')
@section('title', __('product::menu.products'))
@section('content')
    <div class="card card-custom shadow-sm">
        <div class="card-header bg-light">
            <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-gifts"></i>
            </span>
                <h3 class="card-label fw-bolder">@lang('product::menu.products')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-light-primary float-end mb-3">
                        <i class="fas fa-plus-circle"></i> @lang('product::cruds.products.add-new-product')
                    </a>
                </div>
            </div>
            <table class="table table-bordered table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="product_table">
                <thead class="bg-light">
                <tr>
                    <th class="fw-bolder">ID</th>
                    <th class="fw-bolder">@lang('product::cruds.products.name')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.photo')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.category')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.branch')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.price')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.active')</th>
                    <th class="fw-bolder">@lang('product::cruds.products.over-all-rating')</th>
                    <th class="fw-bolder">@lang('product::cruds.actions')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @component('product::components.delete-component.delete-modal') @endcomponent
@endsection
@push('javascript')
    <script>
        $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('products.index')}}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'photo'},
                {data: 'cat_id'},
                {data: 'branch_id'},
                {data: 'price'},
                {data: 'is_active'},
                {data: 'overall_rating'},
                {data: 'actions'}
            ],
        });
    </script>
    <script>
        function deleteVendor(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            })
        }
    </script>
@endpush

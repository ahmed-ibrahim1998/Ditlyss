@extends('admin::layouts.master')
@section('content')

    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6 mb-5">
                    <!--begin::Card title-->
                    <div class="card-title">

                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->

                        <!--end::Search-->
                        <div class="ml-3">
                            <a class="btn btn-primary" href="{{route('category.create')}}"><i class="fa fa-plus"></i>{{__('vendor::cruds.create')}}</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 ">
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="vendors_table">
                            <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                                <th class="text-capitalize">Id</th>
                                <th class="text-capitalize">{{trans('vendor::cruds.categories.name')}}</th>
                                <th class="text-capitalize">{{trans('vendor::cruds.categories.logo')}}</th>
                                <th class="text-capitalize">{{trans('vendor::cruds.categories.is_featured')}}</th>
                                <th class="text-capitalize">{{trans('vendor::cruds.actions')}}</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('javascript')
    <script>
        $('#vendors_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('category.index')}}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'logo'},
                {data: 'is_featured'},
                {data: 'actions'}
            ],
        });
    </script>
    <script>
        function deleteVendor(event) {
            if (confirm('are you sure?')) {

            } else {
                event.preventDefault();
            }
        }
    </script>
@endpush

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
                        <span class="card-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <h3 class="card-label">@lang('trainers::cruds.trainer')</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->

                        <!--end::Search-->
                        <div class="ml-3">
                            <a class="btn btn-primary" href="{{route('trainer.create')}}"><i class="fa fa-plus"></i>{{__('trainers::cruds.create')}}</a>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 ">
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="trainers_table">
                            <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                                <th class="text-capitalize">Id</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.logo')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.name')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.price')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.is_active')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.is_featured')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.specialty')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.trainers.definition')}}</th>
                                <th class="text-capitalize">{{trans('trainers::cruds.actions')}}</th>
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
        $('#trainers_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('trainer.index')}}",
            columns: [
                {data: 'id'},
                {data: 'logo'},
                {data: 'name'},
                {data: 'price'},
                {data: 'is_active'},
                {data: 'is_featured'},
                {data: 'specialty'},
                {data: 'definition'},
                {data: 'actions'}
            ],
        });
    </script>
    <script>
        function deleteTrainer(event) {
            if (confirm('are you sure?')) {

            } else {
                event.preventDefault();
            }
        }
    </script>
@endpush

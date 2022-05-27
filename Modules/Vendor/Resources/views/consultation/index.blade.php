@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6 mb-5">
            <!--begin::Card title-->
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-users"></i>
                </span>
                <h3 class="card-label">@lang('vendor::cruds.consultations')</h3>
            </div>
            <!--begin::Client toolbar-->
            <div class="card-toolbar">
                <!--end::Search-->
                <div class="ml-3">
                    <a class="btn btn-light-primary" href="{{route('consultation.create')}}">
                        <i class="fas fa-plus-circle"></i>
                        @lang('vendor::cruds.add-new-consultation')
                    </a>
                </div>
            </div>
            <!--end::Client toolbar-->
        </div>
        <!--end::Client header-->
        <!--begin::Client body-->
        <div class="card-body pt-0 ">
            <div class="table-responsive mb-5">
                <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="consultations_table">
                    <thead>
                    <!--begin::Table row-->
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                        <th class="text-capitalize">id</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.user_name')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.age')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.height')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.weight')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.gender')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.physical_activity')</th>
                        <th class="text-capitalize">@lang('vendor::cruds.consultation.notes')</th>
                        <th class="text-capitalize">{{__('vendor::cruds.actions')}}</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                </table>
            </div>
        </div>
        <!--end::Client body-->
    </div>
@endsection

@push('javascript')
    <script>
        $('#consultations_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('consultation.index')}}",
            columns: [
                {data: 'id'},
                {data: 'user_id'},
                {data: 'age'},
                {data: 'height'},
                {data: 'weight'},
                {data: 'gender'},
                {data: 'physical_activity'},
                {data: 'additional_notes'},
                {data: 'actions'},
            ],
        });
    </script>
    <script>
        function deleteConsultation(event) {
            if (confirm('are you sure?')) {

            } else {
                event.preventDefault();
            }
        }
    </script>
@endpush

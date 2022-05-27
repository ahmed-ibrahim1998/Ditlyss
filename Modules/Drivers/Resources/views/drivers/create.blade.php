@extends('admin::layouts.master')

@section('title' , __('drivers::cruds.create-new-driver'))

@section('content')


    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
        <span class="card-icon">
            <i class="fas fa-car"></i>
        </span>
                <h3 class="card-label fw-bolder">@lang('drivers::cruds.create-new-driver')</h3>
            </div>
            <div class="card-toolbar">


                <span class="text-muted font-weight-bold mr-4"></span>

                <a href="{{route('drivers.index')}}" class="btn btn-light-primary font-weight-bolder mr-2 ">
                    <i class="las la-angle-left"></i>
                    @lang('drivers::cruds.back')
                </a>
                <div class="btn-group">
                    <button form="driver_form" type="submit" class="btn btn-primary font-weight-bolder">
                        @lang('drivers::cruds.create')
                        <i class="las la-angle-double-right"></i>
                    </button>

                </div>
            </div>
        </div>
        <div class="card-body">

            <form class="form" id="driver_form" action="{{route('drivers.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-10">

                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('/assets/media/avatars/blank.png')}})">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('/assets/media/avatars/blank.png')}})"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                       data-kt-image-input-action="change"
                                       data-bs-toggle="tooltip"
                                       data-bs-dismiss="click"
                                       title="@lang('drivers::cruds.change-avatar')">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="profile_pic" accept=".png, .jpg, .jpeg" value="{{old('profile_pic')}}" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="cancel"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="@lang('drivers::cruds.cancel-avatar')">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="remove"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="@lang('drivers::cruds.remove-avatar')">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.name')</label>
                            <input type="text" class="form-control form-control-solid @error('name')is-invalid @enderror" placeholder="@lang('drivers::cruds.name')" name="name" value="{{old('name')}}"/>

                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.email')</label>
                            <input type="email" class="form-control form-control-solid @error('email')is-invalid @enderror" placeholder="@lang('drivers::cruds.email')" name="email" value="{{old('email')}}"/>

                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <!--begin::Main wrapper-->
                            <div class="fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        @lang('drivers::cruds.password')
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="password" placeholder="" name="password" autocomplete="off" />

                                        <!--begin::Visibility toggle-->
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                              data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>

                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                        <!--end::Visibility toggle-->
                                    </div>
                                    <!--end::Input wrapper-->

                                    <!--begin::Highlight meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Highlight meter-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Hint-->
                                <div class="text-muted">
                                    @lang('drivers::cruds.password-notice')
                                </div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Main wrapper-->
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.latitude')</label>
                            <input type="text" class="form-control form-control-solid @error('lat')is-invalid @enderror" placeholder="@lang('drivers::cruds.latitude')" name="lat" value="{{old('lat')}}"/>

                            @error('lat')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.longitude')</label>
                            <input type="text" class="form-control form-control-solid @error('long')is-invalid @enderror" placeholder="@lang('drivers::cruds.longitude')" name="long" value="{{old('long')}}"/>

                            @error('long')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">@lang('drivers::cruds.subscription-type')</label>
                            <input type="text" class="form-control form-control-solid @error('subscription_type')is-invalid @enderror" placeholder="@lang('drivers::cruds.subscription-type')" name="subscription_type" value="{{old('subscription_type')}}"/>

                            @error('subscription_type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">@lang('drivers::cruds.subscription-value')</label>
                            <!--begin::Dialer-->
                            <div class="position-relative w-md-300px"
                                 data-kt-dialer="true"
                                 data-kt-dialer-min="1"
                                 data-kt-dialer-max="1000"
                                 data-kt-dialer-step="0.1"
                                 data-kt-dialer-decimals="2">

                                <!--begin::Decrease control-->
                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                    <i class="las la-minus"></i>
                                </button>
                                <!--end::Decrease control-->

                                <!--begin::Input control-->
                                <input type="text" class="form-control form-control-solid border-0 ps-12 @error('subscription_value')is-invalid @enderror" data-kt-dialer-control="input" placeholder="Amount" name="subscription_value" value="1.00" />
                                <!--end::Input control-->

                                <!--begin::Increase control-->
                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                    <i class="las la-plus"></i>
                                </button>
                                <!--end::Increase control-->
                            </div>
                            <!--end::Dialer-->

                            @error('subscription_value')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">@lang('drivers::cruds.vehicle')</label>
                            <select class="form-select form-select-solid @error('vehicle_id')is-invalid @enderror" data-control="select2" data-placeholder="Select a vehicle" name="vehicle_id">
                                <option></option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->plate_number}}</option>
                                @endforeach
                            </select>

                            @error('vehicle_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">@lang('drivers::cruds.civil-id')</label>
                            <input type="text" class="form-control form-control-solid @error('civil_id')is-invalid @enderror" placeholder="@lang('drivers::cruds.civil-id')" name="civil_id" value="{{old('civil_id')}}"/>

                            @error('civil_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


{{--                    <!--begin::Form-->--}}
{{--                    <form class="form" action="#" method="post">--}}
{{--                        <!--begin::Input group-->--}}
{{--                        <div class="fv-row">--}}
{{--                            <!--begin::Dropzone-->--}}
{{--                            <div class="dropzone" id="kt_dropzonejs_example_1">--}}
{{--                                <!--begin::Message-->--}}
{{--                                <div class="dz-message needsclick">--}}
{{--                                    <!--begin::Icon-->--}}
{{--                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>--}}
{{--                                    <!--end::Icon-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="ms-4">--}}
{{--                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>--}}
{{--                                        <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Dropzone-->--}}
{{--                        </div>--}}
{{--                        <!--end::Input group-->--}}
{{--                    </form>--}}
{{--                    <!--end::Form-->--}}


{{--                    <x-admin::input-switch name="status" label="Status"></x-admin::input-switch>--}}

                    <div class="form-check form-switch form-check-custom form-check-solid  me-10">
                        <input class="form-check-input h-30px w-50px " type="checkbox" checked  id="driver-status" name="status"/>
                        <label class="form-check-label" for="driver-status">
                            Status
                        </label>
                    </div>



                </div>
            </form>

        </div>
    </div>



@endsection

@push('css')
    <style>
        [type='checkbox']:checked, [type='radio']:checked{
            background-size: auto;
        }
    </style>
@endpush
@push('javascript')
    <script>
        $('#driver-status').on('change', function () {
            this.value = this.checked ? 1 : 0;
        }).change();
    </script>
@endpush

@section('scripts')

    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>

    @if ($errors->any())

        <script>
            Swal.fire({
                title: "{{__('admin/content.not added')}}",
                text: "@foreach ($errors->all() as $error) {{ $error }} @endforeach ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: " @lang('admin/content.confirm')",
                showCancelButton: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        </script>


    @endif

    @if(Session::has('success'))

        <script>
            Swal.fire({
                title: "{{__('admin/content.added successfully')}}",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "<a class='text-white' href='{{route('drivers.index')}}'><i class='la la-arrow-left'></i> @lang('admin/content.back-to-drivers')</a>",
                showCancelButton: true,
                cancelButtonText: "<i class='la la-close'></i> @lang('admin/content.stay')",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-light-primary"
                }
            });
        </script>

    @endif


    @if(Session::has('error'))

        <script>
            Swal.fire({
                title: "{{__('admin/content.not added successfully')}}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "<a class='text-white' href='{{route('drivers.index')}}'><i class='la la-arrow-left'></i> @lang('admin/content.back-to-drivers')</a>",
                showCancelButton: true,
                cancelButtonText: "<i class='la la-close'></i> @lang('admin/content.stay')",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-light-primary"
                }
            });
        </script>

    @endif

@endsection

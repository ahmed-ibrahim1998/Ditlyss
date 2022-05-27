@extends('admin::layouts.master')

@section('title' , __('ads::cruds.update-ad')  .' '. $ad->name)

@section('content')


    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
        <span class="card-icon">
            <i class="fas fa-bars"></i>
        </span>
                <h3 class="card-label fw-bolder">@lang('ads::cruds.update-ad') | {{$ad->name}}</h3>
            </div>
            <div class="card-toolbar">


                <span class="text-muted font-weight-bold mr-4"></span>

                <a href="{{route('ads.index')}}" class="btn btn-light-primary font-weight-bolder mr-2 ">
                    <i class="las la-angle-left"></i>
                    @lang('ads::cruds.back')
                </a>
                <div class="btn-group">
                    <button form="ad_form" type="submit" class="btn btn-primary font-weight-bolder">
                        @lang('ads::cruds.save')
                        <i class="las la-angle-double-right"></i>
                    </button>

                </div>
            </div>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form" id="ad_form" action="{{route('ads.update' , $ad->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('/assets/media/avatars/blank.png')}})">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$ad->photo == NULL ? asset('media/images/ads/blank.png' ) : asset('media/images/ads/' . $ad->photo) }})"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                       data-kt-image-input-action="change"
                                       data-bs-toggle="tooltip"
                                       data-bs-dismiss="click"
                                       title="@lang('ads::cruds.change-avatar')">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="profile_pic" accept=".png, .jpg, .jpeg" value="" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="cancel"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="@lang('ads::cruds.cancel-avatar')">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="remove"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="@lang('ads::cruds.remove-avatar')">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.name')</label>
                            <input type="text" class="form-control form-control-solid @error('name')is-invalid @enderror" placeholder="@lang('ads::cruds.name')" name="name" value="{{$ad->name}}"/>

                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.video-url')</label>
                            <input type="text" class="form-control form-control-solid @error('video_url')is-invalid @enderror" placeholder="@lang('ads::cruds.video-url')" name="video_url" value="{{$ad->video_url}}"/>

                            @error('video_url')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <div class="form-check form-switch form-check-custom form-check-solid  me-10">
                                <input class="form-check-input h-30px w-50px " type="checkbox" @if($ad->is_photo ==1) checked @endif id="is-photo" name="is_photo"/>
                                <label class="form-check-label" for="is-photo">
                                    @lang('ads::cruds.is-photo')
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.url')</label>
                            <input type="text" class="form-control form-control-solid @error('url')is-invalid @enderror" placeholder="@lang('ads::cruds.url')" name="url" value="{{$ad->url}}"/>

                            @error('url')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.position')</label>
                            <input type="number" class="form-control form-control-solid @error('position')is-invalid @enderror" placeholder="@lang('ads::cruds.position')" name="position" value="{{$ad->position}}"/>

                            @error('position')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.location')</label>
                            <input type="number" class="form-control form-control-solid @error('location')is-invalid @enderror" placeholder="@lang('ads::cruds.location')" name="location" value="{{$ad->location}}"/>

                            @error('location')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.priority')</label>
                            <input type="number" class="form-control form-control-solid @error('priority')is-invalid @enderror" placeholder="@lang('ads::cruds.priority')" name="priority" value="{{$ad->priority}}"/>

                            @error('priority')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.link-id')</label>
                            <input type="number" class="form-control form-control-solid @error('link_id')is-invalid @enderror" placeholder="@lang('ads::cruds.link-id')" name="link_id" value="{{$ad->link_id}}"/>

                            @error('link_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('ads::cruds.link-model')</label>
                            <input type="text" class="form-control form-control-solid @error('link_model')is-invalid @enderror" placeholder="@lang('ads::cruds.link-model')" name="link_model" value="{{$ad->link_model}}"/>

                            @error('link_model')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input class="form-check-input h-30px w-50px " type="checkbox" @if($ad->is_active) checked @endif id="ad-status" name="is_active"/>
                        <label class="form-check-label" for="ad-status">
                            @lang('ads::cruds.status')
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
        $('#is-photo').on('change', function () {
            this.value = this.checked ? 1 : 0;
        }).change();

        $('#ad-status').on('change', function () {
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

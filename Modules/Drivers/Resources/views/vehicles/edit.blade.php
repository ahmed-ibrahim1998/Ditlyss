@extends('admin::layouts.master')

@section('title' , __('drivers::cruds.update-vehicle')  .' '. $vehicle->plate_number)

@section('content')


    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
        <span class="card-icon">
            <i class="fas fa-car"></i>
        </span>
                <h3 class="card-label fw-bolder">@lang('drivers::cruds.update-driver') | {{$vehicle->plate_number}}</h3>
            </div>
            <div class="card-toolbar">


                <span class="text-muted font-weight-bold mr-4"></span>

                <a href="{{route('vehicles.index')}}" class="btn btn-light-primary font-weight-bolder mr-2 ">
                    <i class="las la-angle-left"></i>
                    @lang('drivers::cruds.back')
                </a>
                <div class="btn-group">
                    <button form="vehicle_form" type="submit" class="btn btn-primary font-weight-bolder">
                        @lang('drivers::cruds.save')
                        <i class="las la-angle-double-right"></i>
                    </button>

                </div>
            </div>
        </div>
        <div class="card-body">

            <form class="form" id="vehicle_form" action="{{route('vehicles.update' , $vehicle->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">



                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.plate-number')</label>
                            <input type="text" class="form-control form-control-solid @error('plate_number')is-invalid @enderror" placeholder="@lang('drivers::cruds.plate-number')" name="plate_number" value="{{$vehicle->plate_number}}"/>

                            @error('plate_number')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="form-label">@lang('drivers::cruds.licence-expiration')</label>
                            <input class="form-control form-control-solid @error('licence_expired_at')is-invalid @enderror" placeholder="Pick date" id="kt_daterangepicker_3" name="licence_expired_at" value="{{$vehicle->licence_expired_at}}"/>

                            @error('licence_expired_at')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>




                </div>
            </form>

        </div>
    </div>



@endsection


@push('javascript')
    <script>
        $("#kt_daterangepicker_3").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10),
                locale: {
                    format: "YYYY-MM-DD"
                }
            }
        );
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

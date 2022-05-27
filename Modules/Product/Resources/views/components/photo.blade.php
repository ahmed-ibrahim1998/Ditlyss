<div class="col-md-12">
    <div class="mb-10">

        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset($path ?? '/assets/media/avatars/blank.png')}})">
            <!--begin::Image preview wrapper-->
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset($path ?? '/assets/media/avatars/blank.png')}})"></div>
            <!--end::Image preview wrapper-->

            <!--begin::Edit button-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                   data-kt-image-input-action="change"
                   data-bs-toggle="tooltip"
                   data-bs-dismiss="click"
                   title="@lang('drivers::cruds.change-avatar')">
                <i class="bi bi-pencil-fill fs-7"></i>

                <!--begin::Inputs-->
                <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg" value="{{old($name)}}" />
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
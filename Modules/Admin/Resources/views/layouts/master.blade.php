<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
@include('admin::layouts.header')
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
    @include('admin::layouts.sidebar')
    <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid pt-0" id="kt_wrapper">
        @includeWhen(config('admin.layout.is_first_header'),'admin::layouts.firstHeader')
        <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content" class="content container-fluid px-5 mt-5 d-flex flex-column flex-column-fluid">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            @include('admin::layouts.footer')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
@include('admin::layouts.javascript')
</body>
<!--end::Body-->
</html>

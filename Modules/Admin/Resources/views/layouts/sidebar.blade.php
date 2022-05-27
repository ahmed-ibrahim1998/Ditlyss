<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{route('admin.index')}}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-15px logo"/>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <i class="fa fa-angle-double-left rotate-180"></i>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">


                @foreach(config('admin.sideBar.menu') as $menuItem)
                    @if($menuItem['type'] == 'single')
                        <div class="menu-item mt-3">
                            <a href="{{route($menuItem['route'])}}" class="menu-link {{ Route::is($menuItem['route']) ? 'active' : '' }}">
                                <span class="menu-icon">
                                    <i class="{{ $menuItem['icon'] }}"></i>
                                </span>
                                <span class="menu-title">@lang($menuItem['trans_key'])</span>
                            </a>
                        </div>
                    @else
                        <div data-kt-menu-trigger="click" class="menu-item mt-3 menu-accordion @foreach($menuItem['sub_menus'] as $subMenu) {{Route::is($subMenu['route'].'*') ? 'show' : ''}} @endforeach">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="{{ $menuItem['icon']}}"></i>
                            </span>
                            <span class="menu-title">@lang($menuItem['trans_key'])</span>
                            <span class="menu-arrow"></span>
                        </span>
                            @foreach($menuItem['sub_menus'] as $subMenu)

                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is($subMenu['route']) ? 'active' : '' }}" href="{{ route($subMenu['route']) }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                            <span class="menu-title">@lang($subMenu['trans_key'])</span>
                                        </a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
</div>
<!--end::Aside-->

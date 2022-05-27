

@livewireScripts
<script src="{{asset('/js/app.js')}}"></script>

@routes
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/create-app.js')}}"></script>

<!--end::Page Custom Javascript-->
@include('sweetalert::alert')
<!--end::Javascript-->
@stack('javascript')

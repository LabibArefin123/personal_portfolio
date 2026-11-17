@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

<link rel="icon" type="image/png" href="{{ asset('uploads/images/icon.png') }}">
<link rel="stylesheet" href="{{ asset('css/custom_backend.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/global_variables/custom_toaster.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('classes_body', $layoutHelper->makeBodyClasses())
@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">
        <!-- Validation modal -->
        @include('backend.global_modal.validation_modal')
        <!-- Create animation modal -->
        @include('backend.global_modal.create_modal')
        <!-- Edit animation model -->
        @include('backend.global_modal.edit_modal')
        <!-- Delete animation model -->
        @include('backend.global_modal.delete_modal')
        <!-- Global Error Modal -->
        @include('backend.global_modal.global_error_modal')
        {{-- Preloader --}}
        @if ($preloaderHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Sidebar --}}
        @unless ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endunless

        {{-- Content --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @include('frontend.layouts.footer')
        @hasSection('footer')
            @yield('footer')
        @endif

        {{-- Right Sidebar --}}
        @if ($layoutHelper->isRightSidebarEnabled())
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    <!-- start of time top right  -->

    <!-- start of data table format table -->
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });
    </script>
    <!-- end of data table format table -->

    <!-- start of jquery and bootstrap table -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end of jquery and bootstrap table -->

    {{-- start of validation --}}
    <script src="{{ asset('js/custom_backend/global_functions/global_validation.js') }}"></script>
    {{-- start of global page error logger --}}
    <script src="{{ asset('js/custom_backend/global_functions/global_logger.js') }}"></script>
    {{-- showing password eye --}}
    <script src="{{ asset('js/custom_backend/global_functions/password_eye.js') }}"></script>
    {{-- custom date format --}}
    <script src="{{ asset('js/custom_backend/global_functions/custom_date.js') }}"></script>
    {{-- Backend Session Notifications --}}
    <script src="{{ asset('js/custom_backend/global_functions/custom_toaster.js') }}"></script>
    <script>
        window.backendNotification = {
            success: @json(session('success')),
            error: @json(session('error')),
            warning: @json(session('warning')),
            info: @json(session('info'))
        };
    </script>
@section('plugins.Datatables', true)
@stop

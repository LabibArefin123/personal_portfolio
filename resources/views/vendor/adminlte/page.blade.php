@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

{{-- Body configuration --}}
@section('classes_body', $layoutHelper->makeBodyClasses())
@section('body_data', $layoutHelper->makeBodyData())

{{-- Favicon and styles --}}
@section('adminlte_css')
    {{-- Bootstrap 5.3.9 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">

    {{-- DataTables 3.1.5 - Bootstrap 5 Integration --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/3.1.5/css/dataTables.bootstrap5.min.css">

    {{-- Page-specific CSS --}}
    @stack('css')
    @yield('css')
@stop


{{-- Main Body --}}
@section('body')
    <div class="wrapper">
        {{-- Custom Backend Styles --}}
        <link rel="stylesheet" href="{{ asset('css/custom_backend.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/global_variables/custom_toaster.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/global_variables/auth_notification_modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend/global_variables/premium_user_menu.css') }}">

        <link rel="icon" type="image/png" href="{{ asset('uploads/images/Logo.png') }}">
        {{-- Global Modals --}}

        @include('backend.global_modal.validation_modal')
        @include('backend.global_modal.create_modal')
        @include('backend.global_modal.edit_modal')
        @include('backend.global_modal.delete_modal')
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

        {{-- Main Content --}}
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


{{-- JavaScript --}}
@section('adminlte_js')
    @parent

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Bootstrap 5.3.9 Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"></script>
    {{-- DataTables 3.1.5 --}}
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    {{-- DataTables Bootstrap 5 Integration --}}
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.bootstrap5.min.js"></script>
    {{-- Global Backend Functions --}}
    <script src="{{ asset('js/custom_backend/global_functions/global_validation.js') }}"></script>
    <script src="{{ asset('js/custom_backend/global_functions/global_logger.js') }}"></script>
    <script src="{{ asset('js/custom_backend/global_functions/password_eye.js') }}"></script>
    <script src="{{ asset('js/custom_backend/global_functions/custom_date.js') }}"></script>

    {{-- Backend Notifications --}}
    <script>
        window.backendNotification = {
            login_success: @json(session('login_success')),
            logout_success: @json(session('logout_success')),

            success: @json(session('success')),
            error: @json(session('error')),
            warning: @json(session('warning')),
            info: @json(session('info'))
        };
    </script>

    <script src="{{ asset('js/custom_backend/global_functions/custom_toaster.js') }}"></script>
    {{-- <script src="{{ asset('js/custom_backend/global_functions/auth_notification_modal.js') }}"></script> --}}

    {{-- Page-specific JavaScript --}}
    @stack('js')
    @yield('js')

    {{-- Global DataTables Initialization --}}
    <script>
        $(function() {
            const table = document.getElementById('dataTables');

            if (!table) {
                return;
            }

            if (!$.fn.DataTable.isDataTable(table)) {
                $(table).DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [10, 25, 50, 100],
                    language: {
                        search: '',
                        searchPlaceholder: 'Search records...',
                        lengthMenu: 'Show _MENU_ entries',
                        info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                        infoEmpty: 'No records available',
                        zeroRecords: 'No matching records found',
                        emptyTable: 'No data available',
                        paginate: {
                            previous: '&laquo;',
                            next: '&raquo;'
                        }
                    }
                });
            }
        });
    </script>

@stop

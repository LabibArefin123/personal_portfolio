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
        <!-- start of modal animation -->
        <div class="modal fade" id="backConfirmModal" tabindex="-1" role="dialog" aria-labelledby="backConfirmLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center p-4">
                    <!-- Animated Circle Icon -->
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce" width="50" height="50"
                            fill="#FFC107" viewBox="0 0 16 16">
                            <path
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0-12a.905.905 0 0 1 .9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 3.995A.905.905 0 0 1 8 3zm.002 6a1 1 0 1 1-2.002 0 1 1 0 0 1 2.002 0z" />
                        </svg>
                    </div>

                    <!-- Modal Message -->
                    <div class="modal-body mb-3">
                        Please fill up the required fields before leaving the page. Do you want to leave?
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Stay</button>
                        <a href="#" class="btn btn-danger leave-page">Leave</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of modal animation -->

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

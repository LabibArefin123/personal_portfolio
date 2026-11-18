@extends('adminlte::page')

@section('title', 'Contact Requests')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_resp.css') }}">
@stop

@section('content_header')
    <div class="cr-page-header">
        <div>
            <div class="cr-breadcrumb">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <i class="fas fa-chevron-right"></i>
                <span>Request Management</span>
            </div>

            <h1>
                <span class="cr-heading-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </span>
                Contact & Appointment Requests
            </h1>

            <p>Manage incoming messages, appointments and client inquiries.</p>
        </div>

        <div class="cr-header-date">
            <i class="far fa-calendar-alt"></i>
            {{ now()->format('d M Y') }}
        </div>
    </div>
@stop

@section('content')

    {{-- STATISTICS --}}
    @include('backend.setting_management.contact_requests.partial_pages.index_page.part_1')
    
    {{-- MAIN TABLE --}}
    <div class="cr-main-card">
        {{-- Table Header Part --}}
        @include('backend.setting_management.contact_requests.partial_pages.index_page.part_2_a')
        {{-- Table Message Part --}}
        @include('backend.setting_management.contact_requests.partial_pages.index_page.part_2_b')
        {{-- Table Part --}}
        @include('backend.setting_management.contact_requests.partial_pages.index_page.part_2_c')
        {{-- Table Footer Part --}}
        @include('backend.setting_management.contact_requests.partial_pages.index_page.part_2_d')
    </div>
    @include('backend.setting_management.contact_requests.partial_pages.index_page.message_modal')
    {{-- FULL MESSAGE MODAL --}}
@stop

@push('js')
    <script src="{{ asset('js/custom_backend/contact_page/contact_request_index.js') }}"></script>
@endpush

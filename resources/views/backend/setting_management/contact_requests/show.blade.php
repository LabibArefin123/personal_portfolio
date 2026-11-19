@extends('adminlte::page')

@section('title', 'Contact Request Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_message.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_responsive.css') }}">
@stop

@section('content_header')
    @include('backend.setting_management.contact_requests.partial_pages.show_page.header')
@stop

@section('content')
    <div class="contact-show-page">
        {{-- CONTACT PROFILE HEADER --}}
        @include('backend.setting_management.contact_requests.partial_pages.show_page.part_1')
        {{-- MAIN CONTENT --}}
        <div class="row contact-content-row">
            {{-- LEFT: CONTACT INFORMATION --}}
            <div class="col-lg-5">
                @include('backend.setting_management.contact_requests.partial_pages.show_page.part_2_a')
                {{-- SUBMISSION INFORMATION --}}
                @include('backend.setting_management.contact_requests.partial_pages.show_page.part_2_b')
            </div>

            {{-- RIGHT: MESSAGE --}}
            <div class="col-lg-7">
                @include('backend.setting_management.contact_requests.partial_pages.show_page.part_2_c')
                {{-- QUICK ACTIONS --}}
                @include('backend.setting_management.contact_requests.partial_pages.show_page.part_2_d')
            </div>
        </div>
    </div>
@stop

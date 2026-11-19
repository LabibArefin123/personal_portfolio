@extends('adminlte::page')

@section('title', 'Project Informations')

@section('adminlte_css')
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/index_page/project_info_base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/index_page/project_info_header.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/index_page/project_info_table.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/index_page/project_info_actions.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/index_page/project_info_resp.css') }}">
@stop

@section('content_header')
    @include('backend.project_section.project_information.partial_pages.index_page.header')
@stop

@section('content')
    <div class="pi-page-container">
        {{-- Section Introduction --}}
        @include('backend.project_section.project_information.partial_pages.index_page.part_1')

        {{-- Project Information Table Section --}}
        <div class="pi-table-card">
            {{-- Project Information List Header --}}
            @include('backend.project_section.project_information.partial_pages.index_page.part_2_a')
            {{-- Project Information Table Part --}}
            @include('backend.project_section.project_information.partial_pages.index_page.part_2_b')
            {{-- Footer Part --}}
            @include('backend.project_section.project_information.partial_pages.index_page.part_2_c')
        </div>
    </div>
@stop

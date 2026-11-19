@extends('adminlte::page')

@section('title', 'Project Information Details')

@section('adminlte_css')
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_header.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_gallery.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_details.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_search.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_resp.css') }}">
@stop

@section('content_header')
    @include('backend.project_section.project_information.partial_pages.show_page.header')
@stop

@section('content')
    @php
        $images = is_array($projectInformation->project_images)
            ? $projectInformation->project_images
            : (json_decode($projectInformation->project_images ?? '[]', true) ?:
            []);

        $features = is_array($projectInformation->custom_features)
            ? $projectInformation->custom_features
            : (json_decode($projectInformation->custom_features ?? '[]', true) ?:
            []);

        $languages = is_array($projectInformation->project_languages)
            ? $projectInformation->project_languages
            : (json_decode($projectInformation->project_languages ?? '[]', true) ?:
            []);
    @endphp

    <div class="container-fluid pi-show-page">
        {{-- PROJECT OVERVIEW --}}
        @include('backend.project_section.project_information.partial_pages.show_page.part_1')
        {{-- PROJECT IMAGES --}}
        @include('backend.project_section.project_information.partial_pages.show_page.part_2')
        {{-- FEATURES AND LANGUAGES --}}
        <div class="row pi-show-info-row">
            {{-- FEATURES --}}
            @include('backend.project_section.project_information.partial_pages.show_page.part_3_a')
            {{-- LANGUAGES --}}
            @include('backend.project_section.project_information.partial_pages.show_page.part_3_b')
        </div>

        {{-- CHALLENGES --}}
        @include('backend.project_section.project_information.partial_pages.show_page.part_4')
        {{-- SOLUTION --}}
        @include('backend.project_section.project_information.partial_pages.show_page.part_5')
        {{-- CONCLUSION --}}
        @include('backend.project_section.project_information.partial_pages.show_page.part_6')

        {{-- PROJECT RESOURCES --}}
        @php
            $project = $projectInformation->project;

            $projectLink = $project?->live_url;
            $githubLink = $project?->github_url;
        @endphp
        @include('backend.project_section.project_information.partial_pages.show_page.part_7')
    </div>
@stop
@section('js')
    <script src="{{ asset('js/custom_backend/project_page/project_info/show_page/feature_search.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/project_info/show_page/tech_search.js') }}"></script>
@stop

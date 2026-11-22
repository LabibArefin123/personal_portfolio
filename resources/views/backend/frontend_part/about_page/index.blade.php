@extends('adminlte::page')

@section('title', 'About Management')

@section('adminlte_css')
    {{-- Start of Index About CSS --}}
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/index_part/custom_about_index_header.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/backend/frontend_part/about_page/index_part/custom_about_index_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/index_part/custom_about_index_stats.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/backend/frontend_part/about_page/index_part/custom_about_index_summary.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/index_part/custom_about_index_experience.css') }}">
    {{-- End of Index About CSS --}}
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_heading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_resp.css') }}">
@stop

@section('content_header')
    @include('backend.frontend_part.about_page.partials.index_page.header_part')
@stop

@section('content')
    <div class="about-admin">
        @if ($about)
            {{-- PROFILE OVERVIEW --}}
            @include('backend.frontend_part.about_page.partials.index_page.part_1')
            {{-- STATISTICS --}}
            @include('backend.frontend_part.about_page.partials.index_page.part_2')
            {{-- CONTENT ROW --}}
            <div class="row mt-3">
                {{-- BIOGRAPHY --}}
                @include('backend.frontend_part.about_page.partials.index_page.part_3_a')
                {{-- TECH STACK --}}
                @include('backend.frontend_part.about_page.partials.index_page.part_3_b')
            </div>
            {{-- RECENT EXPERIENCE --}}
            @include('backend.frontend_part.about_page.partials.index_page.part_4')
            {{-- FOOTER INFORMATION --}}
            @include('backend.frontend_part.about_page.partials.index_page.part_5')
        @else
            @include('backend.frontend_part.about_page.partials.index_page.empty_part')
        @endif
    </div>
@stop

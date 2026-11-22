@extends('adminlte::page')

@section('title', 'About Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_bio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_skills.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_timeline.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_highlights.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_heading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_responsive.css') }}">
@stop

@section('content_header')
    @include('backend.frontend_part.about_page.partials.show_page.header_part')
@stop

@section('content')
    <div class="about-admin">
        {{-- PROFILE HERO --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_1')
        {{-- BIOGRAPHY --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_2')
        {{-- TECH STACK --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_3')
        {{-- EXPERIENCE TIMELINE --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_4')
        {{-- PROFESSIONAL HIGHLIGHTS --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_5')
        {{-- RECORD INFORMATION --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_6')
        {{-- BOTTOM ACTIONS --}}
        @include('backend.frontend_part.about_page.partials.show_page.part_7')
    </div>
@stop

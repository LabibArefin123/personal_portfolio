@extends('adminlte::page')

@section('title', 'Education Page Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_education.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_responsive.css') }}">
@stop

@section('content_header')
    @include('backend.frontend_part.education_page.partials.show_page.header_part')
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- PAGE OVERVIEW --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_1')
    {{-- SUMMARY --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_2')
    {{-- ACADEMIC PROFILE --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_3')
    {{-- ACADEMIC QUALIFICATIONS --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_4')
    {{-- LEARNING TIMELINE --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_5')
    {{-- GITHUB INFORMATION --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_6')
    {{-- FOCUS CARDS --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_7')
    {{-- FOOTER INFO --}}
    @include('backend.frontend_part.education_page.partials.show_page.part_8')
@stop

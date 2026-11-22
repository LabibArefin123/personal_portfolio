@extends('adminlte::page')

@section('title', 'Education Page Management')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_responsive.css') }}">
@endsection

@section('content_header')
    @include('backend.frontend_part.education_page.partials.index_page.header_part')
@stop

@section('content')
    {{-- STATISTICS --}}
    @include('backend.frontend_part.education_page.partials.index_page.part_1')
    {{-- MAIN CARD --}}
    <div class="edu-index-card">
        {{-- Table Header Part --}}
        @include('backend.frontend_part.education_page.partials.index_page.part_2_a')
        {{-- Main Table Part --}}
        @include('backend.frontend_part.education_page.partials.index_page.part_2_b')
        {{-- Pagination Part --}}
        @include('backend.frontend_part.education_page.partials.index_page.part_2_c')
    </div>
@stop

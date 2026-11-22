@extends('adminlte::page')

@section('title', 'Edit About Page')

@section('adminlte_css')
    {{-- Start of Edit About Page CSS --}}
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_image.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_actions.css') }}">
    <link rel="stylesheet"
    href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_guidelines.css') }}">
    {{-- End of Edit About Page CSS --}}
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/shared_part/component_part/custom_about_heading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_resp.css') }}">
@stop

@section('content_header')
    @include('backend.frontend_part.about_page.partials.edit_page.header_part')
@stop

@section('content')
    <div class="about-edit-wrapper">
        @if ($errors->any())
            <div class="about-form-alert">
                <div class="about-alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div>
                    <strong>Please check the form.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('about_pages.update', $about->id) }}" method="POST" enctype="multipart/form-data"
            id="aboutEditForm">
            @csrf
            @method('PUT')
            <div class="about-edit-grid">
                {{-- Main Information Part --}}
                @include('backend.frontend_part.about_page.partials.edit_page.part_1_a')
                {{-- Side Information Part --}}
                @include('backend.frontend_part.about_page.partials.edit_page.part_1_b')
            </div>
        </form>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/frontend_part/about_page/custom_about_edit.js') }}"></script>
@stop

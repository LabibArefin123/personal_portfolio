@extends('adminlte::page')

@section('title', 'Edit Education Page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_education.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_resp.css') }}">
@endsection

@section('content_header')
    @include('backend.frontend_part.education_page.partials.edit_page.header_part')
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger edu-validation-alert">
            <strong><i class="fas fa-exclamation-circle mr-2"></i>Please check the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('education_pages.update', $education_page->id) }}" method="POST" id="educationEditForm">
        @csrf
        @method('PUT')
        {{-- PAGE INFORMATION --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_1')
        {{-- ACADEMIC PROFILE --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_2')
        {{-- ACADEMIC QUALIFICATIONS --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_3')
        {{-- GITHUB INFORMATION --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_4')
        {{-- FOCUS CARDS --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_5')
        {{-- SAVE ACTIONS --}}
        @include('backend.frontend_part.education_page.partials.edit_page.part_6')
    </form>

    {{-- EDUCATION ROW TEMPLATE --}}
     @include('backend.frontend_part.education_page.partials.edit_page.edu_template')
@stop
@section('js')
    <script src="{{ asset('js/custom_backend/frontend_part/education_page/edit_page/education_records.js') }}"></script>
    <script src="{{ asset('js/custom_backend/frontend_part/education_page/edit_page/education_dynamic_fields.js') }}">
    </script>
    <script src="{{ asset('js/custom_backend/frontend_part/education_page/edit_page/education_form.js') }}"></script>
@stop

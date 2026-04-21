@extends('frontend.layouts.app')

@section('title', 'Md. Labib Arefin | Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Md. Labib Arefin is a Full Stack Developer specializing in Laravel, React, REST APIs, and scalable systems like POS, CRM, and Tender Management platforms.">

    <meta property="og:title" content="Md. Labib Arefin | Full Stack Developer">
    <meta property="og:description"
        content="Portfolio of Labib Arefin showcasing Laravel, React, POS systems, CRM software, and modern web applications.">

    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    {{-- HERO (HOOK) --}}
    @include('frontend.welcome_page.hero')

    {{-- 🔥 QUOTE (PERSONAL IDENTITY MOMENT) --}}
    @include('frontend.welcome_page.quote')

    {{-- ABOUT (WHO YOU ARE) --}}
    @include('frontend.welcome_page.about')

    {{-- SERVICES (WHAT YOU OFFER) --}}
    @include('frontend.welcome_page.service')

    {{-- CORE SKILLS (QUICK OVERVIEW) --}}
    @include('frontend.welcome_page.skill')

    {{-- TECH STACK (DETAILED TOOLS) --}}
    @include('frontend.welcome_page.tech')

    {{-- DEEP TECH / CATEGORIES --}}
    @include('frontend.welcome_page.technical_skill')

    {{-- EXPERIENCE (TRUST) --}}
    @include('frontend.welcome_page.experience')

    {{-- PROJECTS (PROOF) --}}
    @include('frontend.welcome_page.project')

    {{-- FOOTER --}}
    @include('frontend.welcome_page.footer')
    {{-- ✍️ BLOG / ARTICLES (optional future) --}}
    {{-- @include('frontend.home.blog') --}}
@endsection

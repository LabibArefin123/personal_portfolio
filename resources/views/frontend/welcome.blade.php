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
    @include('frontend.welcome_page.hero')
    @include('frontend.welcome_page.skill')
    @include('frontend.welcome_page.project')
    {{-- 🔥 HERO SECTION --}}
    {{-- @include('frontend.home.hero') --}}

    {{-- 👨‍💻 ABOUT ME --}}
    {{-- @include('frontend.home.about') --}}

    {{-- 🛠 SKILLS --}}
    {{-- @include('frontend.home.skills') --}}

    {{-- 🚀 PROJECTS --}}
    {{-- @include('frontend.home.projects') --}}

    {{-- 💼 EXPERIENCE --}}
    {{-- @include('frontend.home.experience') --}}

    {{-- 🧠 SERVICES --}}
    {{-- @include('frontend.home.services') --}}

    {{-- 📊 TECH STACK / TOOLS --}}
    {{-- @include('frontend.home.tech') --}}

    {{-- ✍️ BLOG / ARTICLES (optional future) --}}
    {{-- @include('frontend.home.blog') --}}

    {{-- 📞 CONTACT --}}
    {{-- @include('frontend.contact') --}}

    {{-- 🔚 FOOTER --}}
    @include('frontend.welcome_page.footer')

@endsection

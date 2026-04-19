<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Md. Labib Arefin | Full Stack Developer
        @endif
    </title>

    <!-- Meta -->
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description"
            content="Md. Labib Arefin is a Full Stack Developer specializing in Laravel, React, REST APIs, and scalable web applications including POS, CRM, and Tender Management Systems.">
        <meta name="keywords"
            content="Labib Arefin, Laravel Developer, React Developer, Bangladesh Developer, Full Stack Developer, POS System, CRM Software">
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/images/icon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/hero/custom_hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/about/custom_about_w.css') }}">

    //Skill Part
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_1_section_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_2_typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_3_card_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_4_skill_bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_5_effects_hover.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/skill/part_6_responsive.css') }}">

    //Technology Skill Part
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_1_section_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_2_card_base_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_3_icon_text_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_4_image_effect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_5_hover_interaction.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/technical_skill/part_6_mobile_responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/project/custom_project.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/experience/custom_experience.css') }}">
</head>

<body>
    <div id="app">

        <!-- 🔥 Scroll Progress -->
        <div id="scrollProgress"
            style="position: fixed; top: 0; left: 0; width: 0%; height: 3px; background: linear-gradient(90deg,#6366f1,#06b6d4); z-index: 9999; transition: width 0.25s;">
        </div>

        <!-- MAIN -->
        <main>
            @yield('content')
        </main>

    </div>

    <!-- 🔥 GLOBAL MODALS (Keep only if needed) -->
    {{-- Clean version: remove unused doctor-specific modals --}}
    @includeWhen(View::exists('frontend.modal.contact'), 'frontend.modal.contact')

    <!-- JS LIBS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- AOS INIT -->
    <script>
        AOS.init({
            duration: 900,
            easing: 'ease-in-out',
            once: true,
        });
    </script>

    <!-- 🔝 Back To Top -->
    <button id="backToTop" class="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- GLOBAL ALERT DATA -->
    <script>
        window.appData = {
            success: @json(session('success')),
            errors: @json($errors->all())
        };
    </script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom_frontend/sweet_alert.js') }}"></script>
    <script src="{{ asset('js/custom_frontend/scroll_progress.js') }}"></script>
    <script src="{{ asset('js/custom_frontend/custom_back_top_button.js') }}"></script>

    <!-- OPTIONAL: Draft Auto Save -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            if (!form) return;

            const inputs = form.querySelectorAll("input, textarea, select");

            inputs.forEach(input => {
                const saved = localStorage.getItem("draft_" + input.name);
                if (saved) input.value = saved;

                input.addEventListener("input", () => {
                    localStorage.setItem("draft_" + input.name, input.value);
                });
            });
        });
    </script>

</body>

</html>

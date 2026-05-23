@extends('frontend.layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/frontend/login/login-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/lamp-system.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/login-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/responsive.css') }}">
    <div class="portfolio-login-wrapper auth-login-page">   

        {{-- LEFT --}}
        <div class="lamp-side">

            <div class="lamp-container">

                <div class="lamp-wire"></div>

                <div class="lamp" id="lamp">

                    {{-- TOP HOLDER --}}
                    <div class="lamp-holder"></div>

                    {{-- FABRIC SHADE --}}
                    <div class="lamp-shade">

                        <div class="lamp-inner-light"></div>

                    </div>

                    {{-- LIGHT EFFECT --}}
                    <div class="lamp-glow"></div>

                </div>

                {{-- CHAIN --}}
                <div class="switch-chain" id="lampSwitch">

                    <div class="chain-line"></div>

                    <div class="chain-ball"></div>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="login-side">

            <div class="login-card locked" id="loginCard">

                <div class="login-header">

                    <h2>Developer Access</h2>

                    <p>
                        Secure authentication portal.
                    </p>

                </div>

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="form-group mb-4">

                        <label>Email or Username</label>

                        <input type="text" name="login" class="form-control" placeholder="Enter email or username"
                            required>

                    </div>

                    <div class="form-group mb-4 position-relative">

                        <label>Password</label>

                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter password" required>

                        <span class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>

                    </div>

                    <button class="login-btn">
                        Login Securely
                    </button>

                </form>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/custom_frontend/login.js') }}"></script>
@endsection

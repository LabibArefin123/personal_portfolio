@extends('frontend.layouts.app')

@section('content')
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/frontend/login/login-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/lamp-system.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/login-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/login/responsive.css') }}">

    <div class="portfolio-login-wrapper auth-login-page">

        {{-- LEFT: BRANDING & INTERACTIVE LAMP --}}
        <section class="lamp-side">

            <div class="login-brand">
                <div class="brand-icon">
                    <i class="fas fa-code"></i>
                </div>
                <span>Developer<span class="brand-highlight">Space</span></span>
            </div>

            <div class="lamp-scene">

                <div class="lamp-container">

                    <div class="lamp-wire"></div>

                    <div class="lamp" id="lamp">

                        <div class="lamp-holder"></div>

                        <div class="lamp-shade">
                            <div class="lamp-inner-light"></div>
                        </div>

                        <div class="lamp-glow"></div>

                    </div>

                    <div class="switch-chain" id="lampSwitch" role="button" tabindex="0"
                        aria-label="Turn lamp on or off">

                        <div class="chain-line"></div>
                        <div class="chain-ball"></div>

                    </div>

                </div>

            </div>

            <div class="intro-content">

                <span class="developer-badge">
                    <i class="fas fa-sparkles"></i>
                    YOUR CREATIVE WORKSPACE
                </span>

                <h1>
                    Ideas become<br>
                    <span>reality here.</span>
                </h1>

                <p>
                    One secure place to manage your projects,
                    explore your work, and bring your next big
                    idea to life.
                </p>

                <div class="intro-footer">
                    <span><i class="fas fa-shield-alt"></i> Secure Access</span>
                    <span class="footer-dot"></span>
                    <span>Designed for Developers</span>
                </div>

            </div>

            <div class="side-decoration decoration-one"></div>
            <div class="side-decoration decoration-two"></div>

            <div class="login-copyright">
                &copy; {{ date('Y') }} DeveloperSpace. All rights reserved.
            </div>

        </section>


        {{-- RIGHT: LOGIN FORM --}}
        <section class="login-side">

            <div class="login-card locked" id="loginCard">

                <div class="login-card-top">
                    <span class="welcome-label">
                        <span class="welcome-dot"></span>
                        WELCOME BACK
                    </span>

                    <div class="secure-indicator">
                        <i class="fas fa-lock"></i>
                        Secure Login
                    </div>
                </div>

                <div class="login-header">

                    <div class="login-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>

                    <h2>Let's get you in.</h2>

                    <p>
                        Enter your credentials to access your
                        developer workspace.
                    </p>

                </div>

                {{-- SESSION STATUS --}}
                @if (session('status'))
                    <div class="login-alert success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('status') }}
                    </div>
                @endif

                {{-- VALIDATION ERRORS --}}
                @if ($errors->any())
                    <div class="login-alert error">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Unable to sign in</strong>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="form-group">

                        <label for="login">
                            Email or Username
                        </label>

                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>

                            <input type="text" id="login" name="login"
                                class="form-control @error('login') is-invalid @enderror"
                                placeholder="Enter your email or username" value="{{ old('login') }}"
                                autocomplete="username" required autofocus>
                        </div>

                        @error('login')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="form-group">

                        <div class="password-label-row">
                            <label for="password">Password</label>
                        </div>

                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>

                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password" autocomplete="current-password" required>

                            <button type="button" class="toggle-password" id="togglePassword" aria-label="Show password">
                                <i class="fas fa-eye"></i>
                            </button>

                        </div>

                        @error('password')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="login-options">

                        <label class="remember-label">
                            <input type="checkbox" name="remember" id="remember">
                            <span>Remember me</span>
                        </label>

                        <span class="login-security">
                            <i class="fas fa-shield-alt"></i>
                            Protected session
                        </span>

                    </div>


                    <button type="submit" class="login-btn">

                        <span>Sign In to Your Account</span>

                        <i class="fas fa-arrow-right"></i>

                    </button>

                </form>


                <div class="login-divider">
                    <span></span>
                    <small>YOUR SPACE. YOUR WORK.</small>
                    <span></span>
                </div>

                <div class="login-bottom">
                    <i class="fas fa-heart"></i>
                    Built with care for better productivity.
                </div>

            </div>

            <div class="mobile-copyright">
                &copy; {{ date('Y') }} DeveloperSpace.
            </div>

        </section>

    </div>

    <script src="{{ asset('js/custom_frontend/login.js') }}"></script>
@endsection


@extends('adminlte::page')

@section('title', 'My Profile')

@section('content_header')
    <div class="profile-page-heading">
        <div>
            <span class="profile-eyebrow">
                <i class="fas fa-user-circle"></i>
                ACCOUNT MANAGEMENT
            </span>
            <h1>My Profile</h1>
            <p>Manage your personal information and account details.</p>
        </div>

        <a href="{{ route('user_profile_edit') }}"
           class="profile-edit-btn"
           id="editProfileBtn">
            <i class="fas fa-pen"></i>
            <span>Edit Profile</span>
        </a>
    </div>
@stop

@section('content')
    @php
        $profileImage = $user->profile_picture
            ? asset($user->profile_picture)
            : asset('uploads/images/default.jpg');

        $profileFields = [
            $user->name,
            $user->username,
            $user->email,
            $user->phone,
            $user->phone_2,
            $user->profile_picture,
        ];

        $completedFields = collect($profileFields)
            ->filter(fn ($value) => filled($value))
            ->count();

        $profileCompletion = (int) round(
            ($completedFields / count($profileFields)) * 100
        );

        $initials = collect(explode(' ', trim($user->name)))
            ->filter()
            ->take(2)
            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
            ->implode('');
    @endphp

    <div class="profile-page-container">

        {{-- Profile Overview --}}
        <section class="profile-hero profile-reveal">

            <div class="profile-hero-decoration"></div>

            <div class="profile-hero-content">

                <div class="profile-avatar-wrapper">
                    <img
                        src="{{ $profileImage }}"
                        class="profile-avatar"
                        alt="{{ $user->name }}"
                        onerror="this.onerror=null;this.src='{{ asset('uploads/images/default.jpg') }}';">

                    <span class="profile-avatar-status"
                          title="Account profile"></span>
                </div>

                <div class="profile-hero-info">
                    <span class="profile-account-label">
                        <i class="fas fa-shield-alt"></i>
                        ACCOUNT PROFILE
                    </span>

                    <h2>{{ $user->name }}</h2>

                    <p>
                        <i class="fas fa-at"></i>
                        {{ $user->username ?: 'Username not provided' }}
                    </p>

                    <div class="profile-hero-tags">
                        <span>
                            <i class="fas fa-user-check"></i>
                            Personal Account
                        </span>

                        <span>
                            <i class="fas fa-envelope"></i>
                            {{ $user->email }}
                        </span>
                    </div>
                </div>

                <div class="profile-hero-action">
                    <a href="{{ route('user_profile_edit') }}"
                       class="profile-hero-edit"
                       id="heroEditProfileBtn">
                        <i class="fas fa-edit"></i>
                        Edit Details
                    </a>
                </div>

            </div>

            <div class="profile-hero-footer">
                <div>
                    <span class="profile-footer-label">Profile overview</span>
                    <strong>Your account information</strong>
                </div>

                <div class="profile-completion">
                    <div class="profile-completion-info">
                        <span>Profile completion</span>
                        <strong>{{ $profileCompletion }}%</strong>
                    </div>

                    <div class="profile-progress-track">
                        <div class="profile-progress-bar"
                             data-progress="{{ $profileCompletion }}">
                        </div>
                    </div>
                </div>
            </div>

        </section>

        {{-- Profile Information --}}
        <div class="profile-content-grid">

            <div class="profile-main-column">

                {{-- Personal Information --}}
                <section class="profile-info-card profile-reveal">

                    <div class="profile-card-heading">
                        <div class="profile-card-heading-icon personal">
                            <i class="fas fa-user"></i>
                        </div>

                        <div>
                            <h5>Personal Information</h5>
                            <p>Your basic account identity details.</p>
                        </div>
                    </div>

                    <div class="profile-information-grid">

                        <div class="profile-information-item">
                            <span class="profile-field-label">Full Name</span>
                            <strong>{{ $user->name ?: 'Not Provided' }}</strong>
                        </div>

                        <div class="profile-information-item">
                            <span class="profile-field-label">Username</span>
                            <strong>{{ $user->username ?: 'Not Provided' }}</strong>
                        </div>

                        <div class="profile-information-item">
                            <span class="profile-field-label">Email Address</span>
                            <div class="profile-copy-value">
                                <strong>{{ $user->email ?: 'Not Provided' }}</strong>

                                @if ($user->email)
                                    <button type="button"
                                            class="profile-copy-btn"
                                            data-copy="{{ $user->email }}"
                                            title="Copy email">
                                        <i class="far fa-copy"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>

                </section>

                {{-- Contact Information --}}
                <section class="profile-info-card profile-reveal">

                    <div class="profile-card-heading">
                        <div class="profile-card-heading-icon contact">
                            <i class="fas fa-address-book"></i>
                        </div>

                        <div>
                            <h5>Contact Information</h5>
                            <p>Your registered contact details.</p>
                        </div>
                    </div>

                    <div class="profile-information-grid">

                        <div class="profile-information-item">
                            <span class="profile-field-label">Primary Phone</span>

                            <div class="profile-copy-value">
                                <strong>
                                    {{ $user->phone ?: 'Not Provided' }}
                                </strong>

                                @if ($user->phone)
                                    <button type="button"
                                            class="profile-copy-btn"
                                            data-copy="{{ $user->phone }}"
                                            title="Copy phone">
                                        <i class="far fa-copy"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="profile-information-item">
                            <span class="profile-field-label">Alternative Phone</span>

                            <div class="profile-copy-value">
                                <strong>
                                    {{ $user->phone_2 ?: 'Not Provided' }}
                                </strong>

                                @if ($user->phone_2)
                                    <button type="button"
                                            class="profile-copy-btn"
                                            data-copy="{{ $user->phone_2 }}"
                                            title="Copy alternative phone">
                                        <i class="far fa-copy"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>

                </section>

                {{-- Account Information --}}
                <section class="profile-info-card profile-reveal">

                    <div class="profile-card-heading">
                        <div class="profile-card-heading-icon account">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div>
                            <h5>Account Information</h5>
                            <p>Basic information about your account.</p>
                        </div>
                    </div>

                    <div class="profile-information-grid">

                        <div class="profile-information-item">
                            <span class="profile-field-label">Account Name</span>
                            <strong>{{ $user->name }}</strong>
                        </div>

                        @if ($user->created_at)
                            <div class="profile-information-item">
                                <span class="profile-field-label">Member Since</span>
                                <strong>
                                    {{ $user->created_at->format('d M Y') }}
                                </strong>
                            </div>
                        @endif

                        @if ($user->created_at)
                            <div class="profile-information-item">
                                <span class="profile-field-label">Account Created</span>
                                <strong>
                                    {{ $user->created_at->diffForHumans() }}
                                </strong>
                            </div>
                        @endif

                    </div>

                </section>

            </div>

            {{-- Sidebar --}}
            <aside class="profile-sidebar-column">

                {{-- Profile Completion --}}
                <section class="profile-sidebar-card profile-reveal">

                    <div class="profile-sidebar-heading">
                        <i class="fas fa-chart-pie"></i>
                        <h5>Profile Strength</h5>
                    </div>

                    <div class="profile-strength-content">
                        <div class="profile-strength-circle"
                             data-completion="{{ $profileCompletion }}">
                            <div class="profile-strength-inner">
                                <strong>{{ $profileCompletion }}%</strong>
                                <span>Complete</span>
                            </div>
                        </div>

                        <p>
                            @if ($profileCompletion === 100)
                                Excellent! Your profile information is complete.
                            @elseif ($profileCompletion >= 70)
                                Your profile looks good. Complete the remaining details.
                            @else
                                Add more information to make your profile complete.
                            @endif
                        </p>
                    </div>

                    <div class="profile-completion-checklist">

                        <div class="{{ filled($user->name) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->name) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Full name
                        </div>

                        <div class="{{ filled($user->username) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->username) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Username
                        </div>

                        <div class="{{ filled($user->email) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->email) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Email address
                        </div>

                        <div class="{{ filled($user->phone) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->phone) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Phone number
                        </div>

                        <div class="{{ filled($user->phone_2) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->phone_2) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Alternative phone
                        </div>

                        <div class="{{ filled($user->profile_picture) ? 'completed' : '' }}">
                            <i class="fas {{ filled($user->profile_picture) ? 'fa-check-circle' : 'fa-circle' }}"></i>
                            Profile picture
                        </div>

                    </div>

                </section>

                {{-- Quick Actions --}}
                <section class="profile-sidebar-card profile-reveal">

                    <div class="profile-sidebar-heading">
                        <i class="fas fa-bolt"></i>
                        <h5>Quick Actions</h5>
                    </div>

                    <div class="profile-quick-actions">

                        <a href="{{ route('user_profile_edit') }}"
                           class="profile-quick-action"
                           id="quickEditProfileBtn">
                            <span class="profile-quick-icon edit">
                                <i class="fas fa-user-edit"></i>
                            </span>

                            <span>
                                <strong>Edit Profile</strong>
                                <small>Update personal details</small>
                            </span>

                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="{{ route('user_profile_edit') }}"
                           class="profile-quick-action">
                            <span class="profile-quick-icon security">
                                <i class="fas fa-lock"></i>
                            </span>

                            <span>
                                <strong>Account Security</strong>
                                <small>Manage your account details</small>
                            </span>

                            <i class="fas fa-chevron-right"></i>
                        </a>

                    </div>

                </section>

                {{-- Helpful Note --}}
                <section class="profile-security-note profile-reveal">
                    <div class="profile-security-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <div>
                        <strong>Keep your profile updated</strong>
                        <p>
                            Make sure your contact information is accurate
                            so you can be reached when needed.
                        </p>
                    </div>
                </section>

            </aside>

        </div>

    </div>
@stop

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/user_profile/show_page/profile_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/user_profile/show_page/profile_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/user_profile/show_page/profile_information.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/user_profile/show_page/profile_actions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/user_profile/show_page/profile_resp.css') }}">
@stop

@push('js')
    <script src="{{ asset('js/custom_backend/profile_page/show_page/profile_show.js') }}"></script>
@endpush

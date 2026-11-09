@extends('frontend.layouts.app')

@section('title', 'Contact | Md. Labib Arefin')

@section('meta')
    <meta name="description"
        content="Contact Md. Labib Arefin, Full Stack Developer specializing in Laravel, React, POS, CRM, and scalable web systems.">

    <meta property="og:title" content="Contact | Labib Arefin">
    <meta property="og:description"
        content="Get in touch for freelance projects, collaborations, or full-time opportunities.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

    {{-- NAVBAR --}}
    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

    <!-- HERO / BANNER -->
    <div class="contact-hero">
        {{-- <div class="overlay"></div> --}}

        <div class="container text-center">
            <h1>Let's Work Together 🚀</h1>
            <p>Have a project, idea, or opportunity? Let’s talk.</p>
        </div>
    </div>

    <!-- CONTACT SECTION -->
    <section class="contact-dev-section">
        <div class="container">
            <div class="row g-4">
                <!-- LEFT: FORM -->
                <div class="col-lg-7">
                    <div class="contact-card">
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-title-icon me-3">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>

                            <div>
                                <h3 class="mb-1">Send Me a Message</h3>
                                <p class="text-muted mb-0">
                                    Have an idea, project, or collaboration in mind? Let’s discuss it.
                                </p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('contact.store') }}" id="contactForm" class="contact-form"
                            autocomplete="on">
                            @csrf
                            @if ($errors->any())
                                <div class="contact-alert contact-alert-danger" role="alert">
                                    <div class="contact-alert-icon">
                                        <i class="bi bi-shield-exclamation"></i>
                                    </div>

                                    <div>
                                        <strong>Message could not be submitted</strong>

                                        <ul class="mb-0 mt-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            {{-- Honeypot protection --}}
                            <div class="contact-honeypot" aria-hidden="true">
                                <label for="website">Leave this field empty</label>
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                            </div>

                            {{-- Submission timing --}}
                            <input type="hidden" name="form_started_at" id="formStartedAt" value="">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="contact-label">
                                        <i class="bi bi-person-circle"></i>
                                        Full Name
                                    </label>

                                    <div class="input-icon-group">
                                        <span class="input-icon">
                                            <i class="bi bi-person"></i>
                                        </span>

                                        <input type="text" name="name" id="contactName" autocomplete="name"
                                            placeholder="Enter your full name" class="form-control"
                                            value="{{ old('name') }}" minlength="2" maxlength="80">

                                        @error('name')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="contact-label">
                                        <i class="bi bi-envelope-fill"></i>
                                        Email Address
                                    </label>

                                    <div class="input-icon-group">

                                        <span class="input-icon">
                                            <i class="bi bi-envelope"></i>
                                        </span>

                                        <input type="email" name="email" id="contactEmail" autocomplete="email"
                                            placeholder="Enter your email" class="form-control" value="{{ old('email') }}"
                                            maxlength="150">

                                        @error('email')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <!-- PHONE -->
                                <div class="col-md-6 mb-4">
                                    <label class="contact-label">
                                        <i class="bi bi-telephone-fill"></i>
                                        Phone Number
                                    </label>

                                    <div class="input-icon-group">

                                        <span class="input-icon">
                                            <i class="bi bi-phone"></i>
                                        </span>

                                        <input type="tel" name="phone" id="contactPhone" autocomplete="tel"
                                            placeholder="Optional phone number" class="form-control"
                                            value="{{ old('phone') }}" maxlength="25">

                                        @error('phone')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="contact-label">
                                        <i class="bi bi-bookmark-star-fill"></i>
                                        Subject
                                    </label>

                                    <div class="input-icon-group">
                                        <span class="input-icon">
                                            <i class="bi bi-pencil-square"></i>
                                        </span>
                                        <input type="text" name="subject" id="contactSubject"
                                            placeholder="Project subject" class="form-control"
                                            value="{{ old('subject') }}" minlength="3" maxlength="120">

                                        @error('subject')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <label class="contact-label">
                                        <i class="bi bi-chat-left-text-fill"></i>
                                        Your Message
                                    </label>

                                    <div class="input-icon-group textarea-group">
                                        <span class="input-icon textarea-icon">
                                            <i class="bi bi-chat-left-text"></i>
                                        </span>
                                        <textarea name="message" id="contactMessage" rows="6" minlength="20" maxlength="5000"
                                            placeholder="Write your message here..." class="form-control" required>{{ old('message') }}</textarea>

                                        <div class="contact-message-footer">
                                            <small id="contactMessageStatus">
                                                <i class="bi bi-shield-check"></i>
                                                Links and website addresses are not permitted.
                                            </small>

                                            <small id="contactCharacterCount">0 / 5000</small>
                                        </div>

                                        @error('message')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn contact-btn w-100" id="contactSubmit">

                                <span class="submit-text">
                                    <i class="bi bi-send-fill me-2"></i>
                                    Send Message
                                </span>

                                <span class="submit-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Securing Your Message...
                                </span>

                            </button>
                        </form>
                    </div>
                </div>

                <!-- RIGHT: INFO -->
                <div class="col-lg-5">
                    <div class="contact-info-card">
                        <h3>Let's Connect</h3>
                        <p class="contact-desc">
                            I’m available for freelance work, business systems,
                            Laravel development, enterprise applications,
                            and long-term collaborations.
                        </p>

                        <div class="info-box">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <span>Email Address</span>
                                <p>mdlabibarefin@gmail.com</p>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>

                            <div>
                                <span>Phone Number</span>
                                <p>+880 1776-197999</p>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <div>
                                <span>Location</span>
                                <p>Dhaka, Bangladesh</p>
                            </div>
                        </div>

                        <div class="contact-social">
                            <a href="https://github.com/LabibArefin123" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>

                            <a href="https://linkedin.com/in/labib-arefin" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    @include('frontend.custom_layout.footer')
@endsection

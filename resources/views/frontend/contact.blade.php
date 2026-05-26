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

                        <form method="POST" action="{{ route('contact.store') }}">

                            @csrf

                            <div class="row">

                                <!-- NAME -->
                                <div class="col-md-6 mb-4">

                                    <label class="contact-label">
                                        <i class="bi bi-person-circle"></i>
                                        Full Name
                                    </label>

                                    <div class="input-icon-group">

                                        <span class="input-icon">
                                            <i class="bi bi-person"></i>
                                        </span>

                                        <input type="text" name="name" autocomplete="name"
                                            placeholder="Enter your full name" class="form-control" required>

                                    </div>

                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-6 mb-4">

                                    <label class="contact-label">
                                        <i class="bi bi-envelope-fill"></i>
                                        Email Address
                                    </label>

                                    <div class="input-icon-group">

                                        <span class="input-icon">
                                            <i class="bi bi-envelope"></i>
                                        </span>

                                        <input type="email" name="email" autocomplete="email"
                                            placeholder="Enter your email" class="form-control" required>

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

                                        <input type="text" name="phone" autocomplete="tel"
                                            placeholder="Optional phone number" class="form-control">

                                    </div>

                                </div>

                                <!-- SUBJECT -->
                                <div class="col-md-6 mb-4">

                                    <label class="contact-label">
                                        <i class="bi bi-bookmark-star-fill"></i>
                                        Subject
                                    </label>

                                    <div class="input-icon-group">

                                        <span class="input-icon">
                                            <i class="bi bi-pencil-square"></i>
                                        </span>

                                        <input type="text" name="subject" placeholder="Project subject"
                                            class="form-control">

                                    </div>

                                </div>

                                <!-- MESSAGE -->
                                <div class="col-12 mb-4">

                                    <label class="contact-label">
                                        <i class="bi bi-chat-left-text-fill"></i>
                                        Your Message
                                    </label>

                                    <div class="input-icon-group textarea-group">

                                        <span class="input-icon textarea-icon">
                                            <i class="bi bi-chat-left-text"></i>
                                        </span>

                                        <textarea name="message" rows="6" placeholder="Write your message here..." class="form-control" required></textarea>

                                    </div>

                                </div>

                            </div>

                            <button class="btn contact-btn w-100">

                                <i class="bi bi-send-fill me-2"></i>

                                Send Message

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

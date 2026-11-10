
@extends('adminlte::page')

@section('title', 'Contact Request Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_message.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/show_page/contact_responsive.css') }}">
@stop

@section('content_header')
    <div class="contact-page-heading">
        <div>
            <div class="contact-breadcrumb">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <i class="fas fa-chevron-right"></i>
                <span>Contact Requests</span>
                <i class="fas fa-chevron-right"></i>
                <strong>Details</strong>
            </div>

            <h1>Contact Request Details</h1>
            <p>Review and manage submitted contact information.</p>
        </div>

        <div class="contact-heading-actions">
            <a href="{{ route('contact_requests.edit', $contact_request->id) }}"
               class="contact-action-btn edit-btn">
                <i class="fas fa-edit"></i>
                <span>Edit Request</span>
            </a>

            <a href="{{ route('contact_requests.index') }}"
               class="contact-action-btn back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to List</span>
            </a>
        </div>
    </div>
@stop

@section('content')

    <div class="contact-show-page">

        {{-- CONTACT PROFILE HEADER --}}
        <div class="contact-profile-card">

            <div class="contact-profile-main">

                <div class="contact-avatar">
                    <i class="fas fa-user"></i>
                </div>

                <div class="contact-profile-info">

                    <span class="contact-profile-label">
                        <i class="fas fa-address-card"></i>
                        CONTACT PROFILE
                    </span>

                    <h2>{{ $contact_request->name }}</h2>

                    <div class="contact-profile-meta">
                        <span>
                            <i class="fas fa-envelope"></i>
                            {{ $contact_request->email }}
                        </span>

                        <span>
                            <i class="fas fa-phone-alt"></i>
                            {{ $contact_request->phone }}
                        </span>
                    </div>

                </div>

            </div>

            <div class="contact-profile-side">
                <span class="profile-type-label">REQUEST TYPE</span>

                <div class="request-type-badge">
                    <i class="fas fa-tag"></i>
                    {{ ucfirst($contact_request->type) }}
                </div>

                <span class="profile-date">
                    <i class="far fa-calendar-alt"></i>
                    {{ $contact_request->created_at->format('d M Y') }}
                </span>
            </div>

        </div>


        {{-- MAIN CONTENT --}}
        <div class="row contact-content-row">

            {{-- LEFT: CONTACT INFORMATION --}}
            <div class="col-lg-5">

                <div class="contact-section-card">

                    <div class="section-card-heading">
                        <div class="section-heading-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>

                        <div>
                            <h3>Contact Information</h3>
                            <p>Personal and communication details</p>
                        </div>
                    </div>

                    <div class="contact-information-list">

                        {{-- NAME --}}
                        <div class="contact-info-item">
                            <div class="contact-info-icon name-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div class="contact-info-content">
                                <span>Full Name</span>
                                <strong>{{ $contact_request->name }}</strong>
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="contact-info-item">
                            <div class="contact-info-icon email-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div class="contact-info-content">
                                <span>Email Address</span>
                                <a href="mailto:{{ $contact_request->email }}">
                                    {{ $contact_request->email }}
                                </a>
                            </div>

                            <a href="mailto:{{ $contact_request->email }}"
                               class="info-action"
                               title="Send Email">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>

                        {{-- PHONE --}}
                        <div class="contact-info-item">
                            <div class="contact-info-icon phone-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>

                            <div class="contact-info-content">
                                <span>Phone Number</span>
                                <a href="tel:{{ $contact_request->phone }}">
                                    {{ $contact_request->phone }}
                                </a>
                            </div>

                            <a href="tel:{{ $contact_request->phone }}"
                               class="info-action"
                               title="Call Contact">
                                <i class="fas fa-phone"></i>
                            </a>
                        </div>

                        {{-- TYPE --}}
                        <div class="contact-info-item">
                            <div class="contact-info-icon type-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>

                            <div class="contact-info-content">
                                <span>Request Category</span>
                                <strong>{{ ucfirst($contact_request->type) }}</strong>
                            </div>
                        </div>

                    </div>

                </div>


                {{-- SUBMISSION INFORMATION --}}
                <div class="contact-section-card submission-card">

                    <div class="section-card-heading">
                        <div class="section-heading-icon submission-icon">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div>
                            <h3>Submission Details</h3>
                            <p>Request timeline information</p>
                        </div>
                    </div>

                    <div class="submission-details">

                        <div class="submission-detail-item">
                            <span>Submitted Date</span>
                            <strong>
                                {{ $contact_request->created_at->format('d F Y') }}
                            </strong>
                        </div>

                        <div class="submission-detail-item">
                            <span>Submission Time</span>
                            <strong>
                                {{ $contact_request->created_at->format('h:i A') }}
                            </strong>
                        </div>

                        <div class="submission-detail-item">
                            <span>Request ID</span>
                            <strong>#{{ $contact_request->id }}</strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT: MESSAGE --}}
            <div class="col-lg-7">

                <div class="contact-section-card message-card">

                    <div class="section-card-heading">

                        <div class="section-heading-icon message-icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>

                        <div>
                            <h3>Message Details</h3>
                            <p>Original message submitted by the contact</p>
                        </div>

                    </div>

                    <div class="message-content">

                        <div class="message-top-line">
                            <span>
                                <i class="fas fa-quote-left"></i>
                                CONTACT MESSAGE
                            </span>

                            <span class="message-date">
                                {{ $contact_request->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <div class="message-text">
                            @if (filled($contact_request->message))
                                {{ $contact_request->message }}
                            @else
                                <div class="empty-message">
                                    <i class="far fa-comment-dots"></i>
                                    <strong>No message provided</strong>
                                    <span>This contact request does not contain a message.</span>
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="message-footer">
                        <div>
                            <i class="fas fa-shield-alt"></i>
                            Contact information is displayed securely.
                        </div>
                    </div>

                </div>
                {{-- QUICK ACTIONS --}}
                <div class="contact-quick-actions">

                    <div class="quick-action-heading">
                        <h4>Quick Actions</h4>
                        <p>Communicate with this contact</p>
                    </div>

                    <div class="quick-action-buttons">

                        <a href="mailto:{{ $contact_request->email }}"
                           class="quick-action-btn email-action">
                            <i class="fas fa-envelope"></i>
                            Send Email
                        </a>

                        <a href="tel:{{ $contact_request->phone }}"
                           class="quick-action-btn call-action">
                            <i class="fas fa-phone-alt"></i>
                            Call Contact
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

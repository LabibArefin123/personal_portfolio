@extends('adminlte::page')

@section('title', 'Contact Requests')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/index_page/contact_resp.css') }}">
@stop

@section('content_header')
    <div class="cr-page-header">
        <div>
            <div class="cr-breadcrumb">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <i class="fas fa-chevron-right"></i>
                <span>Request Management</span>
            </div>

            <h1>
                <span class="cr-heading-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </span>
                Contact & Appointment Requests
            </h1>

            <p>Manage incoming messages, appointments and client inquiries.</p>
        </div>

        <div class="cr-header-date">
            <i class="far fa-calendar-alt"></i>
            {{ now()->format('d M Y') }}
        </div>
    </div>
@stop

@section('content')

    {{-- STATISTICS --}}
    @include('backend.setting_management.contact_requests.partial_pages.index_page.part_1')

    {{-- MAIN TABLE --}}
    <div class="cr-main-card">

        <div class="cr-card-header">
            <div>
                <h4>
                    <i class="fas fa-list-ul"></i>
                    All Requests
                </h4>
                <p>Review and manage submitted contact requests.</p>
            </div>

            <div class="cr-live-indicator">
                <span></span>
                DataTables Records
            </div>
        </div>

        <div class="cr-table-toolbar">

            <div class="cr-table-description">
                <i class="fas fa-shield-alt"></i>
                Secure request management
            </div>

            <div class="cr-table-description">
                Total {{ number_format($requests->count()) }} requests
            </div>

        </div>

        <div class="cr-table-wrapper">

            <table class="table w-100" id="dataTables">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Information</th>
                        <th>Phone</th>
                        <th>Request Type</th>
                        <th>Message Preview</th>
                        <th>IP Submissions</th>
                        <th>Submitted At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($requests as $requestItem)
                        @php
                            $isContact = $requestItem->type === 'contact';
                            $submissionCount = (int) $requestItem->ip_submissions;
                        @endphp

                        <tr>

                            {{-- NUMBER --}}
                            <td>
                                <span class="cr-row-number">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            {{-- CLIENT INFORMATION --}}
                            <td>
                                <div class="cr-client-info">

                                    <div class="cr-client-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>

                                    <div class="cr-client-details">
                                        <strong>
                                            {{ $requestItem->name }}
                                        </strong>

                                        <span>
                                            <i class="far fa-envelope"></i>
                                            {{ $requestItem->email ?: 'No email provided' }}
                                        </span>
                                    </div>

                                </div>
                            </td>

                            {{-- PHONE --}}
                            <td>
                                @if ($requestItem->phone)
                                    <span class="cr-phone-value">
                                        <i class="fas fa-phone-alt"></i>
                                        {{ $requestItem->phone }}
                                    </span>
                                @else
                                    <span class="cr-empty-value">
                                        Not provided
                                    </span>
                                @endif
                            </td>

                            {{-- REQUEST TYPE --}}
                            <td>
                                <span class="cr-type-badge {{ $isContact ? 'cr-type-contact' : 'cr-type-appointment' }}">

                                    <i class="fas {{ $isContact ? 'fa-comment-dots' : 'fa-calendar-check' }}"></i>

                                    {{ ucfirst($requestItem->type) }}

                                </span>
                            </td>

                            {{-- MESSAGE PREVIEW --}}
                            <td>
                                <div class="cr-message-preview">

                                    <span>
                                        {{ \Illuminate\Support\Str::limit($requestItem->message, 65) }}
                                    </span>

                                    <button type="button" class="cr-message-view view-full-message"
                                        data-message="{{ $requestItem->message }}" title="View full message">

                                        <i class="fas fa-expand-alt"></i>

                                    </button>

                                </div>
                            </td>

                            {{-- IP SUBMISSIONS --}}
                            <td>
                                @php
                                    $submissionCount = (int) $requestItem->total_count;
                                @endphp

                                <span
                                    class="cr-submission-count
        {{ $submissionCount >= 5 ? 'cr-count-warning' : 'cr-count-normal' }}">

                                    <i class="fas fa-layer-group"></i>

                                    <span class="cr-count-value" data-count="{{ $submissionCount }}">
                                        {{ $submissionCount }}
                                    </span>

                                </span>
                            </td>
                            {{-- CREATED DATE --}}
                            <td>
                                <div class="cr-date-info">

                                    <strong>
                                        {{ $requestItem->created_at->format('d M Y') }}
                                    </strong>

                                    <span>
                                        <i class="far fa-clock"></i>
                                        {{ $requestItem->created_at->format('h:i A') }}
                                    </span>

                                </div>
                            </td>

                            {{-- ACTION --}}
                            <td>
                                <a href="{{ route('contact_requests.show', $requestItem->id) }}" class="cr-action-button"
                                    title="View request">

                                    <i class="fas fa-eye"></i>
                                    <span>View</span>

                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="cr-empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <h5>No Contact Requests Found</h5>
                                    <p>Submitted requests will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="cr-table-footer">
            <span>
                <i class="fas fa-info-circle"></i>
                Search, sorting and pagination are powered by DataTables.
            </span>
        </div>

    </div>

    {{-- FULL MESSAGE MODAL --}}
    <div class="modal fade cr-message-modal" id="fullMessageModal" tabindex="-1" aria-labelledby="fullMessageModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="cr-modal-heading">

                        <div class="cr-modal-icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>

                        <div>
                            <h5 id="fullMessageModalLabel">Full Message</h5>
                            <span>Client inquiry details</span>
                        </div>

                    </div>

                    <button type="button" class="btn-close cr-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>

                <div class="modal-body">
                    <div class="cr-full-message" id="fullMessageContent"></div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn cr-modal-close-btn" data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        Close

                    </button>

                </div>

            </div>

        </div>
    </div>

@stop

@push('js')
    <script src="{{ asset('js/custom_backend/contact_page/contact_request_index.js') }}"></script>
@endpush

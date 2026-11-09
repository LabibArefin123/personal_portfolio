@extends('adminlte::page')

@section('title', 'Contact Requests')

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
    <div class="row cr-stats-row">

        <div class="col-xl-3 col-md-6">
            <div class="cr-stat-card cr-stat-blue">
                <div class="cr-stat-content">
                    <span>Total Requests</span>
                    <h3>{{ number_format($totalRequests) }}</h3>
                    <small>All incoming requests</small>
                </div>
                <div class="cr-stat-icon">
                    <i class="fas fa-inbox"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="cr-stat-card cr-stat-green">
                <div class="cr-stat-content">
                    <span>Contact Requests</span>
                    <h3>{{ number_format($contactCount) }}</h3>
                    <small>General inquiries</small>
                </div>
                <div class="cr-stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="cr-stat-card cr-stat-purple">
                <div class="cr-stat-content">
                    <span>Appointments</span>
                    <h3>{{ number_format($appointmentCount) }}</h3>
                    <small>Appointment inquiries</small>
                </div>
                <div class="cr-stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="cr-stat-card cr-stat-orange">
                <div class="cr-stat-content">
                    <span>Today's Requests</span>
                    <h3>{{ number_format($todayCount) }}</h3>
                    <small>Received today</small>
                </div>
                <div class="cr-stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
        </div>

    </div>

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
                Paginated Records
            </div>
        </div>

        <div class="cr-table-toolbar">
            <div class="cr-table-description">
                <i class="fas fa-shield-alt"></i>
                Secure request management
            </div>

            <div class="cr-table-description">
                Showing {{ $requests->firstItem() ?? 0 }}
                – {{ $requests->lastItem() ?? 0 }}
                of {{ number_format($requests->total()) }} requests
            </div>
        </div>

        <div class="cr-table-wrapper">

            <table class="table w-100" id="contactRequestTable">

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
                                    {{ $requests->firstItem() + $loop->index }}
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
                                            {{ $requestItem->email }}
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
                                <span
                                    class="cr-type-badge
                                    {{ $isContact ? 'cr-type-contact' : 'cr-type-appointment' }}">

                                    <i
                                        class="fas
                                        {{ $isContact ? 'fa-comment-dots' : 'fa-calendar-check' }}">
                                    </i>

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
                                <span
                                    class="cr-submission-count
                                    {{ $submissionCount >= 5 ? 'cr-count-warning' : 'cr-count-normal' }}">

                                    <i class="fas fa-layer-group"></i>
                                    {{ $submissionCount }}

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

        {{-- PAGINATION FOOTER --}}
        @if ($requests->hasPages())
            <div class="cr-pagination-wrapper">

                <div class="cr-pagination-info">
                    Showing
                    <strong>{{ $requests->firstItem() }}</strong>
                    to
                    <strong>{{ $requests->lastItem() }}</strong>
                    of
                    <strong>{{ $requests->total() }}</strong>
                    requests
                </div>

                <div class="cr-pagination-links">
                    {{ $requests->links() }}
                </div>

            </div>
        @endif

        <div class="cr-table-footer">
            <span>
                <i class="fas fa-info-circle"></i>
                Request information is displayed using Laravel pagination.
            </span>
        </div>

    </div>

    {{-- FULL MESSAGE MODAL --}}
    <div class="modal fade cr-message-modal" id="fullMessageModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="cr-modal-heading">

                        <div class="cr-modal-icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>

                        <div>
                            <h5>Full Message</h5>
                            <span>Client inquiry details</span>
                        </div>

                    </div>

                    <button type="button" class="close cr-modal-close" data-dismiss="modal" aria-label="Close">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">
                    <div class="cr-full-message" id="fullMessageContent"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn cr-modal-close-btn" data-dismiss="modal">

                        <i class="fas fa-times mr-1"></i>
                        Close

                    </button>
                </div>
            </div>
        </div>
    </div>
@stop


@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/contact_page/contact_resp.css') }}">
@stop

@section('js')

    <script>
        function showDtToast(message) {
            $('#dtErrorMessage').text(message);

            $('#dtErrorToast').addClass('show');

            clearTimeout(window.crToastTimer);

            window.crToastTimer = setTimeout(() => {
                closeDtToast();
            }, 5000);
        }

        function closeDtToast() {
            $('#dtErrorToast').removeClass('show');
        }

        $(function() {

            $.fn.dataTable.ext.errMode = 'none';

            const table = $('#contactRequestTable').DataTable({

                processing: true,
                serverSide: true,
                responsive: true,

                ajax: {
                    url: "{{ route('contact_requests.index') }}",
                    type: "GET",
                    error: function() {
                        showDtToast(
                            'Unable to load requests. Please try again.'
                        );
                    }
                },

                columns: [

                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'client',
                        name: 'name'
                    },

                    {
                        data: 'phone',
                        name: 'phone'
                    },

                    {
                        data: 'type',
                        name: 'type',
                        orderable: true,
                        searchable: true
                    },

                    {
                        data: 'message',
                        name: 'message',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'total_today',
                        name: 'total_today',
                        searchable: false
                    },

                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }

                ],

                order: [
                    [6, 'desc']
                ],

                pageLength: 10,

                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],

                language: {

                    processing: '<div class="cr-loader"><span></span> Loading requests...</div>',

                    emptyTable: 'No contact or appointment requests found.',

                    zeroRecords: 'No matching requests found.',

                    search: '',

                    searchPlaceholder: 'Search requests...',

                    lengthMenu: 'Show _MENU_ entries',

                    info: 'Showing _START_ to _END_ of _TOTAL_ requests',

                    infoEmpty: 'No requests available',

                    paginate: {
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                },

                drawCallback: function() {
                    $('.dataTables_paginate .paginate_button')
                        .addClass('cr-page-button');
                }

            });

            // FULL MESSAGE MODAL
            $('#contactRequestTable').on(
                'click',
                '.view-full-message',
                function() {

                    const message = $(this).attr('data-message') || '';

                    // Text insertion prevents HTML injection.
                    $('#fullMessageContent').text(message);

                    $('#fullMessageModal').modal('show');
                }
            );

            table.on('error.dt', function(e, settings, techNote, message) {

                console.error('Contact DataTable Error:', message);

                showDtToast(
                    'A technical issue occurred while loading requests.'
                );

            });

        });
    </script>

@stop

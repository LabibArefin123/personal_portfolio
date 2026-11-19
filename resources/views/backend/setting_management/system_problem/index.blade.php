
@extends('adminlte::page')

@section('title', 'System Problems')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/index_page/system_problem_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/index_page/system_problem_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/index_page/system_problem_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/index_page/system_problem_badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/index_page/system_problem_responsive.css') }}">
@stop

@section('content_header')
    <div class="sp-page-header">
        <div class="sp-header-content">
            <div class="sp-header-icon">
                <i class="fas fa-headset"></i>
            </div>

            <div class="sp-header-text">
                <h1>System Problems</h1>
                <p>Manage, review and track reported system issues.</p>
            </div>
        </div>

        <div class="sp-header-label">
            <i class="fas fa-shield-alt"></i>
            Support Center
        </div>
    </div>
@stop

@section('content')
    <div class="sp-page-container">
        {{-- Information Header --}}
        <div class="sp-section-intro">
            <div>
                <h5>
                    <i class="fas fa-clipboard-list"></i>
                    Reported Issues
                </h5>
                <p>Review submitted problems and take appropriate action.</p>
            </div>

            <div class="sp-live-indicator">
                <span class="sp-live-dot"></span>
                Live Records
            </div>
        </div>

        {{-- DataTable Card --}}
        <div class="sp-table-card">

            <div class="sp-table-card-header">
                <div class="sp-table-heading">
                    <div class="sp-table-heading-icon">
                        <i class="fas fa-list-alt"></i>
                    </div>

                    <div>
                        <h6>Problem Reports</h6>
                        <span>All submitted system problem reports</span>
                    </div>
                </div>

                <div class="sp-table-header-note">
                    <i class="fas fa-sync-alt"></i>
                    Updated automatically on reload
                </div>
            </div>

            {{-- DataTable Error Message --}}
            <div class="sp-error-message" id="dtErrorMessage">
                <div class="sp-error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <div>
                    <strong>Unable to load reports</strong>
                    <p class="mb-0" id="dtErrorText">
                        Something went wrong. Please try again.
                    </p>
                </div>

                <button type="button" class="sp-error-close" id="dtErrorClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="sp-table-wrapper">
                <table class="table w-100" id="systemProblemTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Problem ID</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Attachment</th>
                            <th>Reported At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="sp-table-footer">
                <div>
                    <i class="fas fa-info-circle"></i>
                    Review each report carefully before taking action.
                </div>
            </div>

        </div>
    </div>

@stop

@section('js')

<script>
    function showDtToast(message) {
        $('#dtErrorText').text(message);
        $('#dtErrorMessage').addClass('show');
    }

    function hideDtToast() {
        $('#dtErrorMessage').removeClass('show');
    }

    $(function () {

        $.fn.dataTable.ext.errMode = 'none';

        const table = $('#systemProblemTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            autoWidth: false,

            pageLength: 10,

            order: [[5, 'desc']],

            language: {
                processing: `
                    <div class="sp-loading">
                        <span class="sp-spinner"></span>
                        <span>Loading problem reports...</span>
                    </div>
                `,
                emptyTable: `
                    <div class="sp-empty-state">
                        <div class="sp-empty-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h6>No Problem Reports Found</h6>
                        <p>There are currently no reported system problems.</p>
                    </div>
                `,
                zeroRecords: 'No matching problem reports found.',
                search: '',
                searchPlaceholder: 'Search problem reports...',
                lengthMenu: 'Show _MENU_ entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ reports',
                infoEmpty: 'No reports available',
                paginate: {
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                }
            },

            ajax: {
                url: "{{ route('system_problems.index') }}",
                type: 'GET',

                error: function (xhr, error, thrown) {
                    console.error('DataTable Error:', xhr.responseText);

                    showDtToast(
                        'We couldn’t load the system problems. Please try again later.'
                    );
                }
            },

            columns: [
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'problem_uid'
                },
                {
                    data: 'problem_title'
                },
                {
                    data: 'status'
                },
                {
                    data: 'problem_file',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ],

            drawCallback: function () {
                hideDtToast();

                $('.sp-table-card').addClass('sp-table-loaded');
            }
        });

        table.on('error.dt', function (e, settings, techNote, message) {
            console.error('DataTable Tech Error:', message);

            showDtToast(
                'A configuration issue occurred while loading reports. Please contact the technical team.'
            );
        });

        $('#dtErrorClose').on('click', function () {
            hideDtToast();
        });

    });
</script>
@stop

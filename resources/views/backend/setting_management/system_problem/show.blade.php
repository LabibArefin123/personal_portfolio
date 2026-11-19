
@extends('adminlte::page')

@section('title', 'System Problem Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/show_page/system_problem_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/show_page/system_problem_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/show_page/system_problem_info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/show_page/system_problem_attachment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/setting_management/system_problem/show_page/system_problem_responsive.css') }}">
@stop

@section('content_header')
    <div class="sps-page-header">
        <div class="sps-header-content">
            <div class="sps-header-icon">
                <i class="fas fa-file-alt"></i>
            </div>

            <div>
                <h1>Problem Details</h1>
                <p>Review the submitted system problem and its information.</p>
            </div>
        </div>

        <div class="sps-header-actions">
            <a href="{{ route('system_problems.index') }}"
                class="sps-btn sps-btn-back">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Reports</span>
            </a>
        </div>
    </div>
@stop

@section('content')

    @php
        $priority = strtolower($systemProblem->status ?? 'low');

        $priorityClasses = [
            'low' => 'sps-priority-low',
            'medium' => 'sps-priority-medium',
            'high' => 'sps-priority-high',
            'critical' => 'sps-priority-critical',
        ];

        $priorityIcons = [
            'low' => 'fa-info-circle',
            'medium' => 'fa-exclamation-circle',
            'high' => 'fa-exclamation-triangle',
            'critical' => 'fa-radiation',
        ];

        $priorityClass = $priorityClasses[$priority] ?? 'sps-priority-default';
        $priorityIcon = $priorityIcons[$priority] ?? 'fa-flag';

        $extension = strtolower(
            pathinfo($systemProblem->problem_file ?? '', PATHINFO_EXTENSION)
        );

        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);

        $isPdf = $extension === 'pdf';

        $filePath = $systemProblem->problem_file
            ? ($isImage
                ? asset('uploads/problem/images/' . $systemProblem->problem_file)
                : asset('uploads/problem/files/' . $systemProblem->problem_file))
            : null;
    @endphp

    <div class="sps-page-container">

        {{-- Overview --}}
        <div class="sps-overview-card sps-animate">

            <div class="sps-overview-main">
                <div class="sps-overview-label">
                    <i class="fas fa-ticket-alt"></i>
                    SUPPORT TICKET
                </div>

                <h2>{{ $systemProblem->problem_title }}</h2>

                <div class="sps-overview-meta">
                    <span>
                        <i class="fas fa-fingerprint"></i>
                        {{ $systemProblem->problem_uid }}
                    </span>

                    <span class="sps-meta-divider"></span>

                    <span>
                        <i class="far fa-calendar-alt"></i>
                        {{ $systemProblem->created_at->format('d M Y') }}
                    </span>
                </div>
            </div>

            <div class="sps-overview-priority">
                <span class="sps-priority-caption">REPORTED PRIORITY</span>

                <span class="sps-priority-badge {{ $priorityClass }}">
                    <i class="fas {{ $priorityIcon }}"></i>
                    {{ ucfirst($priority) }}
                </span>
            </div>

            <div class="sps-overview-decoration">
                <i class="fas fa-headset"></i>
            </div>

        </div>

        {{-- Information Cards --}}
        <div class="sps-info-grid sps-animate">

            <div class="sps-info-card">
                <div class="sps-info-icon sps-icon-blue">
                    <i class="fas fa-fingerprint"></i>
                </div>

                <div class="sps-info-content">
                    <span>Problem Reference</span>
                    <strong>{{ $systemProblem->problem_uid }}</strong>
                </div>

                <div class="sps-info-card-decoration"></div>
            </div>

            <div class="sps-info-card">
                <div class="sps-info-icon sps-icon-purple">
                    <i class="fas fa-flag"></i>
                </div>

                <div class="sps-info-content">
                    <span>Priority Level</span>
                    <strong>{{ ucfirst($priority) }}</strong>
                </div>

                <div class="sps-info-card-decoration"></div>
            </div>

            <div class="sps-info-card">
                <div class="sps-info-icon sps-icon-green">
                    <i class="far fa-clock"></i>
                </div>

                <div class="sps-info-content">
                    <span>Reported Date</span>
                    <strong>{{ $systemProblem->created_at->format('d M Y') }}</strong>
                </div>

                <div class="sps-info-card-decoration"></div>
            </div>

            <div class="sps-info-card">
                <div class="sps-info-icon sps-icon-orange">
                    <i class="far fa-calendar-check"></i>
                </div>

                <div class="sps-info-content">
                    <span>Reported Time</span>
                    <strong>{{ $systemProblem->created_at->format('h:i A') }}</strong>
                </div>

                <div class="sps-info-card-decoration"></div>
            </div>

        </div>

        {{-- Main Details --}}
        <div class="sps-content-grid">

            {{-- Description --}}
            <div class="sps-details-card sps-animate">

                <div class="sps-card-heading">
                    <div class="sps-card-heading-icon">
                        <i class="fas fa-align-left"></i>
                    </div>

                    <div>
                        <h5>Problem Description</h5>
                        <p>Detailed information about the reported issue.</p>
                    </div>
                </div>

                <div class="sps-description-content">
                    @if (filled($systemProblem->problem_description))
                        {!! nl2br(e($systemProblem->problem_description)) !!}
                    @else
                        <div class="sps-no-description">
                            <i class="far fa-comment-dots"></i>
                            <span>No description was provided for this report.</span>
                        </div>
                    @endif
                </div>

                <div class="sps-description-footer">
                    <i class="fas fa-info-circle"></i>
                    Review the reported details before making changes.
                </div>

            </div>

            {{-- Report Information --}}
            <div class="sps-details-card sps-animate">

                <div class="sps-card-heading">
                    <div class="sps-card-heading-icon sps-heading-purple">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div>
                        <h5>Report Information</h5>
                        <p>Summary of the submitted report.</p>
                    </div>
                </div>

                <div class="sps-report-list">

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="fas fa-hashtag"></i>
                            Report ID
                        </span>
                        <strong>{{ $systemProblem->id }}</strong>
                    </div>

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="fas fa-ticket-alt"></i>
                            Reference
                        </span>
                        <strong>{{ $systemProblem->problem_uid }}</strong>
                    </div>

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="fas fa-exclamation-circle"></i>
                            Priority
                        </span>
                        <strong class="sps-report-priority">
                            {{ ucfirst($priority) }}
                        </strong>
                    </div>

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="far fa-calendar-alt"></i>
                            Date
                        </span>
                        <strong>{{ $systemProblem->created_at->format('d M Y') }}</strong>
                    </div>

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="far fa-clock"></i>
                            Time
                        </span>
                        <strong>{{ $systemProblem->created_at->format('h:i A') }}</strong>
                    </div>

                    <div class="sps-report-item">
                        <span class="sps-report-label">
                            <i class="fas fa-paperclip"></i>
                            Attachment
                        </span>
                        <strong>
                            {{ $systemProblem->problem_file ? 'Available' : 'Not Provided' }}
                        </strong>
                    </div>

                </div>

                <div class="sps-report-footer">
                    <i class="fas fa-shield-alt"></i>
                    System Problem Report
                </div>

            </div>

        </div>

        {{-- Attachment Section --}}
        <div class="sps-details-card sps-attachment-card sps-animate">

            <div class="sps-card-heading">
                <div class="sps-card-heading-icon sps-heading-orange">
                    <i class="fas fa-paperclip"></i>
                </div>

                <div>
                    <h5>Report Attachment</h5>
                    <p>Files and supporting evidence submitted with this report.</p>
                </div>
            </div>

            @if ($systemProblem->problem_file)

                <div class="sps-attachment-content">

                    @if ($isImage)

                        <div class="sps-image-preview">
                            <a href="{{ $filePath }}" target="_blank" rel="noopener noreferrer"
                                title="Open full image">
                                <img src="{{ $filePath }}"
                                    alt="Problem report attachment"
                                    loading="lazy">
                                <span class="sps-image-overlay">
                                    <i class="fas fa-expand-alt"></i>
                                    View Full Image
                                </span>
                            </a>
                        </div>

                    @else

                        <div class="sps-file-preview">

                            <div class="sps-file-icon {{ $isPdf ? 'sps-pdf-icon' : 'sps-other-file-icon' }}">
                                <i class="fas {{ $isPdf ? 'fa-file-pdf' : 'fa-file-alt' }}"></i>
                            </div>

                            <div class="sps-file-info">
                                <strong>{{ $systemProblem->problem_file }}</strong>
                                <span>{{ strtoupper($extension ?: 'FILE') }} Attachment</span>
                            </div>

                            <a href="{{ $filePath }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="sps-file-open-btn">
                                <i class="fas fa-external-link-alt"></i>
                                {{ $isPdf ? 'View PDF' : 'Open File' }}
                            </a>

                        </div>

                    @endif

                </div>

            @else

                <div class="sps-no-attachment">
                    <div class="sps-no-attachment-icon">
                        <i class="far fa-folder-open"></i>
                    </div>

                    <h6>No Attachment Available</h6>
                    <p>This problem report was submitted without an attachment.</p>
                </div>

            @endif

        </div>

        {{-- Bottom Actions --}}
        <div class="sps-bottom-actions">
            <a href="{{ route('system_problems.index') }}" class="sps-bottom-back">
                <i class="fas fa-arrow-left"></i>
                Back to All Reports
            </a>
        </div>
    </div>
@stop

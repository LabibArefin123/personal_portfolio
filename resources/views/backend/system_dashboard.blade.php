@extends('adminlte::page')

@section('title', 'System Dashboard')

@section('content_header')
    <div class="system-page-heading">
        <div>
            <span class="system-eyebrow">
                <i class="fas fa-shield-alt"></i>
                SYSTEM MONITORING
            </span>

            <h1>System Dashboard</h1>

            <p>Monitor database statistics, user activity, and backup information.</p>
        </div>

        <div class="system-live-indicator">
            <span class="system-live-dot"></span>
            Monitoring Overview
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend/admin_page/dashboard_system.css') }}">
@stop

@section('content')
    <div class="container-fluid system-dashboard-container">

        {{-- Welcome Banner --}}
        <section class="system-welcome system-reveal">
            <div class="system-welcome-content">
                <span class="system-welcome-label">
                    <i class="fas fa-server"></i>
                    INFRASTRUCTURE OVERVIEW
                </span>

                <h2>Your system at a glance.</h2>

                <p>
                    Review important system statistics, database records,
                    storage information, and backup status from one place.
                </p>

                <div class="system-security-note">
                    <i class="fas fa-lock"></i>
                    Database information is read-only and protected.
                </div>
            </div>

            <div class="system-welcome-decoration">
                <div class="system-circle circle-one"></div>
                <div class="system-circle circle-two"></div>

                <div class="system-server-icon">
                    <i class="fas fa-server"></i>
                </div>
            </div>
        </section>

        {{-- System Statistics --}}
        <section class="system-section system-reveal">
            <div class="system-section-heading">
                <div>
                    <span class="system-section-eyebrow">SYSTEM METRICS</span>
                    <h3>Database Overview</h3>
                    <p>Key statistics from your application database.</p>
                </div>
            </div>

            <div class="row g-3">

                {{-- Total Users --}}
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="system-stat-card system-stat-blue">
                        <div class="system-stat-top">
                            <div class="system-stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="system-stat-label">USER ACCOUNTS</span>
                        </div>

                        <div class="system-stat-bottom">
                            <h2 class="system-counter" data-count="{{ $totalUsers }}">0</h2>
                            <span>Total Users</span>
                        </div>

                        <div class="system-stat-decoration">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                {{-- Total Records --}}
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="system-stat-card system-stat-green">
                        <div class="system-stat-top">
                            <div class="system-stat-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <span class="system-stat-label">DATABASE</span>
                        </div>

                        <div class="system-stat-bottom">
                            <h2 class="system-counter" data-count="{{ $totalRecords }}">0</h2>
                            <span>Total Records</span>
                        </div>

                        <div class="system-stat-decoration">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                </div>

                {{-- Database Size --}}
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="system-stat-card system-stat-orange">
                        <div class="system-stat-top">
                            <div class="system-stat-icon">
                                <i class="fas fa-hdd"></i>
                            </div>
                            <span class="system-stat-label">STORAGE</span>
                        </div>

                        <div class="system-stat-bottom">
                            <h2 class="system-counter" data-count="{{ $databaseSize }}" data-decimals="2">0</h2>
                            <span>Database Size (MB)</span>
                        </div>

                        <div class="system-stat-decoration">
                            <i class="fas fa-hdd"></i>
                        </div>
                    </div>
                </div>

                {{-- Last Backup --}}
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="system-stat-card system-stat-purple">
                        <div class="system-stat-top">
                            <div class="system-stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <span class="system-stat-label">BACKUP STATUS</span>
                        </div>

                        <div class="system-stat-backup">
                            <h5>{{ $lastBackupTime }}</h5>
                            <span>Last Backup</span>
                        </div>

                        <div class="system-stat-decoration">
                            <i class="fas fa-history"></i>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Database Table Summary --}}
        <section class="system-section system-reveal">
            <div class="system-section-heading system-table-heading">
                <div>
                    <span class="system-section-eyebrow">DATABASE STRUCTURE</span>
                    <h3>Database Table Summary</h3>
                    <p>Record counts and latest update information for each table.</p>
                </div>

                <div class="system-table-count">
                    <i class="fas fa-table"></i>
                    {{ count($tableCounts) }} Tables
                </div>
            </div>

            <div class="system-table-card">
                <div class="system-table-topbar">
                    <div>
                        <h5>
                            <i class="fas fa-layer-group"></i>
                            Table Information
                        </h5>
                        <p>Read-only database statistics</p>
                    </div>

                    <span class="system-readonly-label">
                        <i class="fas fa-lock"></i>
                        Read Only
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table system-database-table mb-0">
                        <thead>
                            <tr>
                                <th>TABLE NAME</th>
                                <th class="text-end">RECORD COUNT</th>
                                <th class="text-end">LAST UPDATED</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tableCounts as $table => $data)
                                <tr>
                                    <td>
                                        <div class="system-table-name">
                                            <span class="system-table-icon">
                                                <i class="fas fa-table"></i>
                                            </span>
                                            <span>{{ $table }}</span>
                                        </div>
                                    </td>

                                    <td class="text-end">
                                        <span class="system-record-count">
                                            {{ number_format($data['count']) }}
                                        </span>
                                    </td>

                                    <td class="text-end">
                                        @if ($data['updated_at'])
                                            <span class="system-updated-time">
                                                <i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($data['updated_at'])->diffForHumans() }}
                                            </span>
                                        @else
                                            <span class="system-na-label">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="system-empty-state">
                                            <i class="fas fa-database"></i>
                                            <h6>No database table data</h6>
                                            <p>No table statistics are currently available.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="system-table-footer">
                    <div class="system-footer-security">
                        <i class="fas fa-shield-alt"></i>
                        Database information is displayed for monitoring only.
                    </div>

                    <span>
                        {{ count($tableCounts) }} tables monitored
                    </span>
                </div>
            </div>
        </section>

        {{-- Security Notice --}}
        <div class="system-security-footer system-reveal">
            <div class="system-security-footer-icon">
                <i class="fas fa-shield-alt"></i>
            </div>

            <div>
                <h6>System security and data protection</h6>
                <p>
                    This dashboard provides read-only monitoring information.
                    Database records cannot be modified or viewed directly from this page.
                </p>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/dashboard_page/dashboard_system.js') }}"></script>
@stop

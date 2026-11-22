
@extends('adminlte::page')

@section('title', 'Education Page Management')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/index_page/index_responsive.css') }}">
@endsection

@section('content_header')
        @include('backend.frontend_part.about_page.partials.index_page.header_part')
@stop

@section('content')
    {{-- ALERTS --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show edu-alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- STATISTICS --}}
    <div class="row edu-stat-row">
        <div class="col-lg-4 col-md-6">
            <div class="edu-stat-card stat-purple">
                <div class="edu-stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div>
                    <span>Education Profiles</span>
                    <h3>{{ $profiles->total() }}</h3>
                    <small>Available page profiles</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="edu-stat-card stat-blue">
                <div class="edu-stat-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <span>Qualifications</span>
                    <h3>{{ $educationCount }}</h3>
                    <small>Total academic records</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="edu-stat-card stat-green">
                <div class="edu-stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <span>Active Qualifications</span>
                    <h3>{{ $activeEducationCount }}</h3>
                    <small>Visible on frontend</small>
                </div>
            </div>
        </div>

    </div>

    {{-- MAIN CARD --}}
    <div class="edu-index-card">

        <div class="edu-card-heading">
            <div>
                <h4><i class="fas fa-university mr-2"></i>Education Page Overview</h4>
                <p>Manage your education profile information.</p>
            </div>

            <span class="edu-record-count">
                {{ $profiles->total() }} Records
            </span>
        </div>

        <div class="table-responsive">
            <table class="table edu-index-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Page Information</th>
                        <th>Academic Highlight</th>
                        <th>GitHub</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>
                            <td>
                                <span class="edu-row-number">
                                    {{ $profiles->firstItem() + $loop->index }}
                                </span>
                            </td>

                            <td>
                                <div class="edu-profile-cell">
                                    <div class="edu-profile-avatar">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <strong>{{ $profile->title }}</strong>
                                        <small>{{ Str::limit($profile->subtitle, 55) }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <strong class="edu-highlight-value">
                                    {{ $profile->highlight_value ?? 'Not configured' }}
                                </strong>
                                <small class="edu-muted d-block">
                                    {{ $profile->highlight_label }}
                                </small>
                            </td>

                            <td>
                                @if ($profile->github_username)
                                    <span class="edu-github-label">
                                        <i class="fab fa-github"></i>
                                        {{ $profile->github_username }}
                                    </span>
                                @else
                                    <span class="text-muted">Not connected</span>
                                @endif
                            </td>

                            <td>
                                @if ($profile->is_active)
                                    <span class="edu-status active">
                                        <i class="fas fa-check-circle"></i> Active
                                    </span>
                                @else
                                    <span class="edu-status inactive">
                                        <i class="fas fa-pause-circle"></i> Inactive
                                    </span>
                                @endif
                            </td>

                            <td>
                                <span class="edu-date">
                                    {{ $profile->updated_at?->format('d M Y') }}
                                </span>
                            </td>

                            <td>
                                <div class="edu-action-group">
                                    <a href="{{ route('education_pages.show', $profile->id) }}"
                                        class="edu-action-btn view"
                                        title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('education_pages.edit', $profile->id) }}"
                                        class="edu-action-btn edit"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="edu-empty-state">
                                    <i class="fas fa-graduation-cap"></i>
                                    <h5>No Education Profile Found</h5>
                                    <p>Run the EducationSeeder to create your initial profile.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($profiles->hasPages())
            <div class="edu-pagination">
                <div>
                    Showing {{ $profiles->firstItem() }} to {{ $profiles->lastItem() }}
                    of {{ $profiles->total() }} records
                </div>
                {{ $profiles->links() }}
            </div>
        @endif

    </div>

@stop

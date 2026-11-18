@extends('adminlte::page')

@section('title', 'Projects Management')

@section('content_header')

    <div class="project-index-header">

        <div class="project-header-content">

            <span class="project-header-label">
                <i class="fas fa-layer-group"></i>
                PORTFOLIO MANAGEMENT
            </span>

            <h1>Projects Management</h1>

            <p>
                Organize your creative work, manage published projects,
                and showcase your best portfolio pieces.
            </p>

        </div>

        <div class="project-header-actions">

            <a href="{{ route('projects.create') }}" class="project-add-btn">

                <span class="project-add-icon">
                    <i class="fas fa-plus"></i>
                </span>

                <span>Add New Project</span>

            </a>

        </div>

    </div>

@stop

@section('content')

    <div class="project-index-page">

        {{-- ==========================================
            PROJECT STATISTICS
        ========================================== --}}

        <div class="row project-stats-row">

            {{-- Total Projects --}}

            <div class="col-lg-4 col-md-6 mb-3">

                <div class="project-stat-card stat-total project-reveal">

                    <div class="project-stat-top">

                        <div class="project-stat-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>

                        <span class="project-stat-label">
                            TOTAL PROJECTS
                        </span>

                    </div>

                    <div class="project-stat-content">

                        <h2 class="project-counter" data-count="{{ $projects->count() }}">
                            0
                        </h2>

                        <p>Projects in your portfolio</p>

                    </div>

                    <div class="project-stat-decoration">
                        <i class="fas fa-layer-group"></i>
                    </div>

                </div>

            </div>

            {{-- Published Projects --}}

            <div class="col-lg-4 col-md-6 mb-3">

                <div class="project-stat-card stat-published project-reveal">

                    <div class="project-stat-top">

                        <div class="project-stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>

                        <span class="project-stat-label">
                            PUBLISHED
                        </span>

                    </div>

                    <div class="project-stat-content">

                        <h2 class="project-counter" data-count="{{ $projects->where('status', 1)->count() }}">
                            0
                        </h2>

                        <p>Live and visible projects</p>

                    </div>

                    <div class="project-stat-decoration">
                        <i class="fas fa-globe"></i>
                    </div>

                </div>

            </div>

            {{-- Featured Projects --}}

            <div class="col-lg-4 col-md-6 mb-3">

                <div class="project-stat-card stat-featured project-reveal">

                    <div class="project-stat-top">

                        <div class="project-stat-icon">
                            <i class="fas fa-star"></i>
                        </div>

                        <span class="project-stat-label">
                            FEATURED
                        </span>

                    </div>

                    <div class="project-stat-content">

                        <h2 class="project-counter" data-count="{{ $projects->where('is_highlight', 1)->count() }}">
                            0
                        </h2>

                        <p>Highlighted portfolio projects</p>

                    </div>

                    <div class="project-stat-decoration">
                        <i class="fas fa-award"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- ==========================================
            PROJECT TABLE CARD
        ========================================== --}}

        <div class="project-table-card project-reveal">

            {{-- Table Header --}}

            <div class="project-table-header">

                <div class="project-table-heading">

                    <div class="project-table-heading-icon">
                        <i class="fas fa-list-ul"></i>
                    </div>

                    <div>

                        <h4>All Projects</h4>

                        <p>
                            Browse and manage your portfolio projects
                        </p>

                    </div>

                </div>

                <div class="project-table-meta">

                    <span class="project-total-badge">
                        <i class="fas fa-folder-open"></i>
                        {{ $projects->count() }}
                        {{ Str::plural('Project', $projects->count()) }}
                    </span>

                </div>

            </div>


            {{-- Table Content --}}

            <div class="project-table-wrapper">

                <table class="table project-management-table" id="dataTables">

                    <thead>

                        <tr>
                            <th class="project-sl-column">#</th>
                            <th>PROJECT DETAILS</th>
                            <th>TECHNOLOGIES</th>
                            <th>STATUS</th>
                            <th>FEATURED</th>
                            <th class="project-action-column">ACTIONS</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($projects as $project)
                            <tr class="project-table-row">

                                {{-- Serial Number --}}

                                <td class="project-serial">

                                    <span>
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                {{-- Project Details --}}

                                <td class="project-details-cell">

                                    <div class="project-title-wrapper">

                                        <div class="project-title-icon">
                                            <i class="fas fa-code"></i>
                                        </div>

                                        <div class="project-title-content">

                                            <strong>
                                                {{ $project->title }}
                                            </strong>

                                            <p>
                                                {{ Str::limit($project->description, 85) }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Tech Stack --}}

                                <td class="project-tech-cell">

                                    @if ($project->tech_stack)
                                        <span class="project-tech-badge" title="{{ $project->tech_stack }}">

                                            <i class="fas fa-code-branch"></i>

                                            {{ Str::limit($project->tech_stack, 45) }}

                                        </span>
                                    @else
                                        <span class="project-no-tech">
                                            Not specified
                                        </span>
                                    @endif

                                </td>


                                {{-- Project Status --}}

                                <td>

                                    @if ($project->status)
                                        <span class="project-status-badge status-published">
                                            <span class="status-dot"></span>
                                            Published
                                        </span>
                                    @else
                                        <span class="project-status-badge status-draft">
                                            <span class="status-dot"></span>
                                            Draft
                                        </span>
                                    @endif

                                </td>


                                {{-- Featured Status --}}

                                <td>

                                    @if ($project->is_highlight)
                                        <span class="project-featured-badge">
                                            <i class="fas fa-star"></i>
                                            Featured
                                        </span>
                                    @else
                                        <span class="project-not-featured">
                                            <i class="far fa-star"></i>
                                            Standard
                                        </span>
                                    @endif

                                </td>


                                {{-- Actions --}}

                                <td>

                                    <div class="project-action-group">

                                        <a href="{{ route('projects.show', $project->id) }}"
                                            class="project-action-btn action-view" title="View project"
                                            aria-label="View project">

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="project-action-btn action-edit" title="Edit project"
                                            aria-label="Edit project">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            class="project-delete-form">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="project-action-btn action-delete"
                                                title="Delete project" aria-label="Delete project">

                                                <i class="fas fa-trash-alt"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="project-empty-state">

                                        <div class="project-empty-icon">
                                            <i class="fas fa-folder-open"></i>
                                        </div>

                                        <h4>No projects yet</h4>

                                        <p>
                                            Your portfolio is waiting for its first project.
                                            Start by adding something amazing!
                                        </p>

                                        <a href="{{ route('projects.create') }}" class="project-empty-btn">

                                            <i class="fas fa-plus"></i>
                                            Create Your First Project

                                        </a>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Table Footer --}}

            @if ($projects->count() > 0)
                <div class="project-table-footer">

                    <span>
                        <i class="fas fa-info-circle"></i>
                        Showing {{ $projects->count() }}
                        {{ Str::plural('project', $projects->count()) }}
                        in your portfolio
                    </span>

                    <span class="project-footer-status">
                        <i class="fas fa-circle"></i>
                        Portfolio overview
                    </span>

                </div>
            @endif

        </div>

    </div>

@stop

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/index_page/project_index_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/index_page/project_index_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/index_page/project_index_stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/index_page/project_index_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/index_page/project_index_resp.css') }}">
@stop


@section('js')
    <script src="{{ asset('js/custom_backend/project_page/index_page/project_index.js') }}"></script>
@stop

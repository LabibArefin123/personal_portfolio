@extends('adminlte::page')

@section('title', 'Projects Management')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="font-weight-bold">Projects Management</h1>
            <p class="text-muted mb-0">
                Manage portfolio projects and showcase items.
            </p>
        </div>


        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Project
        </a>


    </div>
@stop

@section('content')

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $projects->count() }}</h3>
                    <p>Total Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $projects->where('status', 1)->count() }}</h3>
                    <p>Published Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $projects->where('is_highlight', 1)->count() }}</h3>
                    <p>Featured Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>


    </div>

    <div class="card shadow-sm">


        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list"></i> Projects List
            </h3>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover table-bordered align-middle" id="dataTables">

                <thead class="thead-light">
                    <tr>
                        <th>SL</th>
                        {{-- <th width="80">Image</th> --}}
                        <th>Project</th>
                        <th>Tech Stack</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>
                                <img src="{{ asset($project->image) }}" class="img-thumbnail" width="60">
                            </td> --}}

                            <td>
                                <strong>{{ $project->title }}</strong>

                                <br>

                                <small class="text-muted">
                                    {{ Str::limit($project->description, 80) }}
                                </small>
                            </td>

                            <td>
                                {{ $project->tech_stack }}
                            </td>

                            <td>
                                @if ($project->status)
                                    <span class="badge badge-success">
                                        Published
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if ($project->is_highlight)
                                    <span class="badge badge-warning">
                                        Featured
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete project?')">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No projects found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
        <div style="height: 50px;"></div>

    </div>

@stop

@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <h1 class="mb-0">
            Project Management
        </h1>

        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">

            <i class="fas fa-plus"></i> Add Project
        </a>

    </div>
@stop

@section('content')

    <div class="card shadow-sm border-0">

        <div class="card-body table-responsive p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="bg-dark text-white">

                    <tr>

                        <th width="70">#</th>

                        <th>Image</th>

                        <th>Title</th>

                        <th>Tech Stack</th>

                        <th>Highlight</th>

                        <th>Status</th>

                        <th width="220">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($projects as $project)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if ($project->image)
                                    <img src="{{ asset($project->image) }}" width="70" height="50"
                                        style="object-fit: cover; border-radius: 8px;">
                                @endif

                            </td>

                            <td>

                                <strong>
                                    {{ $project->title }}
                                </strong>

                            </td>

                            <td>

                                <span class="badge badge-info">

                                    {{ $project->tech_stack }}

                                </span>

                            </td>

                            <td>

                                @if ($project->is_highlight)
                                    <span class="badge badge-success">
                                        Yes
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        No
                                    </span>
                                @endif

                            </td>

                            <td>

                                @if ($project->status)
                                    <span class="badge badge-primary">
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Inactive
                                    </span>
                                @endif

                            </td>

                            <td>

                                <div class="btn-group">

                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this project?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-4">

                                No projects found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@stop

@extends('adminlte::page')

@section('title', 'Project Details')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        
        <div>
            <h1 class="font-weight-bold">
                {{ $project->title }}
            </h1>

            <p class="text-muted mb-0">
                Portfolio Project Details
            </p>
        </div>

        <div>

            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">

                <i class="fas fa-edit"></i>
                Edit Project

            </a>

            <a href="{{ route('projects.index') }}" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Back

            </a>

        </div>
        

    </div>

@stop

@section('content')

    <div class="row">

        
        <div class="col-md-4">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <img src="{{ asset($project->image) }}" class="img-fluid rounded shadow-sm">

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">

                    <h5 class="mb-0">
                        Project Information
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">Title</th>
                            <td>{{ $project->title }}</td>
                        </tr>

                        <tr>
                            <th>Technology Stack</th>
                            <td>{{ $project->tech_stack }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>

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

                        </tr>

                        <tr>
                            <th>Featured</th>

                            <td>

                                @if ($project->is_highlight)
                                    <span class="badge badge-warning">
                                        Featured Project
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        No
                                    </span>
                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>Live Website</th>

                            <td>

                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank">

                                        {{ $project->live_url }}

                                    </a>
                                @else
                                    N/A
                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>GitHub Repository</th>

                            <td>

                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank">

                                        {{ $project->github_url }}

                                    </a>
                                @else
                                    N/A
                                @endif

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>
        

    </div>

    <div class="card shadow-sm mt-3">

        
        <div class="card-header">

            <h5 class="mb-0">
                Project Description
            </h5>

        </div>

        <div class="card-body">

            {!! nl2br(e($project->description)) !!}

        </div>
        

    </div>

    <div style="height: 50px;"></div>

@stop

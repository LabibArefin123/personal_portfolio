@extends('adminlte::page')

@section('title', 'Project Details')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <h1 class="mb-0">
            Project Details
        </h1>

        <div class="btn-group">

            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">

                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">

                <i class="fas fa-arrow-left"></i> Go Back
            </a>

        </div>

    </div>

@stop

@section('content')

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="row">

                <div class="col-md-5">

                    @if ($project->image)
                        <img src="{{ asset($project->image) }}" class="img-fluid rounded shadow-sm">
                    @endif

                </div>

                <div class="col-md-7">

                    <table class="table table-bordered">

                        <tr>

                            <th width="180">
                                Project Title
                            </th>

                            <td>
                                {{ $project->title }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tech Stack
                            </th>

                            <td>
                                {{ $project->tech_stack }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Description
                            </th>

                            <td>
                                {{ $project->description }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Live URL
                            </th>

                            <td>

                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank">

                                        Visit Live Project
                                    </a>
                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                GitHub URL
                            </th>

                            <td>

                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank">

                                        View Repository
                                    </a>
                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Highlight
                            </th>

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

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

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

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

@stop

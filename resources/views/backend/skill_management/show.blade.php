@extends('adminlte::page')

@section('title', 'Skill Details')

@section('content_header')

    <h1>
        <i class="fas fa-eye text-info"></i>
        Skill Details
    </h1>

@stop

@section('content')

    <div class="row">

        <div class="col-md-8">

            <div class="card card-info card-outline">

                <div class="card-header">

                    <h3 class="card-title">
                        {{ $skill->name }}
                    </h3>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">Category</th>
                            <td>{{ $skill->category }}</td>
                        </tr>

                        <tr>
                            <th>Skill Name</th>
                            <td>{{ $skill->name }}</td>
                        </tr>

                        <tr>
                            <th>Skill Level</th>
                            <td>

                                <div class="progress">

                                    <div class="progress-bar bg-success" style="width:{{ $skill->percentage }}%">

                                        {{ $skill->percentage }}%

                                    </div>

                                </div>

                            </td>
                        </tr>

                        <tr>
                            <th>Position</th>
                            <td>{{ $skill->position }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>

                            <td>

                                @if ($skill->status)
                                    <span class="badge badge-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Inactive
                                    </span>
                                @endif

                            </td>

                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $skill->created_at->format('d M Y h:i A') }}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $skill->updated_at->format('d M Y h:i A') }}</td>
                        </tr>

                    </table>

                </div>

                <div class="card-footer">

                    <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary">

                        <i class="fas fa-edit"></i>
                        Edit

                    </a>

                    <a href="{{ route('skills.index') }}" class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Back

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Skill Preview
                    </h3>
                </div>

                <div class="card-body">

                    <h5>{{ $skill->name }}</h5>

                    <small class="text-muted">
                        {{ $skill->category }}
                    </small>

                    <hr>

                    <div class="progress">

                        <div class="progress-bar bg-success" style="width:{{ $skill->percentage }}%">

                        </div>

                    </div>

                    <div class="mt-2 text-right">

                        <strong>
                            {{ $skill->percentage }}%
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

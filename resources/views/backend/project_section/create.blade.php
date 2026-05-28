@extends('adminlte::page')

@section('title', 'Create Project')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <h1 class="mb-0">
            Create Project
        </h1>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">

            <i class="fas fa-arrow-left"></i> Back
        </a>

    </div>

@stop

@section('content')

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Project Title
                            </label>

                            <input type="text" name="title" class="form-control" required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Tech Stack
                            </label>

                            <input type="text" name="tech_stack" class="form-control">

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label>
                        Description
                    </label>

                    <textarea name="description" rows="5" class="form-control"></textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Live URL
                            </label>

                            <input type="url" name="live_url" class="form-control">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                GitHub URL
                            </label>

                            <input type="url" name="github_url" class="form-control">

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label>
                        Project Image
                    </label>

                    <input type="file" name="image" class="form-control">

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-check">

                            <input type="checkbox" name="is_highlight" value="1" class="form-check-input">

                            <label class="form-check-label">
                                Highlight Project
                            </label>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-check">

                            <input type="checkbox" name="status" value="1" checked class="form-check-input">

                            <label class="form-check-label">
                                Active Status
                            </label>

                        </div>

                    </div>

                </div>

                <button class="btn btn-primary mt-4">

                    <i class="fas fa-save"></i> Save Project

                </button>

            </form>

        </div>

    </div>

@stop

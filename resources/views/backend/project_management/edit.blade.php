@extends('adminlte::page')

@section('title', 'Edit Project')

@section('content_header')

    <h1>Edit Project</h1>

@stop

@section('content')

    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">

        
        @csrf
        @method('PUT')

        <div class="card shadow-sm">

            <div class="card-header">

                <h3 class="card-title">
                    Update Project Information
                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Project Title</label>

                        <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Tech Stack</label>

                        <input type="text" name="tech_stack" class="form-control"
                            value="{{ old('tech_stack', $project->tech_stack) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Live URL</label>

                        <input type="url" name="live_url" class="form-control"
                            value="{{ old('live_url', $project->live_url) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>GitHub URL</label>

                        <input type="url" name="github_url" class="form-control"
                            value="{{ old('github_url', $project->github_url) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Project Image</label>

                        <input type="file" name="image" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3 text-center">

                        <img src="{{ asset($project->image) }}" width="150" class="img-thumbnail">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="1" {{ $project->status ? 'selected' : '' }}>
                                Published
                            </option>

                            <option value="0" {{ !$project->status ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Featured</label>

                        <select name="is_highlight" class="form-control">

                            <option value="0" {{ !$project->is_highlight ? 'selected' : '' }}>
                                No
                            </option>

                            <option value="1" {{ $project->is_highlight ? 'selected' : '' }}>
                                Yes
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12">

                        <label>Description</label>

                        <textarea name="description" rows="6" class="form-control">{{ old('description', $project->description) }}</textarea>

                    </div>

                </div>

            </div>

            <div class="card-footer text-right">

                <a href="{{ route('projects.index') }}" class="btn btn-secondary">

                    Cancel

                </a>

                <button type="submit" class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Update Project

                </button>

            </div>

        </div>
        

    </form>

    <div style="height:50px;"></div>

@stop

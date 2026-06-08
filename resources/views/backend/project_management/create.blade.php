@extends('adminlte::page')

@section('title', 'Create Project')

@section('content_header')

    <h1>Create New Project</h1>
@stop

@section('content')

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

        
        @csrf

        <div class="card shadow-sm">

            <div class="card-header">
                <h3 class="card-title">
                    Project Information
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Project Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tech Stack</label>
                        <input type="text" name="tech_stack" class="form-control"
                            placeholder="Laravel, MySQL, Bootstrap">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Live URL</label>
                        <input type="url" name="live_url" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>GitHub URL</label>
                        <input type="url" name="github_url" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Project Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="1">
                                Published
                            </option>

                            <option value="0">
                                Draft
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Featured</label>

                        <select name="is_highlight" class="form-control">

                            <option value="0">
                                No
                            </option>

                            <option value="1">
                                Yes
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12">

                        <label>Description</label>

                        <textarea name="description" rows="5" class="form-control"></textarea>

                    </div>

                </div>

            </div>

            <div class="card-footer text-right">

                <button type="submit" class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Save Project

                </button>

            </div>

        </div>
        

    </form>

@stop

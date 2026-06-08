@extends('adminlte::page')

@section('title', 'Edit Skill')

@section('content_header')
    <h1>
        <i class="fas fa-edit text-primary"></i>
        Edit Skill
    </h1>
@stop

@section('content')

    <div class="card card-primary card-outline">

        <div class="card-header">

            <h3 class="card-title">
                Update Skill Information
            </h3>

        </div>

        <form action="{{ route('skills.update', $skill->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control"
                                value="{{ old('category', $skill->category) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Skill Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $skill->name) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Percentage</label>

                            <input type="number" min="0" max="100" name="percentage" class="form-control"
                                value="{{ old('percentage', $skill->percentage) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position</label>

                            <input type="number" name="position" class="form-control"
                                value="{{ old('position', $skill->position) }}">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="custom-control custom-switch mt-4">

                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="1"
                                {{ $skill->status ? 'checked' : '' }}>

                            <label class="custom-control-label" for="status">

                                Active Skill

                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary">

                    <i class="fas fa-sync"></i>
                    Update Skill

                </button>

                <a href="{{ route('skills.index') }}" class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

@stop

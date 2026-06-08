@extends('adminlte::page')

@section('title', 'Create Skill')

@section('content_header')
    <h1>
        <i class="fas fa-plus-circle text-success"></i>
        Create Skill
    </h1>
@stop

@section('content')

    <div class="card card-success card-outline">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tools"></i>
                Skill Information
            </h3>
        </div>

        <form action="{{ route('skills.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category"
                                class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}"
                                placeholder="Backend & Systems">

                            @error('category')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Skill Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Laravel">

                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Skill Percentage</label>
                            <input type="number" min="0" max="100" name="percentage"
                                class="form-control @error('percentage') is-invalid @enderror"
                                value="{{ old('percentage') }}" placeholder="95">

                            @error('percentage')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position</label>
                            <input type="number" name="position" class="form-control" value="{{ old('position', 1) }}">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Status</label>

                            <div class="custom-control custom-switch">

                                <input type="checkbox" class="custom-control-input" id="status" name="status"
                                    value="1" checked>

                                <label class="custom-control-label" for="status">
                                    Active Skill
                                </label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Save Skill

                </button>

                <a href="{{ route('skills.index') }}" class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Back

                </a>

            </div>

        </form>

    </div>

@stop
    
@extends('adminlte::page')

@section('title', 'Project Information Details')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Project Details</h1>

        <div class="btn-group">
            <a href="{{ route('project-informations.edit', $projectInformation->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('project-informations.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        {{-- PROJECT HEADER --}}
        <div class="card mb-3">
            <div class="card-header">
                Project: {{ $projectInformation->project->title ?? 'N/A' }}
            </div>

            <div class="card-body">
                <p><b>Overview:</b></p>
                <p>{{ $projectInformation->overview ?? 'N/A' }}</p>
            </div>
        </div>

        {{-- IMAGES --}}
        <div class="card mb-3">
            <div class="card-header">Project Images</div>

            <div class="card-body row">

                @php
                    $images = is_array($projectInformation->project_images)
                        ? $projectInformation->project_images
                        : json_decode($projectInformation->project_images ?? '[]', true);
                @endphp

                @forelse ($images as $img)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset($img) }}" class="img-fluid rounded shadow-sm">
                    </div>
                @empty
                    <div class="col-12 text-muted">
                        No images available
                    </div>
                @endforelse

            </div>
        </div>

        {{-- FEATURES --}}
        <div class="card mb-3">
            <div class="card-header">Features</div>

            <div class="card-body">

                @php
                    $features = is_array($projectInformation->custom_features)
                        ? $projectInformation->custom_features
                        : json_decode($projectInformation->custom_features ?? '[]', true);
                @endphp

                <ul class="mb-0">
                    @forelse ($features as $item)
                        <li>{{ $item }}</li>
                    @empty
                        <li class="text-muted">No features added</li>
                    @endforelse
                </ul>

            </div>
        </div>

        {{-- LANGUAGES --}}
        <div class="card mb-3">
            <div class="card-header">Languages</div>

            <div class="card-body">

                @php
                    $languages = is_array($projectInformation->project_languages)
                        ? $projectInformation->project_languages
                        : json_decode($projectInformation->project_languages ?? '[]', true);
                @endphp

                <ul class="mb-0">
                    @forelse ($languages as $item)
                        <li>{{ $item }}</li>
                    @empty
                        <li class="text-muted">No languages added</li>
                    @endforelse
                </ul>

            </div>
        </div>

        {{-- CHALLENGES --}}
        <div class="card mb-3">
            <div class="card-header">Challenges</div>
            <div class="card-body">
                {{ $projectInformation->challenges ?? 'N/A' }}
            </div>
        </div>

        {{-- SOLUTION --}}
        <div class="card mb-3">
            <div class="card-header">Solution</div>
            <div class="card-body">
                {{ $projectInformation->solution ?? 'N/A' }}
            </div>
        </div>

        {{-- CONCLUSION --}}
        <div class="card mb-3">
            <div class="card-header">Conclusion</div>
            <div class="card-body">
                {{ $projectInformation->conclusion ?? 'N/A' }}
            </div>
        </div>

        {{-- LINKS --}}
        <div class="card mb-3">
            <div class="card-header">Links</div>

            <div class="card-body">

                @if ($projectInformation->project_link)
                    <p>
                        <a href="{{ $projectInformation->project_link }}" target="_blank">
                            🔗 Project Link
                        </a>
                    </p>
                @endif

                @if ($projectInformation->github_link)
                    <p>
                        <a href="{{ $projectInformation->github_link }}" target="_blank">
                            💻 GitHub Link
                        </a>
                    </p>
                @endif

            </div>
        </div>

    </div>

@endsection

@extends('adminlte::page')

@section('title', 'Project Information Details')

@section('content')

    <div class="container-fluid">

        {{-- PROJECT HEADER --}}
        <div class="card mb-3">
            <div class="card-header">
                Project: {{ $projectInfo->project->title ?? 'N/A' }}
            </div>

            <div class="card-body">
                <p><b>Overview:</b></p>
                <p>{{ $projectInfo->overview }}</p>
            </div>
        </div>

        {{-- IMAGES --}}
        <div class="card mb-3">
            <div class="card-header">Project Images</div>
            <div class="card-body row">

                @foreach ($projectInfo->images ?? [] as $img)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset($img) }}" class="img-fluid rounded">
                    </div>
                @endforeach

            </div>
        </div>

        {{-- FEATURES --}}
        <div class="card mb-3">
            <div class="card-header">Features</div>
            <div class="card-body">
                <ul>
                    @foreach ($projectInfo->custom_features ?? [] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- LANGUAGES --}}
        <div class="card mb-3">
            <div class="card-header">Languages</div>
            <div class="card-body">
                <ul>
                    @foreach ($projectInfo->project_languages ?? [] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- OTHER DETAILS --}}
        <div class="card mb-3">
            <div class="card-header">Challenges</div>
            <div class="card-body">
                {{ $projectInfo->challenges }}
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Solution</div>
            <div class="card-body">
                {{ $projectInfo->solution }}
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Conclusion</div>
            <div class="card-body">
                {{ $projectInfo->conclusion }}
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Links</div>
            <div class="card-body">

                <p>
                    <a href="{{ $projectInfo->project_link }}" target="_blank">
                        Project Link
                    </a>
                </p>

                <p>
                    <a href="{{ $projectInfo->github_link }}" target="_blank">
                        GitHub Link
                    </a>
                </p>

            </div>
        </div>

    </div>

@endsection

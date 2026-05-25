@extends('adminlte::page')

@section('title', 'Edit Project Information')

@section('content')

    <div class="container-fluid">

        <form id="projectInformationForm" method="POST"
            action="{{ route('project-informations.update', $projectInformation->id) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- PROJECT --}}
            <div class="card mb-3">
                <div class="card-header">Select Project</div>

                <div class="card-body d-flex justify-content-between">
                    <select name="project_id" id="projectSelect" class="form-control w-75">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}"
                                {{ $projectInformation->project_id == $project->id ? 'selected' : '' }}>
                                {{ $project->title }}
                            </option>
                        @endforeach
                    </select>

                    <div>
                        <button type="button" id="confirmProject" class="btn btn-success">Confirm</button>
                        <button type="button" id="cancelProject" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </div>

            {{-- OVERVIEW --}}
            <div class="card mb-3">
                <div class="card-header">Overview</div>
                <div class="card-body">
                    <textarea name="overview" class="form-control" rows="4">
                    {{ $projectInformation->overview }}
                </textarea>
                </div>
            </div>

            <div id="step2">

                {{-- IMAGES --}}
                <div class="card mb-3">
                    <div class="card-header">Project Images</div>
                    <div class="card-body">

                        <input type="file" id="imageInput" multiple class="form-control">

                        <div class="row mt-3">
                            @foreach ($projectInformation->project_images ?? [] as $img)
                                <div class="col-md-3 mb-2">
                                    <img src="{{ asset($img) }}" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>

                        <div id="imagePreview" class="row mt-3"></div>
                    </div>
                </div>

                {{-- BUILDER --}}
                <div class="card mb-3">
                    <div class="card-header">Project Details Builder</div>

                    <div class="card-body">

                        <div class="d-flex flex-wrap gap-2 mb-3">

                            <button type="button" class="btn btn-outline-primary add-field" data-field="custom_features">
                                + Features
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="project_languages">
                                + Languages
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="challenges">
                                Challenges
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="solution">
                                Solution
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="conclusion">
                                Conclusion
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="project_link">
                                Project Link
                            </button>

                            <button type="button" class="btn btn-outline-primary add-field" data-field="github_link">
                                GitHub Link
                            </button>

                        </div>

                        <div id="dynamicFields"></div>

                    </div>
                </div>

                <button class="btn btn-primary">Update Project Info</button>

            </div>

        </form>

    </div>

@endsection

@section('js')
    <script>
        window.editData = @json($projectInformation);
    </script>

    <script src="{{ asset('js/custom_backend/project/information/edit_page/edit.js') }}"></script>
@endsection

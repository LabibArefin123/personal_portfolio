@extends('adminlte::page')

@section('title', 'Project Informations')

@section('content_header')
    <div class="d-flex justify-content-between">

        <h3>Project Informations</h3>

        <a href="{{ route('project-informations.create') }}" class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Create New

        </a>

    </div>
@endsection

@section('content')

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($informations as $key => $info)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                {{ $info->project?->title }}
                            </td>

                            <td>

                                @if ($info->project_images)
                                    <div class="d-flex flex-wrap gap-1">

                                        @foreach ($info->project_images as $img)
                                            <img src="{{ asset($img) }}"
                                                style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
                                        @endforeach

                                    </div>
                                @endif  

                            </td>

                            <td>

                                <span class="badge {{ $info->status ? 'bg-success' : 'bg-danger' }}">

                                    {{ $info->status ? 'Active' : 'Inactive' }}

                                </span>

                            </td>

                            <td>

                                <a href="{{ route('project-informations.edit', $info->id) }}"
                                    class="btn btn-primary btn-sm">

                                    Edit

                                </a>
                                <a href="{{ route('project-informations.show', $info->id) }}"
                                    class="btn btn-warning btn-sm">

                                    View

                                </a>

                                <form method="POST" action="{{ route('project-informations.destroy', $info->id) }}"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection

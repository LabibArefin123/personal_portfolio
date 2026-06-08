@extends('adminlte::page')

@section('title', 'Skills Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">


<div>
    <h1 class="font-weight-bold">Skills Management</h1>
    <p class="text-muted mb-0">
        Manage portfolio skills and technologies.
    </p>
</div>

<a href="{{ route('skills.create') }}"
   class="btn btn-primary">

    <i class="fas fa-plus"></i>
    Add Skill

</a>


</div>

@stop

@section('content')

<div class="row mb-4">


<div class="col-md-4">

    <div class="small-box bg-primary">

        <div class="inner">
            <h3>{{ $skills->count() }}</h3>
            <p>Total Skills</p>
        </div>

        <div class="icon">
            <i class="fas fa-tools"></i>
        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="small-box bg-success">

        <div class="inner">
            <h3>{{ $skills->where('status',1)->count() }}</h3>
            <p>Active Skills</p>
        </div>

        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="small-box bg-info">

        <div class="inner">
            <h3>{{ $skills->groupBy('category')->count() }}</h3>
            <p>Categories</p>
        </div>

        <div class="icon">
            <i class="fas fa-folder"></i>
        </div>

    </div>

</div>


</div>

<div class="card shadow-sm">


<div class="card-header">

    <h3 class="card-title">
        Skill List
    </h3>

</div>

<div class="card-body table-responsive">

    <table class="table table-bordered table-hover">

        <thead>

            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Skill</th>
                <th width="250">Level</th>
                <th>Position</th>
                <th>Status</th>
                <th width="180">Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse($skills as $skill)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <span class="badge badge-info">
                        {{ $skill->category }}
                    </span>
                </td>

                <td>
                    <strong>{{ $skill->name }}</strong>
                </td>

                <td>

                    <div class="progress">

                        <div class="progress-bar bg-success"
                             style="width: {{ $skill->percentage }}%">

                            {{ $skill->percentage }}%

                        </div>

                    </div>

                </td>

                <td>
                    {{ $skill->position }}
                </td>

                <td>

                    @if($skill->status)

                        <span class="badge badge-success">
                            Active
                        </span>

                    @else

                        <span class="badge badge-danger">
                            Inactive
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('skills.show',$skill->id) }}"
                       class="btn btn-info btn-sm">

                        <i class="fas fa-eye"></i>

                    </a>

                    <a href="{{ route('skills.edit',$skill->id) }}"
                       class="btn btn-primary btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form action="{{ route('skills.destroy',$skill->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete skill?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7"
                    class="text-center text-muted">

                    No skills found.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

<div style="height:50px;"></div>

@stop

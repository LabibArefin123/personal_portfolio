@extends('adminlte::page')

@section('title', 'Md. Labib Arefin – Admin Dashboard')
<link rel="stylesheet" href="{{ asset('css/backend/admin/dashboard.css') }}">
@section('content')
    <div class="container-fluid py-4">

        {{-- Header --}}
        <div class="mb-4">
            <h1 class="h3 font-weight-bold text-primary">
                Md. Labib Arefin – Portfolio Management
            </h1>
            <p class="text-muted">
                Manage profile information, achievements, publications, gallery, and website content.
            </p>
        </div>

        {{-- Welcome Card --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="font-weight-bold mb-2">
                    👋 Welcome to the Portfolio Admin Panel
                </h5>
                <p class="mb-0 text-muted">
                    This dashboard allows you to update professional information, manage
                    publications, upload gallery images, and maintain website content.
                    All changes made here will reflect instantly on the public portfolio website.
                </p>
            </div>
        </div>

        {{-- Quick Info Cards --}}
        <div class="row">

            <div class="col-md-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $projectCount }}</h3>
                        <p>Total Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $activeProjects }}</h3>
                        <p>Published Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $featuredProjects }}</h3>
                        <p>Featured Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>

            <div class="card-body">

                <a href="{{ route('projects.index') }}" class="btn btn-primary mr-2">
                    <i class="fas fa-project-diagram"></i>
                    Manage Projects
                </a>

                {{-- <a href="{{ route('about_sections.index') }}" class="btn btn-success mr-2"> --}}
                <a href="#" class="btn btn-success mr-2">
                    <i class="fas fa-user"></i>
                    About Section
                </a>

                <a href="{{ route('contact_requests.index') }}" class="btn btn-info">
                    <i class="fas fa-envelope"></i>
                    Contact Cards
                </a>

            </div>
        </div>
    </div>
@stop

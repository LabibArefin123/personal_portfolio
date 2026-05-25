<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;

class ProjectInformationController extends Controller
{
    public function index()
    {
        $informations = ProjectInformation::latest()->get();

        return view('admin.project_information.index', compact('informations'));
    }

    public function create()
    {
        $projects = Project::all();

        return view('admin.project_information.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $images = [];

        if ($request->hasFile('project_images')) {

            foreach ($request->file('project_images') as $image) {

                $path = $image->store('projects', 'public');

                $images[] = 'storage/' . $path;
            }
        }

        ProjectInformation::create([

            'project_id' => $request->project_id,

            'overview' => $request->overview,

            'project_images' => $images,

            'custom_features' => $request->custom_features,

            'project_languages' => $request->project_languages,

            'challenges' => $request->challenges,

            'solution' => $request->solution,

            'conclusion' => $request->conclusion,

            'project_link' => $request->project_link,

            'github_link' => $request->github_link,

            'status' => $request->status,
        ]);

        return redirect()->back()
            ->with('success', 'Project Information Added');
    }

    public function edit(ProjectInformation $projectInformation)
    {
        $projects = Project::all();

        return view('admin.project_information.edit', compact(
            'projectInformation',
            'projects'
        ));
    }

    public function update(Request $request, ProjectInformation $projectInformation)
    {
        $images = $projectInformation->project_images ?? [];

        if ($request->hasFile('project_images')) {

            $images = [];

            foreach ($request->file('project_images') as $image) {

                $path = $image->store('projects', 'public');

                $images[] = 'storage/' . $path;
            }
        }

        $projectInformation->update([

            'project_id' => $request->project_id,

            'overview' => $request->overview,

            'project_images' => $images,

            'custom_features' => $request->custom_features,

            'project_languages' => $request->project_languages,

            'challenges' => $request->challenges,

            'solution' => $request->solution,

            'conclusion' => $request->conclusion,

            'project_link' => $request->project_link,

            'github_link' => $request->github_link,

            'status' => $request->status,
        ]);

        return redirect()->back()
            ->with('success', 'Updated Successfully');
    }

    public function destroy(ProjectInformation $projectInformation)
    {
        $projectInformation->delete();

        return redirect()->back()
            ->with('success', 'Deleted Successfully');
    }
}

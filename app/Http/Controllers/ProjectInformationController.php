<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectInformationController extends Controller
{
    public function index()
    {
        $informations = ProjectInformation::with('project')
            ->latest()
            ->get();

        return view('backend.project_section.project_information.index', compact('informations'));
    }

    public function create()
    {
        $projects = Project::all();

        return view('backend.project_section.project_information.create', compact('projects'));
    }

    /* =====================================================
        STORE
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
        ]);

        // =========================
        // IMAGE UPLOAD (PUBLIC PATH)
        // =========================
        $images = [];

        if ($request->hasFile('project_images')) {

            foreach ($request->file('project_images') as $image) {

                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $destination = public_path('uploads/images/project_page');

                if (!File::exists($destination)) {
                    File::makeDirectory($destination, 0777, true);
                }

                $image->move($destination, $fileName);

                $images[] = 'uploads/images/project_page/' . $fileName;
            }
        }

        // =========================
        // CREATE
        // =========================
        ProjectInformation::create([

            'project_id' => $request->project_id,

            'overview' => $request->overview,

            'project_images' => $images,

            'custom_features' => $this->jsonify($request->custom_features),

            'project_languages' => $this->jsonify($request->project_languages),

            'challenges' => $request->challenges,

            'solution' => $request->solution,

            'conclusion' => $request->conclusion,

            'project_link' => $request->project_link,

            'github_link' => $request->github_link,

            'status' => 1,
        ]);

        return redirect()
            ->route('project-informations.index')
            ->with('success', 'Project Information Added Successfully');
    }

    /* =====================================================
        EDIT
    ===================================================== */
    public function edit(ProjectInformation $projectInformation)
    {
        $projects = Project::all();

        return view('backend.project_section.project_information.edit', compact(
            'projectInformation',
            'projects'
        ));
    }

    /* =====================================================
        UPDATE
    ===================================================== */
    public function update(Request $request, ProjectInformation $projectInformation)
    {
        $images = is_array($projectInformation->project_images)
            ? $projectInformation->project_images
            : json_decode($projectInformation->project_images, true) ?? [];

        if ($request->hasFile('project_images')) {

            $images = [];

            foreach ($request->file('project_images') as $image) {

                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $destination = public_path('uploads/images/project_page');

                if (!File::exists($destination)) {
                    File::makeDirectory($destination, 0777, true);
                }

                $image->move($destination, $fileName);

                $images[] = 'uploads/images/project_page/' . $fileName;
            }
        }

        $projectInformation->update([

            'project_id' => $request->project_id,

            'overview' => $request->overview,

            'project_images' => $images,

            'custom_features' => $this->jsonify($request->custom_features),

            'project_languages' => $this->jsonify($request->project_languages),

            'challenges' => $request->challenges,

            'solution' => $request->solution,

            'conclusion' => $request->conclusion,

            'project_link' => $request->project_link,

            'github_link' => $request->github_link,

            'status' => 1,
        ]);

        return redirect()
            ->route('project-informations.index')
            ->with('success', 'Updated Successfully');
    }

    /* =====================================================
        DELETE
    ===================================================== */
    public function destroy(ProjectInformation $projectInformation)
    {
        $projectInformation->delete();

        return redirect()
            ->back()
            ->with('success', 'Deleted Successfully');
    }

    /* =====================================================
        HELPER: SAFE JSON CONVERT
    ===================================================== */
    private function jsonify($value)
    {
        if (!$value) return null;

        if (is_array($value)) {
            return json_encode(array_values(array_filter($value)));
        }

        return json_encode([$value]);
    }
}

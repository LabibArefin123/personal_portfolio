<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * =========================================
     * DISPLAY ALL PROJECTS
     * =========================================
     */
    public function index()
    {
        $projects = Project::latest()->get();

        return view('backend.project_management.index', compact('projects'));
    }

    /**
     * =========================================
     * SHOW CREATE FORM
     * =========================================
     */
    public function create()
    {
        return view('backend.project_management.create');
    }

    /**
     * =========================================
     * STORE PROJECT
     * =========================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'tech_stack'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'live_url'      => 'nullable|url',
            'github_url'    => 'nullable|url',
        ]);

        $imagePath = null;

        /**
         * =========================================
         * IMAGE UPLOAD
         * =========================================
         */
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('uploads/project');

            /**
             * CREATE DIRECTORY IF NOT EXISTS
             */
            if (!File::exists($destinationPath)) {

                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);

            $imagePath = 'uploads/project/' . $imageName;
        }

        /**
         * =========================================
         * CREATE PROJECT
         * =========================================
         */
        Project::create([

            'title'         => $request->title,

            'description'   => $request->description,

            'tech_stack'    => $request->tech_stack,

            'image'         => $imagePath,

            'live_url'      => $request->live_url,

            'github_url'    => $request->github_url,

            'is_highlight'  => $request->has('is_highlight'),

            'status'        => $request->has('status'),
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * =========================================
     * SHOW SINGLE PROJECT
     * =========================================
     */
    public function show(Project $project)
    {
        return view('backend.project_management.show', compact('project'));
    }

    /**
     * =========================================
     * SHOW EDIT FORM
     * =========================================
     */
    public function edit(Project $project)
    {
        return view('backend.project_management.edit', compact('project'));
    }

    /**
     * =========================================
     * UPDATE PROJECT
     * =========================================
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'tech_stack'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'live_url'      => 'nullable|url',
            'github_url'    => 'nullable|url',
            'is_highlight'  => 'required|boolean',
            'status'        => 'required|boolean',
        ]);

        $imagePath = $project->image;

        /**
         * =========================================
         * IMAGE UPDATE
         * =========================================
         */
        if ($request->hasFile('image')) {

            /**
             * DELETE OLD IMAGE
             */
            if ($project->image && File::exists(public_path($project->image))) {

                File::delete(public_path($project->image));
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('uploads/project');

            /**
             * CREATE DIRECTORY
             */
            if (!File::exists($destinationPath)) {

                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);

            $imagePath = 'uploads/project/' . $imageName;
        }

        /**
         * =========================================
         * UPDATE PROJECT
         * =========================================
         */
        $project->update([

            'title'         => $request->title,

            'description'   => $request->description,

            'tech_stack'    => $request->tech_stack,

            'image'         => $imagePath,

            'live_url'      => $request->live_url,

            'github_url'    => $request->github_url,

            'is_highlight'  => (bool) $request->is_highlight,

            'status'        => (bool) $request->status,

        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * =========================================
     * DELETE PROJECT
     * =========================================
     */
    public function destroy(Project $project)
    {
        /**
         * DELETE IMAGE
         */
        if ($project->image && File::exists(public_path($project->image))) {

            File::delete(public_path($project->image));
        }

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}

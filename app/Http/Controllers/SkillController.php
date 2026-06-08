<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * =========================================
     * DISPLAY ALL SKILLS
     * =========================================
     */
    public function index()
    {
        $skills = Skill::orderBy('category')
            ->orderBy('position')
            ->get();

        return view('backend.skill_management.index', compact('skills'));
    }

    /**
     * =========================================
     * SHOW CREATE FORM
     * =========================================
     */
    public function create()
    {
        return view('backend.skill_management.create');
    }

    /**
     * =========================================
     * STORE SKILL
     * =========================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'   => 'required|string|max:255',
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:1|max:100',
            'position'   => 'nullable|integer',
            'status'     => 'required|boolean',
        ]);

        Skill::create([
            'category'   => $request->category,
            'name'       => $request->name,
            'percentage' => $request->percentage,
            'position'   => $request->position ?? 0,
            'status'     => (bool) $request->status,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * =========================================
     * SHOW SINGLE SKILL
     * =========================================
     */
    public function show(Skill $skill)
    {
        return view('backend.skill_management.show', compact('skill'));
    }

    /**
     * =========================================
     * SHOW EDIT FORM
     * =========================================
     */
    public function edit(Skill $skill)
    {
        return view('backend.skill_management.edit', compact('skill'));
    }

    /**
     * =========================================
     * UPDATE SKILL
     * =========================================
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'category'   => 'required|string|max:255',
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:1|max:100',
            'position'   => 'nullable|integer',
            'status'     => 'required|boolean',
        ]);

        $skill->update([
            'category'   => $request->category,
            'name'       => $request->name,
            'percentage' => $request->percentage,
            'position'   => $request->position ?? 0,
            'status'     => (bool) $request->status,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /**
     * =========================================
     * DELETE SKILL
     * =========================================
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}

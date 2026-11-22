<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\EducationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EducationPageController extends Controller
{
    /**
     * Display education page management.
     */
    public function index()
    {
        $profiles = EducationProfile::query()
            ->latest()
            ->paginate(10);

        $educationCount = Education::count();

        $activeEducationCount = Education::active()->count();

        return view('backend.frontend_part.education_page.index', compact(
            'profiles',
            'educationCount',
            'activeEducationCount'
        ));
    }

    /**
     * Display education page details.
     */
    public function show(EducationProfile $education_page)
    {
        $educations = Education::ordered()->get();

        $completedCount = $educations
            ->where('status', 'Completed')
            ->count();

        return view('backend.frontend_part.education_page.show', compact(
            'education_page',
            'educations',
            'completedCount'
        ));
    }

    /**
     * Edit education page.
     */
    public function edit(EducationProfile $education_page)
    {
        $educations = Education::ordered()->get();

        return view('backend.frontend_part.education_page.edit', compact(
            'education_page',
            'educations'
        ));
    }

    /**
     * Update education page and qualifications.
     */
    public function update(Request $request, EducationProfile $education_page)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:1000'],

            'intro_title' => ['required', 'string', 'max:255'],
            'intro_description' => ['nullable', 'string'],

            'highlight_value' => ['nullable', 'string', 'max:100'],
            'highlight_label' => ['nullable', 'string', 'max:100'],

            'github_username' => ['nullable', 'string', 'max:100'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'github_chart_url' => ['nullable', 'url', 'max:255'],
            'github_title' => ['nullable', 'string', 'max:255'],
            'github_description' => ['nullable', 'string'],

            'github_activities' => ['nullable', 'array'],
            'github_activities.*' => ['nullable', 'string', 'max:255'],

            'focus_cards' => ['nullable', 'array'],
            'focus_cards.*.title' => ['nullable', 'string', 'max:255'],
            'focus_cards.*.description' => ['nullable', 'string'],

            'is_active' => ['nullable', 'boolean'],

            'educations' => ['nullable', 'array'],
            'educations.*.id' => [
                'nullable',
                'integer',
                Rule::exists('educations', 'id'),
            ],
            'educations.*.year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'educations.*.degree' => ['required', 'string', 'max:255'],
            'educations.*.institution' => ['required', 'string', 'max:255'],
            'educations.*.result' => ['nullable', 'string', 'max:255'],
            'educations.*.status' => ['required', 'string', 'max:50'],
            'educations.*.timeline_description' => ['nullable', 'string'],
            'educations.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'educations.*.is_active' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($validated, $education_page) {

            /*
            |--------------------------------------------------------------------------
            | Update Education Profile
            |--------------------------------------------------------------------------
            */

            $education_page->update([
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,

                'intro_title' => $validated['intro_title'],
                'intro_description' => $validated['intro_description'] ?? null,

                'highlight_value' => $validated['highlight_value'] ?? null,
                'highlight_label' => $validated['highlight_label'] ?? null,

                'github_username' => $validated['github_username'] ?? null,
                'github_url' => $validated['github_url'] ?? null,
                'github_chart_url' => $validated['github_chart_url'] ?? null,
                'github_title' => $validated['github_title'] ?? null,
                'github_description' => $validated['github_description'] ?? null,

                'github_activities' => collect($validated['github_activities'] ?? [])
                    ->filter(fn($value) => filled($value))
                    ->values()
                    ->all(),

                'focus_cards' => collect($validated['focus_cards'] ?? [])
                    ->filter(fn($card) => filled($card['title'] ?? null)
                        || filled($card['description'] ?? null))
                    ->values()
                    ->all(),

                'is_active' => $request->boolean('is_active'),
            ]);

            /*
            |--------------------------------------------------------------------------
            | Update Academic Qualifications
            |--------------------------------------------------------------------------
            */

            $existingEducations = Education::all()->keyBy('id');

            $submittedIds = [];

            foreach ($validated['educations'] ?? [] as $index => $item) {

                $educationData = [
                    'year' => $item['year'] ?? null,
                    'degree' => $item['degree'],
                    'institution' => $item['institution'],
                    'result' => $item['result'] ?? null,
                    'status' => $item['status'],
                    'timeline_description' => $item['timeline_description'] ?? null,
                    'sort_order' => $item['sort_order'] ?? ($index + 1),
                    'is_active' => (bool) ($item['is_active'] ?? false),
                ];

                if (!empty($item['id'])) {

                    $education = $existingEducations->get($item['id']);

                    if (!$education) {
                        continue;
                    }

                    $education->update($educationData);

                    $submittedIds[] = $education->id;
                } else {

                    $education = Education::create($educationData);

                    $submittedIds[] = $education->id;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Remove Deleted Qualifications
            |--------------------------------------------------------------------------
            */

            foreach ($existingEducations as $existingEducation) {
                if (!in_array($existingEducation->id, $submittedIds)) {
                    $existingEducation->delete();
                }
            }
        });

        return redirect()
            ->route('education_pages.show', $education_page->id)
            ->with('success', 'Education page updated successfully.');
    }
}

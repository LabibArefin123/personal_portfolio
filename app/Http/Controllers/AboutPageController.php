<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = AboutPage::first();

        return view('backend.frontend_part.about_page.index', compact('about'));
    }

    public function show(AboutPage $about_page)
    {
        return view('backend.frontend_part.about_page.show', [
            'about' => $about_page,
        ]);
    }

    public function edit(AboutPage $about_page)
    {
        $bio = $this->normalizeArray($about_page->bio);
        $skills = $this->normalizeArray($about_page->skills);
        $experiences = $this->normalizeArray($about_page->experiences);
        $highlights = $this->normalizeHighlights($about_page->highlights);

        return view('backend.frontend_part.about_page.edit', [
            'about' => $about_page,
            'formBio' => implode("\n\n", $bio),
            'formSkills' => implode("\n", $skills),
            'formExperiences' => implode("\n", $experiences),
            'formHighlights' => collect($highlights)->map(function ($item) {
                return implode(' | ', [
                    $item['title'] ?? '',
                    $item['description'] ?? '',
                    $item['icon'] ?? 'fas fa-star',
                ]);
            })->implode("\n"),
        ]);
    }

    public function update(Request $request, AboutPage $about_page)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'role' => ['required', 'string', 'max:200'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'bio' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],
            'experiences' => ['nullable', 'string'],
            'highlights' => ['nullable', 'string'],
        ]);

        $imagePath = $about_page->image;

        if ($request->hasFile('image')) {
            $directory = public_path('uploads/images/about');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $image = $request->file('image');
            $imageName = 'about-' . Str::uuid() . '.' . $image->getClientOriginalExtension();

            $image->move($directory, $imageName);

            $imagePath = 'uploads/images/about/' . $imageName;
        }

        $about_page->update([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'image' => $imagePath,
            'bio' => $this->paragraphsToArray($validated['bio'] ?? ''),
            'skills' => $this->linesToArray($validated['skills'] ?? ''),
            'experiences' => $this->linesToArray($validated['experiences'] ?? ''),
            'highlights' => $this->highlightsToArray($validated['highlights'] ?? ''),
        ]);

        return redirect()
            ->route('about_pages.show', $about_page->id)
            ->with('success', 'About Page updated successfully.');
    }

    /*
|--------------------------------------------------------------------------
| Normalize Existing Database Values
|--------------------------------------------------------------------------
*/

    private function normalizeArray($value): array
    {
        if ($value instanceof \Illuminate\Support\Collection) {
            $value = $value->all();
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $value = $decoded;
            } else {
                // Support older plain-text records.
                $value = preg_split('/\r\n|\r|\n/', $value);
            }
        }

        if (!is_array($value)) {
            return [];
        }

        return collect($value)
            ->map(function ($item) {
                if (is_string($item)) {
                    return trim($item);
                }

                return null;
            })
            ->filter()
            ->values()
            ->all();
    }

    private function normalizeHighlights($value): array
    {
        if ($value instanceof \Illuminate\Support\Collection) {
            $value = $value->all();
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $value = $decoded;
            } else {
                $value = $this->highlightsToArray($value);
            }
        }

        if (!is_array($value)) {
            return [];
        }

        return collect($value)
            ->map(function ($item) {
                if (is_string($item)) {
                    $parts = array_map('trim', explode('|', $item, 3));

                    return [
                        'title' => $parts[0] ?? '',
                        'description' => $parts[1] ?? '',
                        'icon' => $parts[2] ?? 'fas fa-star',
                    ];
                }

                if (!is_array($item)) {
                    return null;
                }

                return [
                    'title' => (string) ($item['title'] ?? ''),
                    'description' => (string) ($item['description'] ?? ''),
                    'icon' => (string) ($item['icon'] ?? 'fas fa-star'),
                ];
            })
            ->filter(fn($item) => $item && $item['title'] !== '')
            ->values()
            ->all();
    }

    /*
|--------------------------------------------------------------------------
| Convert Form Text Into Arrays
|--------------------------------------------------------------------------
*/

    private function paragraphsToArray(?string $value): array
    {
        return collect(
            preg_split('/(?:\r\n|\r|\n)\s*(?:\r\n|\r|\n)/', trim($value ?? ''))
        )
            ->map(fn($paragraph) => trim($paragraph))
            ->filter()
            ->values()
            ->all();
    }

    private function linesToArray(?string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value ?? ''))
            ->map(fn($line) => trim($line))
            ->filter(fn($line) => $line !== '')
            ->values()
            ->all();
    }

    private function highlightsToArray(?string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value ?? ''))
            ->map(function ($line) {
                $parts = array_map('trim', explode('|', $line, 3));

                if (empty($parts[0]) || empty($parts[1])) {
                    return null;
                }

                return [
                    'title' => $parts[0],
                    'description' => $parts[1],
                    'icon' => $parts[2] ?? 'fas fa-star',
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
}

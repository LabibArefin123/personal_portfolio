<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationWebSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'project_title' => 'TechnoTech Engineering Limited – CMS Website',
                'overview' => 'A construction company website built with a custom content management system that enables administrators to update homepage content.',
                'project_images' => [],
                'custom_features' => [
                    'Corporate Website',
                    'Custom Content Management System',
                    'Homepage Content Management',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Providing a company website while allowing administrators to maintain homepage content through a custom CMS.',
                'solution' => 'Built a website with an administrative content management capability for homepage updates.',
                'conclusion' => 'The project combines a corporate web presence with a custom CMS for homepage content maintenance.',


                'status' => true,
            ],
            [
                'project_title' => 'Alamgir Art Gallery',
                'overview' => 'A Laravel-based art gallery featuring AJAX image filtering by date, month, and year without requiring a full page reload.',
                'project_images' => [],
                'custom_features' => [
                    'Image Gallery',
                    'Date-based Image Filtering',
                    'Month-based Image Filtering',
                    'Year-based Image Filtering',
                    'AJAX Filtering Without Page Reload',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'AJAX',
                    'JavaScript',
                ],
                'challenges' => 'Allowing visitors to filter gallery images by multiple date ranges without interrupting the browsing experience with full page reloads.',
                'solution' => 'Implemented AJAX-based filtering for date, month, and year so gallery results can update without a full page refresh.',
                'conclusion' => 'The gallery provides date-oriented image discovery through an asynchronous filtering experience.',


                'status' => true,
            ],
            [
                'project_title' => 'NineteenAlpha',
                'overview' => 'A website designed and developed for a Dhaka-based defense enterprise providing military equipment and training solutions.',
                'project_images' => [],
                'custom_features' => [
                    'Corporate Website',
                    'Business Information Presentation',
                    'Military Equipment and Training Solutions Content',
                ],
                'project_languages' => [],
                'challenges' => 'Presenting the enterprise and its equipment and training solutions through a dedicated business website.',
                'solution' => 'Designed and developed a website focused on the organization\'s business presentation and service information.',
                'conclusion' => 'The website provides an online business presence for the Dhaka-based defense enterprise.',


                'status' => true,
            ],
            [
                'project_title' => 'XpressionGlobal',
                'overview' => 'A corporate website developed for a defense contractor specializing in military equipment, tactical solutions, and related technologies.',
                'project_images' => [],
                'custom_features' => [
                    'Corporate Website',
                    'Business Presentation',
                    'Military Equipment Information',
                    'Tactical Solutions Information',
                ],
                'project_languages' => [],
                'challenges' => 'Presenting the contractor\'s business areas and related solutions through a corporate website.',
                'solution' => 'Developed a corporate website to communicate the company\'s focus areas and business information.',
                'conclusion' => 'The website establishes a corporate online presence for the defense contractor.',


                'status' => true,
            ],
            [
                'project_title' => 'ZNZ Handels GmbH',
                'overview' => 'A responsive corporate website built with HTML5 and CSS3, focusing on clean UI, mobile responsiveness, and business presentation.',
                'project_images' => [],
                'custom_features' => [
                    'Responsive Corporate Website',
                    'Clean User Interface',
                    'Mobile Responsiveness',
                    'Business Presentation',
                ],
                'project_languages' => [
                    'HTML5',
                    'CSS3',
                ],
                'challenges' => 'Maintaining a clean business presentation and responsive layout across different screen sizes.',
                'solution' => 'Built the website with HTML5 and CSS3, emphasizing responsive layout and clear content presentation.',
                'conclusion' => 'The project delivers a responsive corporate website with a clean interface and business-focused presentation.',


                'status' => true,
            ]
        ];

        foreach ($records as $record) {
            $project = Project::where('title', $record['project_title'])->first();

            if (!$project) {
                $this->command?->warn("Project not found; skipped: " . $record['project_title']);
                continue;
            }

            unset($record['project_title']);

            ProjectInformation::updateOrCreate(
                ['project_id' => $project->id],
                $record
            );
        }
    }
}

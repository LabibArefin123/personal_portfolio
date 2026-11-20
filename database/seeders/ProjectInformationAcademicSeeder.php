<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationAcademicSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'project_title' => 'Portfolio Administration Panel',
                'overview' => 'A custom administration panel built to manage portfolio content and website data.',
                'project_images' => [],
                'custom_features' => [
                    'Portfolio Content Management',
                    'Website Data Management',
                    'Custom Administration Panel',
                ],
                'project_languages' => [],
                'challenges' => 'Providing an administration interface for maintaining portfolio content and website data.',
                'solution' => 'Built a custom administration panel focused on portfolio and website content management.',
                'conclusion' => 'The panel provides a centralized way to manage the portfolio website\'s content and data.',
                'status' => true,
            ],
            [
                'project_title' => 'Tegachia Secondary School – School Management System',
                'overview' => 'A web-based school management system with backend tools for managing notices, galleries, staff, teachers, and school information.',
                'project_images' => [],
                'custom_features' => [
                    'Notice Management',
                    'Gallery Management',
                    'Staff Management',
                    'Teacher Management',
                    'School Information Management',
                ],
                'project_languages' => [],
                'challenges' => 'Organizing different school information and content areas through a unified backend.',
                'solution' => 'Developed a web-based management system with backend tools for notices, galleries, staff, teachers, and school information.',
                'conclusion' => 'The system centralizes key school content and information management tasks.',


                'status' => true,
            ],
            [
                'project_title' => 'BD Karber – E-commerce Website',
                'overview' => 'An academic team project for an e-commerce platform supporting online product sales and management. The project was completed under the supervision of Md. Mushfiqur Rahman Fakir, Lecturer, Department of CSE, NUB.',
                'project_images' => [],
                'custom_features' => [
                    'Online Product Sales',
                    'Product Management',
                    'E-commerce Platform',
                ],
                'project_languages' => [],
                'challenges' => 'Collaborating on an academic e-commerce project focused on online product sales and management.',
                'solution' => 'Worked as part of an academic team to develop the e-commerce platform under faculty supervision.',
                'conclusion' => 'BD Karber represents an academic team project covering core online sales and product management needs.',


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

<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationHealthcareSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'project_title' => 'DFCH Patient Management System',
                'overview' => 'A hospital management application developed for Dr. Fazlul Haque Colorectal Hospital Limited. The project focuses on patient registration, medical record management, appointment workflows, and administrative reporting.',
                'project_images' => [],
                'custom_features' => [
                    'Patient Registration',
                    'Medical Record Management',
                    'Appointment Workflows',
                    'Administrative Reporting',
                ],
                'project_languages' => [
                    'PHP',
                    'Laravel',
                    'MySQL',
                    'JavaScript',
                    'AJAX',
                    'Bootstrap',
                ],
                'challenges' => 'Supporting connected patient registration, medical information, appointment workflows, and reporting in one hospital application.',
                'solution' => 'Developed a Laravel-based application that brings the stated patient management and administrative workflows together in a centralized system.',
                'conclusion' => 'The system supports key hospital administration workflows through patient information management, appointment handling, and reporting.',


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

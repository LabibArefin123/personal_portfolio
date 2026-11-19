<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationBusinessSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'project_title' => 'BidTrack – Tender Management Platform',
                'overview' => 'A tender-bidding platform designed to manage bidders, bid submissions, and results through structured bidding workflows.',
                'project_images' => [],
                'custom_features' => [
                    'Bidder Management',
                    'Bid Submission Management',
                    'Tender Result Management',
                    'Structured Bidding Workflows',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Organizing bidder information, bid submissions, and results into a consistent tender workflow.',
                'solution' => 'Developed a Laravel platform centered on structured bidder, submission, and result management.',
                'conclusion' => 'BidTrack provides a centralized workflow for managing the main stages of tender bidding.',


                'status' => true,
            ],
            [
                'project_title' => 'VisiQ – Visitor Management System',
                'overview' => 'A visitor management system designed to support visitor check-in/check-out, visitor logs, reporting, and security workflows.',
                'project_images' => [],
                'custom_features' => [
                    'Visitor Check-in',
                    'Visitor Check-out',
                    'Visitor Logs',
                    'Visitor Reporting',
                    'Security Workflows',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Maintaining organized visitor records while supporting check-in/check-out and security-related workflows.',
                'solution' => 'Developed a web-based visitor management workflow covering visitor entry, exit, logs, and reporting.',
                'conclusion' => 'VisiQ centralizes visitor activity records and supports day-to-day visitor management.',


                'status' => true,
            ],
            [
                'project_title' => 'NexaTrack – CRM Software',
                'overview' => 'A customer relationship management application focused on client management, sales pipeline tracking, and business communication.',
                'project_images' => [],
                'custom_features' => [
                    'Client Management',
                    'Sales Pipeline Tracking',
                    'Business Communication',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Bringing client information, sales progress, and business communication into a coordinated CRM workflow.',
                'solution' => 'Designed and implemented a Laravel CRM application around client records and sales pipeline activities.',
                'conclusion' => 'NexaTrack provides a centralized application for managing client relationships and tracking sales activities.',


                'status' => true,
            ],
            [
                'project_title' => 'ProsharPOS – Point of Sale System',
                'overview' => 'A point of sale application developed to support billing, inventory management, and retail business reporting.',
                'project_images' => [],
                'custom_features' => [
                    'Billing Management',
                    'Inventory Management',
                    'Retail Business Reporting',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Connecting retail billing activities with inventory records and business reporting needs.',
                'solution' => 'Developed a Laravel-based POS application covering billing, inventory management, and reporting workflows.',
                'conclusion' => 'ProsharPOS brings essential retail sales and inventory workflows into one management system.',


                'status' => true,
            ],
            [
                'project_title' => 'StackPilot – Developer & DevOps Dashboard',
                'overview' => 'A centralized Laravel dashboard concept in development for managing projects, deployment workflows, and application monitoring.',
                'project_images' => [],
                'custom_features' => [
                    'Project Management Concept',
                    'Deployment Workflow Management Concept',
                    'Application Monitoring Concept',
                ],
                'project_languages' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                ],
                'challenges' => 'Planning a centralized dashboard concept that brings project, deployment, and application monitoring workflows together.',
                'solution' => 'Developing the concept around a Laravel dashboard with project management, deployment workflow, and monitoring areas.',
                'conclusion' => 'StackPilot is an in-development dashboard concept for centralized developer and DevOps workflow management.',


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

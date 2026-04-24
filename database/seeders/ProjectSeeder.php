<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::truncate();

        $projects = [

            [
                'title' => 'BidTrack',
                'description' => 'Tender management system for handling bidders, submissions, and results with transparency.',
                'tech_stack' => 'Laravel • MySQL',
                'is_highlight' => false,
                'position' => 1,
            ],

            [
                'title' => 'ProsharPOS',
                'description' => 'Smart POS system with billing, inventory tracking, and real-time business insights.',
                'tech_stack' => 'Laravel • JS • MySQL',
                'is_highlight' => false,
                'position' => 2,
            ],

            [
                'title' => 'NexaTrack CRM',
                'description' => 'Customer relationship management system for sales pipeline and client tracking.',
                'tech_stack' => 'Laravel • React',
                'is_highlight' => false,
                'position' => 3,
            ],

            [
                'title' => 'VisiQ',
                'description' => 'Visitor management system with check-in/out, logs, and security workflow optimization.',
                'tech_stack' => 'Laravel',
                'is_highlight' => false,
                'position' => 4,
            ],

            [
                'title' => 'EduVoyage',
                'description' => 'University consultancy platform for student guidance, matching, and document automation.',
                'tech_stack' => 'In Progress',
                'is_highlight' => false,
                'position' => 5,
            ],

            [
                'title' => 'School Management System',
                'description' => 'Dynamic system for managing notices, teachers, galleries, and school data.',
                'tech_stack' => 'PHP • MySQL',
                'is_highlight' => false,
                'position' => 6,
            ],

            [
                'title' => 'BD Karber',
                'description' => 'E-commerce platform for product listing, management, and online sales.',
                'tech_stack' => 'HTML • CSS • JS',
                'is_highlight' => false,
                'position' => 7,
            ],

            [
                'title' => 'NineteenAlpha',
                'description' => 'Defense company website with modern UI and strong brand presentation.',
                'tech_stack' => 'Laravel',
                'is_highlight' => true,
                'position' => 8,
            ],

            [
                'title' => 'XpressionGlobal',
                'description' => 'Government-approved defense contractor website for advanced military tech.',
                'tech_stack' => 'Web Development',
                'is_highlight' => true,
                'position' => 9,
            ],

            [
                'title' => 'ZNZ Handels GmbH',
                'description' => 'Clean responsive corporate website with modern UI and mobile optimization.',
                'tech_stack' => 'HTML • CSS',
                'is_highlight' => true,
                'position' => 10,
            ],

            [
                'title' => 'DFCH Patient System',
                'description' => 'Patient management system with registration, records, and reporting dashboard.',
                'tech_stack' => 'Laravel',
                'is_highlight' => true,
                'position' => 11,
            ],

            [
                'title' => 'TechnoTech Engineering Limited',
                'description' => 'Smart construction software for homepage implemented with CMS feature.',
                'tech_stack' => 'Laravel • JS • MySQL',
                'is_highlight' => false,
                'position' => 12,
            ],

            [
                'title' => 'Portfolio Admin Panel',
                'description' => 'Custom admin dashboard for managing portfolio content and analytics.',
                'tech_stack' => 'Laravel',
                'is_highlight' => true,
                'position' => 13,
            ],

        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
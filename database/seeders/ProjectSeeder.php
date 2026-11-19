<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'DFCH Patient Management System',
                'description' => 'Hospital management application developed for Dr. Fazlul Haque Colorectal Hospital Limited, supporting patient registration, medical records, appointment workflows, and administrative reporting.',
                'tech_stack' => 'PHP • Laravel • MySQL • JavaScript • AJAX • Bootstrap',
                'position' => 1,
            ],
            [
                'title' => 'BidTrack – Tender Management Platform',
                'description' => 'Tender-bidding platform for managing bidders, bid submissions, and results through structured bidding workflows.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 2,
            ],
            [
                'title' => 'VisiQ – Visitor Management System',
                'description' => 'Visitor management system with check-in/check-out, visitor logs, reporting, and security workflows.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 3,
            ],
            [
                'title' => 'NexaTrack – CRM Software',
                'description' => 'CRM application for client management, sales pipeline tracking, and business communication.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 4,
            ],
            [
                'title' => 'ProsharPOS – Point of Sale System',
                'description' => 'Point of sale system for billing, inventory management, and retail business reporting.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 5,
            ],
            [
                'title' => 'TechnoTech Engineering Limited – CMS Website',
                'description' => 'Construction company website with a custom CMS that enables administrators to update homepage content.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 6,
            ],
            [
                'title' => 'Alamgir Art Gallery',
                'description' => 'Laravel gallery with AJAX-based image filtering by date, month, and year without page reloads.',
                'tech_stack' => 'Laravel • PHP • AJAX • JavaScript',
                'position' => 7,
            ],
            [
                'title' => 'StackPilot – Developer & DevOps Dashboard',
                'description' => 'Centralized Laravel dashboard concept for managing projects, deployment workflows, and application monitoring.',
                'tech_stack' => 'Laravel • PHP • MySQL • JavaScript',
                'position' => 8,
            ],
            [
                'title' => 'FocOn – Focus & Productivity App',
                'description' => 'Mobile productivity app with focus sessions, app usage monitoring, configurable application limits, and productivity tracking.',
                'tech_stack' => 'React Native • Expo • TypeScript',
                'position' => 9,
            ],
            [
                'title' => 'Habitly – Habit Tracking App',
                'description' => 'Mobile habit tracker with daily habit management, completion streaks, reminders, progress tracking, and analytics.',
                'tech_stack' => 'React Native • Expo • TypeScript • SQLite',
                'position' => 10,
            ],
            [
                'title' => 'NoteFlow – Notes Management App',
                'description' => 'Mobile notes app for creating, editing, organizing, and storing personal notes locally.',
                'tech_stack' => 'React Native • Expo • TypeScript • SQLite',
                'position' => 11,
            ],
            [
                'title' => 'TaskFlow – Todo List App',
                'description' => 'Mobile task management app for creating, organizing, updating, and tracking daily tasks.',
                'tech_stack' => 'React Native • Expo • TypeScript • AsyncStorage',
                'position' => 12,
            ],
            [
                'title' => 'VaultX – Personal Vault App',
                'description' => 'Mobile application for organizing and managing personal information.',
                'tech_stack' => 'React Native • Expo • TypeScript',
                'position' => 13,
            ],
            [
                'title' => 'NineteenAlpha',
                'description' => 'Website for a Dhaka-based defense enterprise providing military equipment and training solutions.',
                'tech_stack' => 'Not specified in CV',
                'position' => 14,
            ],
            [
                'title' => 'XpressionGlobal',
                'description' => 'Corporate website for a defense contractor specializing in military equipment, tactical solutions, and related technologies.',
                'tech_stack' => 'Not specified in CV',
                'position' => 15,
            ],
            [
                'title' => 'ZNZ Handels GmbH',
                'description' => 'Responsive corporate website focused on clean UI, mobile responsiveness, and business presentation.',
                'tech_stack' => 'HTML5 • CSS3',
                'position' => 16,
            ],
            [
                'title' => 'Portfolio Administration Panel',
                'description' => 'Custom administration panel for managing portfolio content and website data.',
                'tech_stack' => 'Not specified in CV',
                'position' => 17,
            ],
            [
                'title' => 'Tegachia Secondary School – School Management System',
                'description' => 'Web-based school management system with backend tools for notices, galleries, staff, teachers, and school information.',
                'tech_stack' => 'Not specified in CV',
                'position' => 18,
            ],
            [
                'title' => 'BD Karber – E-commerce Website',
                'description' => 'Academic team project for online product sales and management, developed under the supervision of Md. Mushfiqur Rahman Fakir, Lecturer, Department of CSE, NUB.',
                'tech_stack' => 'Not specified in CV',
                'position' => 19,
            ],
        ];

        $titles = collect($projects)->pluck('title')->all();

        // Remove only obsolete titles from the previous version of this CV seed data.
        // Other projects created manually in the database are left untouched.
        $obsoleteTitles = [
            'DFCH Patient System',
            'NexaTrack CRM',
            'TechnoTech Engineering Limited',
            'Portfolio Admin Panel',
            'School Management System',
            'BD Karber',
            'EduVoyage',
            'SusthoCare',
        ];

        $obsoleteProjectIds = Project::whereIn('title', $obsoleteTitles)->select('id');
        ProjectInformation::whereIn('project_id', $obsoleteProjectIds)->delete();
        Project::whereIn('title', $obsoleteTitles)->delete();

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}

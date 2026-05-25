<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationSeeder extends Seeder
{
    public function run(): void
    {
        $susthoTrack = Project::where('title', 'SusthoTrack')->first();

        if ($susthoTrack) {

            ProjectInformation::create([

                'project_id' => $susthoTrack->id,

                'overview' => 'Healthcare platform with doctor consultation, appointments, patient tracking, and dashboard management.',

                'project_images' => [

                    'images/projects/sustho_1.png',
                    'images/projects/sustho_2.png',
                    'images/projects/sustho_3.png',
                ],

                'custom_features' => [

                    'Google Login Authentication',
                    'Doctor Consultation',
                    'Appointment Booking',
                    'Role-Based Dashboard',
                    'Patient Status Tracking',
                    'Doctor Earnings',
                    'Admin Appointment Management',
                ],

                'project_languages' => [

                    'Laravel',
                    'AJAX',
                    'Bootstrap',
                    'MySQL',
                    'Google OAuth',
                ],

                'challenges' => 'Implemented secure role-based authentication and real-time appointment workflow.',

                'solution' => 'Developed scalable dashboard management with optimized appointment handling.',

                'conclusion' => 'Modern healthcare solution for patients, doctors, and administrators.',

                'project_link' => 'https://google.com',

                'github_link' => null,

                'status' => true,
            ]);
        }

        $alamgirGallery = Project::where('title', 'Alamgir Art Gallery')->first();

        if ($alamgirGallery) {

            ProjectInformation::create([

                'project_id' => $alamgirGallery->id,

                'overview' => 'AJAX-based gallery system with dynamic image filtering and smooth browsing experience.',

                'project_images' => [

                    'images/projects/gallery_1.png',
                    'images/projects/gallery_2.png',
                    'images/projects/gallery_3.png',
                ],

                'custom_features' => [

                    'AJAX Search',
                    'Filter By Date',
                    'Filter By Month',
                    'Filter By Year',
                    'No Page Reload',
                    'Responsive Gallery',
                ],

                'project_languages' => [

                    'Laravel',
                    'AJAX',
                    'JavaScript',
                    'MySQL',
                    'Bootstrap',
                ],

                'challenges' => 'Handling dynamic filtering without affecting user experience.',

                'solution' => 'Used AJAX requests for fast image filtering and loading.',

                'conclusion' => 'Smooth and responsive art gallery management platform.',

                'project_link' => 'https://alamgirart.labib.work',

                'github_link' => null,

                'status' => true,
            ]);
        }
    }
}

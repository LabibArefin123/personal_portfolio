<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\EducationProfile;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Education Qualifications
        |--------------------------------------------------------------------------
        */

        $educations = [
            [
                'year' => 2023,
                'degree' => 'B.Sc. in CSE',
                'institution' => 'Northern University Bangladesh',
                'result' => 'CGPA: 3.52 / 4.00',
                'status' => 'Completed',
                'timeline_description' => 'Graduated with CGPA 3.52 in Computer Science and Engineering.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'year' => 2018,
                'degree' => 'A Levels',
                'institution' => 'Private Candidate',
                'result' => 'GPA: 1.50 / 5.00',
                'status' => 'Completed',
                'timeline_description' => 'Completed higher secondary education as a private candidate.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'year' => 2016,
                'degree' => 'O Levels',
                'institution' => 'Oxford International School',
                'result' => 'GPA: 3.50 / 5.00',
                'status' => 'Completed',
                'timeline_description' => 'Completed secondary education.',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($educations as $education) {
            Education::updateOrCreate(
                ['degree' => $education['degree']],
                $education
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Education Profile
        |--------------------------------------------------------------------------
        */

        EducationProfile::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Education & Academic Background',
                'subtitle' => 'My educational journey and technical growth.',

                'intro_title' => 'Academic Profile',
                'intro_description' => 'Built strong foundations in Computer Science with hands-on development in Laravel, APIs, and real-world software systems.',

                'highlight_value' => '3.52 / 4.00',
                'highlight_label' => 'B.Sc. CGPA',

                'github_username' => 'LabibArefin123',
                'github_url' => 'https://github.com/LabibArefin123',
                'github_chart_url' => 'https://ghchart.rshah.org/6366f1/LabibArefin123',
                'github_title' => 'GitHub Activity',
                'github_description' => 'Recent coding consistency & projects',

                'github_activities' => [
                    'Laravel Application Development',
                    'Business Systems (POS, Tender, Attendance)',
                    'API Integration & Device Connectivity',
                    'Database Design (MySQL)',
                    'Git & Version Control Workflow',
                    'Frontend Development (React - Learning)',
                ],

                'focus_cards' => [
                    [
                        'title' => '💻 Technical Focus',
                        'description' => 'Laravel, APIs, MySQL, scalable backend',
                    ],
                    [
                        'title' => '📚 Learning',
                        'description' => 'Continuously improving architecture & systems',
                    ],
                    [
                        'title' => '🚀 Goal',
                        'description' => 'Become a strong software engineer in business systems',
                    ],
                ],

                'is_active' => true,
            ]
        );
    }
}

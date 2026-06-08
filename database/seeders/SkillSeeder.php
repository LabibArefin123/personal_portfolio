<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [

            // Backend & Systems
            [
                'category' => 'Backend & Systems',
                'name' => 'Laravel',
                'percentage' => 95,
                'position' => 1,
                'status' => true,
            ],
            [
                'category' => 'Backend & Systems',
                'name' => 'PHP',
                'percentage' => 90,
                'position' => 2,
                'status' => true,
            ],
            [
                'category' => 'Backend & Systems',
                'name' => 'API Development & Integration',
                'percentage' => 88,
                'position' => 3,
                'status' => true,
            ],
            [
                'category' => 'Backend & Systems',
                'name' => 'Authentication & Authorization',
                'percentage' => 85,
                'position' => 4,
                'status' => true,
            ],

            // Frontend Development
            [
                'category' => 'Frontend Development',
                'name' => 'JavaScript',
                'percentage' => 85,
                'position' => 5,
                'status' => true,
            ],
            [
                'category' => 'Frontend Development',
                'name' => 'jQuery',
                'percentage' => 90,
                'position' => 6,
                'status' => true,
            ],
            [
                'category' => 'Frontend Development',
                'name' => 'Bootstrap',
                'percentage' => 92,
                'position' => 7,
                'status' => true,
            ],
            [
                'category' => 'Frontend Development',
                'name' => 'Tailwind CSS',
                'percentage' => 80,
                'position' => 8,
                'status' => true,
            ],

            // Database & Structure
            [
                'category' => 'Database & Structure',
                'name' => 'MySQL',
                'percentage' => 90,
                'position' => 9,
                'status' => true,
            ],
            [
                'category' => 'Database & Structure',
                'name' => 'Database Design',
                'percentage' => 85,
                'position' => 10,
                'status' => true,
            ],

            // Tools & Engineering Practice
            [
                'category' => 'Tools & Engineering Practice',
                'name' => 'Git & GitHub',
                'percentage' => 85,
                'position' => 11,
                'status' => true,
            ],
            [
                'category' => 'Tools & Engineering Practice',
                'name' => 'AJAX',
                'percentage' => 88,
                'position' => 12,
                'status' => true,
            ],
            [
                'category' => 'Tools & Engineering Practice',
                'name' => 'System Testing & Debugging',
                'percentage' => 82,
                'position' => 13,
                'status' => true,
            ],
            [
                'category' => 'Tools & Engineering Practice',
                'name' => 'Basic Security (Validation & Flow Testing)',
                'percentage' => 75,
                'position' => 14,
                'status' => true,
            ],
            [
                'category' => 'Tools & Engineering Practice',
                'name' => 'SEO (Optional Implementation)',
                'percentage' => 70,
                'position' => 15,
                'status' => true,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}

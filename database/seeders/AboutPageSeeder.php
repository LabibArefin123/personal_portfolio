<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        AboutPage::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Md. Labib Arefin',

                'role' => 'Full Stack Developer & Software Engineer',

                'image' => 'uploads/images/about/developer.jpg',

                'bio' => [
                    'I build scalable business applications using Laravel and modern web technologies, focusing on clean architecture, maintainable code, and real-world usability. My work includes full system development — from database design to UI implementation.',

                    'I have experience developing POS systems, CMS platforms, tender management systems, and biometric integrations. I also apply SEO best practices when required, ensuring systems are not only functional but also optimized for visibility and performance.',

                    'Alongside development, I test and refine systems to ensure reliability, smooth user experience, and production readiness.',
                ],

                'skills' => [
                    'Laravel',
                    'PHP',
                    'JavaScript',
                    'jQuery',
                    'MySQL',
                    'API Integration',
                    'Bootstrap',
                ],

                'experiences' => [
                    [
                        'title' => 'Software Engineer',
                        'description' => 'Building real-world business software including attendance tracking systems in collaboration. Focused on backend architecture, API design, and production-ready systems.',
                    ],

                    [
                        'title' => 'Software Developer (Full Stack)',
                        'description' => 'Developed CMS platforms, portfolio systems, and business tools with full frontend-backend integration. Worked on structured application design and real-world requirements.',
                    ],

                    [
                        'title' => 'Application Development Practice',
                        'description' => 'Built small applications such as chat systems, clocks, and company websites to strengthen development fundamentals. Explored mobile app development using React Native (Expo).',
                    ],

                    [
                        'title' => 'System Integration & Functional Testing',
                        'description' => 'Worked with biometric devices, APIs, and real-time systems. Performed workflow-based testing including login/logout flows, form submissions, and validation processes. Designed step-by-step logic to verify system behavior and ensure reliability in real-world usage.',
                    ],

                    [
                        'title' => 'Basic Security & Penetration Testing',
                        'description' => 'Conducted basic security checks on authentication systems, input handling, and user flows. Identified potential issues in access control and form handling to improve system safety.',
                    ],

                    [
                        'title' => 'UI/UX & SEO Implementation',
                        'description' => 'Designed responsive user interfaces and improved usability. Applied SEO techniques when required to enhance performance and visibility.',
                    ],
                ],

                'highlights' => [
                    [
                        'icon' => '🚀',
                        'title' => 'Systems',
                        'description' => 'Built real-world platforms including POS, CMS, and tender management systems.',
                    ],

                    [
                        'icon' => '⚡',
                        'title' => 'Approach',
                        'description' => 'Focus on clean architecture, scalability, and maintainable code.',
                    ],

                    [
                        'icon' => '🔍',
                        'title' => 'Quality',
                        'description' => 'Testing, debugging, and optimizing systems for real-world reliability.',
                    ],
                ],
            ]
        );
    }
}

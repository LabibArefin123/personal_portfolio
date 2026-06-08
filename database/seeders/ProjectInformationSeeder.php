<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | TechnoTech Engineering Limited
        |--------------------------------------------------------------------------
        */

        $technotech = Project::where('title', 'TechnoTech Engineering Limited')->first();

        if ($technotech) {

            ProjectInformation::create([

                'project_id' => $technotech->id,

                'overview' => 'A complete corporate construction and engineering management platform with dynamic CMS, SEO management, project showcase, news publishing, quote request system, security monitoring, and advanced administrative controls.',

                'project_images' => [
                    'uploads/images/project_page/technotech/image1.jpg',
                    'uploads/images/project_page/technotech/image2.jpg',
                    'uploads/images/project_page/technotech/image3.jpg',
                ],

                'custom_features' => [

                    'Dynamic Homepage CMS',
                    'Project Portfolio Management',
                    'SEO Optimization System',
                    'News & Article Management',
                    'Quote Request Management',
                    'System Problem Reporting',
                    'Global Search Functionality',
                    'Role & Permission Management',
                    'Two-Factor Authentication (2FA)',
                    'Security Log Monitoring',
                    'Device Ban Management',
                    'Database Backup System',
                    'Organization Management',
                    'AdminLTE Dashboard',
                ],

                'project_languages' => [

                    'Laravel',
                    'PHP',
                    'JavaScript',
                    'AJAX',
                    'MySQL',
                    'Bootstrap',
                    'AdminLTE',
                    'Spatie Permission',
                ],

                'challenges' => 'Building a secure enterprise-level CMS platform while maintaining scalability, role-based access control, security monitoring, and user-friendly content management.',

                'solution' => 'Implemented a modular Laravel architecture with advanced authentication, permission management, SEO controls, monitoring tools, and dynamic content management.',

                'conclusion' => 'A comprehensive engineering and construction business management platform that combines corporate presentation, project management, security, and administration in a single system.',

                'project_link' => 'https://technotech.com',
                'github_link' => null,
                'status' => true,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Portfolio Admin Panel
        |--------------------------------------------------------------------------
        */

        $portfolio = Project::where('title', 'Portfolio Admin Panel')->first();

        if ($portfolio) {

            ProjectInformation::create([

                'project_id' => $portfolio->id,

                'overview' => 'A modern portfolio management system featuring dynamic content management, project showcase, skills management, contact management, and administrative analytics dashboard.',

                'project_images' => [
                    'uploads/images/project_page/portfolio/image1.jpg',
                    'uploads/images/project_page/portfolio/image2.jpg',
                    'uploads/images/project_page/portfolio/image3.jpg',
                ],

                'custom_features' => [

                    'Portfolio Project Management',
                    'About Section Management',
                    'Skills Management',
                    'Contact Card Management',
                    'News Management',
                    'Project Category Management',
                    'Dynamic CMS Dashboard',
                    'Role-Based Authentication',
                    'Permission Management',
                    'Responsive Admin Panel',
                    'Activity Log Tracking',
                    'SEO Management',
                    'Media Management',
                    'Analytics Dashboard',
                ],

                'project_languages' => [

                    'Laravel',
                    'PHP',
                    'JavaScript',
                    'MySQL',
                    'Bootstrap',
                    'AdminLTE',
                ],

                'challenges' => 'Creating a flexible portfolio platform that allows administrators to manage content dynamically while maintaining excellent performance and user experience.',

                'solution' => 'Developed a reusable CMS architecture with modular content management, role-based permissions, and responsive administration tools.',

                'conclusion' => 'An efficient portfolio management platform that enables easy content updates, project showcasing, and professional online presence management.',

                'project_link' => 'https://portfolio.example.com',
                'github_link' => null,
                'status' => true,
            ]);
        }
    }
}

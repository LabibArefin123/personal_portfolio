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

        // $technotech = Project::where('title', 'TechnoTech Engineering Limited')->first();

        // if ($technotech) {

        //     ProjectInformation::create([

        //         'project_id' => $technotech->id,

        //         'overview' => 'A complete corporate construction and engineering management platform with dynamic CMS, SEO management, project showcase, news publishing, quote request system, security monitoring, and advanced administrative controls.',

        //         'project_images' => [
        //             'uploads/images/project_page/technotech/image1.jpg',
        //             'uploads/images/project_page/technotech/image2.jpg',
        //             'uploads/images/project_page/technotech/image3.jpg',
        //         ],

        //         'custom_features' => [

        //             'Dynamic Homepage CMS',
        //             'Project Portfolio Management',
        //             'SEO Optimization System',
        //             'News & Article Management',
        //             'Quote Request Management',
        //             'System Problem Reporting',
        //             'Global Search Functionality',
        //             'Role & Permission Management',
        //             'Two-Factor Authentication (2FA)',
        //             'Security Log Monitoring',
        //             'Device Ban Management',
        //             'Database Backup System',
        //             'Organization Management',
        //             'AdminLTE Dashboard',
        //         ],

        //         'project_languages' => [

        //             'Laravel',
        //             'PHP',
        //             'JavaScript',
        //             'AJAX',
        //             'MySQL',
        //             'Bootstrap',
        //             'AdminLTE',
        //             'Spatie Permission',
        //         ],

        //         'challenges' => 'Building a secure enterprise-level CMS platform while maintaining scalability, role-based access control, security monitoring, and user-friendly content management.',

        //         'solution' => 'Implemented a modular Laravel architecture with advanced authentication, permission management, SEO controls, monitoring tools, and dynamic content management.',

        //         'conclusion' => 'A comprehensive engineering and construction business management platform that combines corporate presentation, project management, security, and administration in a single system.',

        //         'project_link' => 'https://technotech.com',
        //         'github_link' => null,
        //         'status' => true,
        //     ]);
        // }

        /*
        |--------------------------------------------------------------------------
        | Portfolio Admin Panel
        |--------------------------------------------------------------------------
        */

        // $portfolio = Project::where('title', 'Portfolio Admin Panel')->first();

        // if ($portfolio) {

        //     ProjectInformation::create([

        //         'project_id' => $portfolio->id,

        //         'overview' => 'A modern portfolio management system featuring dynamic content management, project showcase, skills management, contact management, and administrative analytics dashboard.',

        //         'project_images' => [
        //             'uploads/images/project_page/portfolio/image1.jpg',
        //             'uploads/images/project_page/portfolio/image2.jpg',
        //             'uploads/images/project_page/portfolio/image3.jpg',
        //         ],

        //         'custom_features' => [

        //             'Portfolio Project Management',
        //             'About Section Management',
        //             'Skills Management',
        //             'Contact Card Management',
        //             'News Management',
        //             'Project Category Management',
        //             'Dynamic CMS Dashboard',
        //             'Role-Based Authentication',
        //             'Permission Management',
        //             'Responsive Admin Panel',
        //             'Activity Log Tracking',
        //             'SEO Management',
        //             'Media Management',
        //             'Analytics Dashboard',
        //         ],

        //         'project_languages' => [

        //             'Laravel',
        //             'PHP',
        //             'JavaScript',
        //             'MySQL',
        //             'Bootstrap',
        //             'AdminLTE',
        //         ],

        //         'challenges' => 'Creating a flexible portfolio platform that allows administrators to manage content dynamically while maintaining excellent performance and user experience.',

        //         'solution' => 'Developed a reusable CMS architecture with modular content management, role-based permissions, and responsive administration tools.',

        //         'conclusion' => 'An efficient portfolio management platform that enables easy content updates, project showcasing, and professional online presence management.',

        //         'project_link' => 'https://portfolio.example.com',
        //         'github_link' => null,
        //         'status' => true,
        //     ]);
        // }

        /*
|--------------------------------------------------------------------------
| DFCH Patient System
|--------------------------------------------------------------------------
*/

        $dfch = Project::where('title', 'DFCH Patient System')->first();

        if ($dfch) {

            ProjectInformation::create([

                'project_id' => $dfch->id,

                'overview' => 'A complete hospital patient management and healthcare administration platform developed for Dhaka Family Care Hospital (DFCH). The system streamlines patient registration, medical record management, reporting, security monitoring, role-based administration, document handling, analytics, and hospital operations through a centralized dashboard.',

                'project_images' => [
                    'uploads/images/project_page/dfch/image1.jpg',
                    'uploads/images/project_page/dfch/image2.jpg',
                    'uploads/images/project_page/dfch/image3.jpg',
                ],

                'custom_features' => [

                    // Patient Management
                    'Patient Registration & Management',
                    'Patient Profile & Medical Records',
                    'Patient Recommendation System',
                    'Patient ID Card Printing',
                    'Patient Search & Filtering',
                    'Bulk Patient Deletion',

                    // Import Export
                    'Excel Import System',
                    'Word Import System',
                    'Excel Export System',
                    'PDF Export System',

                    // Reporting
                    'Daily Patient Reports',
                    'Weekly Patient Reports',
                    'Monthly Patient Reports',
                    'Yearly Patient Reports',
                    'PDF Report Generation',
                    'Excel Report Generation',

                    // Dashboard
                    'Administrative Dashboard',
                    'System Analytics Dashboard',
                    'Global Search Engine',

                    // Organization
                    'Organization Management',

                    // Security
                    'Two-Factor Authentication (2FA)',
                    'Security Log Monitoring',
                    'Attack Detection Middleware',
                    'Device Ban Management',
                    'User Ban Management',
                    'User Device Monitoring',

                    // User Management
                    'Role Management',
                    'Permission Management',
                    'System User Management',
                    'Password Policy Management',

                    // Settings
                    'Notification Settings',
                    'Maintenance Mode',
                    'Theme Management',
                    'Language Management',
                    'Date & Time Configuration',
                    'Session Timeout Configuration',

                    // Monitoring
                    'System Problem Reporting',
                    'System Problem Notifications',
                    'Activity Log Monitoring',
                    'Database Backup Management',

                    // Website CMS
                    'Doctor Information Pages',
                    'Hospital Facility Pages',
                    'Emergency Service Information',
                    'Laboratory Information',
                    'Radiology & Imaging Information',
                    'Pharmacy Information',
                    'Ambulance Service Information',

                    // UI
                    'AdminLTE Administrative Panel',
                    'Responsive Dashboard Interface',
                ],

                'project_languages' => [

                    'Laravel',
                    'PHP',
                    'MySQL',
                    'JavaScript',
                    'AJAX',
                    'Bootstrap',
                    'AdminLTE',
                    'jQuery',
                    'Spatie Permission',
                    'Laravel Breeze',
                    'DOMPDF',
                    'Laravel Excel',

                ],

                'challenges' => 'Developing a secure healthcare management platform capable of handling patient records, hospital administration, reporting, authentication, user permissions, data exports, security monitoring, and system scalability while maintaining ease of use for healthcare staff.',

                'solution' => 'Implemented a modular Laravel architecture with role-based access control, advanced reporting tools, import/export capabilities, patient record management, security monitoring, activity tracking, two-factor authentication, and configurable system settings to support hospital operations efficiently.',

                'conclusion' => 'The DFCH Patient System provides a comprehensive digital healthcare management solution that combines patient administration, reporting, security, hospital information management, and administrative control into a unified platform. The system improves operational efficiency, data management, and healthcare service delivery through modern web technologies.',

                'project_link' => null,

                'github_link' => null,

                'status' => true,
            ]);
        }
    }
}

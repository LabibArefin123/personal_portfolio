<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectInformation;
use Illuminate\Database\Seeder;

class ProjectInformationMobileSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'project_title' => 'FocOn – Focus & Productivity App',
                'overview' => 'A personal mobile productivity application developed locally with Expo and React Native. It includes focus sessions, app usage monitoring, configurable application limits, and productivity tracking. The app has not been published to an app store.',
                'project_images' => [],
                'custom_features' => [
                    'Focus Sessions',
                    'App Usage Monitoring',
                    'Configurable Application Limits',
                    'Productivity Tracking',
                ],
                'project_languages' => [
                    'React Native',
                    'Expo',
                    'TypeScript',
                ],
                'challenges' => 'Combining focus sessions and productivity-related monitoring and limits in a personal mobile application.',
                'solution' => 'Developed the application locally using React Native, Expo, and TypeScript.',
                'conclusion' => 'FocOn is a personal productivity app project covering focus sessions and usage-related productivity tools.',


                'status' => true,
            ],
            [
                'project_title' => 'Habitly – Habit Tracking App',
                'overview' => 'A personal mobile habit tracker developed locally with Expo and React Native. It supports daily habit management, completion streaks, reminders, progress tracking, and analytics. The app has not been published to an app store.',
                'project_images' => [],
                'custom_features' => [
                    'Daily Habit Management',
                    'Completion Streaks',
                    'Reminders',
                    'Progress Tracking',
                    'Habit Analytics',
                ],
                'project_languages' => [
                    'React Native',
                    'Expo',
                    'TypeScript',
                    'SQLite',
                ],
                'challenges' => 'Supporting consistent habit tracking with daily records, reminders, streaks, and progress insights.',
                'solution' => 'Built a React Native application using Expo, TypeScript, and SQLite for habit data and progress tracking.',
                'conclusion' => 'Habitly brings daily habit management and progress tracking into a locally developed mobile application.',


                'status' => true,
            ],
            [
                'project_title' => 'NoteFlow – Notes Management App',
                'overview' => 'A personal mobile notes application developed locally with Expo and React Native for creating, editing, organizing, and storing personal notes locally. The app has not been published to an app store.',
                'project_images' => [],
                'custom_features' => [
                    'Create Notes',
                    'Edit Notes',
                    'Organize Notes',
                    'Local Note Storage',
                ],
                'project_languages' => [
                    'React Native',
                    'Expo',
                    'TypeScript',
                    'SQLite',
                ],
                'challenges' => 'Providing a straightforward way to create, organize, and retain personal notes locally on a mobile device.',
                'solution' => 'Built the application with React Native, Expo, TypeScript, and SQLite for local note storage.',
                'conclusion' => 'NoteFlow provides local note creation, editing, organization, and storage in a mobile app.',


                'status' => true,
            ],
            [
                'project_title' => 'TaskFlow – Todo List App',
                'overview' => 'A personal mobile task management application developed locally with Expo and React Native for creating, organizing, updating, and tracking daily tasks. The app has not been published to an app store.',
                'project_images' => [],
                'custom_features' => [
                    'Create Tasks',
                    'Organize Tasks',
                    'Update Tasks',
                    'Daily Task Tracking',
                ],
                'project_languages' => [
                    'React Native',
                    'Expo',
                    'TypeScript',
                    'AsyncStorage',
                ],
                'challenges' => 'Making daily tasks easy to create, organize, update, and track within a mobile application.',
                'solution' => 'Developed the app using React Native, Expo, TypeScript, and AsyncStorage.',
                'conclusion' => 'TaskFlow provides a personal mobile workflow for managing and tracking everyday tasks.',


                'status' => true,
            ],
            [
                'project_title' => 'VaultX – Personal Vault App',
                'overview' => 'A personal mobile application designed and developed locally with Expo and React Native for organizing and managing personal information. The app has not been published to an app store.',
                'project_images' => [],
                'custom_features' => [
                    'Personal Information Organization',
                    'Personal Information Management',
                ],
                'project_languages' => [
                    'React Native',
                    'Expo',
                    'TypeScript',
                ],
                'challenges' => 'Creating a dedicated mobile experience for organizing and managing personal information.',
                'solution' => 'Designed and developed the application locally using React Native, Expo, and TypeScript.',
                'conclusion' => 'VaultX is a personal mobile project focused on organizing and managing personal information.',


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

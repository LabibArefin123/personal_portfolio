<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectInformationSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProjectInformationHealthcareSeeder::class,
            ProjectInformationBusinessSeeder::class,
            ProjectInformationWebSeeder::class,
            ProjectInformationMobileSeeder::class,
            ProjectInformationAcademicSeeder::class,
        ]);
    }
}

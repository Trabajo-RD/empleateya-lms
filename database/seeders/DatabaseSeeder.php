<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\MicrosoftLearnController;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');

        Storage::deleteDirectory('partners');
        Storage::makeDirectory('partners');

        $this->call(PermissionSeeder::class);
        $this->command->info('Permission table seeded!');

        $this->call(RoleSeeder::class);
        $this->command->info('Role table seeded!');

        $this->call(TeamSeeder::class);
        $this->command->info('Team table seeded!');

        $this->call(UserSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(MonitorUserSeeder::class);
        $this->command->info('Monitor to User table seeded!');

        $this->call(CountriesTableSeeder::class);
        $this->command->info('Countries table seeded!');

        $this->call(LevelSeeder::class);
        $this->command->info('Level table seeded!');

        $this->call(CategorySeeder::class);
        $this->command->info('Category table seeded!');

        $this->call(PriceSeeder::class);
        $this->command->info('Price table seeded!');

        $this->call(TypeSeeder::class);
        $this->command->info('Type table seeded!');

        $this->call(ModalitySeeder::class);
        $this->command->info('Modality table seeded!');

        $this->call(PlatformSeeder::class);
        $this->command->info('Platform table seeded!');

        $this->call(SlideSeeder::class);
        $this->command->info('Slides table seeded!');

        $this->call(MicrosoftLearnCourseSeeder::class);
        $this->command->info('Microsoft Learn Courses seeded!');

        $this->call(MicrosoftLearnModulesSeeder::class);
        $this->command->info('Microsoft Learn Modules seeded!');

        $this->call(LinkSeeder::class);
        $this->command->info('Link table seeded!');

        // TODO: uncomment to create test courses
        // $this->call(CourseSeeder::class);
    }
}

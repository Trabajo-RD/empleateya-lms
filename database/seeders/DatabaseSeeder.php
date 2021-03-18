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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(GenderSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(ModalitySeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(MicrosoftLearnCourseSeeder::class);
        // TODO: uncomment to create test courses
        //$this->call(CourseSeeder::class);
    }
}

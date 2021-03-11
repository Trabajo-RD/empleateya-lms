<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Gender;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'document_id' => null,
            'document_type' => null,
            'name' => 'Admin',
            'surname' => 'LMS',
            'email' => 'admin@admin.com',
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Administrator');

        $user = User::create([
            'document_id' => null,
            'document_type' => null,
            'name' => 'Samir',
            'surname' => 'Santos',
            'email' => 'samir.santos@mt.gob.do',
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Manager');

        $user = User::create([
            'document_id' => null,
            'document_type' => null,
            'name' => 'Instructor',
            'surname' => 'LMS',
            'email' => 'instructor@instructor.com',
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Instructor');

        $user = User::create([
            'document_id' => null,
            'document_type' => null,
            'name' => 'Madelin',
            'surname' => 'Estevez',
            'email' => 'madelin.estevez@mt.gob.do',
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Creator');

        //TODO: uncomment to create test users $users = User::factory(98)->create();

        // foreach($users as $user){
        //     Gender::factory()->create([
        //         'user_id' => $user->id
        //     ]);
        // }


    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Team;
use Laravel\Jetstream\Events\TeamMemberAdded;

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
            'document_id' => '00117910042',
            'document_type' => 'CED',
            'firstname' => 'Ramon Leonardo',
            'lastname' => 'Fabian Roman',
            'email' => 'admin@admin.com',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Administrator');

        // $teamToAssign = Team::find(1); // This gets passed in but for demonstration purposes, assume its the first team
        // $teamToAssign->users()->attach($user, array('role' => 'administrator'));
        // TeamMemberAdded::dispatch($teamToAssign, $user);
        // $user->switchTeam($teamToAssign);

        // $user = User::create([
        //     'document_id' => null,
        //     'document_type' => null,
        //     'firstname' => 'Samir',
        //     'lastname' => 'Santos',
        //     'email' => 'samir.santos@mt.gob.do',
        //     'password' => bcrypt('lms123456'),
        // ]);

        // $user->assignRole('Manager');

        // $user = User::create([
        //     'document_id' => null,
        //     'document_type' => null,
        //     'firstname' => 'Instructor',
        //     'lastname' => 'LMS',
        //     'email' => 'instructor@instructor.com',
        //     'password' => bcrypt('lms123456'),
        // ]);

        // $user->assignRole('Instructor');

        $user = User::create([
            'document_id' => '00000000000',
            'document_type' => 'CED',
            'firstname' => 'SENAE',
            'lastname' => null,
            'email' => 'senae@mt.gob.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('lms123456'),
        ]);

        $user->assignRole('Creator');

        // $teamToAssign = Team::find(1); // This gets passed in but for demonstration purposes, assume its the first team
        // $teamToAssign->users()->attach($user, array('role' => 'participant'));
        // TeamMemberAdded::dispatch($teamToAssign, $user);
        // $user->switchTeam($teamToAssign);

        // $user = User::create([
        //     'document_id' => null,
        //     'document_type' => null,
        //     'firstname' => 'John',
        //     'lastname' => 'Doe',
        //     'email' => 'student@student.com',
        //     'password' => bcrypt('lms123456'),
        // ]);

        // $user->assignRole('Student');

        //TODO: uncomment to create test users
        // $users = User::factory(98)->create();



    }
}

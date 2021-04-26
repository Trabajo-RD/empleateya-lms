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
            'name' => 'Ramon Leonardo',
            'lastname' => 'Fabian Roman',
            'email' => 'admin@capacitate.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('mt123456'),
        ]);

        $user->assignRole('Administrator');

        // $teamToAssign = Team::find(1); // This gets passed in but for demonstration purposes, assume its the first team
        // $teamToAssign->users()->attach($user, array('role' => 'administrator'));
        // TeamMemberAdded::dispatch($teamToAssign, $user);
        // $user->switchTeam($teamToAssign);

        // $user = User::create([
        //     'document_id' => null,
        //     'document_type' => null,
        //     'name' => 'Samir',
        //     'lastname' => 'Santos',
        //     'email' => 'samir.santos@mt.gob.do',
        //     'password' => bcrypt('lms123456'),
        // ]);

        // $user->assignRole('Manager');

        $user = User::create([
            'document_id' => '00000000000',
            'document_type' => 'CED',
            'name' => 'Manager',
            'lastname' => null,
            'email' => 'manager@capacitate.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('mt123456'),
        ]);

        $user->assignRole('Manager');

        $user = User::create([
            'document_id' => '00000000001',
            'document_type' => 'CED',
            'name' => 'Creator',
            'lastname' => null,
            'email' => 'creator@capacitate.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('mt123456'),
        ]);

        $user->assignRole('Creator');

        $user = User::create([
            'document_id' => '00000000002',
            'document_type' => 'CED',
            'name' => 'Instructor',
            'lastname' => null,
            'email' => 'instructor@capacitate.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('mt123456'),
        ]);

        $user->assignRole('Instructor');

        /**
         * Default Contributor User
         */
        $user = User::create([
            'document_id' => '00000000003',
            'document_type' => 'CED',
            'name' => 'Contributor',
            'lastname' => null,
            'email' => 'contributor@capacitate.do',
            'options' => [
                'languages' => 'es'
            ],
            'current_team_id' => 1,
            'password' => bcrypt('mt123456'),
        ]);

        $user->assignRole('Contributor');

        // $teamToAssign = Team::find(1); // This gets passed in but for demonstration purposes, assume its the first team
        // $teamToAssign->users()->attach($user, array('role' => 'participant'));
        // TeamMemberAdded::dispatch($teamToAssign, $user);
        // $user->switchTeam($teamToAssign);

        // $user = User::create([
        //     'document_id' => null,
        //     'document_type' => null,
        //     'name' => 'John',
        //     'lastname' => 'Doe',
        //     'email' => 'student@student.com',
        //     'password' => bcrypt('lms123456'),
        // ]);

        // $user->assignRole('Student');

        //TODO: uncomment to create test users
        // $users = User::factory(98)->create();



    }
}

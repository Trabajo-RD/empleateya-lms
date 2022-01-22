<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Team;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Illuminate\Support\Facades\Config;
class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usersConfig = Config::get('users');
        $role = [
            'administrator',
            'manager',
            'coursemoderator',
            'coursecreator',
            'contentmoderator',
            'contentcreator',
            'internalinstructor',
            'externalinstructor',
            'helper',
            'student',
            'guest'
        ];

        foreach( $usersConfig as $key => $user ){

            $current = Carbon::now();

            $user = User::create([

                'document_id'       => $user['document_id'],
                'document_type'     => $user['document_type'],
                'name'              => $user['name'],
                'lastname'          => $user['lastname'],
                'gender'            => $user['gender'],
                'email'             => $user['email'],
                'phone'             => null,
                'mobile'            => null,
                'email_verified_at' => $current,
                'options'           => [
                    'language'      => $user['options']['language'],
                ],
                'current_team_id'   => $user['current_team_id'],
                'password'          => bcrypt($user['password']),

            ]);


            $user->assignRole($role[$key]);

        }
    }
}

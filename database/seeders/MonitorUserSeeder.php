<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class MonitorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monitorUsersConfig = Config::get('monitors');

        foreach( $monitorUsersConfig as $key => $user ){

            $user = User::create([

                'document_id'       => $user['document_id'],
                'document_type'     => $user['document_type'],
                'name'              => $user['name'],
                'lastname'          => $user['lastname'],
                'email'             => $user['email'],
                'options'           => [
                    'language'      => $user['options']['language'],
                ],
                'current_team_id'   => $user['current_team_id'],
                'password'          => bcrypt($user['password']),

            ]);

            $user->assignRole('coursecreator');

        }
    }
}

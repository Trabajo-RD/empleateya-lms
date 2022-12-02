<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

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
        $current = Carbon::now();

        $monitorUsersConfig = Config::get('monitors');

        foreach( $monitorUsersConfig as $key => $user ){

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
                'terms_acceptance'  => 1,
                'terms_version'     => 1.0,

            ]);

            $user->assignRole('creator');

        }
    }
}

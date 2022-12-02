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

        // $usersConfig = Config::get('users');
        // $role = [
        //     'administrator',
        //     'creator',
        //     'instructor',
        //     'student'
        // ];

        // foreach( $usersConfig as $key => $user ){

        //     $current = Carbon::now();

        //     $userId = User::create([

        //         'document_id'       => $user['document_id'],
        //         'document_type'     => $user['document_type'],
        //         'name'              => $user['name'],
        //         'lastname'          => $user['lastname'],
        //         'gender'            => $user['gender'],
        //         'email'             => $user['email'],
        //         'phone'             => null,
        //         'mobile'            => null,
        //         'email_verified_at' => $current,
        //         'options'           => [
        //             'language'      => $user['options']['language'],
        //         ],
        //         'current_team_id'   => $user['current_team_id'],
        //         'password'          => bcrypt($user['password']),
        //         'terms_acceptance'  => 1,
        //         'terms_version'     => 1.0,
        //     ]);


        //     $userId->assignRole($user['role']);

        // }

        $admin = User::create([
            'document_id'       => '00117910042',
            'document_type'     => 'CED',
            'name'              => 'Leonardo',
            'lastname'          => 'Fabian',
            'gender'            => 'M',
            'email'             => 'ramonlfabian@gmail.com',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => Carbon::now(),
            'options'           => [
                'language'      => 'en',
            ],
            'current_team_id'   => null,
            'password'          => bcrypt('lms@mt123456B'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $admin->assignRole('administrator');

        $creator = User::create([
            'document_id'       => '00000000001',
            'document_type'     => 'CED',
            'name'              => 'Senae',
            'lastname'          => 'Capacítate',
            'gender'            => 'NS',
            'email'             => 'creator@capacitate.do',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => Carbon::now(),
            'options'           => [
                'language'      => 'en',
            ],
            'current_team_id'   => null,
            'password'          => bcrypt('mt123456'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $creator->assignRole('creator');

        $instructor = User::create([
            'document_id'       => '00000000002',
            'document_type'     => 'CED',
            'name'              => 'Capacítate',
            'lastname'          => 'Capacítate',
            'gender'            => 'NS',
            'email'             => 'instructor@capacitate.do',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => Carbon::now(),
            'options'           => [
                'language'      => 'en',
            ],
            'current_team_id'   => null,
            'password'          => bcrypt('mt123456'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $instructor->assignRole('instructor');

        $student = User::create([
            'document_id'       => '00000000003',
            'document_type'     => 'CED',
            'name'              => 'Student',
            'lastname'          => 'Capacítate',
            'gender'            => 'NS',
            'email'             => 'student@capacitate.do',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => Carbon::now(),
            'options'           => [
                'language'      => 'en',
            ],
            'current_team_id'   => null,
            'password'          => bcrypt('mt123456'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $student->assignRole('student');

        $staff = User::create([
            'document_id'       => '00118765213',
            'document_type'     => 'CED',
            'name'              => 'Madelin',
            'lastname'          => 'Estévez',
            'gender'            => 'NS',
            'email'             => 'madelin.estevez@mt.gob.do',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => Carbon::now(),
            'options'           => [
                'language'      => 'en',
            ],
            'current_team_id'   => null,
            'password'          => bcrypt('mt123456'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $staff->assignRole('instructor');

        // User::create([
        //     'document_id'       => '99999999999',
        //     'document_type'     => 'PAS',
        //     'name'              => 'Microsoft',
        //     'lastname'          => null,
        //     'gender'            => 'NS',
        //     'email'             => 'microsoft@capacitate.do',
        //     'phone'             => null,
        //     'mobile'            => null,
        //     'email_verified_at' => Carbon::now(),
        //     'options'           => [
        //         'language'      => 'en',
        //     ],
        //     'current_team_id'   => null,
        //     'password'          => bcrypt('mt123456'),
        //     'terms_acceptance'  => 1,
        //     'terms_version'     => 1.0,
        // ]);

        // User::create([
        //     'document_id'       => '99999999998',
        //     'document_type'     => 'PAS',
        //     'name'              => 'LinkedIn',
        //     'lastname'          => null,
        //     'gender'            => 'NS',
        //     'email'             => 'linkedin@capacitate.do',
        //     'phone'             => null,
        //     'mobile'            => null,
        //     'email_verified_at' => Carbon::now(),
        //     'options'           => [
        //         'language'      => 'en',
        //     ],
        //     'current_team_id'   => null,
        //     'password'          => bcrypt('mt123456'),
        //     'terms_acceptance'  => 1,
        //     'terms_version'     => 1.0,
        // ]);
    }
}

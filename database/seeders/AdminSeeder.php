<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = "admin";
        $current = Carbon::now();

        $admin = Admin::create([
            'document_id'       => '00117910042',
            'document_type'     => 'CED',
            'name'              => 'Admin',
            'lastname'          => 'Admin',
            'gender'            => 'M',
            'email'             => 'ramon.fabian@gmail.com',
            'phone'             => null,
            'mobile'            => null,
            'email_verified_at' => $current,
            'options'           => [
                'language'      => 'es',
            ],
            'current_team_id'   => 1,
            'password'          => bcrypt('MT123456B'),
            'terms_acceptance'  => 1,
            'terms_version'     => 1.0,
        ]);

        $admin->assignRole($role);
    }
}

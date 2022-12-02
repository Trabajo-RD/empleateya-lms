<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create([
            'name' => 'Ministerio de Trabajo',
            'slug' => Str::slug('Ministerio de Trabajo'),
            'rnc' => '401007363',
            'url' => 'https://mt.gob.do/',
            'user_id' => 1
        ]);

        Organization::create([
            'name' => 'Microsoft Coorporation',
            'slug' => Str::slug('Microsoft Coorporation'),
            'rnc' => null,
            'url' => 'https://www.microsoft.com/es-do/',
            'user_id' => 1
        ]);

        // Organization::create([
        //     'name' => 'Educology Hub',
        //     'slug' => Str::slug('Educology Hub'),
        //     'rnc' => null,
        //     'url' => 'https://www.educologyhub.com/',
        //     'user_id' => 1
        // ]);
    }
}

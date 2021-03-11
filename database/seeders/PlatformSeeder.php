<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create([
            'name' => 'Microsoft Learn'
        ]);

        Platform::create([
            'name' => 'LinkedIn Learning'
        ]);

        Platform::create([
            'name' => 'Youtube'
        ]);

        Platform::create([
            'name' => 'Vimeo'
        ]);
    }
}

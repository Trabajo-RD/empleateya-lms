<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;
use Illuminate\Support\Str;

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
            'name' => 'Microsoft Learn',
            'slug' => Str::slug('Microsoft Learn'),
            'program_id' => 1
        ]);

        Platform::create([
            'name' => 'LinkedIn Learning',
            'slug' => Str::slug('LinkedIn Learning'),
            'program_id' => 1
        ]);

        Platform::create([
            'name' => 'Youtube',
            'slug' => Str::slug('Youtube'),
            'program_id' => null
        ]);

        Platform::create([
            'name' => 'Vimeo',
            'slug' => Str::slug('Vimeo'),
            'program_id' => null
        ]);
    }
}

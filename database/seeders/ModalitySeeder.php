<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modality;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modality::create([
            'name' => 'E-learning'
        ]);

        Modality::create([
            'name' => 'Blended'
        ]);

        Modality::create([
            'name' => 'M-learning'
        ]);

        Modality::create([
            'name' => 'Presencial'
        ]);
    }
}

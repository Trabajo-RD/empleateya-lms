<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Itinerario de Aprendizaje'
        ]);

        Type::create([
            'name' => 'Modulo'
        ]);

        Type::create([
            'name' => 'Video'
        ]);

    }
}

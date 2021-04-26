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
            'name' => 'Ruta de Aprendizaje'
        ]);

        Type::create([
            'name' => 'Módulo'
        ]);

        Type::create([
            'name' => 'Video'
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LearningPath;
use Illuminate\Support\Str;

class LearningPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LearningPath::create([
            'uid' => 'capacitate.'.Str::slug('Rutas de Aprendizaje Generales'),
            'title' => 'Rutas de Aprendizaje Generales',
            'slug'  => Str::slug('Rutas de Aprendizaje Generales'),
            'summary' => 'Las rutas de aprendizaje generales trabajan en habilidades más amplias que involucran a muchos sectores diferentes. Es una ruta básica que proporciona los conocimientos necesarios que la organización quiere compartir con todo su equipo.',
            'duration_in_minutes' => null,
            'status' => 3,
            'user_id' => null,
            'level_id' => null,
            'type_id' => 1,
            'program_id' => null,
            'deleted_at' => null
        ]);

        LearningPath::create([
            'uid' => 'capacitate.'.Str::slug('Rutas de Aprendizaje Específicas'),
            'title' => 'Rutas de Aprendizaje Específicas',
            'slug'  => Str::slug('Rutas de Aprendizaje Específicas'),
            'summary' => 'Las rutas de aprendizaje específicas, están mucho más segmentadas y orientadas a un público específico que quieren desarrollar competencias y habilidades profundas en un campo de estudio en particular.',
            'duration_in_minutes' => null,
            'status' => 3,
            'user_id' => null,
            'level_id' => null,
            'type_id' => 1,
            'program_id' => null,
            'deleted_at' => null
        ]);
    }
}

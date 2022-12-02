<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use Illuminate\Support\Str;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create([
            'name' => 'E-learning',
            'slug' => Str::slug('E-learning'),
            'description' => 'E-learning es un proceso de aprendizaje que tiene lugar vía Internet y con el apoyo de herramientas tecnológicas. En este modelo, la educación cuenta con un ambiente de aprendizaje totalmente virtual, en el cual, los instructores ponen a disposición el contenido y los estudiantes acceden desde cualquier ordenador o dispositivo móvil.',
            'status' => Term::VISIBLE
        ]);

        Term::create([
            'name' => 'B-learning',
            'slug' => Str::slug('B-learning'),
            'description' => 'El aprendizaje semipresencial se refiere a la combinación del trabajo presencial, y del trabajo en línea, ​ en donde el alumno puede controlar algunos factores como el lugar, momento y espacio de trabajo.',
            'status' => Term::VISIBLE
        ]);

        Term::create([
            'name' => 'Face-to-Face',
            'slug' => Str::slug('Face-to-Face'),
            'description' => 'La educación presencial es la estructura de aprendizaje básica que requiere y comprende la presencia necesaria de un docente y alumnos en un aula de clase. El profesor es el encargado de dirigir la jornada de formación, transmitiendo sus conocimientos, ideas y experiencias relacionadas con el tema central.',
            'status' => Term::VISIBLE
        ]);
    }
}

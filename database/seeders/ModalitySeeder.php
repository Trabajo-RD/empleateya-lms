<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modalities = [
            [
                'name' => 'E-learning',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'E-learning es un proceso de aprendizaje que tiene lugar vía Internet y con el apoyo de herramientas tecnológicas. En este modelo, la educación cuenta con un ambiente de aprendizaje totalmente virtual, en el cual, los instructores ponen a disposición el contenido y los estudiantes acceden desde cualquier ordenador o dispositivo móvil.'
            ],
            [
                'name' => 'B-learning',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'El aprendizaje semipresencial se refiere a la combinación del trabajo presencial, y del trabajo en línea, ​ en donde el alumno puede controlar algunos factores como el lugar, momento y espacio de trabajo.'
            ],
            [
                'name' => 'Face-to-Face',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'La educación presencial es la estructura de aprendizaje básica que requiere y comprende la presencia necesaria de un docente y alumnos en un aula de clase. El profesor es el encargado de dirigir la jornada de formación, transmitiendo sus conocimientos, ideas y experiencias relacionadas con el tema central.'
            ]
        ];

/*
        Modality::create([
            'name' => 'E-learning',
            'description' => 'E-learning es un proceso de aprendizaje que tiene lugar vía Internet y con el apoyo de herramientas tecnológicas. En este modelo, la educación cuenta con un ambiente de aprendizaje totalmente virtual, en el cual, los instructores ponen a disposición el contenido y los estudiantes acceden desde cualquier ordenador o dispositivo móvil.'
        ]);

        Modality::create([
            'name' => 'B-learning',
            'description' => 'El aprendizaje semipresencial se refiere a la combinación del trabajo presencial, y del trabajo en línea, ​ en donde el alumno puede controlar algunos factores como el lugar, momento y espacio de trabajo.',
        ]);
*/

        // Modality::create([
        //     'name' => 'M-learning',
        //     'description' => 'El aprendizaje electrónico móvil, en inglés m-learning, o simplemente aprendizaje móvil,​ es una forma de aprendizaje que facilita la construcción del conocimiento, la resolución de problemas y el desarrollo de destrezas y habilidades diversas de manera autónoma y ubicua, gracias a la mediación de dispositivos móviles.'
        // ]);

        /*
        Modality::create([
            'name' => 'Face-to-Face',
            'description' => 'La educación presencial es la estructura de aprendizaje básica que requiere y comprende la presencia necesaria de un docente y alumnos en un aula de clase. El profesor es el encargado de dirigir la jornada de formación, transmitiendo sus conocimientos, ideas y experiencias relacionadas con el tema central.'
        ]);
        */

        foreach($modalities as $modality)
        {

            Modality::create([
                'name' => $modality['name'],
                'slug' => Str::slug($modality['name']),
                'icon' => $modality['icon'],
                'description' => $modality['description']
            ]);

        }
    }
}
